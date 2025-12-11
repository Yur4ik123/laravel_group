<?php

namespace App\Filament\Resources\Statuses\Tables;

use App\Models\Status;
use Filament\Actions\DeleteAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class StatusesTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('id')->label('ID')->sortable(),
                TextColumn::make('slug')->label('Slug')->sortable(),
                TextColumn::make('name')
                    ->label('Название (RU)')
                    ->getStateUsing(fn (Status $record) => $record->translate('uk')->name ?? ''),
                TextColumn::make('name')
                    ->label('Название (EN)')
                    ->getStateUsing(fn (Status $record) => $record->translate('en')->name ?? ''),
                IconColumn::make('active')
                    ->boolean()
                    ->label('Активен'),
            ])
            ->filters([
                //
            ])
            ->actions([
                EditAction::make(),
                DeleteAction::make(),
            ]);
    }
}
