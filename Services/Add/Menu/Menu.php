<?php
namespace Services\Add\Menu;

class Menu
{
    private static $items;

    public $solutions = [];

    /**
     * @param array $items
     */
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

    private function set(array $items)
    {
        static::$items = $items[0];
    }

    private function question()
    {
        foreach(static::$items as $key => $item)
        {
            if(! $value = readline($item['question']))
                return call_user_func($item['else']);

            $this->solutions[$key] = $value;
        }
    }

    private function print()
    {
        $solutions = $this->solutions;

        echo "-------------------------\n";
        foreach(static::$items as $key => $item)
            echo $item['message'].":". $solutions[$key] ."\n";

        echo "-------------------------\n\n";
    }
}