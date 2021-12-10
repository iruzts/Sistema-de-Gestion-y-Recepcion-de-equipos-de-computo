<?php

namespace Database\Seeders;
use App\Models\Equipo;

use Illuminate\Database\Seeder;

class EquipoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Equipo::create(['nombre'=>'Impresora']);
        Equipo::create(['nombre'=>'Laptop']);
        Equipo::create(['nombre'=>'Mini laptop']);
        Equipo::create(['nombre'=>'Caja de CPU']);
    }
}
