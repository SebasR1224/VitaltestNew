<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = [
            'user_index',
            'user_permission',
            'user_import_excel',
            'user_create',
            'user_export_excel',
            'user_export_pdf',
            'user_status',
            'user_show',
            'user_edit',

            'product_index',
            'product_config',
            'product_U_import_excel',
            'product_create',
            'product_U_export_excel',
            'product_U_export_pdf',
            'product_status',
            'product_show',
            'product_edit',
            'product_price',


            'laboratory_create',
            'laboratory_edit',
            'laboratory_U_delete',

            'category_create',
            'category_edit',
            'category_U_delete',

            'recomen_index',
            'recomen_config',
            'recomen_create',
            'recomen_status',
            'recomen_show',
            'recomen_edit',

            'sintoma_create',
            'sintoma_edit',
            'sintoma_U_delete',

            'contrain_create',
            'contrain_edit',
            'contrain_U_delete',

            'oferta_index',
            'oferta_category',
            'oferta_sales',

            'chat',

            'test'
        ];
        foreach ($permissions as $permission){
            Permission::create([
               'name' => $permission
            ]);
        }
    }
}
