<?php

use App\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        $users = [
            [
            'id'             => 1,
            'name'           => 'Admin',
            'email'          => 'admin@admin.com',
            'departemen'         => "Insan",
            'password'       => bcrypt("admin"),
            'remember_token' => null,
            'created_at'     => '2019-04-15 19:13:32',
            'updated_at'     => '2019-04-15 19:13:32',
            'deleted_at'     => null,
        ],
        [
            'id'             => 2,
            'name'           => 'Reyna P',
            'departemen'         => "Engineering",
            'email'          => 'engineering@insansandang.com',
            'password'       => bcrypt("Insan2021"),
            'remember_token' => null,
            'created_at'     => '2019-04-15 19:13:32',
            'updated_at'     => '2019-04-15 19:13:32',
            'deleted_at'     => null,
        ],
        [
            'id'             => 3,
            'name'           => 'Lia R',
            'departemen'         => "Weaving",
            'email'          => 'weaving@insansandang.com',
            'password'       => bcrypt("Insan2021"),
            'remember_token' => null,
            'created_at'     => '2019-04-15 19:13:32',
            'updated_at'     => '2019-04-15 19:13:32',
            'deleted_at'     => null,
        ],
        [
            'id'             => 4,
            'name'           => 'Asep',
            'departemen'         => "Dyeing Finishing",
            'email'          => 'finishing@insansandang.com',
            'password'       => bcrypt("Insan2021"),
            'remember_token' => null,
            'created_at'     => '2019-04-15 19:13:32',
            'updated_at'     => '2019-04-15 19:13:32',
            'deleted_at'     => null,
        ],
        [
            'id'             => 5,
            'name'           => 'Diana',
            'departemen'         => "Marketing",
            'email'          => 'marketing@insansandang.com',
            'password'       => bcrypt("Insan2021"),
            'remember_token' => null,
            'created_at'     => '2019-04-15 19:13:32',
            'updated_at'     => '2019-04-15 19:13:32',
            'deleted_at'     => null,
        ],
        [
            'id'             => 6,
            'name'           => 'Sri',
            'departemen'         => "Umum dan Personalia",
            'email'          => 'umum@insansandang.com',
            'password'       => bcrypt("Insan2021"),
            'remember_token' => null,
            'created_at'     => '2019-04-15 19:13:32',
            'updated_at'     => '2019-04-15 19:13:32',
            'deleted_at'     => null,
        ],

    ];

        User::insert($users);
    }
}
