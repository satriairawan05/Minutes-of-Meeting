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
        //'Engginering','HSE','Coal & Berging','FAT','HRGA','IT','LOGISTIC','PLANT','PRODUCTION','PURCASHING'

        Departemen::create([
            'name' => 'Engginering'
        ]);

        Departemen::create([
            'name' => 'HSE'
        ]);

        Departemen::create([
            'name' => 'Coal & Berging'
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
            'name' => 'Logistic'
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

    }

}
