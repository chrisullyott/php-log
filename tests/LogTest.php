<?php

/**
 * Tests for Cache.
 */

use ChrisUllyott\Log;

class LogTest extends \PHPUnit_Framework_TestCase
{
    private $file = './test.json';
    private $key  = 'some_key';
    private $data = 'some_data';

    /**
     * Test whether we can cache data.
     */
    public function testSetAtandGet()
    {
        $log = new Log($this->file);

        $log->set($this->key, null);
        $this->assertTrue($log->exists($this->key));

        $log->set($this->key, $this->data);
        $this->assertTrue($log->isset($this->key));

        $this->assertSame($this->data, $log->get($this->key));

        $log->reset();
        $this->assertFalse(file_exists($this->file));
    }
}
