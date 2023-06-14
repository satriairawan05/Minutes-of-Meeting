<?php

namespace Database\Seeders;

use App\Models\Page;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // 1
        Page::create([
            'page_name' => 'Meeting',
            'action' => 'Create'
        ]);

        // 2
        Page::create([
            'page_name' => 'Meeting',
            'action' => 'Read'
        ]);

        // 3
        Page::create([
            'page_name' => 'Meeting',
            'action' => 'Update'
        ]);

        // 4
        Page::create([
            'page_name' => 'Meeting',
            'action' => 'Delete'
        ]);

        // 5
        Page::create([
            'page_name' => 'Issue',
            'action' => 'Approval'
        ]);

        // 6
        Page::create([
            'page_name' => 'Issue',
            'action' => 'Create'
        ]);

        // 7
        Page::create([
            'page_name' => 'Issue',
            'action' => 'Read'
        ]);

        // 8
        Page::create([
            'page_name' => 'Issue',
            'action' => 'Update'
        ]);

        // 9
        Page::create([
            'page_name' => 'Issue',
            'action' => 'Delete'
        ]);

        // 10
        Page::create([
            'page_name' => 'DWM_Report',
            'action' => 'Approval'
        ]);

        // 11
        Page::create([
            'page_name' => 'DWM_Report',
            'action' => 'Create'
        ]);

        // 12
        Page::create([
            'page_name' => 'DWM_Report',
            'action' => 'Read'
        ]);

        // 13
        Page::create([
            'page_name' => 'DWM_Report',
            'action' => 'Update'
        ]);

        // 14
        Page::create([
            'page_name' => 'DWM_Report',
            'action' => 'Delete'
        ]);

        // 15
        Page::create([
            'page_name' => 'Archives',
            'action' => 'Create'
        ]);

        // 16
        Page::create([
            'page_name' => 'Archives',
            'action' => 'Read'
        ]);

        // 17
        Page::create([
            'page_name' => 'Archives',
            'action' => 'Update'
        ]);

        // 18
        Page::create([
            'page_name' => 'Archives',
            'action' => 'Delete'
        ]);

        // 19
        Page::create([
            'page_name' => 'User',
            'action' => 'Create'
        ]);

        // 20
        Page::create([
            'page_name' => 'User',
            'action' => 'Read'
        ]);

        // 21
        Page::create([
            'page_name' => 'User',
            'action' => 'Update'
        ]);

        // 22
        Page::create([
            'page_name' => 'User',
            'action' => 'Delete'
        ]);
    }
}
