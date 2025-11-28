<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Service;

class ServiceFactory extends Factory
{
    protected $model = Service::class;

    public function definition(): array
    {
        return [
            'slug' => $this->faker->unique()->slug,
            'category' => $this->faker->randomElement(['men','women']),
            'price' => $this->faker->numberBetween(50,500),
            'duration_minutes' => $this->faker->randomElement([30,45,60]),
            'active' => true,
        ];
    }
}
