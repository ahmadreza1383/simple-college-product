<?php
namespace Services\Add\Menu;

use Services\Add\ChainCall;

class Menu extends ChainCall
{
    private static $items;

    public $solutions = [];

    protected function set(array $items)
    {
        static::$items = $items[0];
    }

    protected function question()
    {
        foreach(static::$items as $key => $item)
        {
            if(! $value = readline($item['question']))
                return call_user_func($item['else']);

            $this->solutions[$key] = $value;
        }
    }

    protected function print()
    {
        $solutions = $this->solutions;

        echo "-------------------------\n";
        foreach(static::$items as $key => $item)
            echo $item['message'].":". $solutions[$key] ."\n";

        echo "-------------------------\n\n";
    }
}