<?php

namespace Meletisf\ZenDoctor\Core;

abstract class ZenDoctorCheckAbstract
{
    /**
     * @var string
     */
    protected $message;

    /**
     * Get the check message.
     *
     * @return string
     */
    public function getMessage(): string
    {
        return $this->message;
    }
}
