<?php

namespace Meletisf\ZenDoctor\Test;

use Meletisf\ZenDoctor\Core\ZenDoctorCheckAbstract;
use Meletisf\ZenDoctor\Interfaces\HealthCheckInterface;

class PassingMockCheck extends ZenDoctorCheckAbstract implements HealthCheckInterface
{

    protected $message = 'passing_mock_check_message';

    /**
     * @return bool
     */
    public function check(): bool
    {
        return true;
    }
}