<?php

namespace App\Filament\Pages;

use Filament\Pages\Page;
use Filament\Actions\Action;
use Filament\Notifications\Notification;
use Illuminate\Support\Facades\Artisan;

use Symfony\Component\Console\Exception\CommandNotFoundException;

class HorizonDashboard extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-cloud';
    protected static ?string $navigationLabel = 'Horizon';
    protected static ?int $navigationSort = 90;
    protected static string $view = 'filament.pages.horizon-dashboard';


    // public static function shouldRegisterNavigation(): bool
    // {
    //     //return auth()->user()->can('view horizon dashboard');
    // }
    public function getTitle(): string
    {
        return 'Panel de administración de Laravel Horizon';
    }


    protected function getHeaderActions(): array
    {
        return [
            //En el futuro implementar
            // Action::make('start')
            // ->label('Iniciar Horizon')
            // ->action(function () {
            //     try {
            //         $result = Artisan::call('horizon');
            //         $output = Artisan::output();
            //         Notification::make()
            //             ->title('Horizon iniciado')
            //             ->body($output)
            //             ->success()
            //             ->send();
            //     } catch (CommandNotFoundException $e) {
            //         Notification::make()
            //             ->title('Error')
            //             ->body('El comando Horizon no está disponible. Asegúrate de que Horizon esté instalado correctamente.')
            //             ->danger()
            //             ->send();
            //     } catch (\Exception $e) {
            //         Notification::make()
            //             ->title('Error')
            //             ->body('Ocurrió un error al intentar iniciar Horizon: ' . $e->getMessage())
            //             ->danger()
            //             ->send();
            //     }
            // })
            // ->color('success'),


            // Action::make('pause')
            //     ->label('Pausar Horizon')
            //     ->action(function () {
            //         Artisan::call('horizon:pause');
            //         Notification::make()
            //             ->title('Horizon pausado')
            //             ->success()
            //             ->send();
            //     })
            //     ->color('warning'),

            // Action::make('continue')
            //     ->label('Continuar Horizon')
            //     ->action(function () {
            //         Artisan::call('horizon:continue');
            //         Notification::make()
            //             ->title('Horizon continuado')
            //             ->success()
            //             ->send();
            //     })
            //     ->color('primary'),

            // Action::make('terminate')
            //     ->label('Terminar Horizon')
            //     ->action(function () {
            //         Artisan::call('horizon:terminate');
            //         Notification::make()
            //             ->title('Horizon terminado')
            //             ->success()
            //             ->send();
            //     })
            //     ->color('danger')
            //     ->requiresConfirmation(),

            // Action::make('status')
            //     ->label('Estado de Horizon')
            //     ->action(function () {
            //         $status = Artisan::call('horizon:status');
            //         Notification::make()
            //             ->title('Estado de Horizon')
            //             ->body($status)
            //             ->success()
            //             ->send();
            //     })
            //     ->color('info'),
        ];
    }
    public static function getNavigationGroup(): ?string
    {
        return 'Core';
    }
}
