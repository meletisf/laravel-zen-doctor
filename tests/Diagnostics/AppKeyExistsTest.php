<?php

namespace Meletisf\ZenDoctor\Test\Diagnostics;

use Meletisf\ZenDoctor\Diagnostics\AppKeyExists;
use Meletisf\ZenDoctor\Test\TestCase;

class AppKeyExistsTest extends TestCase
{

    /** @test */
    public function it_fails_when_the_key_is_missing()
    {
        \Config::set('app.key', null);

        $this->assertFalse(
            (new AppKeyExists())->check()
        );
    }

    /** @test */
    public function it_passes_when_the_key_is_present()
    {
        \Config::set('app.key', 'base64:v0Adtqe6WhzennJQtDxa3IvOgpfTfglAO/Nou74wYGU=');

        $this->assertTrue(
            (new AppKeyExists())->check()
        );
    }

}