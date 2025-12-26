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
use Illuminate\Support\Facades\DB;


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

                FileUpload::make('foto')
                    ->image()
                    ->imageEditor()
                    ->uploadingMessage('Se esta cargando wey...')
                    ->previewable(false)
                    ->maxSize(1024)
                    ->avatar()
                    ->preserveFilenames(),  
                    
                TextInput::make('name')
                    ->label('Nombres:'),

                Select::make('role_id')
                    ->label('Rol')
                    ->options(function () {
                        return DB::table('roles')->pluck('nombre', 'id')->toArray();
                    })
                    ->required()
                    ->default(2)
                    ->visible(fn ($get) =>! $get('es_desaparecido')), 


                TextInput::make('apellidos')
                ->label('Apellidos:'),
                TextInput::make('email')
                    ->label('Correo electrónico:')
                    ->email()
                    ->visible(fn ($get) =>! $get('es_desaparecido')),

                Textarea::make('descripcion')
                ->label('Descripción:')
                  ->autosize()
                  ->maxLength(1024),

                TextInput::make('password')
                    ->label('Contraseña:')
                    ->password()
                    ->visible(fn ($get) =>! $get('es_desaparecido')),




                
                TextInput::make('lugar_desaparicion')
                ->label('Lugar de Desaparición')
                ->visible(fn ($get) => $get('es_desaparecido')),

                                DateTimePicker::make('fecha_desaparicion')
                ->label('Fecha y Hora de desaparición')
                ->visible(fn ($get) => $get('es_desaparecido')),

                
                Repeater::make('outfit')
                ->label('Vestuario:')
                    ->relationship('outfit')
                    ->schema([
                        TextInput::make('parte_superior'),
                        Textarea::make('color_superior'),
                        TextInput::make('parte_infeiror'),
                        TextInput::make('color_inferior'),
                        TextInput::make('calzado'),
                        TextInput::make('color_calzado'),
                        TextInput::make('accesorios'),
                    ])
                    ->visible(fn ($get) => $get('es_desaparecido')),

                                Repeater::make('Characteristic')
                ->label('Caracteristicas:')
                ->relationship('characteristic')
                ->schema([
                    Select::make('sexo')
                    ->options([
                       'masculino' => 'masculino',
                       'femenino' => 'femenino',

                    ]),
                    TextInput::make('edad'),
                    TextInput::make('estatura'),
                    TextInput::make('complexion'),
                    TextInput::make('color_piel'),
                    TextInput::make('color_ojos'),
                    TextInput::make('color_cabello'),
                    TextInput::make('tipo_cabello'),
                    TextInput::make('senas_particulares'),
                    TextInput::make('implantes'),
                    TextInput::make('protesis'),
                    TextInput::make('senas_odontologicas')

                   ])
                   ->visible(fn ($get) => $get('es_desaparecido')),






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
