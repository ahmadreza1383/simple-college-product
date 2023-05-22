<?php
namespace Kernel;

class Container
{
    private static $instanse;

    public static function __callStatic($method, $args)
    {
        if(in_array($method, get_class_methods(new self)))
        {
            $method = (new self)->$method(...$args);

            return self::judge(new self, $method);
        };

        if(in_array($method, get_class_methods(static::class)))
        {
            $method = (new static)->$method(...$args);

            return self::judge(new static, $method);
        }
    }

    public function __call($method, $args)
    {
        if(is_null($instanse = static::$instanse))
        {
            $method = (new static)->$method(...$args);

            return self::judge($this, $method);
        }

        $method = (new $instanse)->$method(...$args);

        return self::judge($this, $method);
    }

    private static function judge($instanse, $method)
    {
        return (is_null($method)) ? $instanse : $method;
    }

    private function call($instanse)
    {
        static::$instanse =  (new $instanse);
    }

    private function callback($class, $params)
    {
        return (new $class)($params);
    }
}