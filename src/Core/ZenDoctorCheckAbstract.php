<?php

namespace Meletisf\ZenDoctor\Core;

abstract class ZenDoctorCheckAbstract
{
    /**
     * @var string
     */
    protected $message;

    /**
     * @var array
     */
    protected $config;

    /**
     * ZenDoctorCheckAbstract constructor.
     *
     * @param array|null $config
     */
    public function __construct(array $config = null)
    {
        $this->config = $config;
    }

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
