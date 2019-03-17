<?php

return [

    /*
     * If set to TRUE, it will automatically register the /_health route.
     * You can set it to false and create your own controller which runs the
     * diagnostic checks.
     */
    'expose_default_routes' => env('ENABLE_HEALTHCHECK_ROUTE', true),

    'checklist' => [
        \Meletisf\ZenDoctor\Diagnostics\EnvFileExists::class,
        \Meletisf\ZenDoctor\Diagnostics\AppKeyExists::class,
        \Meletisf\ZenDoctor\Diagnostics\EnvironmentIsProduction::class,
        \Meletisf\ZenDoctor\Diagnostics\DebugIsOff::class
    ],

    /*
     * Here you have the ability to override ethe exception that is thrown.
     */
    'except_with' => \Meletisf\ZenDoctor\Exceptions\HealthCheckFailedException::class,

    /*
     * If set to true, the Meletisf\ZenDoctor\Events\CheckFailed will be fired.
     */
    'broadcast_events' => env('ENABLE_HEALTHCHECK_EVENTS', true),

];
