<?php

namespace Services\Add;

class SaveProduct
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

    private function save($item)
    {
        $randomNumber = random_int(10000,20000);

        file_put_contents("products/{$randomNumber}.json", json_encode($item, FILE_APPEND));

        echo "Product Created : code-{$randomNumber}\n\n";

        return;
    }
}