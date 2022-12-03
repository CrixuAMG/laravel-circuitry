<?php

namespace CrixuAMG\Circuitry\Drivers;

class ApcuDriver implements CircuitDriverContract
{
    /**
     * > This function returns the value of the key passed to it
     *
     * @param string $key The key to read from the cache.
     *
     * @return mixed|false The value of the key.
     */
    public function read(string $key): mixed
    {
        return apcu_fetch($key);
    }

    /**
     * It stores the value in the cache.
     *
     * @param string $key    The key to store the value under.
     * @param        $value  The value to store
     * @param int    $ttl    Time to live in seconds.
     *
     * @return bool|array A boolean value indicating success or failure.
     */
    public function write(string $key, $value, int $ttl = 0): bool|array
    {
        return apcu_store($key, $value, $ttl);
    }

    /**
     * > Write a key to the cache with a value of the current date and time, and a TTL of 1 hour
     *
     * @param string    $key      The key to store the value under.
     * @param \DateTime $failedAt The date and time the job failed.
     * @param int       $ttl      The time to live for the cache entry.
     *
     * @return bool|array The return value of the write() method.
     */
    public function writeFail(string $key, \DateTime $failedAt, int $ttl = 3600): bool|array
    {
        return $this->write($key, $failedAt->format('Y-m-d H:i:s'), $ttl);
    }
}
