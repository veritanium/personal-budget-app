<?php

namespace Database\Factories;

use App\Models\Budget;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class BudgetFactory extends Factory
{
    protected $model = budget::class;

    public function definition(): array
    {
        return [
            'name' => fake()->company(),
            'description' => fake()->paragraph(),
            'user' => User::factory(),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
    }
}
