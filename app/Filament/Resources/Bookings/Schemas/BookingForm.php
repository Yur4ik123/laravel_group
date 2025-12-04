<?php

namespace App\Filament\Resources\Bookings\Schemas;

use Filament\Schemas\Schema;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;

class BookingForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('user_id')
                    ->label('Клиент')
                    ->relationship('user', 'name')
                    ->getOptionLabelFromRecordUsing(fn ($record) => $record->name . ' ' . $record->surname)
                    ->preload()
                    ->searchable()
                    ->required(),

                Select::make('service_id')
                    ->label('Услуга')
                    ->relationship('service', 'id')
                    ->getOptionLabelFromRecordUsing(fn ($record) => $record->name)
                    ->searchable()
                    ->preload()
                    ->required(),

                Select::make('slot_id')
                    ->label('Время')
                    ->relationship('slot', 'slot')
                    ->searchable()
                    ->preload()
                    ->required(),

                DatePicker::make('date')
                    ->label('Дата бронирования')
                    ->required()
                    ->native(false)
                    ->minDate(now()),

                Select::make('status_id')
                    ->label('Статус')
                    ->relationship('status', 'id')
                    ->getOptionLabelFromRecordUsing(fn ($record) => $record->name)
                    ->searchable()
                    ->preload()
                    ->required(),

                TextInput::make('total_price')
                    ->label('Сумма')
                    ->numeric()
                    ->prefix('₴')
                    ->required()
                    ->minValue(0)
                    ->step(0.01),
            ]);
    }
}
