<?php

namespace CrixuAMG\Circuitry\Circuitry;

use Illuminate\Support\Manager;
use CrixuAMG\Circuitry\Circuitry\Drivers\ApcuDriver;

class Circuit extends Manager
{
    public function getDefaultDriver()
    {
        return $this->createApcuDriver();
    }

    private function createApcuDriver()
    {
        return new ApcuDriver();
    }
}
