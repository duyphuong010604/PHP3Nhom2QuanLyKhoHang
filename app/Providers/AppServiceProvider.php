<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repositories\Stocks\StocksRepository;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->singleton(StocksRepository::class, function ($app) {
            return new StocksRepository();
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
