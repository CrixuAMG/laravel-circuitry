<?php

namespace CrixuAMG\Circuitry\Circuitry\Drivers;

class ApcuDriver implements CircuitDriverContract
{
    public function read(string $key)
    {
        return apcu_fetch($key);
    }

    public function write(string $key, $value, int $ttl = 0)
    {
        return apcu_store($key, $value, $ttl);
    }
}
