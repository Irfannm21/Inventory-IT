<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call([
            UsersTableSeeder::class,
            PermissionsTableSeeder::class,
            RolesTableSeeder::class,
            PermissionRoleTableSeeder::class,
            RoleUserTableSeeder::class,
            DepartementTableSeeder::class,
            BagianTableSeeder::class,
            // NppTableSeeder::class,
            // DetailNppTableSeeder::class,
            // SupplierTableSeeder::class,
            // BpbTableSeeder::class,
            // BonKeluarTableSeeder::class,
            PrinterTableSeeder::class,
            KomputerTableSeeder::class,
            DaftarBarangJaringanTableSeeder::class,
        ]);
    }
}
//
