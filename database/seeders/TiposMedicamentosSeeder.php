<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TiposMedicamentosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        DB::table('tipos_medicamentos')->insert([
            ['nombre' => 'analgésico'],
            ['nombre' => 'analéptico'],
            ['nombre' => 'anestésico'],
            ['nombre' => 'antiácido'],
            ['nombre' => 'antidepresivo'],
            ['nombre' => 'antibiótico'],
        ]);
    }
}
