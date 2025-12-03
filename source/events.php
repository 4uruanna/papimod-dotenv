<?php

namespace Papimod\Dotenv;

use Dotenv\Dotenv;
use Papi\enumerator\AppBuilderEvents;

return [
    [
        AppBuilderEvents::BEFORE,
        function () {
            $dotenv = Dotenv::createImmutable(PAPI_DOTENV_DIRECTORY);
            $dotenv->load();
        }
    ]
];
