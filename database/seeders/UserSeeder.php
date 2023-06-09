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
            'email' => 'admin@bss.com',
            'password' => bcrypt('bss'),
            'email_verified_at' => now(),
            'group_id' => 1,
            'departemen' => '',
            'remember_token' => Str::random(10),
        ]);

        User::create([
            'name' => 'PIC',
            'email' => 'pic@bss.com',
            'password' => bcrypt('bss'),
            'email_verified_at' => now(),
            'group_id' => 2,
            'departemen' => '',
            'remember_token' => Str::random(10),
        ]);

        User::create([
            'name' => 'Engginering',
            'email' => 'engginering@bss.com',
            'password' => bcrypt('bss'),
            'email_verified_at' => now(),
            'group_id' => 3,
            'departemen' => 'Engginering',
            'remember_token' => Str::random(10),
        ]);

        User::create([
            'name' => 'HSE',
            'email' => 'hse@bss.com',
            'password' => bcrypt('bss'),
            'email_verified_at' => now(),
            'group_id' => 3,
            'departemen' => 'HSE',
            'remember_token' => Str::random(10),
        ]);

        User::create([
            'name' => ' & Berging',
            'email' => 'cnb@bss.com',
            'password' => bcrypt('bss'),
            'email_verified_at' => now(),
            'group_id' => 3,
            'departemen' => ' & Berging',
            'remember_token' => Str::random(10),
        ]);

        User::create([
            'name' => 'FAT',
            'email' => 'fat@bss.com',
            'password' => bcrypt('bss'),
            'email_verified_at' => now(),
            'group_id' => 3,
            'departemen' => 'FAT',
            'remember_token' => Str::random(10),
        ]);

        User::create([
            'name' => 'HRGA',
            'email' => 'hrga@bss.com',
            'password' => bcrypt('bss'),
            'email_verified_at' => now(),
            'group_id' => 3,
            'departemen' => 'HRGA',
            'remember_token' => Str::random(10),
        ]);

        User::create([
            'name' => 'IT',
            'email' => 'it@bss.com',
            'password' => bcrypt('bss'),
            'email_verified_at' => now(),
            'group_id' => 3,
            'departemen' => 'IT',
            'remember_token' => Str::random(10),
        ]);

        User::create([
            'name' => 'Logistic',
            'email' => 'logistic@bss.com',
            'password' => bcrypt('bss'),
            'email_verified_at' => now(),
            'group_id' => 3,
            'departemen' => 'Logistic',
            'remember_token' => Str::random(10),
        ]);

        User::create([
            'name' => 'PLANT',
            'email' => 'plant@bss.com',
            'password' => bcrypt('bss'),
            'email_verified_at' => now(),
            'group_id' => 3,
            'departemen' => 'PLANT',
            'remember_token' => Str::random(10),
        ]);

        User::create([
            'name' => 'PRODUCTION',
            'email' => 'production@bss.com',
            'password' => bcrypt('bss'),
            'email_verified_at' => now(),
            'group_id' => 3,
            'departemen' => 'PRODUCTION',
            'remember_token' => Str::random(10),
        ]);

        User::create([
            'name' => 'PURCASHING',
            'email' => 'purcashing@bss.com',
            'password' => bcrypt('bss'),
            'email_verified_at' => now(),
            'group_id' => 3,
            'departemen' => 'PURCASHING',
            'remember_token' => Str::random(10),
        ]);
        //'Engginering','HSE',' & Berging','FAT','HRGA','IT','LOGISTIC','PLANT','PRODUCTION','PURCASHING'
    }
}
