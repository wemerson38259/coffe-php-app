<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class TodoFactory extends Factory
{
    public function definition(): array
    {
        return [
            'description' => fake()->sentences(),
            'done' => fake()->boolean(),
        ];
    }
}
