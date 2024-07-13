<?php

namespace App\Providers;

use App\Http\Livewire\UpdateProfileInformationForm;
use Illuminate\Support\ServiceProvider;
use Livewire\Livewire;
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
