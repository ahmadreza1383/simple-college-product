<?php
namespace Kernel;

class Service
{
    private $services = [
        'Add' => 1,
        'Remove' => 2,
        'History' => 3,
        'Find' => 4,
    ];

    public function handle()
    {
        $service = (new Menu)($this->services);
        $option = array_search($service, $this->services);

        if($option)
            return $this->select($option);

        exit;
    }

    private function select($option)
    {
        $option = "\\Services\\{$option}\\$option"."Service";

        (new $option)->service();
    }
}