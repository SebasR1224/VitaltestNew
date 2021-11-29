<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleHasPermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Gerente
        $gerente_permissions = Permission::all();
        Role::findOrfail(1)->permissions()->sync($gerente_permissions->pluck('id'));

        //farmaceutico
        $farmaceutico_permissions = $gerente_permissions->filter(function($permission){
            return substr($permission->name, 0, 5)  != 'user_' &&
                   substr($permission->name, 0, 10)  != 'product_U_' &&
                   substr($permission->name, 0, 13) != 'laboratory_U_' &&
                   substr($permission->name, 0, 11) != 'category_U_' &&
                   substr($permission->name, 0, 10) != 'sintoma_U_' &&
                   substr($permission->name, 0, 11) != 'contrain_U_' ;

        });
        Role::findOrFail(2)->permissions()->sync($farmaceutico_permissions);

        $cliente_permissions = $gerente_permissions->filter(function($permission){
            return substr($permission->name, 0, 5)  != 'user_' &&
                   substr($permission->name, 0, 8)  != 'product_' &&
                   substr($permission->name, 0, 11) != 'laboratory_' &&
                   substr($permission->name, 0, 9) != 'category_' &&
                   substr($permission->name, 0, 8) != 'recomen_' &&
                   substr($permission->name, 0, 8) != 'sintoma_' &&
                   substr($permission->name, 0, 9) != 'contrain_' ;
        });

        Role::findOrFail(3)->permissions()->sync($cliente_permissions);
    }
}
