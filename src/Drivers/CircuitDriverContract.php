<?php

namespace CrixuAMG\Circuitry\Drivers;

interface CircuitDriverContract
{
    public function read(string $key);

    public function write(string $key, $value, int $ttl = 0);

    public function writeFail(string $key, \DateTime $failedAt, int $ttl = 3600);
}
