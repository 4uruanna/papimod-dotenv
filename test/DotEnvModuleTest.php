<?php

namespace Papimod\Dotenv\Test;

use Papi\ApiBuilder;
use Papi\Test\ApiBaseTestCase;
use Papimod\Dotenv\DotenvModule;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\Small;

#[CoversClass(DotenvModule::class)]
#[Small]
final class DotEnvModuleTest extends ApiBaseTestCase
{
    public function testLoadModule(): void
    {
        define("ENVIRONMENT_DIRECTORY", __DIR__);
        define("ENVIRONMENT_FILE", ".test.env");

        $app = ApiBuilder::getInstance()
            ->setModules([DotenvModule::class])
            ->build();

        $this->assertEquals($_SERVER["ENVIRONMENT_DIRECTORY"], ENVIRONMENT_DIRECTORY);
        $this->assertEquals($_SERVER["ENVIRONMENT_FILE"], ".test.env");
        $this->assertEquals("HELLO_W0RLD", $_SERVER["HELLO_WORLD"]);
    }
}
