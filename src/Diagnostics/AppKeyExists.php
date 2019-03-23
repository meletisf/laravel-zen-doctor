<?php

namespace Meletisf\ZenDoctor\Diagnostics;

use Meletisf\ZenDoctor\Core\ZenDoctorCheckAbstract;
use Meletisf\ZenDoctor\Interfaces\HealthCheckInterface;

class AppKeyExists extends ZenDoctorCheckAbstract implements HealthCheckInterface
{
    protected $message = 'APP_KEY is not set!';

    /**
     * Check if the APP_KEY is set.
     *
     * @return bool
     */
    public function check(): bool
    {
        if (config('app.key') == null) {
            return false;
        }

        return true;
    }
}
