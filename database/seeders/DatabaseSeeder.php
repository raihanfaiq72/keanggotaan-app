<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        \App\Models\UsersModel::factory(10)->create();

        \App\Models\UsersModel::factory()->create([
            'username'  => 'Test User',
            'nama_lengkap' => 'test@example.com',
            'password'  => 'katasandi',
            'katasandi' => 'katasandi'
        ]);
    }
}
