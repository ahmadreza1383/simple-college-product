<?php

namespace Services;

use Interfaces\ServiceInterface;

class History extends Service implements ServiceInterface
{
    public function service()
    {
        $scan = scandir('products');
        
        $scan = $this->filter($scan);

        // $history = [];
        foreach($scan as $item)
        {
            $product = json_decode(file_get_contents("products/{$item}"));

            echo "-------------------------\n";
            echo "Code: ".  $this->removeJson($item)."\n";
            echo "Name: $product->name\n";
            echo "Created date: $product->createdDate\n";
            echo "Nsumber of porduct: $product->numberOfPorduct\n";
            echo "-------------------------\n\n";
        }

        return ;
    }

    private function filter($list)
    {
        return $filter = array_filter($list, function($item)
        {
            return $item != '.' && $item != '..';
        });
    }

    private function removeJson($filter)
    {
        return str_replace('.json', '', $filter);
    }
}