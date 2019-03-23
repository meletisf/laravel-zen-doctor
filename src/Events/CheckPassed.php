<?php

namespace Meletisf\ZenDoctor\Events;

use Meletisf\ZenDoctor\Interfaces\HealthCheckInterface;

class CheckPassed
{
    public $check;

    /**
     * CheckPassed constructor.
     *
     * @param HealthCheckInterface $check
     */
    public function __construct(HealthCheckInterface $check)
    {
        $this->check = $check;
    }
}
