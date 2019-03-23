<?php

namespace Meletisf\ZenDoctor\Diagnostics;

use Meletisf\ZenDoctor\Core\ZenDoctorCheckAbstract;
use Meletisf\ZenDoctor\Interfaces\HealthCheckInterface;

class EnvironmentIsProduction extends ZenDoctorCheckAbstract implements HealthCheckInterface
{
    protected $message = 'APP_ENV is not set to production!';

    /**
     * Check if the APP_ENV is correctly set to production.
     *
     * @return bool
     */
    public function check(): bool
    {
        if (config('app.env') != 'production') {
            return false;
        }
        return true;
    }
}
