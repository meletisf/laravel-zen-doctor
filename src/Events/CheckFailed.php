<?php

namespace Meletisf\ZenDoctor\Events;

use Meletisf\ZenDoctor\Interfaces\HealthCheckInterface;

class CheckFailed
{
    protected $check;

    /**
     * CheckFailed constructor.
     *
     * @param HealthCheckInterface $check
     */
    public function __construct(HealthCheckInterface $check)
    {
        $this->check = $check;
    }
}
