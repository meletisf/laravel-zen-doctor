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
     * @param array $healthchecks
     * @param string $except_with
     * @param bool $broadcast_events
     */
    function __construct(array $healthchecks, string $except_with = null, bool $broadcast_events = true)
    {
        $this->addChecks($healthchecks);

        if ($except_with)
            $this->setException($except_with);

        $this->broadcast_events = $broadcast_events;
    }

    /**
     * Add an array of checks
     * @param array $checks
     */
    public function addChecks(array $checks)
    {
        foreach ($checks as $check)
        {
            $this->addCheck(new $check);
        }
    }

    /**
     * Get an array with all the checks
     * @return array
     */
    public function getChecks(): array
    {
        return $this->healthchecks;
    }

    /**
     * Add a single check
     * @param HealthCheckInterface $check
     */
    public function addCheck(HealthCheckInterface $check)
    {
        array_push($this->healthchecks, $check);
    }

    /**
     * Run all checks
     */
    public function runDiagnostics()
    {
        foreach ($this->healthchecks as $healthcheck)
        {
            $this->runDiagnostic($healthcheck);
        }
    }

    /**
     * @param HealthCheckInterface $healthcheck
     */
    public function runDiagnostic(HealthCheckInterface $healthcheck)
    {
        if ( !$healthcheck->check() )
            $this->fail($healthcheck);
        else
            $this->succeed($healthcheck);
    }

    /**
     * Handle a failure
     * @param HealthCheckInterface $check
     */
    protected function fail(HealthCheckInterface $check)
    {
        if ( $this->broadcast_events )
            event( new CheckFailed($check) );

        throw new $this->exception( get_class($check) . ': ' . $check->getMessage() );
    }

    /**
     * Handle a success
     * @param HealthCheckInterface $check
     */
    protected function succeed(HealthCheckInterface $check)
    {
        if ( $this->broadcast_events )
            event( new CheckPassed($check) );
    }

    /**
     * Set the exception
     * @param \Exception $e
     */
    public function setException($e)
    {
        $this->exception = $e;
    }

}