<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Services\RoadmapService;
use App\Services\OpenAIService;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        // Bind RoadmapService with OpenAIService dependency
        $this->app->singleton(RoadmapService::class, function ($app) {
            return new RoadmapService($app->make(OpenAIService::class));
        });
        $this->app->singleton(OpenAIService::class, function ($app) {
            // Replace with actual instantiation logic
            return new OpenAIService(/* dependencies */);
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
