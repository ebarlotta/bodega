<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AlmacenSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('almacens')->insert(['descripcion' => 'Bodega','activo' => 1,]);
        DB::table('almacens')->insert(['descripcion' => 'Almacen','activo' => 1,]);
    }
}
