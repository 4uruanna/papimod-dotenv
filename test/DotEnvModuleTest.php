<?php

namespace Papimod\Dotenv\Test;

use Papi\ApiBuilder;
use Papi\Test\ApiBaseTestCase;
use Papimod\Dotenv\DotEnvModule;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\Small;

#[CoversClass(DotEnvModule::class)]
#[Small]
final class DotEnvModuleTest extends ApiBaseTestCase
{
    public const ENV_FILE = ".test.env";
    public const ENV_DIRECTORY = __DIR__;

    public function setUp(): void
    {
        parent::setUp();
        defined("ENVIRONMENT_DIRECTORY") || define("ENVIRONMENT_DIRECTORY", self::ENV_DIRECTORY);
        defined("ENVIRONMENT_FILE") || define("ENVIRONMENT_FILE", self::ENV_FILE);
    }

    public function testLoadModule(): void
    {
        ApiBuilder::getInstance()
            ->setModules([DotEnvModule::class])
            ->build();

        $this->assertEquals(self::ENV_DIRECTORY, $_SERVER["ENVIRONMENT_DIRECTORY"]);
        $this->assertEquals(self::ENV_FILE, $_SERVER["ENVIRONMENT_FILE"]);
        $this->assertEquals("HELLO_W0RLD", $_SERVER["HELLO_WORLD"]);
    }
}
