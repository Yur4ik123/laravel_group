<?php
namespace App\Filament\Forms\Components;

use Filament\Schemas\Components\Tabs;

class TranslatableFields
{
    protected string $view = 'forms.components.translatable-fields';

    public static function make(array $schema): Tabs
    {
        $locales = config('translatable.locales');

        $tabs = [];

        foreach ($locales as $locale) {
            $localizedSchema = [];

            foreach ($schema as $field) {
                // Отримуємо оригінальну назву поля
                $originalName = $field->getName();

                // Створюємо нове поле (не клонуємо!)
                $fieldClass = get_class($field);
                $newField = $fieldClass::make("{$locale}.{$originalName}")
                    ->label($field->getLabel());

                // Копіюємо інші властивості якщо потрібно
                if ($field->isRequired()) {
                    $newField->required();
                }

                $localizedSchema[] = $newField;
            }

            $tabs[] = Tabs\Tab::make(strtoupper($locale))
                ->schema($localizedSchema);
        }

        return Tabs::make('Translations')->tabs($tabs);
    }
}
