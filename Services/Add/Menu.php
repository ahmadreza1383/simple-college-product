<?php
namespace Services\Add;

class Menu
{
    public function __invoke()
    {
        if( ! $name = readline('Name product: ')) return (new $this)();
        ($createdDate = readline('Created date (now): ')) ? $createdDate : $createdDate = date('Y-m-d');
        ($numberOfPorduct = readline('Number of product (1): ')) ? $numberOfPorduct : $numberOfPorduct = 1;

        //TODO: Need create date validation
        echo "-------------------------\n";
        echo "  Name product: {$name}\n";
        echo "  Created Date: {$createdDate}\n";
        echo "  Number of product: {$numberOfPorduct}\n";
        echo "-------------------------\n\n";

        return [$name, $createdDate, $numberOfPorduct];
    }
}