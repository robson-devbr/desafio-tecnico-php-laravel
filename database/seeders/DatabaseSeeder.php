<?php

namespace Database\Seeders;

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

    User::factory()->create([
      'name' => 'Test User',
      'email' => 'test@example.com',
      'password' => bcrypt('senha123'),
      'role' => 'admin',
      'cep' => '01001000',
      'street' => 'Praça da Sé',
      'number' => '100',
      'neighborhood' => 'Sé',
      'city' => 'São Paulo',
      'state' => 'SP',
    ]);
    //  php artisan migrate:fresh --seed
    }
}
