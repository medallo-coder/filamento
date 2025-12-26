<?php

namespace App\Filament\Widgets;

use Filament\Widgets\StatsOverviewWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use App\Models\User;

class TotalDesaparecidos extends StatsOverviewWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Usuarios Desaparecidos', User::where('estado', 'desaparecido')->count())
                ->description('Cantidad de usuarios reportados como desaparecidos')
                ->descriptionIcon('heroicon-o-user-group')
                ->color('danger'), 
        ];
    }
}
