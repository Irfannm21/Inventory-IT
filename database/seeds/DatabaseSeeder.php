<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call([
            PermissionsTableSeeder::class,
            RolesTableSeeder::class,
            PermissionRoleTableSeeder::class,
            UsersTableSeeder::class,
            RoleUserTableSeeder::class,
            SupplierTableSeeder::class,
            DepartementTableSeeder::class,
            BagianTableSeeder::class,
            NppTableSeeder::class,
            DetailNppTableSeeder::class,
            BpbTableSeeder::class,

        ]);
    }
}
