<?php

namespace Services\Add;

use Interfaces\ServiceInterface;
use Services\Add\SaveProduct;

class ServiceHandle implements ServiceInterface
{
    public function service()
    {
        [$name, $createdDate, $numberOfPorduct] = (new Menu)();

        (new SaveProduct)->save($name, $createdDate, $numberOfPorduct);

        $this->questionForNewProduct();
    }

    private function questionForNewProduct()
    {
        $checkAddNewProduct = readline("Do you want to add a new product? (Y,N):");

        if($checkAddNewProduct == 'Y' or $checkAddNewProduct == 'y')
            return $this->service();
    }


}