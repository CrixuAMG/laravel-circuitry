<?php

namespace CrixuAMG\Circuitry\Circuitry;

use Illuminate\Support\Manager;
use CrixuAMG\Circuitry\Drivers\ApcuDriver;

class Circuit extends Manager
{
    private static array $instances = [];

    /**
     * @return mixed The default driver is being returned.
     */
    public function getDefaultDriver(): mixed
    {
        return $this->createApcuDriver();
    }

    /**
     * This function returns a new instance of the ApcuDriver class.
     *
     * @return ApcuDriver An instance of the ApcuDriver class.
     */
    private function createApcuDriver(): ApcuDriver
    {
        return new ApcuDriver();
    }

    /**
     * > If the instance doesn't exist, create it
     *
     * @param string $identifier The identifier of the cache instance.
     * @param string $driver The driver to use.
     *
     * @return mixed The instance of the class.
     */
    public static function getInstance(string $identifier, string $driver = 'apcu'): mixed
    {
        if (!isset(self::$instances[$identifier])) {
            self::$instances[$identifier] = app()->make(__CLASS__)->driver($driver);
        }

        return self::$instances[$identifier];
    }
}
