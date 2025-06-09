<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Services\CitasService;
use App\Services\UsersService;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->singleton('citas', function () {
            return new CitasService();
        });
        $this->app->singleton('usuarios', function () {
            return new UsersService();
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
