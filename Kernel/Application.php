<?php

namespace Kernel;

class Application
{
    public function __construct()
    {
        (new Service)->handle();

        new $this;
    }
}