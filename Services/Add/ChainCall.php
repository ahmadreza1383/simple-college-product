<?php
namespace Services\Add;

class ChainCall
{
    public static function __callStatic($method, $args)
    {
        (new static)->$method($args);

        return new static;
    }

    public function __call($method, $args)
    {
        $this->$method($args);

        return $this;
    }
}