<?php

namespace Database\Seeders;

use App\Models\DailyApproval;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DailyApprovalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DailyApproval::create([
            'da_id' => 1,
            'daily_id' => 1,
            'app_list_id' => 4,
            'app_by' => 'D',
            'app_date' => \Carbon\Carbon::now(),
            'app_status' => 0
        ]);

        DailyApproval::create([
            'da_id' => 2,
            'daily_id' => 1,
            'app_list_id' => 5,
            'app_by' => 'E',
            'app_date' => \Carbon\Carbon::now(),
            'app_status' => 1
        ]);
    }
}
