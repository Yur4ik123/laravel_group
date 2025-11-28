<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Status;

class StatusesSeeder extends Seeder
{
    public function run(): void
    {
        // Создаем 5 статусов с переводами
        Status::factory()->count(5)->create()->each(function ($status) {
            // добавляем перевод для каждой записи
            $status->translateOrNew('en')->name = 'Status ' . $status->id;
            $status->translateOrNew('uk')->name = 'Статус ' . $status->id;
            $status->save();
        });
    }
}
