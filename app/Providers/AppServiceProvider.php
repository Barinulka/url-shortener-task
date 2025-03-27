<?php

namespace App\Providers;

use App\Interface\LinkRepositoryInterface;
use App\Interface\LinkServiceInterface;
use App\Interface\RedirectServiceInterface;
use App\Interface\UserRepositoryInterface;
use App\Interface\UserServiceInterface;
use App\Repository\LinkRepository;
use App\Repository\UserRepository;
use App\Service\LinkService;
use App\Service\RedirectService;
use App\Service\UserService;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(UserRepositoryInterface::class, UserRepository::class);
        $this->app->bind(UserServiceInterface::class, UserService::class);

        $this->app->bind(LinkRepositoryInterface::class, LinkRepository::class);
        $this->app->bind(LinkServiceInterface::class, LinkService::class);

        $this->app->bind(RedirectServiceInterface::class, RedirectService::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
