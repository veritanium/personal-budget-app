<?php

namespace Database\Seeders;

use App\Models\Budget;
use App\Models\Category;
use App\Models\Role;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();
        $adminRole = Role::create(['name' => 'admin']);
        $UserRole = Role::create(['name' => 'user']);

        $adminUser = User::factory()->create([
            'name' => 'Test Admin User',
            'email' => 'admin@example.com',
        ]);

        $user = User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

        $adminUser->roles()->attach($adminRole);
        $user->roles()->attach($UserRole);

        // Generate a budget
        $budget = Budget::factory(3)->create(['user_id' => $adminUser->id]);

        $adminUser->current_budget_id = $budget[0]->id;

        $adminUser->save();

        // create categories
        Category::factory(10)->create(['budget_id' => $budget[0]->id]);
    }
}
