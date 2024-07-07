<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Role;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        Role::create([
            'nomRole' => 'Directeur'
        ]);
        Role::create([
            'nomRole' => 'Chef de projet'
        ]);
        Role::create([
            'nomRole' => 'Ouvrier'
        ]);
        Role::create([
            'nomRole' => 'Client'
        ]);
    }
}
