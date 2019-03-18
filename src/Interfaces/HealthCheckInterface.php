<?php

namespace Meletisf\ZenDoctor\Interfaces;

interface HealthCheckInterface
{
    /**
     * @return bool
     */
    public function check(): bool;
}
