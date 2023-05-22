<?php

namespace Kernel;
class Application
{
    public function __construct()
    {
        Container::call(Service::class)->handle();

        new $this;
    }
}