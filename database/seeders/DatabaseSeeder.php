<?php

namespace Database\Seeders;

use App\Models\evento;
use App\Models\participantes;
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

        participantes::factory(32)->create();
    }
}
