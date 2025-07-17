<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Infrastructure\Persistence\User\UserRepository;
use App\Domain\User\Repositories\UserRepositoryInterface;
use Illuminate\Http\Request;

/**
 * Class AppServiceProvider
 * This service provider is used to bind interfaces to implementations.
 */
class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        // Bind the UserRepositoryInterface to the UserRepository implementation
        $this->app->bind(UserRepositoryInterface::class, UserRepository::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Define a macro to force JSON responses
        Request::macro('expectsJson', fn () => true);
    }
}
