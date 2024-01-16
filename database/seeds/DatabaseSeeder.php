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
            DepartementTableSeeder::class,
            BagianTableSeeder::class,
            NppTableSeeder::class,
            DetailNppTableSeeder::class,
            SupplierTableSeeder::class,
            BpbTableSeeder::class,
            PrinterTableSeeder::class,
            KomputerTableSeeder::class,
            DaftarBarangJaringanTableSeeder::class,
        ]);
    }
}
//
