<?php

namespace Meletisf\ZenDoctor\Interfaces;

interface HealthCheckInterface
{

    /**
     * @return boolean
     */
    function check(): bool;

}