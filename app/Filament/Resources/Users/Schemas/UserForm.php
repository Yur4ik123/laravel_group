<?php

namespace App\Filament\Resources\Users\Schemas;

use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;
use Filament\Schemas\Schema;

class UserForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->required()
                    ->label('Имя'),
                TextInput::make('surname')
                    ->required()
                    ->label('Фамилия'),
                TextInput::make('phone')
                    ->required()
                    ->mask('+38 (099) 999-99-99')
                    ->placeholder('+38 (099) 999-99-99')
                    ->label('Телефон'),
                TextInput::make('email')
                    ->label('Email address')
                    ->email()
                    ->required()
                    ->label('Email'),
                Select::make('role')
                    ->options([
                        'user' => 'Пользователь сайта',
                        'admin' => 'Админ',
                    ])
                    ->required()
                    ->default('user')
                ->label('Роль'),
                TextInput::make('password')
                    ->password()
                    ->revealable()
                    ->required(fn (string $operation): bool => $operation === 'create')
                    ->dehydrated(fn (?string $state): bool => filled($state))
                    ->label('Пароль')
            ]);
    }
}
