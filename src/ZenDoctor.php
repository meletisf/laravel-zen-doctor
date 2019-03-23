<?php

namespace Meletisf\ZenDoctor;

use Meletisf\ZenDoctor\Events\CheckFailed;
use Meletisf\ZenDoctor\Events\CheckPassed;
use Meletisf\ZenDoctor\Interfaces\HealthCheckInterface;

class ZenDoctor
{
    protected $healthchecks = [];

    protected $exception;

    protected $broadcast_events;

    /**
     * ZenDoctor constructor.
     *
     * @param array  $healthchecks
     * @param string $except_with
     * @param bool   $broadcast_events
     */
    public function __construct(array $healthchecks, string $except_with = null, bool $broadcast_events = true)
    {
        $this->addChecks($healthchecks);

        if ($except_with) {
            $this->setException($except_with);
        }

        $this->broadcast_events = $broadcast_events;
    }

    /**
     * Add an array of checks.
     *
     * @param array $checks
     *
     * @return void
     */
    public function addChecks(array $checks): void
    {
        foreach ($checks as $check) {
            $this->addCheck(new $check());
        }
    }

    /**
     * Get an array with all the checks.
     *
     * @return array
     */
    public function getChecks(): array
    {
        return $this->healthchecks;
    }

    /**
     * Add a single check.
     *
     * @param HealthCheckInterface $check
     *
     * @return void
     */
    public function addCheck(HealthCheckInterface $check): void
    {
        array_push($this->healthchecks, $check);
    }

    /**
     * Run all checks.
     *
     * @throws \Exception
     *
     * @return void
     */
    public function runDiagnostics(): void
    {
        foreach ($this->healthchecks as $healthcheck) {
            $this->runDiagnostic($healthcheck);
        }
    }

    /**
     * @param HealthCheckInterface $healthcheck
     *
     * @throws \Exception
     *
     * @return void
     */
    public function runDiagnostic(HealthCheckInterface $healthcheck): void
    {
        if (!$healthcheck->check()) {
            $this->fail($healthcheck);
        } else {
            $this->succeed($healthcheck);
        }
    }

    /**
     * Handle a failure.
     *
     * @param HealthCheckInterface $check
     *
     * @throws \Exception
     *
     * @return void
     */
    protected function fail(HealthCheckInterface $check): void
    {
        if ($this->broadcast_events) {
            event(new CheckFailed($check));
        }

        throw new $this->exception(get_class($check).': '.$check->getMessage());
    }

    /**
     * Handle a success.
     *
     * @param HealthCheckInterface $check
     *
     * @return void
     */
    protected function succeed(HealthCheckInterface $check): void
    {
        if ($this->broadcast_events) {
            event(new CheckPassed($check));
        }
    }

    /**
     * Set the exception.
     *
     * @param \Exception $e
     *
     * @return void
     */
    public function setException($e): void
    {
        $this->exception = $e;
    }
}
