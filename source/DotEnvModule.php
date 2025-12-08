<?php

namespace Papimod\Dotenv;

use Papi\ApiModule;

final class DotenvModule extends ApiModule
{
    public function __construct()
    {
        $this->event_list = [LoadEnvEvent::class];
    }

    public function configure(): void
    {
        if (defined("ENVIRONMENT_DIRECTORY") === false) {
            define("ENVIRONMENT_DIRECTORY", dirname(__DIR__, 4));
        }

        $_SERVER["ENVIRONMENT_DIRECTORY"] = ENVIRONMENT_DIRECTORY;

        if (defined("ENVIRONMENT_FILE") === false) {
            define("ENVIRONMENT_FILE", ".env");
        }

        $_SERVER["ENVIRONMENT_FILE"] = ENVIRONMENT_FILE;
    }
}
