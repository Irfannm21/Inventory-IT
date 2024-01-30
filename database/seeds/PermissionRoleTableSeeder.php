<?php

use App\Permission;
use App\Role;
use Illuminate\Database\Seeder;

class PermissionRoleTableSeeder extends Seeder
{
    public function run()
    {
        $admin_permissions = Permission::all();
        Role::findOrFail(1)->permissions()->sync($admin_permissions->pluck('id'));
        $user_permissions = $admin_permissions->filter(function ($permission) {
            return substr($permission->title, 0, 5) != 'user_' && substr($permission->title, 0, 5) != 'role_' && substr($permission->title, 0, 11) != 'permission_';
        });
        Role::findOrFail(2)->permissions()->sync($user_permissions);

        $administrasi_permission = Permission::whereIn('id',[22,23,24,25,26])->get();
        Role::findOrFail(3)->permissions()->sync($administrasi_permission->pluck('id'));

        $inventori_sp = Permission::whereIn('id',[31,32,33,34,35,36,37,38,39,40])->get();
        Role::findOrFail(4)->permissions()->sync($inventori_sp->pluck('id'));

    }
}
