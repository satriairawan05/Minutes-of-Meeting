<?php

namespace Database\Seeders;

use App\Models\ApprovalList;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ApprovalListSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ApprovalList::create([
            'app_list_id' => 1,
            'app_module' => 'Issue',
            'app_ordinal' => 1,
            'app_pic' => 'A',
            'app_closing' => 1
        ]);

        ApprovalList::create([
            'app_list_id' => 2,
            'app_module' => 'Issue',
            'app_ordinal' => 2,
            'app_pic' => 'B',
            'app_closing' => 0
        ]);

        ApprovalList::create([
            'app_list_id' => 3,
            'app_module' => 'Issue',
            'app_ordinal' => 3,
            'app_pic' => 'C',
            'app_closing' => 0
        ]);

        ApprovalList::create([
            'app_list_id' => 4,
            'app_module' => 'DWM_Report',
            'app_ordinal' => 1,
            'app_pic' => 'D',
            'app_closing' => 1
        ]);

        ApprovalList::create([
            'app_list_id' => 5,
            'app_module' => 'DWM_Report',
            'app_ordinal' => 2,
            'app_pic' => 'E',
            'app_closing' => 0
        ]);
    }
}
