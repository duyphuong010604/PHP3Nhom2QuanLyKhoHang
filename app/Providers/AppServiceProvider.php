<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repositories\Interfaces\InboundShipmentRepositoryInterface;
use App\Repositories\InboundShipmentRepository;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(InboundShipmentRepositoryInterface::class, InboundShipmentRepository::class);

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
