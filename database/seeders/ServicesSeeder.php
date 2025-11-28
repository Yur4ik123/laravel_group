<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Service;

class ServicesSeeder extends Seeder
{
    public function run(): void
    {
        $s1 = Service::create([
            'slug' => 'basic-haircut-men',
            'category' => 'men',
            'price' => 150,
            'duration_minutes' => 30,
            'active' => true,
        ]);

        $s1->translateOrNew('en')->name = 'Basic Haircut';
        $s1->translateOrNew('en')->description = 'Simple haircut';
        $s1->translateOrNew('ru')->name = 'Базовая стрижка';
        $s1->translateOrNew('ru')->description = 'Простая стрижка';
        $s1->translateOrNew('uk')->name = 'Базова стрижка';
        $s1->translateOrNew('uk')->description = 'Проста стрижка';
        $s1->save();

        // Добавь ещё несколько услуг при необходимости, либо используй фабрику:
        $s2 = Service::factory()->create(['category'=>'women']);
        $s2->translateOrNew('en')->name = 'Deluxe Haircut';
        $s2->translateOrNew('ru')->name = 'Делюкс стрижка';
        $s2->save();
    }
}
