<?php

namespace Meletisf\ZenDoctor;

use Illuminate\Support\ServiceProvider;
use Meletisf\ZenDoctor\Facades\ZenDoctor as ZenDoctorFacade;

/** @codeCoverageIgnore  */
class ZenDoctorServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(__DIR__.'/config/zen-doctor.php', 'zen-doctor');
        $this->app->make('Meletisf\ZenDoctor\Http\Controllers\HealthController');
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        if (config('zen-doctor.expose_default_routes')) {
            $this->loadRoutesFrom(__DIR__.'/routes.php');
        }

        $this->publishes([
            __DIR__.'/config/zen-doctor.php' => config_path('zen-doctor.php'),
        ], 'config');

        $this->app->singleton(ZenDoctorFacade::class, function () {
            return new ZenDoctor(
                config('zen-doctor.checklist'),
                config('zen-doctor.except_with'),
                config('zen-doctor.broadcast_events')
            );
        });

        $this->app->alias(ZenDoctorFacade::class, 'zen-doctor');
    }
}
