<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UnidadSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('unidads')->insert(['descripcion' => 'Kilogramos', 'signo' => 'Kgs']);
        DB::table('unidads')->insert(['descripcion' => 'Litros', 'signo' => 'Lts']);
        
    }
}
