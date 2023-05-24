<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Super Admin',
            'email' => 'admin@suemerugrup.com',
            'email_verified_at' => now(),
            'password' => bcrypt('suemeru'), // password
            'remember_token' => Str::random(10),
        ]);
    }
}
