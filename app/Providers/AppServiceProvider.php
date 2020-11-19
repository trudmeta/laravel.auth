<?php

namespace App\Providers;

use App\Http\Controllers\Auth\LoginController;
use App\Services\AuthService;
use App\Services\AuthServiceInterface;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->when(LoginController::class)
            ->needs(AuthServiceInterface::class)->give(function($app) {
                return $app->make(AuthService::class);
            });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
