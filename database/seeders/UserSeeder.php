<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Admin',
            'email' => 'ruizsoto1996@gmail.com',
            'password' => bcrypt('crrs1996'),
            'estado' => true,
        ])->assignRole('Admin');
        
        User::factory(0)->create();
    }
}
