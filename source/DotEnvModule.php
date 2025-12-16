<?php

namespace Papimod\Dotenv;

use Dotenv\Dotenv;
use Papi\ApiModule;

final class DotEnvModule extends ApiModule
{
    public static string $DEFAULT_DIRECTORY;
    public const DEFAULT_FILE = ".env";

    public function __construct()
    {
        self::$DEFAULT_DIRECTORY = dirname(__DIR__, 4);
    }

    public function configure(): void
    {
        $this->defineEnvironmentDirectory();
        $this->defineEnvironmentFile();
        $this->loadEnvironment();
    }

    private function defineEnvironmentDirectory(): void
    {
        if (defined("ENVIRONMENT_DIRECTORY") === false) {
            define("ENVIRONMENT_DIRECTORY", self::$DEFAULT_DIRECTORY);
        }

        $_SERVER["ENVIRONMENT_DIRECTORY"] = ENVIRONMENT_DIRECTORY;
    }

    private function defineEnvironmentFile(): void
    {
        if (defined("ENVIRONMENT_FILE") === false) {
            define("ENVIRONMENT_FILE", self::DEFAULT_FILE);
        }

        $_SERVER["ENVIRONMENT_FILE"] = ENVIRONMENT_FILE;
    }

    private function loadEnvironment(): void
    {
        $dotenv = Dotenv::createImmutable(ENVIRONMENT_DIRECTORY, ENVIRONMENT_FILE);
        $dotenv->load();
    }
}
