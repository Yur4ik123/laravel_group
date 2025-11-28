<?php

namespace App\Filament\Resources\Users\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Actions\ActionGroup;
use Filament\Tables\Table;
use Filament\Tables\Filters\Filter;
use Illuminate\Support\Facades\Auth;
use Filament\Actions\Action;


class UsersTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                    ->searchable()
                    ->sortable()
                    ->label('Имя'),
                TextColumn::make('surname')
                    ->searchable()
                    ->sortable()
                    ->label('Фамилия'),
                TextColumn::make('phone')
                    ->searchable()
                    ->label('Телефон'),
                TextColumn::make('email')
                    ->label('Email')
                    ->searchable(),
                TextColumn::make('role')
                    ->searchable()
                    ->sortable()
                    ->label('Роль'),
            ])
            ->filters([
                Filter::make('Админ')->query(fn($query) => $query->where('role', 'admin'))->label('Админ'),
                Filter::make('Пользователь сайта')->query(fn($query) => $query->where('role', 'user'))->label('Пользователь сайта'),
            ])
            ->recordActions([
                ActionGroup::make([
                    Action::make('loginAs')
                        ->icon('heroicon-o-arrow-right-on-rectangle')
                        ->color('success')
                        ->requiresConfirmation()
                        ->modalHeading('Войти как пользователь?')
                        ->modalDescription(fn($record) => "Вы войдете в систему как $record->full_name")
                        ->modalSubmitActionLabel('Войти')
                        ->action(function ($record) {
                            Auth::loginUsingId($record->id);
                            return redirect('/dashboard');
                        })
                        ->hidden(fn($record) => $record->id === Auth::id()),
                    EditAction::make(),
                    DeleteAction::make(),

                ])
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
