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
            'action' => 'Create'
        ]);

        // 6
        Page::create([
            'page_name' => 'Issue',
            'action' => 'Read'
        ]);

        // 7
        Page::create([
            'page_name' => 'Issue',
            'action' => 'Update'
        ]);

        // 8
        Page::create([
            'page_name' => 'Issue',
            'action' => 'Delete'
        ]);

        // 9
        Page::create([
            'page_name' => 'Documents',
            'action' => 'Create'
        ]);

        // 10
        Page::create([
            'page_name' => 'Documents',
            'action' => 'Read'
        ]);

        // 11
        Page::create([
            'page_name' => 'Documents',
            'action' => 'Update'
        ]);

        // 12
        Page::create([
            'page_name' => 'Documents',
            'action' => 'Delete'
        ]);

        // 13
        Page::create([
            'page_name' => 'User',
            'action' => 'Create'
        ]);

        // 14
        Page::create([
            'page_name' => 'User',
            'action' => 'Read'
        ]);

        // 15
        Page::create([
            'page_name' => 'User',
            'action' => 'Update'
        ]);

        // 16
        Page::create([
            'page_name' => 'User',
            'action' => 'Delete'
        ]);
    }
}
