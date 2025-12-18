# DotEnv Papi Module

![]( https://img.shields.io/badge/php-8.5-777BB4?logo=php)
![]( https://img.shields.io/badge/composer-2-885630?logo=composer)

## Description

Load `.env` when building your [papi](https://github.com/4uruanna/papi). This module uses [gitvlucas/phpdotenv](https://github.com/vlucas/phpdotenv).

## Configuration

### `PAPI_DOTENV_DIRECTORY` (CONSTANT)

|               |                                                   |
|-:             |:-                                                 |
|Required       | No                                                |
|Type           | string                                            |
|Description    | Directory where the .env file to load is located  |
|Default        | _Root of your project_                            |

### `PAPI_DOTENV_FILE` (CONSTANT)

|               |                                                   |
|-:             |:-                                                 |
|Required       | No                                                |
|Type           | string                                            |
|Description    | Custom .env file name                             |
|Default        | `.env`                                            |

## Usage

Create a `.env` file:

```Env
ENVIRONMENT=PRODUCTION

HELLO=WORLD
```

Import the module when creating your application:

```php
require __DIR__ . "/../vendor/autoload.php";

use Papi\PapiBuilder;
use Papimod\Dotenv\DotEnvModule;
use function DI\create;

define("PAPI_DOTENV_DIRECTORY", __DIR__); # Optionnal
define("PAPI_DOTENV_FILE", ".env"); # Optionnal

$builder = new PapiBuilder();

$builder->setModule(DotEnvModule::class)
    ->build()
    ->run();
```

Use your environment variables anywhere in your code:

```php
var_dump($_ENV["HELLO"] === "WORLD"); // true
```