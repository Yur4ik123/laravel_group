<?php

namespace App\Filament\Resources\Bookings\Schemas;

use App\Models\Booking;
use App\Models\Service;
use App\Models\Slot;
use App\Models\User;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Components\Utilities\Get;
use Filament\Schemas\Components\Utilities\Set;
use Filament\Schemas\Schema;

class BookingForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Информация о клиенте')
                    ->schema([
                        Select::make('user_id')
                            ->label('Пользователи')
                            ->relationship('user', 'name')
                            ->getOptionLabelFromRecordUsing(fn ($record) => $record->name.' '.$record->surname.' ('.$record->email.')')
                            ->preload()
                            ->searchable()
                            ->nullable()
                            ->live()
                            ->afterStateUpdated(function (Set $set, ?string $state) {
                                if ($state) {
                                    $user = User::find($state);
                                    if ($user) {
                                        $set('name', $user->name);
                                        $set('surname', $user->surname);
                                        $set('email', $user->email);
                                        $set('phone', $user->phone);
                                    }
                                } else {
                                    $set('name', null);
                                    $set('surname', null);
                                    $set('email', null);
                                    $set('phone', null);
                                }
                            }),

                        TextInput::make('name')
                            ->label('Имя')
                            ->required()
                            ->maxLength(255),

                        TextInput::make('surname')
                            ->label('Фамилия')
                            ->nullable()
                            ->maxLength(255),

                        TextInput::make('email')
                            ->label('Email')
                            ->email()
                            ->required()
                            ->maxLength(255),

                        TextInput::make('phone')
                            ->label('Телефон')
                            ->mask('+38 (999) 999-99-99')
                            ->placeholder('+38 (050) 123-45-67')
                            ->required()
                            ->maxLength(255),
                    ])->columns(2),

                Section::make('Детали бронирования')
                    ->schema([
                        Select::make('service_id')
                            ->label('Услуга')
                            ->relationship('service', 'id')
                            ->getOptionLabelFromRecordUsing(fn ($record) => $record->name)
                            ->searchable()
                            ->preload()
                            ->required()
                            ->live()
                            ->afterStateUpdated(function (Set $set, ?string $state) {
                                $set('slot_id', null);

                                if ($state) {
                                    $service = Service::find($state);
                                    if ($service) {
                                        $set('total_price', $service->price);
                                    }
                                } else {
                                    $set('total_price', null);
                                }
                            }),

                        DatePicker::make('date')
                            ->label('Дата бронирования')
                            ->required()
                            ->native(false)
                            ->minDate(now()->addDay())
                            ->live()
                            ->afterStateUpdated(function (Set $set) {
                                $set('slot_id', null);
                            })
                            ->disabledDates(function () {
                                $disabledDates = [];
                                $startDate = now()->addDay();
                                $endDate = now()->addYear();

                                for ($date = $startDate->copy(); $date->lte($endDate); $date->addDay()) {
                                    if ($date->isWeekend()) {
                                        $disabledDates[] = $date->format('Y-m-d');
                                    }
                                }

                                return $disabledDates;
                            }),

                        Select::make('slot_id')
                            ->label('Время')
                            ->relationship('slot', 'slot')
                            ->getOptionLabelFromRecordUsing(fn ($record) => $record->slot)
                            ->options(function (Get $get) {
                                $date = $get('date');
                                $serviceId = $get('service_id');

                                if (! $date || ! $serviceId) {
                                    return Slot::all()->pluck('slot', 'id');
                                }

                                return Slot::all()->filter(function ($slot) use ($date, $serviceId) {
                                    $isBooked = Booking::where('slot_id', $slot->id)
                                        ->where('date', $date)
                                        ->where('service_id', $serviceId)
                                        ->exists();

                                    return ! $isBooked;
                                })->pluck('slot', 'id');
                            })
                            ->searchable()
                            ->required()
                            ->live()
                            ->disabled(fn (Get $get) => ! $get('date') || ! $get('service_id'))
                            ->helperText(fn (Get $get) => ! $get('date') || ! $get('service_id')
                                ? 'Сначала выберите услугу и дату'
                                : null),

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
                            ->disabled()
                            ->dehydrated()
                            ->minValue(0)
                            ->step(0.01),

                        Textarea::make('comment')
                            ->label('Комментарий')
                            ->nullable()
                            ->maxLength(255)
                            ->columnSpanFull(),
                    ])->columns(2),
            ])->columns(1);
    }
}
