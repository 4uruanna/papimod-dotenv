
# DotEnv Papi Module

![]( https://img.shields.io/badge/php-8.5-777BB4?logo=php)
![]( https://img.shields.io/badge/composer-2-885630?logo=composer)

## Description

Load `.env` when building your [papi](https://github.com/4uruanna/papi). This module uses [gitvlucas/phpdotenv](https://github.com/vlucas/phpdotenv).

## Configuration

### `ENVIRONMENT_DIRECTORY` (CONSTANT)

|               |                                                   |
|-:             |:-                                                 |
|Required       | No                                                |
|Type           | string                                            |
|Description    | Directory where the .env file to load is located  |
|Default        | _Root of your project_                            |

### `ENVIRONMENT_FILE` (CONSTANT)

|               |                                                   |
|-:             |:-                                                 |
|Required       | No                                                |
|Type           | string                                            |
|Description    | Custom .env file name                             |
|Default        | `.env`                                            |
