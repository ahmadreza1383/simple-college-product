<?php

class Add
{
    private $queue = [];

    public function __construct()
    {
        $this->service();
    }

    private function service()
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

        $this->addToQueue($name, $createdDate, $numberOfPorduct);
    }

    private function addToQueue($name, $createdDate, $numberOfPorduct)
    {
        array_push($this->queue, [
            'name' => $name,
            'createdDate' => $createdDate,
            'numberOfPorduct' => $numberOfPorduct,
        ]);

        $checkAddNewProduct = readline("Do you want to add a new product? (Y,N):");

        if($checkAddNewProduct == 'Y' or $checkAddNewProduct == 'y')
            return $this->service();

        return $this->save();
    }

    private function save()
    {
        $queue = $this->queue;

        foreach($queue as $item)
        {
            $randomNumber = random_int(10000,20000);

            file_put_contents("products/{$randomNumber}.json", json_encode($item, FILE_APPEND));
        }

        echo "Product Created : code-{$randomNumber}\n\n";

        return;
    }
}