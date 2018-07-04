<?php

namespace App\Providers;

use App\Services\Calculos\Contracts\CalculoPrazoContract;
use App\Services\Calculos\Services\CalculoPrazoCorreios;
use Illuminate\Support\ServiceProvider;

class ApplicationServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(CalculoPrazoContract::class, CalculoPrazoCorreios::class);
    }
}
