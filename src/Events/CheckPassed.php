<?php

namespace Meletisf\ZenDoctor\Events;

use Meletisf\ZenDoctor\Interfaces\HealthCheckInterface;

class CheckPassed
{

    protected $check;

    /**
     * CheckPassed constructor.
     * @param HealthCheckInterface $check
     */
    function __construct(HealthCheckInterface $check)
    {
        $this->check = $check;
    }

}