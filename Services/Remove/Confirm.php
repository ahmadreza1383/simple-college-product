<?php
namespace Services\Remove;

use Services\Remove\ChainCall;

class Confirm extends ChainCall
{
    private static $message;

    private $keys = ['Y', 'y'];

    protected function message($message)
    {
        $message = readline($message);

        static::$message = $message;
    }

    protected function get()
    {
        return (($result = static::$message)) ?  : false;
    }

    /**
     * @param $keys
     * @return bool
     */
    protected function setKeys(array $keys)
    {
        $this->keys = $keys;
    }

    protected function yes()
    {
        return (in_array(static::$message, $this->keys)) ? true : false;
    }
}