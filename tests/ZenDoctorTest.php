<?php

namespace Meletisf\ZenDoctor\Test;

use Meletisf\ZenDoctor\Events\CheckFailed;
use Meletisf\ZenDoctor\Events\CheckPassed;
use Meletisf\ZenDoctor\ZenDoctor;

class ZenDoctorTest extends TestCase
{
    /** @test */
    public function constructor_registers_the_checks()
    {
        $zd = new ZenDoctor([
            PassingMockCheck::class,
        ], null, false);

        $checks = $zd->getChecks();

        $this->assertTrue(
            in_array(new PassingMockCheck(), $checks)
        );
    }

    /** @test */
    public function default_exception_can_be_overwritten()
    {
        $zd = new ZenDoctor([FailingMockCheck::class], MockException::class, false);
        $this->expectException(MockException::class);
        $zd->runDiagnostics();
    }

    /** @test */
    public function test_passing_behavior()
    {
        $zd = new ZenDoctor([], null, true);
        \Event::fake();

        $zd->runDiagnostic(new PassingMockCheck());
        \Event::assertDispatched(CheckPassed::class);
    }

    /** @test */
    public function test_failing_behavior()
    {
        \Event::fake();
        $zd = new ZenDoctor([], MockException::class, true);

        try {
            $zd->runDiagnostic(new FailingMockCheck());
        } catch (\Exception $e) {
            \Event::assertDispatched(CheckFailed::class);
        }
    }
}
