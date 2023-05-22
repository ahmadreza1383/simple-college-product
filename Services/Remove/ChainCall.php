<?php
namespace Services\Remove;

class ChainCall
{
    public static function __callStatic($method, $args)
    {
        return self::judge((new static)->$method(...$args), new static);
    }

    public function __call($method, $args)
    {
        return self::judge($this->$method(...$args), $this);
    }

    private static function judge($method, $callback)
    {
        return (is_null($method)) ? $callback : $method;
    }
}