<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use App\Repositories\Interfaces\IProductCategoriesRepository;
use App\Repositories\Products\ProductCategoriesRepository;

use App\Repositories\Interfaces\IProductsRepository;
use App\Repositories\Products\ProductsRepository;

use App\Repositories\Interfaces\IStoresRepository;
use App\Repositories\Stores\StoresRepository;

use App\Repositories\Interfaces\IStorePosRepository;
use App\Repositories\Stores\StorePosRepository;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            IProductCategoriesRepository::class,
            ProductCategoriesRepository::class
        );

        $this->app->bind(
            IProductsRepository::class,
            ProductsRepository::class
        );

        $this->app->bind(
            IStoresRepository::class,
            StoresRepository::class
        );

        $this->app->bind(
            IStorePosRepository::class,
            StorePosRepository::class
        );
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
