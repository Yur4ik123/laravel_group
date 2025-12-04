<?php

namespace App\Filament\Resources\Services\Pages;

use App\Filament\Resources\Services\ServiceResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditService extends EditRecord
{
    protected static string $resource = ServiceResource::class;

    protected function mutateFormDataBeforeFill(array $data): array
    {
        $locales = config('translatable.locales');

        foreach ($locales as $locale) {
            $translation = $this->record->translate($locale);
            if ($translation) {
                $data[$locale] = $translation->only(['name']);
            }
        }

        return $data;
    }

    protected function mutateFormDataBeforeSave(array $data): array
    {
        $locales = config('translatable.locales');

        foreach ($locales as $locale) {
            if (isset($data[$locale])) {
                foreach ($data[$locale] as $field => $value) {
                    $this->record->translateOrNew($locale)->$field = $value;
                }
                unset($data[$locale]);
            }
        }

        $this->record->save();

        return $data;
    }

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
