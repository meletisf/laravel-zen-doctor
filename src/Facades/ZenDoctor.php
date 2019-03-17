<?php

namespace Meletisf\ZenDoctor\Facades;

use Illuminate\Support\Facades\Facade;

class ZenDoctor extends Facade
{

    protected static function getFacadeAccessor()
    {
        return 'zen-doctor';
    }

}