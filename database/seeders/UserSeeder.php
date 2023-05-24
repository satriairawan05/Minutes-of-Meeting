<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Super Admin',
            'email' => 'superadmin.suemeru@gmail.com',
            'email_verified_at' => now(),
            'password' => bcrypt('suemeru'), // password
            'remember_token' => Str::random(10),
        ]);
    }
}
