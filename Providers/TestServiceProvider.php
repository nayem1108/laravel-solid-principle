<?php

namespace App\Providers;

use App\Contracts\TestRepositoryInterface;
use App\Repository\TestRepository;
use Illuminate\Support\ServiceProvider;

class TestServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(TestRepositoryInterface::class, TestRepository::class);

    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
