<?php
namespace App\Filament\Resources\Categories\Pages;

use App\Filament\Resources\Categories\CategoryResource;
use Filament\Resources\Pages\EditRecord;

class EditCategory extends EditRecord
{
    protected static string $resource = CategoryResource::class;

    protected function mutateFormDataBeforeFill(array $data): array
    {
        $record  = $this->record;
        $locales = config('translatable.locales', ['uk', 'ru', 'en']);

        foreach ($locales as $locale) {
            $translation = $record->translate($locale, false);

            $data[$locale] = [
                'name' => $translation?->name ?? '',
            ];
        }

        return $data;
    }

    protected function mutateFormDataBeforeSave(array $data): array
    {
        return CategoryResource::prepareTranslatableData($data);
    }

    // ⬇️ ВАЖНО: ПОСЛЕ УДАЛЕНИЯ НЕ ОСТАВАТЬСЯ НА СТРАНИЦЕ
    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
