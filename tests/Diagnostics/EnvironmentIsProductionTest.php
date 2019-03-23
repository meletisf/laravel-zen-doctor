<?php

namespace Meletisf\ZenDoctor\Test\Diagnostics;

use Meletisf\ZenDoctor\Diagnostics\EnvironmentIsProduction;
use Meletisf\ZenDoctor\Test\TestCase;

class EnvironmentIsProductionTest extends TestCase
{
    /** @test */
    public function it_fails_when_environment_is_not_set_to_production()
    {
        \Config::set('app.env', 'local');

        $this->assertFalse(
            (new EnvironmentIsProduction())->check()
        );
    }

    /** @test */
    public function it_passes_when_environment_is_set_to_production()
    {
        \Config::set('app.env', 'production');

        $this->assertTrue(
            (new EnvironmentIsProduction())->check()
        );
    }
}
