<?php

namespace Ihabrouk\EmailTemplates\Pages;

use Filament\Pages\Page;

class Dashboard extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-home';

    protected static string $view = 'email-templates::pages.dashboard';

    protected static ?string $title = 'Dashboard';
    
    protected static ?int $navigationSort = -2;
    
    public static function getNavigationLabel(): string
    {
        return 'Dashboard';
    }
    
    protected static ?string $slug = 'dashboard';
    
    public static function shouldRegisterNavigation(): bool
    {
        return true;
    }
}