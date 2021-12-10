<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(RoleSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(EquipoSeeder::class);
        $this->call(MarcaSeeder::class);
        $this->call(ColorSeeder::class);

        // \App\Models\User::factory(10)->create();
    }
}
