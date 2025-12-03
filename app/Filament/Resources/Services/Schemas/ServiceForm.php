<?php

namespace App\Filament\Resources\Services\Schemas;

use App\Models\Category;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;
use App\Filament\Forms\Components\TranslatableFields;
use Filament\Forms\Components\FileUpload;

class ServiceForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TranslatableFields::make([
                    TextInput::make('name')
                        ->required(),
                ]),
                FileUpload::make('images')
                    ->disk('public')
                    ->directory('services'),
                Select::make('category_id')
                ->options(Category::all()->pluck('slug', 'name'))
                ->required()
                ->default(1),
                TextInput::make('slug')
                    ->required(),
                TextInput::make('price')
                    ->required()
                    ->numeric()
                    ->default(0.0)
                    ->prefix('$'),
            ]);
    }
}
