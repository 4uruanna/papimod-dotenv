<?php

namespace Papimod\Dotenv;

use Dotenv\Dotenv;
use Papi\PapiModule;

final class DotEnvModule extends PapiModule
{
    /**
     * Configure the module
     */
    public static function configure(): void
    {
        if (defined("PAPI_DOTENV_DIRECTORY") === false) {
            define("PAPI_DOTENV_DIRECTORY", dirname(__DIR__, 4));
        }

        if (defined("PAPI_DOTENV_FILE") === false) {
            define("PAPI_DOTENV_FILE", ".env");
        }

        $dotenv = Dotenv::createImmutable(PAPI_DOTENV_DIRECTORY, PAPI_DOTENV_FILE);
        $dotenv->load();
        $environment = $_ENV["ENVIRONMENT"] ?? "";

        switch ($environment) {
            case Environment::DEVELOPMENT->value:
                $environment = Environment::DEVELOPMENT;
                break;
            case Environment::PRODUCTION->value:
                $environment = Environment::PRODUCTION;
                break;
            case Environment::TEST->value:
                $environment = Environment::TEST;
                break;
            default:
                $environment = Environment::DEVELOPMENT;
                break;
        }

        defined("ENVIRONMENT") || define("ENVIRONMENT", $environment);
    }
}
