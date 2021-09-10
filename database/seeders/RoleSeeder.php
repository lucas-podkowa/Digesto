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
        $role1 = Role::create(['name' => 'Administrador']);
        $role2 = Role::create(['name' => 'Ayudante']);
        $role3 = Role::create(['name' => 'Publico']);

        Permission::create(['name' => 'home'])->syncRoles([$role1, $role2, $role3]);
        Permission::create(['name' => 'digesto.index'])->syncRoles([$role1, $role2, $role3]);

        Permission::create(['name' => 'documentos.nuevo'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'documentos.guardar'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'documentos.editar'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'documentos.actualizar'])->syncRoles([$role1, $role2]);

        Permission::create(['name' => 'usuarios.listar'])->syncRoles([$role1]);
        Permission::create(['name' => 'usuarios.editar'])->syncRoles([$role1]);
        Permission::create(['name' => 'usuarios.actualizar'])->syncRoles([$role1]);

        //Permission::create(['name' => 'digesto.index'])->syncRoles([$role1, $role2]);
    }
}
