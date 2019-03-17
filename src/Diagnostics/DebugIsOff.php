<?php

namespace Meletisf\ZenDoctor\Diagnostics;

use Meletisf\ZenDoctor\Core\ZenDoctorCheckAbstract;
use Meletisf\ZenDoctor\Interfaces\HealthCheckInterface;

class DebugIsOff extends ZenDoctorCheckAbstract implements HealthCheckInterface
{

    protected $message = "APP_DEBUG is on!";

    /**
     * Check if the APP_DEBUG is off
     * @return bool
     */
    function check(): bool
    {
        if ( env('APP_DEBUG') == true )
            return false;
        return true;
    }

}