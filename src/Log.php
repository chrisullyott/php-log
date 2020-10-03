<?php

/**
 * Persist data in a JSON file.
 */

namespace ChrisUllyott;

class Log
{
    /**
     * A path for the local file.
     *
     * @var string
     */
    private $file;

    /**
     * Whether to minify the data.
     *
     * @var boolean
     */
    private $minify;

    /**
     * The contents fetched from storage.
     *
     * @var string
     */
    private $contents;

    /**
     * The data in memory.
     *
     * @var array
     */
    private $data = [];

    /**
     * Constructor.
     *
     * @param string $file A path for the JSON file
     */
    public function __construct($file, $minify = false)
    {
        $this->file = $file;
        $this->minify = $minify ? JSON_PRETTY_PRINT : 0;

        if (file_exists($this->file)) {
            $this->contents = file_get_contents($this->file);
            $this->data = json_decode($this->contents, true);
        }
    }

    /**
     * Get a stored value by key.
     *
     * @param  mixed $key The item key
     * @return mixed
     */
    public function get($key)
    {
        return isset($this->data[$key]) ? $this->data[$key] : null;
    }

    /**
     * Get all stored data.
     *
     * @return array
     */
    public function getAll()
    {
        return $this->data;
    }

    /**
     * Persist a value by key.
     *
     * @param mixed $key   The key to use
     * @param mixed $value The value to store
     * @return self
     */
    public function set($key, $value)
    {
        $this->data[$key] = $value;

        return $this;
    }

    /**
     * Whether a given key exists.
     *
     * @param  mixed $key The key to check
     * @return boolean
     */
    public function exists($key)
    {
        return array_key_exists($key, $this->data);
    }

    /**
     * Whether a given key exists and is not empty.
     *
     * @param  mixed $key The key to check
     * @return boolean
     */
    public function isset($key)
    {
        return isset($key, $this->data);
    }

    /**
     * Delete an item by key.
     *
     * @param mixed $key The key to use
     * @return self
     */
    public function delete($key)
    {
        if (isset($this->data[$key])) {
            unset($this->data[$key]);
        }

        return $this;
    }

    /**
     * Delete all data.
     *
     * @return self
     */
    public function reset()
    {
        $this->data = [];

        if (file_exists($this->file)) {
            unlink($this->file);
        }

        return $this;
    }

    /**
     * Save the data to disk.
     */
    public function __destruct()
    {
        $new_contents = json_encode($this->data, $this->minify);

        if ($this->data && $new_contents !== $this->contents) {
            file_put_contents($this->file, $new_contents);
        }
    }
}
