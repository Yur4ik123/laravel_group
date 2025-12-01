<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Category::create([
            'slug' => 'she',
            'uk' => ['name' => 'Для жіное'],
            'ru' => ['name' => 'Для женщин'],
            'en' => ['name' => 'For Lady']
        ]);

        Category::create([
            'slug' => 'He',
            'uk' => ['name' => 'Для чоловікі'],
            'ru' => ['name' => 'Для мужчин'],
            'en' => ['name' => 'For Men']
        ]);
    }
}
