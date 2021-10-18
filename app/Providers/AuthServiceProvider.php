<?php

namespace App\Providers;

use App\Models\User;
use App\Services\BotApiService;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        $this->app->bind('App\Models\User', function ($app) {
            return new User();
        });

        Auth::provider('bot', function ($app, array $config) {
            return new BotUserProvider(new BotApiService());
        });
    }
}
