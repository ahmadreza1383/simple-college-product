<?php

namespace Services\Add;

class SaveProduct
{
    public function save($name, $createdDate, $numberOfPorduct)
    {
        $item = [
            'name' => $name,
            'createdDate' => $createdDate,
            'numberOfPorduct' => $numberOfPorduct,
        ];

        $randomNumber = random_int(10000,20000);

        file_put_contents("products/{$randomNumber}.json", json_encode($item, FILE_APPEND));

        echo "Product Created : code-{$randomNumber}\n\n";

        return;
    }
}