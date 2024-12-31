<?php

namespace Database\Factories;

use App\Models\Budget;
use App\Models\Entity;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class EntityFactory extends Factory
{
    protected $model = Entity::class;

    public function definition(): array
    {
        return [
            'name' => fake()->company(),
            'description' => fake()->optional(0.5)->text(),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
            'budget_id' => Budget::factory(),
        ];
    }
}
