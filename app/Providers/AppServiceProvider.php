<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use WireUi\Facades\WireUi;

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
        // Registering the wireUi facade
        // WireUi::setComponentPrefix('wire');
    }
}
