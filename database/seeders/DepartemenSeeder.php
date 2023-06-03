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
            'name' => 'Departemen Engginering'
        ]);

        Departemen::create([
            'name' => 'Departemen HSE'
        ]);

        Departemen::create([
            'name' => 'Departemen Coal & Berging'
        ]);

        Departemen::create([
            'name' => 'Departemen FAT'
        ]);

        Departemen::create([
            'name' => 'Departemen HRGA'
        ]);

        Departemen::create([
            'name' => 'Departemen IT'
        ]);

        Departemen::create([
            'name' => 'Departemen Logistic'
        ]);

        Departemen::create([
            'name' => 'Departemen PLANT'
        ]);

        Departemen::create([
            'name' => 'Departemen PRODUCTION'
        ]);

        Departemen::create([
            'name' => 'Departemen PURCASHING'
        ]);

    }

}
