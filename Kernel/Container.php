<?php
namespace Kernel;

class Container
{
    private static $instanse;

    public static function __callStatic($method, $args)
    {
        (new self)->$method(...$args);

        return new self;
    }

    public function __call($method, $args)
    {
        $method = (new static::$instanse)->$method(...$args);

        return (is_null($method)) ? $this : $method;
    }

    private function call($instanse)
    {
        static::$instanse =  (new $instanse);
    }
}

class Test1
{
    public function call()
    {
        $name = Container::call('Confirm')
        ->message('What is your name?')
        ->get();
    }
}