<?php

namespace Services;

use Interfaces\ServiceInterface;

class Add extends Service implements ServiceInterface
{
    public function service()
    {
        [$name, $createdDate, $numberOfPorduct] = $this->question();

        $this->beforeSave($name, $createdDate, $numberOfPorduct);

        $this->questionForNewProduct();
    }

    private function question()
    {
        if( ! $name = readline('Name product: ')) return $this->service();
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

    private function questionForNewProduct()
    {
        $checkAddNewProduct = readline("Do you want to add a new product? (Y,N):");

        if($checkAddNewProduct == 'Y' or $checkAddNewProduct == 'y')
            return $this->service();
    }

    private function beforeSave($name, $createdDate, $numberOfPorduct)
    {
        $this->save([
            'name' => $name,
            'createdDate' => $createdDate,
            'numberOfPorduct' => $numberOfPorduct,
        ]);
    }

    private function save($item)
    {
        $randomNumber = random_int(10000,20000);

        file_put_contents("products/{$randomNumber}.json", json_encode($item, FILE_APPEND));

        echo "Product Created : code-{$randomNumber}\n\n";

        return;
    }
}