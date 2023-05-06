<?php
require 'add.php';
require 'remove.php';
require 'history.php';
require 'find.php';

class Application
{
    private $options = [
        'Add' => 1,
        'Remove' => 2,
        'History' => 3,
        'Find' => 4,
        'Exit' => 5,
    ];

    public function menu()
    {   
        echo "---------------\n";
        echo "Switches:\n";
        foreach($this->options as $key => $value)
            echo "  {$key}: {$value}\n"; 

        echo "---------------\n\n";

        $option = readline('Option: ')."\n";

        $this->checkOption($option);
    }

    private function checkOption($number)
    {
        if($number == 6) return;

        if(! ($option = array_search($number, $this->options)))
        return "ERROR: Bad option";

        (new $option);

        return $this->menu();
    }
}

$app =  new Application;
$app->menu();