<?php

namespace App\Providers;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */

    public function boot(): void
    {
        $this->registerMiddlewareAliases();
        Paginator::useBootstrapFour();

    }

    protected function registerMiddlewareAliases()
    {
        Route::aliasMiddleware('practitioner', \App\Http\Middleware\PractitionerMiddleware::class);
        Route::aliasMiddleware('client', \App\Http\Middleware\ClientMiddleware::class);
        Route::aliasMiddleware('admin', \App\Http\Middleware\AdminMiddleware::class);
    }
}
