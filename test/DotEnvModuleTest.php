<?php

namespace Papimod\Dotenv\Test;

use Papi\PapiBuilder;
use Papi\Test\PapiTestCase;
use Papimod\Dotenv\DotEnvModule;
use Papimod\Dotenv\Environment;
use PHPUnit\Framework\Attributes\CoversClass;
use Slim\App;

#[CoversClass(DotEnvModule::class)]
final class DotEnvModuleTest extends PapiTestCase
{
    private PapiBuilder $builder;

    public function setUp(): void
    {
        parent::setUp();
        defined("PAPI_DOTENV_DIRECTORY") || define("PAPI_DOTENV_DIRECTORY", __DIR__);
        defined("PAPI_DOTENV_FILE") || define("PAPI_DOTENV_FILE", ".test.env");
        $this->builder = new PapiBuilder();
    }

    public function testLoadModule(): void
    {
        $this->builder
            ->addModule(DotenvModule::class)
            ->build();

        $this->assertEquals("HELLO_W0RLD", $_SERVER["HELLO_WORLD"]);
        $this->assertEquals(ENVIRONMENT, Environment::TEST);
    }

    public function testBuildAndRebuild(): void
    {
        $app = $this->builder
            ->addModule(DotenvModule::class)
            ->build();
        $this->assertInstanceOf(App::class, $app);

        $app = $this->builder->build();
        $this->assertInstanceOf(App::class, $app);
    }
}
