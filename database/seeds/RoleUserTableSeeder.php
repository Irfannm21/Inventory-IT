<?php

use App\User;
use Illuminate\Database\Seeder;

class RoleUserTableSeeder extends Seeder
{
    public function run()
    {
        User::findOrFail(1)->roles()->sync(1);
        User::find(2)->roles()->sync(3);
        User::find(3)->roles()->sync(3);
        User::find(4)->roles()->sync(3);

    }
}
