<?php

namespace App\Providers;

use App\Repositories\TestRepository;
use Illuminate\Support\ServiceProvider;
use Illuminate\Contracts\Foundation\Application;

class TestProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->singleton(TestRepository::class, function (Application $app) {
            return new TestRepository();
        });
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
