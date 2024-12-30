<?php

namespace Database\Factories;

use App\Models\Budget;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Account>
 */
class AccountFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'budget_id' => Budget::factory(),
            'bank_name' => fake()->optional(0.2)->company(),
            'account_number' => fake()->optional(0.5)->randomNumber(4, true),
            'account_type' => fake()->randomElement(['checking', 'savings', 'cash']),
            'location' => fake()->optional(0.1)->address(),
        ];
    }
}
