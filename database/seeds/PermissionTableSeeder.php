<?php

use Illuminate\Database\Seeder;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $permissions = [
        //    'role-list',
        //    'role-create',
        //    'role-edit',
        //    'role-delete',
        //    'product-list',
        //    'product-create',
        //    'product-edit',
        //    'product-delete'
        // ]; 
        DB::table('permissions')->insert(['name' => "role-list"]);
        DB::table('permissions')->insert(['name' => "role-create"]);
        DB::table('permissions')->insert(['name' => "role-edit"]);
        DB::table('permissions')->insert(['name' => "role-delete"]);
        DB::table('permissions')->insert(['name' => "store-list"]);
        DB::table('permissions')->insert(['name' => "store-create"]);
        DB::table('permissions')->insert(['name' => "store-edit"]);
        DB::table('permissions')->insert(['name' => "store-delete"]);

        // foreach ($permissions as $permission) {
        //      DB::table('permissions')->insert(['name' => $permission]);
        // }
    }
}
