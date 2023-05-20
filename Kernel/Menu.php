<?php
namespace Kernel;

class Menu
{
    public function __invoke($options)
    {
        echo "---------------\n";
        echo "Switches:\n";
        foreach($options as $key => $value)
            echo "  {$key}: {$value}\n";

        echo "  Exit: \n";
        echo "---------------\n\n";

        return readline('Option: ')."\n";
    }
}