<?php

namespace Database\Seeders;

use App\Models\Account;
use App\Models\Budget;
use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;

class TestSeeder extends Seeder
{
    /**
     * Run the database seeds.
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

        // Generate budgets
        $budgets = Budget::factory(3)->create(['user_id' => $adminUser->id]);

        $adminUser->current_budget_id = $budgets[0]->id;

        $adminUser->save();

        // create categories
        $this->callWith(CategorySeeder::class, ['budget_id' => $budgets[0]->id]);

        // create accounts
        foreach ($budgets as $budget) {
            Account::factory(5)->create(['budget_id' => $budget->id]);
        }
    }
}
