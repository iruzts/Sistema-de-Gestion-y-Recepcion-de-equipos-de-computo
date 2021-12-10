<?php

namespace Database\Seeders;
use App\Models\Marca;
use Illuminate\Database\Seeder;

class MarcaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Marca::create(['nombre'=>'EPSON']);
        Marca::create(['nombre'=>'hp']);
        Marca::create(['nombre'=>'Canon']);
        Marca::create(['nombre'=>'brother']);
        Marca::create(['nombre'=>'XEROX']);
        Marca::create(['nombre'=>'Lenovo']);
        Marca::create(['nombre'=>'Acer']);
        Marca::create(['nombre'=>'Apple']);
        Marca::create(['nombre'=>'Alienware']);
        Marca::create(['nombre'=>'Toshiba']);
        Marca::create(['nombre'=>'Dell']);
        Marca::create(['nombre'=>'Asus']);
        Marca::create(['nombre'=>'Samsung']);
        Marca::create(['nombre'=>'Gateway']);
        Marca::create(['nombre'=>'MSI']);
        Marca::create(['nombre'=>'MAC']);
    }
}
