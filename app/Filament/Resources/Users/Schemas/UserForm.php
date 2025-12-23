<?php

namespace App\Filament\Resources\Users\Schemas;

use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class UserForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('email')
                    ->label('Correo electrónico')
                    ->email(),
                TextInput::make('password')
                    ->label('Contraseña')
                    ->password(),
                TextInput::make('name')
                    ->label('Nombres'),
                TextInput::make('apellidos'),
                TextInput::make('descripcion'),


            ]);
    }
}

