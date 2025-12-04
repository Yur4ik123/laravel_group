<?php

namespace App\Filament\Resources\Bookings\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\SelectColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;

class BookingsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('id')
                    ->label('ID')
                    ->sortable()
                    ->searchable(),

                TextColumn::make('user.name')
                    ->label('Клиент')
                    ->sortable()
                    ->searchable(),

                TextColumn::make('service.name')
                    ->label('Услуга')
                    ->sortable()
                    ->searchable()
                    ->getStateUsing(fn ($record) => $record->service?->name),

                TextColumn::make('date')
                    ->label('Дата')
                    ->date('d.m.Y')
                    ->sortable(),

                TextColumn::make('slot.slot')
                    ->label('Время')
                    ->sortable(),

                SelectColumn::make('status_id')
                    ->label('Статус')
                    ->options(fn () => \App\Models\Status::all()->pluck('name', 'id'))
                    ->sortable(),

                TextColumn::make('total_price')
                    ->label('Сумма')
                    ->money('UAH')
                    ->sortable(),

                TextColumn::make('created_at')
                    ->label('Создано')
                    ->dateTime('d.m.Y H:i')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                SelectFilter::make('status_id')
                    ->label('Статус')
                    ->options(fn () => \App\Models\Status::all()->pluck('name', 'id')),

                SelectFilter::make('service_id')
                    ->label('Услуга')
                    ->options(fn () => \App\Models\Service::all()->pluck('name', 'id')),
            ])
            ->defaultSort('created_at', 'desc')
            ->recordActions([
                ViewAction::make(),
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
