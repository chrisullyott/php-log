<?php

/**
 * Logs data in JSON.
 *
 * @author Chris Ullyott <chris@monkdevelopment.com>
 */
class Log
{
    private $file;

    public function __construct($file)
    {
        $this->file = $file;
        File::createDir(dirname($this->file));
    }

    public function getFile()
    {
        return $this->file;
    }

    public function get($key)
    {
        $array = $this->getAll();

        return isset($array[$key]) ? $array[$key] : null;
    }

    public function getAll()
    {
        $json = File::read($this->getFile());
        $array = json_decode($json, true);

        return is_array($array) ? $array : array();
    }

    {
        $array = $this->getAll();

        $array[] = $value;

        $this->save($array);

        return $this;
    }

    public function set($key, $value)
    {
        $array = $this->getAll();

        $array[$key] = $value;

        $this->save($array);

        return $this;
    }

    public function merge(array $array)
    {
       $array = array_merge($this->getAll(), $array);

       $this->save($array);

       return $this;
    }

    public function delete($key)
    {
        $array = $this->getAll();

        if (isset($array[$key])) {
            unset($array[$key]);
        }

        $this->save($array);

        return $this;
    }

    private function save(array $array)
    {
        return File::write($this->getFile(), json_encode($array));
    }

}
