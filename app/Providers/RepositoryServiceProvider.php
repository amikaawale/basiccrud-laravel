<?php

namespace App\Providers;

use App\Modules\Todo\Repositories\TodoInterface;
use App\Modules\Todo\Repositories\TodoRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->bind(TodoInterface::class,TodoRepository::class);
    }


}
