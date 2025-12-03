<?php

namespace Papimod\Dotenv;

use Papi\Module;

final class DotenvModule extends Module
{
    public function __construct()
    {
        $this->configure();
    }

    protected string $path = __DIR__;

    private function configure(): void
    {
        if (defined("API_ENV_DIRECTORY") === false) {
            define("API_ENV_DIRECTORY", dirname(__DIR__, 4));
            $_SERVER["API_ENV_DIRECTORY"] = API_ENV_DIRECTORY;
        }
    }
}
