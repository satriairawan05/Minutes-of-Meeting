<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        User::create([
            'name' => 'Super Admin',
            'email' => 'super.admin@suemerugrup.com',
            'password' => bcrypt('suemeru'),
            'email_verified_at' => now(),
            'group_id' => 1,
            'remember_token' => Str::random(10),
        ]);

        User::create([
            'name' => 'Direksi',
            'email' => 'direksi@suemerugrup.com',
            'password' => bcrypt('suemeru'),
            'email_verified_at' => now(),
            'group_id' => 2,
            'remember_token' => Str::random(10),
        ]);

        User::create([
            'name' => 'Member',
            'email' => 'member@suemerugrup.com',
            'password' => bcrypt('suemeru'),
            'email_verified_at' => now(),
            'group_id' => 3,
            'remember_token' => Str::random(10),
        ]);
    }
}
