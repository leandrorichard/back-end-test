<?php

namespace App\Providers;

use App\Produto;
use App\Repositories\Produto\Repository;
use App\Repositories\Produto\RepositoryContract;
use App\Services\Produto\Contracts\CreateContract;
use App\Services\Produto\Contracts\DeleteContract;
use App\Services\Produto\Contracts\IndexContract;
use App\Services\Produto\Contracts\ShowContract;
use App\Services\Produto\Contracts\UpdateContract;
use App\Services\Produto\Services\Create;
use App\Services\Produto\Services\Delete;
use App\Services\Produto\Services\Index;
use App\Services\Produto\Services\Show;
use App\Services\Produto\Services\Update;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {

    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            CreateContract::class,
            Create::class);

        $this->app->bind(
            DeleteContract::class,
            Delete::class
        );

        $this->app->bind(
            IndexContract::class,
            Index::class
        );

        $this->app->bind(
            ShowContract::class,
            Show::class
        );

        $this->app->bind(
            UpdateContract::class,
            Update::class
        );

        $this->app->bind(RepositoryContract::class, function ($app) {
            $produto = new Produto();
            return new Repository($produto);
        });
    }
}
