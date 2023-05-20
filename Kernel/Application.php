<?php

namespace Kernel;

class Application
{
    public function run()
    {
        (new Service)->handle();

        $this->run();
    }
}