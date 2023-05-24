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

        $basicSetting = [
            'email_verified_at' => now(),
            'remember_token' => Str::random(10),
        ];

        $superAdmin = User::create(array_merge([
            'name' => 'Super Admin',
            'email' => 'super.admin@suemerugrup.com',
            'password' => bcrypt('suemeru'),
        ],$basicSetting));

        $roleSuperAdmin = Role::create([
            'name' => 'super-admin',
            'guard_name' => 'web'
        ]);

        $superAdmin->assignRole($roleSuperAdmin);
    }
}
