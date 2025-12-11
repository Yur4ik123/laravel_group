<?php

namespace App\Filament\Resources\Services\Schemas;

use App\Filament\Forms\Components\TranslatableFields;
use App\Models\Category;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class ServiceForm
{
    /**
     * customizing the display of the form for creating and editing services
     */
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TranslatableFields::make([
                    TextInput::make('name')
                        ->required(),
                        Textarea::make('description')
                            ->required(),
                ]),
                FileUpload::make('images')
                    ->disk('public')
                    ->directory('services')
                    ->required(),
                Select::make('category_id')
                    ->label('Category name')
                    ->options(Category::all()->pluck('name', 'id'))
                    ->required()
                    ->default(1),
                TextInput::make('slug')
                    ->required(),
                TextInput::make('price')
                    ->required()
                    ->numeric()
                    ->default(0.0)
                    ->prefix('₴'),
            ]);
    }
}
