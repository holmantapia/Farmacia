<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DistribuidoresSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        DB::table('distribuidores')->insert([
            ['nombre' => 'Cofarma'],
            ['nombre' => 'Empsephar'],
            ['nombre' => 'Cemefar'],
        ]);
    }
}
