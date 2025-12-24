<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
//Banner//
use App\Repositories\BannerRepository;
use App\Repositories\Interface\BannerRepositoryInterface;
//Product//
use App\Repositories\Interface\ProductRepositoryInterface;
use App\Repositories\ProductRepository;
//Chicken recipes//
use App\Repositories\Chicken_recipesRepository;
use App\Repositories\Interface\Chicken_recipesRepositoryInterface;
//Pasta recipes//
use App\Repositories\Pasta_recipesRepository;
use App\Repositories\Interface\Pasta_recipesRepositoryInterface;
//Breakfast recipes//
use App\Repositories\Breakfast_recipesRepository;
use App\Repositories\Interface\Breakfast_recipesRepositoryInterface;
//Under recipes//
use App\Repositories\Under_recipesRepository;
use App\Repositories\Interface\Under_recipesRepositoryInterface;
//Contact Messages//
use App\Repositories\ContactRepository;
use App\Repositories\Interface\ContactRepositoryInterface;
//Trending now posts latest posts//
use App\Repositories\PostsRepository;
use App\Repositories\Interface\PostsRepositoryInterface;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(ProductRepositoryInterface::class, ProductRepository::class);
        $this->app->bind(BannerRepositoryInterface::class, BannerRepository::class);
        $this->app->bind(Chicken_recipesRepositoryInterface::class, Chicken_recipesRepository::class);
        $this->app->bind(Pasta_recipesRepositoryInterface::class, Pasta_recipesRepository::class);
        $this->app->bind(Breakfast_recipesRepositoryInterface::class, Breakfast_recipesRepository::class);
        $this->app->bind(Under_recipesRepositoryInterface::class, Under_recipesRepository::class);
        $this->app->bind(ContactRepositoryInterface::class, ContactRepository::class);
        $this->app->bind(PostsRepositoryInterface::class, PostsRepository::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
