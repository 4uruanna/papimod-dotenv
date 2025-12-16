<?php

namespace Papimod\Dotenv;

use Dotenv\Dotenv;
use Papi\enumerator\EventPhases;
use Papi\Event;

class LoadEnvEvent implements Event
{
    public static function getPhase(): string
    {
        return EventPhases::BEFORE_BUILD;
    }

    /**
     * Load the environment file
     */
    public function __invoke(mixed ...$args): void
    {
        $dotenv = Dotenv::createImmutable(ENVIRONMENT_DIRECTORY, ENVIRONMENT_FILE);
        $dotenv->load();
    }
}
