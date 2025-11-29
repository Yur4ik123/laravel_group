<?php

namespace Database\Factories;

use App\Models\Service;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ServiceFactory extends Factory
{
    protected $model = Service::class;

    public function definition()
    {
        return [
            'images' => 'default.jpg',
            'category_id' => null,
            'slug' => Str::slug($this->faker->words(3, true)) . '-' . rand(100, 999),
            'price' => $this->faker->randomFloat(2, 10, 200),
        ];
    }

    public function configure()
    {
        return $this->afterCreating(function (Service $service) {

            foreach (['en', 'uk', 'ru'] as $locale) {
                $service->translateOrNew($locale)->name = $this->faker->sentence(3);
            }

            $service->save();
        });
    }
}

