<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SucursalesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        DB::table('sucursales')->insert([
            ['nombre' => 'Sucursal Principal', 'direccion' => 'Calle de la Rosa n. 28'],
            ['nombre' => 'Sucursal Secundaria', 'direccion' => 'Calle Alcazabilla n. 3'],
        ]);        
    }
}
