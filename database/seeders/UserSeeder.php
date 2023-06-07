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
            'password' => bcrypt('bsscoal'),
            'email_verified_at' => now(),
            'group_id' => 1,
            'departemen' => '',
            'remember_token' => Str::random(10),
        ]);

        User::create([
            'name' => 'PIC',
            'email' => 'pic@bsscoal.com',
            'password' => bcrypt('bsscoal'),
            'email_verified_at' => now(),
            'group_id' => 2,
            'departemen' => '',
            'remember_token' => Str::random(10),
        ]);

        User::create([
            'name' => 'Engginering',
            'email' => 'engginering@bsscoal.com',
            'password' => bcrypt('bsscoal'),
            'email_verified_at' => now(),
            'group_id' => 3,
            'departemen' => 'Engginering',
            'remember_token' => Str::random(10),
        ]);

        User::create([
            'name' => 'HSE',
            'email' => 'hse@bsscoal.com',
            'password' => bcrypt('bsscoal'),
            'email_verified_at' => now(),
            'group_id' => 3,
            'departemen' => 'HSE',
            'remember_token' => Str::random(10),
        ]);

        User::create([
            'name' => 'Coal & Berging',
            'email' => 'cnb@bsscoal.com',
            'password' => bcrypt('bsscoal'),
            'email_verified_at' => now(),
            'group_id' => 3,
            'departemen' => 'Coal & Berging',
            'remember_token' => Str::random(10),
        ]);

        User::create([
            'name' => 'FAT',
            'email' => 'fat@bsscoal.com',
            'password' => bcrypt('bsscoal'),
            'email_verified_at' => now(),
            'group_id' => 3,
            'departemen' => 'FAT',
            'remember_token' => Str::random(10),
        ]);

        User::create([
            'name' => 'HRGA',
            'email' => 'hrga@bsscoal.com',
            'password' => bcrypt('bsscoal'),
            'email_verified_at' => now(),
            'group_id' => 3,
            'departemen' => 'HRGA',
            'remember_token' => Str::random(10),
        ]);

        User::create([
            'name' => 'IT',
            'email' => 'it@bsscoal.com',
            'password' => bcrypt('bsscoal'),
            'email_verified_at' => now(),
            'group_id' => 3,
            'departemen' => 'IT',
            'remember_token' => Str::random(10),
        ]);

        User::create([
            'name' => 'Logistic',
            'email' => 'logistic@bsscoal.com',
            'password' => bcrypt('bsscoal'),
            'email_verified_at' => now(),
            'group_id' => 3,
            'departemen' => 'Logistic',
            'remember_token' => Str::random(10),
        ]);

        User::create([
            'name' => 'Plant',
            'email' => 'plant@bsscoal.com',
            'password' => bcrypt('bsscoal'),
            'email_verified_at' => now(),
            'group_id' => 3,
            'departemen' => 'Plant',
            'remember_token' => Str::random(10),
        ]);

        User::create([
            'name' => 'Production',
            'email' => 'production@bsscoal.com',
            'password' => bcrypt('bsscoal'),
            'email_verified_at' => now(),
            'group_id' => 3,
            'departemen' => 'Production',
            'remember_token' => Str::random(10),
        ]);

        User::create([
            'name' => 'purcashing',
            'email' => 'purcashing@bsscoal.com',
            'password' => bcrypt('bsscoal'),
            'email_verified_at' => now(),
            'group_id' => 3,
            'departemen' => 'purcashing',
            'remember_token' => Str::random(10),
        ]);
        //'Engginering','HSE','Coal & Berging','FAT','HRGA','IT','LOGISTIC','PLANT','PRODUCTION','PURCASHING'
    }
}
