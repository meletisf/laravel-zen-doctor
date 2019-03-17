<?php

namespace Meletisf\ZenDoctor\Core;

abstract class ZenDoctorCheckAbstract
{

    /**
     * @var string $message
     */
    protected $message;

    /**
     * Get the check message
     * @return string
     */
    public function getMessage(): string
    {
        return $this->message;
    }

}
