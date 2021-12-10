<?php

namespace Database\Seeders;
use App\Models\Color;
use Illuminate\Database\Seeder;

class ColorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Color::create(['nombre'=>'Rojo']);
        Color::create(['nombre'=>'Amarillo']);
        Color::create(['nombre'=>'Azul']);
        Color::create(['nombre'=>'Negro']);
        Color::create(['nombre'=>'Verde']);
        Color::create(['nombre'=>'Blanco']);
        Color::create(['nombre'=>'Morado']);
        Color::create(['nombre'=>'Morado']);

    }
}
