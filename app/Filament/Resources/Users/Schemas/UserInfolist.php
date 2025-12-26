<?php

namespace App\Filament\Resources\Users\Schemas;

use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;
use Filament\Infolists\Components\ImageEntry;


class UserInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                ImageEntry::make('foto')
                ->label('Foto'),
                TextEntry::make('name')
                ->label('Nombres:')
                    ->placeholder('-'),
                TextEntry::make('email')
                    ->label('Correo Electrónico:')
                    ->placeholder('-'),
                TextEntry::make('apellidos')
                ->label('Apellidos:')
                    ->placeholder('-'),
                TextEntry::make('descripcion')
                    ->placeholder('-')
                    ->columnSpanFull(),
                TextEntry::make('created_at')
                    ->label('Se unio en:')
                    ->dateTime()
                    ->placeholder('-'),


            ]);
    }
}
