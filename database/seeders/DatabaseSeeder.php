<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::insert([
            'name' => 'kubo',
            'email' => 'kubo@ex.co  ',
            'password' => Hash::make(121212),
            'phone' => '01823128332',
            // 'role' => '',
        ]);
    }
}
