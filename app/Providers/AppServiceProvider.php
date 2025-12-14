<?php

namespace App\Providers;

use App\Repositories\BannerRepository;
use App\Repositories\Interface\BannerRepositoryInterface;
use Illuminate\Support\ServiceProvider;
use App\Repositories\Interface\ProductRepositoryInterface;
use App\Repositories\ProductRepository;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(ProductRepositoryInterface::class, ProductRepository::class);
        $this->app->bind(BannerRepositoryInterface::class, BannerRepository::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
