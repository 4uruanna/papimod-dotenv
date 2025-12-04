<?php

namespace Papimod\Dotenv;

use Papi\Module;

final class DotenvModule extends Module
{
    public function __construct()
    {
        if (defined("PAPI_DOTENV_DIRECTORY") === false) {
            define("PAPI_DOTENV_DIRECTORY", dirname(__DIR__, 4));
        }
    }

    protected string $path = __DIR__;
}
