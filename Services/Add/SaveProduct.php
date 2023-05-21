<?php

namespace Services\Add;

use Services\Add\ChainCall;

class SaveProduct extends ChainCall
{
    protected function save($item)
    {
        $randomNumber = random_int(10000,20000);

        file_put_contents("products/{$randomNumber}.json", json_encode($item, FILE_APPEND));

        echo "Product Created : code-{$randomNumber}\n\n";

        return;
    }
}