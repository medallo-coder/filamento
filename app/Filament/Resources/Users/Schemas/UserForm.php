<?php

namespace App\Filament\Resources\Users\Schemas;

use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;
use Filament\Forms\Components\FileUpload;
use Filament\Schemas\Components\Fieldset;
use Filament\Forms\Components\Repeater;


class UserForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Toggle::make('es_desaparecido')
                    ->label('¿Es usuario desaparecido?')
                    ->default(false)
                    ->live(),           

                Select::make('role_id')
                    ->label('Rol')
                    ->options(function () {
                        return DB::table('roles')->pluck('nombre', 'id')->toArray();
                    })
                    ->required()
                    ->default(2)
                    ->visible(fn ($get) =>! $get('es_desaparecido')), 


                TextInput::make('email')
                    ->label('Correo electrónico')
                    ->email()
                    ->visible(fn ($get) =>! $get('es_desaparecido')),

                TextInput::make('password')
                    ->label('Contraseña')
                    ->password()
                    ->visible(fn ($get) =>! $get('es_desaparecido')),

                TextInput::make('name')
                    ->label('Nombres'),
                TextInput::make('apellidos'),
                TextInput::make('descripcion'),
                TextInput::make('lugar_desaparicion')
                ->visible(fn ($get) => $get('es_desaparecido')),

                DateTimePicker::make('fecha_desaparicion')
                ->label('Fecha y Hora de desaparición'),

                FileUpload::make('foto')
                ->image()
                ->imageEditor()
                ->uploadingMessage('Se esta cargando wey...')
                ->previewable(false)
                ->maxSize(1024)
                ->avatar()
                ->preserveFilenames(),

                Textarea::make('descripcion')
                  ->autosize()
                  ->maxLength(1024),
                
                Repeater::make('outfit')
                    ->relationship('outfit')
                    ->schema([
                        TextInput::make('parte_superior'),
                        Textarea::make('color_superior'),
                        FileUpload::make('parte_infeiror'),
                    ]),

                /*Select::make('estado')
                    ->label('Estado')
                    ->options([
                        'desaparecido' => 'Desaparecido',
                        'aparecido' => 'Aparecido',
                    ])
                    ->visible(fn ($get) => $get('es_desaparecido')),
                    */

            ]);
    }
}
