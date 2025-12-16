<?php

namespace Papimod\Dotenv;

use Dotenv\Dotenv;
use Papi\ApiModule;

final class DotEnvModule extends ApiModule
{
    public static function getDefaultDirectory(): string
    {
        return dirname(__DIR__, 4);
    }

    public static function getDefaultFilename(): string
    {
        return ".env";
    }

    /**
     * Configure the module
     */
    public function configure(): void
    {
        $this->defineEnvironmentDirectory();
        $this->defineEnvironmentFile();
        $this->loadEnvironment();
        $this->defineEnvironment();
    }

    private function defineEnvironment(): void
    {
        $environment = strtolower($_SERVER["ENVIRONMENT"] ?? "development");
        define("IS_PRODUCTION", $environment === "production");
        define("IS_DEVELOPMENT", $environment === "development");
        define("IS_TEST", $environment === "test");
    }

    /**
     * Define the environment directory
     */
    private function defineEnvironmentDirectory(): void
    {
        if (defined("ENVIRONMENT_DIRECTORY") === false) {
            define("ENVIRONMENT_DIRECTORY", self::getDefaultDirectory());
        }

        $_SERVER["ENVIRONMENT_DIRECTORY"] = ENVIRONMENT_DIRECTORY;
    }

    private function defineEnvironmentFile(): void
    {
        if (defined("ENVIRONMENT_FILE") === false) {
            define("ENVIRONMENT_FILE", self::getDefaultFilename());
        }

        $_SERVER["ENVIRONMENT_FILE"] = ENVIRONMENT_FILE;
    }

    private function loadEnvironment(): void
    {
        $dotenv = Dotenv::createImmutable(ENVIRONMENT_DIRECTORY, ENVIRONMENT_FILE);
        $dotenv->load();
    }
}
