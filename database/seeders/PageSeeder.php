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
        Page::create([
            'page_name' => 'Meeting',
            'action' => 'Create'
        ]);

        Page::create([
            'page_name' => 'Meeting',
            'action' => 'Read'
        ]);

        Page::create([
            'page_name' => 'Meeting',
            'action' => 'Update'
        ]);

        Page::create([
            'page_name' => 'Meeting',
            'action' => 'Delete'
        ]);

        Page::create([
            'page_name' => 'Issue',
            'action' => 'Create'
        ]);

        Page::create([
            'page_name' => 'Issue',
            'action' => 'Read'
        ]);

        Page::create([
            'page_name' => 'Issue',
            'action' => 'Update'
        ]);

        Page::create([
            'page_name' => 'Issue',
            'action' => 'Delete'
        ]);

        Page::create([
            'page_name' => 'Documents',
            'action' => 'Create'
        ]);

        Page::create([
            'page_name' => 'Documents',
            'action' => 'Read'
        ]);

        Page::create([
            'page_name' => 'Documents',
            'action' => 'Update'
        ]);

        Page::create([
            'page_name' => 'Documents',
            'action' => 'Delete'
        ]);

        Page::create([
            'page_name' => 'User',
            'action' => 'Create'
        ]);

        Page::create([
            'page_name' => 'User',
            'action' => 'Read'
        ]);

        Page::create([
            'page_name' => 'User',
            'action' => 'Update'
        ]);

        Page::create([
            'page_name' => 'User',
            'action' => 'Delete'
        ]);

        Page::create([
            'page_name' => 'Preferences',
            'action' => 'Create'
        ]);

        Page::create([
            'page_name' => 'Preferences',
            'action' => 'Read'
        ]);

        Page::create([
            'page_name' => 'Preferences',
            'action' => 'Update'
        ]);

        Page::create([
            'page_name' => 'Preferences',
            'action' => 'Delete'
        ]);
    }
}
