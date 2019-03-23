<?php

namespace Meletisf\ZenDoctor\Test;

use Meletisf\ZenDoctor\Core\ZenDoctorCheckAbstract;
use Meletisf\ZenDoctor\Interfaces\HealthCheckInterface;

class FailingMockCheck extends ZenDoctorCheckAbstract implements HealthCheckInterface
{

    protected $message = 'failing_mock_check_message';

    /**
     * @return bool
     */
    public function check(): bool
    {
        return false;
    }
}