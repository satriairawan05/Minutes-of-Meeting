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
            'email' => 'admin@bsscoal.com',
            'password' => bcrypt('suemeru'),
            'email_verified_at' => now(),
            'group_id' => 1,
            'remember_token' => Str::random(10),
        ]);

        User::create([
            'name' => 'PIC',
            'email' => 'pic@bsscoal.com',
            'password' => bcrypt('suemeru'),
            'email_verified_at' => now(),
            'group_id' => 2,
            'remember_token' => Str::random(10),
        ]);

        User::create([
            'name' => 'Member',
            'email' => 'member@bsscoal.com',
            'password' => bcrypt('suemeru'),
            'email_verified_at' => now(),
            'group_id' => 3,
            'remember_token' => Str::random(10),
        ]);
    }
}
