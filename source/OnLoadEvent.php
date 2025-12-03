<?php

namespace Papimod\Dotenv;

use Dotenv\Dotenv;
use Papi\enumerator\EventPhases;
use Papi\Event;

class OnLoadEvent extends Event
{
    public int $phase = EventPhases::BEFORE;

    public function __invoke(mixed ...$args): void
    {
        $dotenv = Dotenv::createImmutable(API_ENV_DIRECTORY);
        $dotenv->load();
    }
}
