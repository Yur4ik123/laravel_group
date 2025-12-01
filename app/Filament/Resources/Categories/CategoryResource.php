<?php

namespace App\Filament\Resources\Categories;

use App\Models\Category;
use Filament\Forms;
use Filament\Schemas\Schema;
use Filament\Schemas\Components\Tabs;
use Filament\Schemas\Components\Tabs\Tab;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Support\Str;

class CategoryResource extends Resource
{
    protected static ?string $model = Category::class;
    protected static ?string $recordTitleAttribute = 'name';
    protected static string|null|\BackedEnum $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $navigationLabel = 'Категории';
    protected static ?string $pluralLabel = 'Категории';

    public static function form(Schema $schema): Schema
    {
        $locales    = config('translatable.locales', ['uk', 'ru', 'en']);
        $mainLocale = config('app.fallback_locale', $locales[0] ?? 'uk');

        $tabs = [];

        foreach ($locales as $locale) {
            $label = match ($locale) {
                'uk' => 'Українська',
                'ru' => 'Русский',
                'en' => 'English',
                default => strtoupper($locale),
            };

            $tabs[] = Tab::make($label)
                ->schema([
                    Forms\Components\TextInput::make("$locale.name")
                        ->label("Название ($locale)")
                        ->required($mainLocale === $locale)
                        ->live(onBlur: true)
                        ->afterStateUpdated(
                            function ($state, $set, $get) use ($mainLocale, $locale) {
                                if ($mainLocale === $locale && empty($get('slug')) && !empty($state)) {
                                    $set('slug', Str::slug($state));
                                }
                            }
                        ),
                ]);
        }

        return $schema->schema([
            Forms\Components\TextInput::make('slug')
                ->label('Slug')
                ->required()
                ->maxLength(255),

            Tabs::make('Переводы')
                ->tabs($tabs)
                ->columnSpanFull(),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('id')->label('ID')->sortable(),
                Tables\Columns\TextColumn::make('name')->label('Название')->sortable()->searchable(),
                Tables\Columns\TextColumn::make('slug')->label('Slug')->sortable()->searchable(),
                Tables\Columns\TextColumn::make('created_at')->label('Создано')->dateTime(),
                Tables\Columns\TextColumn::make('updated_at')->label('Обновлено')->dateTime(),
            ])
            ->recordActions([
                \Filament\Actions\EditAction::make(),
                \Filament\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                \Filament\Actions\DeleteBulkAction::make(),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index'  => Pages\ListCategories::route('/'),
            'create' => Pages\CreateCategory::route('/create'),
            'edit'   => Pages\EditCategory::route('/{record}/edit'),
        ];
    }
    public static function prepareTranslatableData(array $data): array
    {
        $locales = config('translatable.locales', ['uk', 'ru', 'en']);

        foreach ($locales as $locale) {

            if (! isset($data[$locale]) || ! is_array($data[$locale])) {
                unset($data[$locale]);
                continue;
            }

            $name = trim($data[$locale]['name'] ?? '');

            if ($name === '') {
                unset($data[$locale]);
                continue;
            }

            $data[$locale] = [
                'name' => $name,
            ];
        }

        return $data;
    }

}
