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
            'slug' => 'for-woman',
            'uk' => ['name' => 'Для жінок'],
            'ru' => ['name' => 'Для женщин'],
            'en' => ['name' => 'For Lady']
        ]);

        Category::create([
            'slug' => 'for-man',
            'uk' => ['name' => 'Для чоловікі'],
            'ru' => ['name' => 'Для мужчин'],
            'en' => ['name' => 'For Men']
        ]);
    }
}
