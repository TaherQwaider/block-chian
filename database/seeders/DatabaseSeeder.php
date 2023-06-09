<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        User::create([
            'name' => 'Admin',
            'email' => 'admin@info.com',
            'user_type' => 'admin',
            'password' => Hash::make('123456'),
        ]);
        User::create([
            'name' => 'User',
            'email' => 'user@info.com',
            'user_type' => 'user',
            'password' => Hash::make('123456'),
        ]);

    }
}
