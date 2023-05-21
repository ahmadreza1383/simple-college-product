<?php

namespace Services\Add;

use Interfaces\ServiceInterface;
use Services\Add\Menu\Menu;
use Services\Add\SaveProduct;

class ServiceHandle implements ServiceInterface
{
    public function service()
    {
        $items = [
            'name' => [
                'question' => 'Name product:',
                'message' => 'Product name: ',
                'else' => function(){
                    return (new Menu)->question();
                }
            ],
            'createdDate' =>
            [
                'question' => 'Created date (now): ',
                'message' => 'Created Date: ',
                'else' => function(){
                    return date('Y-m-d');
                }
            ],
            'numberOfPorduct' =>
            [
                'question' => 'Number of product (1): ',
                'message' => 'Number of product: ',
                'else' => function(){
                    return "1";
                }
            ],
        ];

        $solution = Menu::set($items)
        ->question()
        ->print()
        ->solutions;

        SaveProduct::save($solution);

        $this->questionForNewProduct();
    }

    private function questionForNewProduct()
    {
        $checkAddNewProduct = readline("Do you want to add a new product? (Y,N):");

        if($checkAddNewProduct == 'Y' or $checkAddNewProduct == 'y')
            return $this->service();
    }


}