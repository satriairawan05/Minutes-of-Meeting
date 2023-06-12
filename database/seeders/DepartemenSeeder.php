<?php

namespace Database\Seeders;

use App\Models\Departemen;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DepartemenSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Departemen::create([
            'name' => 'ENGINERING'
        ]);

        Departemen::create([
            'name' => 'HSE'
        ]);

        Departemen::create([
            'name' => 'COAL & BERGING'
        ]);

        Departemen::create([
            'name' => 'FAT'
        ]);

        Departemen::create([
            'name' => 'HRGA'
        ]);

        Departemen::create([
            'name' => 'IT'
        ]);

        Departemen::create([
            'name' => 'LOGISTIC'
        ]);

        Departemen::create([
            'name' => 'PLANT'
        ]);

        Departemen::create([
            'name' => 'PRODUCTION'
        ]);

        Departemen::create([
            'name' => 'PURCASHING'
        ]);

        Departemen::create([
            'name' => 'OPERATION'
        ]);

    }

}
