<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Modules\Posts\Interfaces\PostsInterface;
use Modules\Posts\Repository\PostsRepository;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(PostsInterface::class, PostsRepository::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {

    }
}
