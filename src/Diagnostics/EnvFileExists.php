<?php

namespace Meletisf\ZenDoctor\Diagnostics;

use Meletisf\ZenDoctor\Core\ZenDoctorCheckAbstract;
use Meletisf\ZenDoctor\Interfaces\HealthCheckInterface;

class EnvFileExists extends ZenDoctorCheckAbstract implements HealthCheckInterface
{
    protected $message = '.env does not exist!';

    /**
     * Check if the .env file exists.
     *
     * TODO: Make this part testable
     * @codeCoverageIgnore
     * @return bool
     */
    public function check(): bool
    {
        return file_exists(base_path('.env'));
    }
}
