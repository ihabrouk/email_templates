<?php

namespace Ihabrouk\EmailTemplates;

use Filament\Panel;
use Filament\PanelProvider;
use Filament\Http\Middleware\Authenticate;
use Filament\Http\Middleware\DisableBladeIconComponents;
use Filament\Http\Middleware\DispatchServingFilamentEvent;
use Illuminate\Session\Middleware\StartSession;
use Illuminate\Cookie\Middleware\EncryptCookies;
use Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse;
use Illuminate\Routing\Middleware\SubstituteBindings;
use Illuminate\Session\Middleware\AuthenticateSession;
use Illuminate\View\Middleware\ShareErrorsFromSession;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken;
use Ihabrouk\EmailTemplates\Pages\Dashboard;

class CommsPanel extends PanelProvider
{
    public function panel(Panel $panel): Panel
    {
        return $panel
            ->id('comms')
            ->path('comms')
            ->login()
            ->colors([
                'primary' => '#10b981',
            ])
            ->font('Inter')
            ->discoverResources(in: __DIR__ . '/Resources', for: 'Ihabrouk\\EmailTemplates\\Resources')
            ->discoverPages(in: __DIR__ . '/Pages', for: 'Ihabrouk\\EmailTemplates\\Pages')
            ->pages([
                Dashboard::class,
            ])
            // Use Filament's default assets instead of a custom theme
            ->assets([
                // If you want to add custom assets later, you can add them here
            ])
            ->brandName('Email Communications')
            ->brandLogo(fn () => view('email-templates::components.logo'))
            ->middleware([
                EncryptCookies::class,
                AddQueuedCookiesToResponse::class,
                StartSession::class,
                AuthenticateSession::class,
                ShareErrorsFromSession::class,
                VerifyCsrfToken::class,
                SubstituteBindings::class,
                DisableBladeIconComponents::class,
                DispatchServingFilamentEvent::class,
            ])
            ->authMiddleware([
                Authenticate::class,
            ]);
    }
}