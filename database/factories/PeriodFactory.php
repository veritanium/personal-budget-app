<?php

namespace Database\Factories;

use App\Models\Budget;
use App\Models\Period;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class PeriodFactory extends Factory
{
    protected $model = Period::class;

    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'start_date' => Carbon::now(),
            'end_date' => Carbon::now()->addMonth(),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),

            'budget_id' => Budget::factory(),
        ];
    }
}
