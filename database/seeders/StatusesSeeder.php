<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Status;

class StatusesSeeder extends Seeder
{
    public function run()
    {
        Status::factory()->create([
            'slug' => 'pending',
            'name' => 'В ожидании', // или через перевод
        ]);
        Status::factory()->create([
            'slug' => 'confirmed',
            'name' => 'Подтверждено',
        ]);
        Status::factory()->create([
            'slug' => 'canceled',
            'name' => 'Отменено',
        ]);
    }
}
