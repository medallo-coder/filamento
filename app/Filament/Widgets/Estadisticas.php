<?php

namespace App\Filament\Widgets;

use Filament\Widgets\ChartWidget;
use App\Models\User;

class Estadisticas extends ChartWidget
{
    protected ?string $heading = 'Estadísticas de Usuarios';

    protected function getType(): string
    {
        return 'polarArea'; // puedes cambiarlo a 'bar', 'line', 'pie' si quieres
    }

    protected function getData(): array
    {
        // Definimos los estados de tus usuarios
        $estados = ['desaparecido', 'encontrado'];
        $datos = [];

        // Contamos usuarios por estado
        foreach ($estados as $estado) {
            $datos[] = User::where('estado', $estado)->count();
        }

        return [
            'labels' => $estados,
            'datasets' => [
                [
                    'label' => 'Usuarios',
                    'data' => $datos,
                    'backgroundColor' => ['#F87171', '#34D399'],
                ],
            ],
        ];
    }
}
