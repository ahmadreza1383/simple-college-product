<?php

namespace Services;

use Interfaces\ServiceInterface;

class Find extends Service implements ServiceInterface
{
    public function service()
    {
        $code = readline("Code product: ");

        $this->exists($code);

        $this->find($code);

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

    private function find($code)
    {
        $find = json_decode(file_get_contents("products/{$code}.json"));

        echo "-------------------------\n";
        echo "Code: ".  $code."\n";
        echo "Name: $find->name\n";
        echo "Created date: $find->createdDate\n";
        echo "Nsumber of porduct: $find->numberOfPorduct\n";
        echo "-------------------------\n\n";    
    }
}