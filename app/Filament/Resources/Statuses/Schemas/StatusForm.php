<?php

namespace App\Filament\Resources\Statuses\Schemas;

use Filament\Forms;
use Filament\Schemas\Schema;
use Filament\Forms\Components\Tabs;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;
use App\Models\Status;

class StatusForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->schema([
                TextInput::make('slug')
                    ->required()
                    ->unique(ignoreRecord: true)
                    ->label('Slug'),

                Select::make('active')
                    ->options([
                        1 => 'Да',
                        0 => 'Нет',
                    ])
                    ->required()
                    ->label('Активен'),

                // Translatable fields
                Tabs::make('Переводы')
                    ->tabs([
                        Tabs\Tab::make('EN')->schema([
                            TextInput::make('name.en')
                                ->label('Название (EN)')
                                ->required(),
                        ]),
                        Tabs\Tab::make('UK')->schema([
                            TextInput::make('name.uk')
                                ->label('Название (UK)')
                                ->required(),
                        ]),
                    ]),
            ]);
    }
}
