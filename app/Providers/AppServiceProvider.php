<?php

namespace App\Providers;

use App\Console\Commands\QueueWorkCommand;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(QueueWorkCommand::class, function ($app) {
            return new QueueWorkCommand($app['queue.worker'], $app['cache.store']);
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
