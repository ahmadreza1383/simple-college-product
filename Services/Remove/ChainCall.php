<?php
namespace Services\Remove;

class ChainCall
{
    public static function __callStatic($method, $args)
    {
        (new static)->$method(...$args);

        return new static;
    }

    public function __call($method, $args)
    {
        $method = $this->$method(...$args);

        return (is_null($method)) ? $this : $method;
    }
}