<?php

namespace Services\Remove;

use Interfaces\ServiceInterface;

class RemoveService implements ServiceInterface
{
    public function service()
    {
        $code = readline("Code product: (History: L) ");

        if($code == 'L')
        {
            (new History)->service();
             return $this->service();
        }

        $this->exists($code);

        $this->confirm($code);

        return;
    }

    private function exists($code)
    {
        if(! file_exists("products/{$code}.json"))
        {
            echo "ERROR: File not exist\n";
            return $this->service();
        }

        return ;
    }

    private function confirm($code)
    {
        $checkAddNewProduct = readline("Do you want to remove a product? (Y,N):");

        if($checkAddNewProduct == 'N' or $checkAddNewProduct == 'n')
            return;

        return $this->delete($code);
    }

    private function delete($code)
    {
        unlink("products/{$code}.json");

        echo "Product Removed\n\n";

        return;
    }
}