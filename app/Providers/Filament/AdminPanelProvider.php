<?php

namespace App\Providers\Filament;

use Filament\Http\Middleware\Authenticate;
use Filament\Http\Middleware\DisableBladeIconComponents;
use Filament\Http\Middleware\DispatchServingFilamentEvent;
use Filament\Pages;
use Filament\Panel;
use Filament\PanelProvider;
use Filament\Support\Colors\Color;
use Filament\Widgets;
use Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse;
use Illuminate\Cookie\Middleware\EncryptCookies;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken;
use Illuminate\Routing\Middleware\SubstituteBindings;
use Illuminate\Session\Middleware\AuthenticateSession;
use Illuminate\Session\Middleware\StartSession;
use Illuminate\View\Middleware\ShareErrorsFromSession;
use pxlrbt\FilamentEnvironmentIndicator\EnvironmentIndicatorPlugin;
use ShuvroRoy\FilamentSpatieLaravelHealth\FilamentSpatieLaravelHealthPlugin;
use App\Filament\Pages\HealthCheckResults;
use Joaopaulolndev\FilamentEditProfile\FilamentEditProfilePlugin;
use Firefly\FilamentBlog\Blog;
use Dasundev\FilamentAccessSecret\Middleware\VerifyAdminAccessSecret;
use Illuminate\Support\Facades\Blade;
use Joaopaulolndev\FilamentWorldClock\FilamentWorldClockPlugin;
use HusamTariq\FilamentDatabaseSchedule\FilamentDatabaseSchedulePlugin;
use Kenepa\ResourceLock\ResourceLockPlugin;

class AdminPanelProvider extends PanelProvider
{
    public function panel(Panel $panel): Panel
    {
        return $panel
            ->default()
            ->spa()
            ->brandName('XD')
            //->brandLogo(asset('images/logo.png'))
            //->favicon(asset('images/favicon.ico'))
            ->id('admin')
            ->path('admin')
            ->login()
            ->registration()
            ->passwordReset()
            ->emailVerification()
            ->profile(isSimple: false)
            ->colors([
                'primary' => Color::Amber,
            ])
            ->discoverResources(in: app_path('Filament/Resources'), for: 'App\\Filament\\Resources')
            ->discoverPages(in: app_path('Filament/Pages'), for: 'App\\Filament\\Pages')
            ->pages([
                //   Pages\Dashboard::class,

            ])
            ->discoverWidgets(in: app_path('Filament/Widgets'), for: 'App\\Filament\\Widgets')
            ->widgets([
                Widgets\AccountWidget::class,
                Widgets\FilamentInfoWidget::class,
            ])

            ->middleware([
                VerifyAdminAccessSecret::class,
                EncryptCookies::class,
                AddQueuedCookiesToResponse::class,
                StartSession::class,
                AuthenticateSession::class,
                ShareErrorsFromSession::class,
                VerifyCsrfToken::class,
                SubstituteBindings::class,
                DisableBladeIconComponents::class,
                DispatchServingFilamentEvent::class,
                \Hasnayeen\Themes\Http\Middleware\SetTheme::class
            ])
            ->authMiddleware([
                Authenticate::class,
            ])

            ->plugins([
                \BezhanSalleh\FilamentShield\FilamentShieldPlugin::make(),
                //EnvironmentIndicatorPlugin::make()
                //->showBadge(true)
                //->showBorder(false),
                \Hasnayeen\Themes\ThemesPlugin::make(),
                FilamentSpatieLaravelHealthPlugin::make()
                    ->usingPage(HealthCheckResults::class),
                //FilamentEditProfilePlugin::make(),
                FilamentDatabaseSchedulePlugin::make(),
                ResourceLockPlugin::make(),
                Blog::make(),
                \TomatoPHP\FilamentUsers\FilamentUsersPlugin::make(),
                \DiscoveryDesign\FilamentGaze\FilamentGazePlugin::make(),
                FilamentWorldClockPlugin::make()
                    ->timezones([
                        'America/New_York',
                        'America/Sao_Paulo',
                        'Asia/Tokyo',
                        'America/Lima',
                    ])
                    ->setTimeFormat('H:i') //Optional time format default is: 'H:i'
                    ->shouldShowTitle(false) //Optional show title default is: true
                    ->setTitle('Hours') //Optional title default is: 'World Clock'
                    ->setDescription('Different description') //Optional description default is: 'Show hours around the world by timezone'
                    ->setQuantityPerRow(1) //Optional quantity per row default is: 1
                    //->setColumnSpan('full') //Optional column span default is: '1/2'
                    ->setSort(10)

            ])
            // ->renderHook(
            //     'panels::body.end',
            //     fn (): string => auth()->check() ? Blade::render('@livewire(\'livewire-ui-modal\')') : '',
            // );



            //->supportUrl('https://example.com/support')

        ;
    }
}
