<?php

namespace Papimod\Dotenv;

use Composer\InstalledVersions;
use Papi\Module;

final class DotenvModule extends Module
{
    public function __construct()
    {
        if (defined("PAPI_DOTENV_DIRECTORY") === false) {
            $root_package = InstalledVersions::getRootPackage();
            $root_path = dirname(InstalledVersions::getInstallPath($root_package['name']));
            define("PAPI_DOTENV_DIRECTORY", $root_path);
        }
    }

    protected string $path = __DIR__;
}
