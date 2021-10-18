<?php

namespace App\Providers;

use App\Services\BotApiService;
use App\Services\QuizService;
use Illuminate\Contracts\Support\DeferrableProvider;
use Illuminate\Support\ServiceProvider;

class DeferrableServiceProvider extends ServiceProvider implements DeferrableProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(BotApiService::class, function () {
            return new BotApiService();
        });

        $this->app->singleton(QuizService::class, function () {
            return new QuizService();
        });
    }

    public function provides(): array
    {
        return [
            BotApiService::class,
            QuizService::class,
        ];
    }
}
