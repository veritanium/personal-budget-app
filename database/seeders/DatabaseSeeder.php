<?php

namespace Database\Seeders;

use App\Models\Budget;
use App\Models\Role;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Env;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // create default roles
        $adminRole = Role::create(['name' => 'admin']);
        Role::create(['name' => 'user']);

        // Default user and role from .env
        $defaultUser = User::factory()->create([
            'name' => Env::get('DEFAULT_USER_NAME', 'Default User'),
            'email' => Env::get('DEFAULT_USER_EMAIL', 'default@default.com'),
            'password' => bcrypt(Env::get('DEFAULT_USER_PASSWORD', 'password')),
        ]);

        $defaultUser->roles()->attach($adminRole);

        // Generate a budget
        $budget = Budget::factory()->create([
            'user_id' => $defaultUser->id,
            'name' => 'Family Budget'
        ]);

        $defaultUser->current_budget_id = $budget->id;

        $defaultUser->save();

        // create categories
        $this->callWith(CategorySeeder::class, ['budget_id' => $budget->id]);
    }
}
