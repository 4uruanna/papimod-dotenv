<?php

namespace Papimod\Dotenv;

enum Environment: string
{
    case DEVELOPMENT = "DEVELOPMENT";
    case PRODUCTION = "PRODUCTION";
    case TEST = "TEST";
}
