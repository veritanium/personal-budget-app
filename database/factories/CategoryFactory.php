<?php

namespace Database\Factories;

use App\Models\Budget;
use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class CategoryFactory extends Factory
{
    protected $model = Category::class;

    protected $categories = [
        'Auto',
        'Savings',
        'Lawn',
        'Home Improvement',
        'Garage',
        'Investment',
        'Charity',
        'Gifts',
        'Business',
        'Kids',
        'Entertainment',
        'Health',
        'Nutrition',
        'Groceries',
        'Dining',
        'Education',
    ];

    public function definition(): array
    {
        return [
            'name' => fake()->randomElement($this->categories),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),

            'budget_id' => Budget::factory(),
        ];
    }
}
