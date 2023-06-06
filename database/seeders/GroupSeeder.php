<?php

namespace Database\Seeders;

use App\Models\Group;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GroupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Group::create([
            'group_id' => 0,
            'group_name' => 'Super Admin'
        ]);

        Group::create([
            'group_id' => 1,
            'group_name' => 'PIC'
        ]);

        Group::create([
            'group_id' => 2,
            'group_name' => 'Member'
        ]);
    }
}
