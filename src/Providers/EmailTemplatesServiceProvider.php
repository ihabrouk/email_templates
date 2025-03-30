<?php

namespace Ihabrouk\EmailTemplates\Providers;

use Filament\Support\Assets\AlpineComponent;
use Filament\Support\Assets\Asset;
use Filament\Support\Assets\Css;
use Filament\Support\Assets\Js;
use Filament\Support\Facades\FilamentAsset;
use Filament\Support\Facades\FilamentIcon;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;
use Ihabrouk\EmailTemplates\CommsPanel;

class EmailTemplatesServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        // Register the panel provider
        $this->app->register(CommsPanel::class);
    }

    public function boot(): void
    {
        // Register view namespace
        $this->loadViewsFrom(__DIR__ . '/../../resources/views', 'email-templates');
        
        // Load migrations
        $this->loadMigrationsFrom(__DIR__ . '/../../database/migrations');
        
        // Register translations if needed
        // $this->loadTranslationsFrom(__DIR__ . '/../../resources/lang', 'email-templates');
        
        // Register assets for our package and dependencies
        $this->registerAssets();
        
        // Publish configuration
        if ($this->app->runningInConsole()) {
            // Views
            $this->publishes([
                __DIR__ . '/../../resources/views' => resource_path('views/vendor/email-templates'),
            ], 'email-templates-views');
            
            // Migrations
            $this->publishes([
                __DIR__ . '/../../database/migrations' => database_path('migrations'),
            ], 'email-templates-migrations');
            
            // Config
            $this->publishes([
                __DIR__ . '/../../config' => config_path('email-templates'),
            ], 'email-templates-config');
        }
    }

    protected function registerAssets(): void
    {
        // Register any necessary assets
        FilamentAsset::register([
            // Include any CSS/JS assets necessary for your package
            // The visual builder email templates assets will be registered by its own service provider
        ]);
    }
}