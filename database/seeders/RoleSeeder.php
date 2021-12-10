<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role1 = Role::create(['name'=>'Admin']);
        $role2 = Role::create(['name'=>'Tecnico']);

        Permission::create(['name'=>'dash'])->syncRoles([$role1,$role2]);
        Permission::create(['name'=>'ordenes'])->syncRoles([$role1,$role2]);
        Permission::create(['name'=>'salida'])->syncRoles([$role1,$role2]);
        Permission::create(['name'=>'clientes'])->syncRoles([$role1,$role2]);
       
        Permission::create(['name'=>'empleado'])->syncRoles([$role1]);
        Permission::create(['name'=>'reportes'])->syncRoles([$role1]);
        Permission::create(['name'=>'terminados'])->syncRoles([$role1]);
        Permission::create(['name'=>'pendientes'])->syncRoles([$role1]);
        Permission::create(['name'=>'ingresos'])->syncRoles([$role1]);
        Permission::create(['name'=>'cancelados'])->syncRoles([$role1]);
        Permission::create(['name'=>'tipoequipo'])->syncRoles([$role1]);
        Permission::create(['name'=>'color'])->syncRoles([$role1]);
        Permission::create(['name'=>'marca'])->syncRoles([$role1]);



    }
}
