<?php

namespace App\Filament\Pages;

use Filament\Pages\Page;
use ShuvroRoy\FilamentSpatieLaravelHealth\Pages\HealthCheckResults as BaseHealthCheckResults;
use Illuminate\Contracts\Support\Htmlable; // Importar Htmlable si es necesario

class HealthCheckResults extends BaseHealthCheckResults
{
    protected static ?string $navigationIcon = 'heroicon-o-cpu-chip';

    public function getHeading(): string | Htmlable
    {
        return 'Health Check Results'; // Agregar punto y coma
    }

    public static function getNavigationGroup(): ?string
    {
        return 'Core';
    }
}
