<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PiletaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //(1, 1, 10001, 'En condiciones', 1),
        DB::table('piletas')->insert(['nropileta'=>5, 'capacidad' => 10030, 'estado'=> 'Boca superior', 'activo'=>1]);
        DB::table('piletas')->insert(['nropileta'=>3, 'capacidad' => 13700, 'estado'=> 'Pasillo', 'activo'=>1]);
        DB::table('piletas')->insert(['nropileta'=>4, 'capacidad' => 16000, 'estado'=> 'ok', 'activo'=>1]);
        DB::table('piletas')->insert(['nropileta'=>6, 'capacidad' => 23000, 'estado'=> 'Oka', 'activo'=>1]);
        DB::table('piletas')->insert(['nropileta'=>2, 'capacidad' => 22224,  'estado'=>'Falta epoxy', 'activo'=>1]);
    }
}
