<?php

namespace Meletisf\ZenDoctor\Facades;

use Illuminate\Support\Facades\Facade;

/** @codeCoverageIgnore  */
class ZenDoctor extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'zen-doctor';
    }
}
