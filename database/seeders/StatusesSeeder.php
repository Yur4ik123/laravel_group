<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Status;

class StatusesSeeder extends Seeder
{
    public function run(): void
    {
        Status::create([
            'slug' => 'new',
            'en' => ['name' => 'New'],
            'uk' => ['name' => 'Новий'],
            'ru' => ['name' => 'Новый'],
        ]);

        Status::create([
            'slug' => 'process',
            'en' => ['name' => 'In Process'],
            'uk' => ['name' => 'В обробці'],
            'ru' => ['name' => 'В обработке'],
        ]);

        Status::create([
            'slug' => 'completed',
            'en' => ['name' => 'Completed'],
            'uk' => ['name' => 'Завершено'],
            'ru' => ['name' => 'Завершено'],
        ]);
    }
}
