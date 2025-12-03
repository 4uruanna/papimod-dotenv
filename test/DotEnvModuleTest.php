<?php

namespace Papimod\Dotenv\Test;

use Papi\AppBuilder;
use Papimod\Dotenv\DotenvModule;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\Small;
use PHPUnit\Framework\TestCase;

#[CoversClass(DotenvModule::class)]
#[Small]
final class DotEnvModuleTest extends TestCase
{
    public function testLoadEnv(): void
    {
        define("API_ENV_DIRECTORY", __DIR__);

        $app = new AppBuilder()
            ->setModules([DotenvModule::class])
            ->build();

        $this->assertEquals("HELLO_WORLD", $_SERVER["HELLO_WORLD"]);
    }
}
