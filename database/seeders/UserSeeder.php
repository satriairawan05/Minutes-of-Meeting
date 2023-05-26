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

        $superAdmin = User::create([
            'name' => 'Super Admin',
            'email' => 'super.admin@suemerugrup.com',
            'password' => bcrypt('suemeru'),
            'email_verified_at' => now(),
            'remember_token' => Str::random(10),
        ]);

        $teamNine = User::create([
            'name' => 'Team 9',
            'email' => 'team9@suemerugrup.com',
            'password' => bcrypt('suemeru'),
            'email_verified_at' => now(),
            'remember_token' => Str::random(10),
        ]);

        $member = User::create([
            'name' => 'Member',
            'email' => 'member@suemerugrup.com',
            'password' => bcrypt('suemeru'),
            'email_verified_at' => now(),
            'remember_token' => Str::random(10),
        ]);

        $roleSuperAdmin = Role::create([
            'name' => 'super-admin',
            'guard_name' => 'web'
        ]);

        $roleTeamNine = Role::create([
            'name' => 'team-nine',
            'guard_name' => 'web'
        ]);

        $roleMember = Role::create([
            'name' => 'member',
            'guard_name' => 'web'
        ]);

        $superAdmin->assignRole($roleSuperAdmin);
        $teamNine->assignRole($roleTeamNine);
        $member->assignRole($roleMember);
    }
}
