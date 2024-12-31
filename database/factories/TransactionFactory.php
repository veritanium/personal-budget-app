<?php

namespace Database\Factories;

use App\Models\Account;
use App\Models\Budget;
use App\Models\Category;
use App\Models\Entity;
use App\Models\transaction;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class TransactionFactory extends Factory
{
    protected $model = Transaction::class;

    public function definition(): array
    {
        return [
            'title' => fake()->word(),
            'description' => fake()->sentence(),
            'type' => fake()->randomElement(['debit', 'credit']),
            'amount' => fake()->randomNumber(),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
            'budget_id' => Budget::factory(),
            'account_id' => Account::factory(),
            'category_id' => Category::factory(),
            'entity_id' => Entity::factory(),
        ];
    }
}
