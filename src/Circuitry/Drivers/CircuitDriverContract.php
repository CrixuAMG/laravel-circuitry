<?php

namespace CrixuAMG\Circuitry\Circuitry\Drivers;

interface CircuitDriverContract
{
    public function read(string $key);

    public function write(string $key, $value, int $ttl = 0);
}
