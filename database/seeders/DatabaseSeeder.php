<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use Illuminate\Database\Seeder;
use Database\Seeders\PageSeeder;
use Database\Seeders\UserSeeder;
use Database\Seeders\GroupSeeder;
use Database\Seeders\GroupPageSeeder;
use Database\Seeders\DepartemenSeeder;
use Database\Seeders\ApprovalListSeeder;
use Database\Seeders\DailyApprovalSeeder;
use Database\Seeders\IssueApprovalSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $this->call([
            UserSeeder::class,
            GroupSeeder::class,
            PageSeeder::class,
            GroupPageSeeder::class,
            DepartemenSeeder::class,
            ApprovalListSeeder::class,
            DailyApprovalSeeder::class,
            IssueApprovalSeeder::class
        ]);
    }
}
