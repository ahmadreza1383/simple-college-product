<?php
namespace Services\Add\Menu;

class Menu
{
    private static $items = [];

    public static $solutions = [] ;

    /**
     * @param array $items
     */
    public function __invoke($items)
    {
        static::$items = $items;

        return $this;
    }

    public function question()
    {
        foreach(static::$items as $key => $item)
        {
            if(! $value = readline($item['question']))
                return call_user_func($item['else']);

            static::$solutions[$key] = $value;
        }
    }

    public static function print()
    {
        $solutions = static::$solutions;

        echo "-------------------------\n";
        foreach(static::$items as $key => $item)
            echo $item['message'].":". $solutions[$key] ."\n";

        echo "-------------------------\n\n";
    }
}