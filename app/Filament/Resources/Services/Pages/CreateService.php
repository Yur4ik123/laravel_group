<?php

namespace App\Filament\Resources\Services\Pages;

use App\Filament\Resources\Services\ServiceResource;
use Filament\Resources\Pages\CreateRecord;

class CreateService extends CreateRecord
{
    protected static string $resource = ServiceResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $locales = config('translatable.locales');

        foreach ($locales as $locale) {
            if (isset($data[$locale])) {
                unset($data[$locale]); // Видаляємо, бо обробимо після створення
            }
        }

        return $data;
    }

    protected function afterCreate(): void
    {
        $data = $this->form->getState();
        $locales = config('translatable.locales');

        foreach ($locales as $locale) {
            if (isset($data[$locale])) {
                foreach ($data[$locale] as $field => $value) {
                    $this->record->translateOrNew($locale)->$field = $value;
                }
            }
        }

        $this->record->save();
    }
}
