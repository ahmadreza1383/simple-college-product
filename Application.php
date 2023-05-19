<?php

class Application 
{
    private $options = [
        'Add' => 1,
        'Remove' => 2,
        'History' => 3,
        'Find' => 4,
        'Exit' => 5,
    ];
    
    public function run()
    {   
        $option = $this->menu();

        $this->checkOption($option);

        $this->run();
    }

    private function menu()
    {
        echo "---------------\n";
        echo "Switches:\n";
        foreach($this->options as $key => $value)
            echo "  {$key}: {$value}\n"; 

        echo "---------------\n\n";

        return readline('Option: ')."\n";
    }

    private function checkOption($number)
    {
        if($number == $this->options['Exit']) exit;

        if(! ($option = array_search($number, $this->options)))
            return "ERROR: Bad option";
        
        $this->selectService($option);
    }

    private function selectService($option)
    {
        $option = "\\Services\\".$option;

        (new $option)->service();
    }
}