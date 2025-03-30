<?php

namespace Ihabrouk\EmailTemplates\Providers;

use Filament\Support\Assets\AlpineComponent;
use Filament\Support\Assets\Asset;
use Filament\Support\Assets\Css;
use Filament\Support\Assets\Js;
use Filament\Support\Facades\FilamentAsset;
use Filament\Support\Facades\FilamentIcon;
use Spatie\LaravelPackageTools\Commands\InstallCommand;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class EmailTemplatesServiceProvider extends PackageServiceProvider
{
    public static string $name = 'email-templates';

    public function configurePackage(Package $package): void
    {
        $package
            ->name(static::$name)
            ->hasConfigFile()
            ->hasMigrations(['create_email_templates_table'])
            ->hasTranslations()
            ->hasRoute('web')
            ->hasViews()
            ->hasInstallCommand(function(InstallCommand $command) {
                $command
                    ->publishMigrations()
                    ->publishConfigFile()
                    ->askToRunMigrations();
            });
    }

    public function packageRegistered(): void
    {
        // Register services here
    }

    public function packageBooted(): void
    {
        // Register resources, pages, etc.
    }
}