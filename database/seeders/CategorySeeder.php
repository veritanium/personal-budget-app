<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    protected $categories = [
        'Auto',
        'Business',
        'Charity',
        'Clothing',
        'Education',
        'Debt Repayment',
        'Dining',
        'Emergency Fund',
        'Entertainment',
        'Exercise/Fitness',
        'Food Storage',
        'Fuel',
        'Gifts',
        'Groceries',
        'Health/Nutrition',
        'Hobby',
        'Home Improvement',
        'Insurance',
        'Investment',
        'Kids',
        'Mortgage',
        'Other',
        'Savings',
        'Taxes',
        'Utility',
    ];
    public function run($budget_id): void
    {
        foreach ($this->categories as $category) {
            Category::factory()->create(['budget_id' => $budget_id, 'name' => $category]);
        }
    }

}
