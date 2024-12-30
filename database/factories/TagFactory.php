<?php

namespace Database\Factories;

use App\Models\Budget;
use App\Models\Tag;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class TagFactory extends Factory
{
    protected $model = Tag::class;

    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
            'budget_id' => Budget::factory(),
        ];
    }
}
