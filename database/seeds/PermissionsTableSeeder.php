<?php

use App\Permission;
use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    public function run()
    {
        $permissions = [
        //     [
        //     'id'         => '1',
        //     'title'      => 'user_management_access',
        //     'created_at' => '2019-04-15 19:14:42',
        //     'updated_at' => '2019-04-15 19:14:42',
        // ],
        //     [
        //         'id'         => '2',
        //         'title'      => 'permission_create',
        //         'created_at' => '2019-04-15 19:14:42',
        //         'updated_at' => '2019-04-15 19:14:42',
        //     ],
        //     [
        //         'id'         => '3',
        //         'title'      => 'permission_edit',
        //         'created_at' => '2019-04-15 19:14:42',
        //         'updated_at' => '2019-04-15 19:14:42',
        //     ],
        //     [
        //         'id'         => '4',
        //         'title'      => 'permission_show',
        //         'created_at' => '2019-04-15 19:14:42',
        //         'updated_at' => '2019-04-15 19:14:42',
        //     ],
        //     [
        //         'id'         => '5',
        //         'title'      => 'permission_delete',
        //         'created_at' => '2019-04-15 19:14:42',
        //         'updated_at' => '2019-04-15 19:14:42',
        //     ],
        //     [
        //         'id'         => '6',
        //         'title'      => 'permission_access',
        //         'created_at' => '2019-04-15 19:14:42',
        //         'updated_at' => '2019-04-15 19:14:42',
        //     ],
        //     [
        //         'id'         => '7',
        //         'title'      => 'role_create',
        //         'created_at' => '2019-04-15 19:14:42',
        //         'updated_at' => '2019-04-15 19:14:42',
        //     ],
        //     [
        //         'id'         => '8',
        //         'title'      => 'role_edit',
        //         'created_at' => '2019-04-15 19:14:42',
        //         'updated_at' => '2019-04-15 19:14:42',
        //     ],
        //     [
        //         'id'         => '9',
        //         'title'      => 'role_show',
        //         'created_at' => '2019-04-15 19:14:42',
        //         'updated_at' => '2019-04-15 19:14:42',
        //     ],
        //     [
        //         'id'         => '10',
        //         'title'      => 'role_delete',
        //         'created_at' => '2019-04-15 19:14:42',
        //         'updated_at' => '2019-04-15 19:14:42',
        //     ],
        //     [
        //         'id'         => '11',
        //         'title'      => 'role_access',
        //         'created_at' => '2019-04-15 19:14:42',
        //         'updated_at' => '2019-04-15 19:14:42',
        //     ],
        //     [
        //         'id'         => '12',
        //         'title'      => 'user_create',
        //         'created_at' => '2019-04-15 19:14:42',
        //         'updated_at' => '2019-04-15 19:14:42',
        //     ],
        //     [
        //         'id'         => '13',
        //         'title'      => 'user_edit',
        //         'created_at' => '2019-04-15 19:14:42',
        //         'updated_at' => '2019-04-15 19:14:42',
        //     ],
        //     [
        //         'id'         => '14',
        //         'title'      => 'user_show',
        //         'created_at' => '2019-04-15 19:14:42',
        //         'updated_at' => '2019-04-15 19:14:42',
        //     ],
        //     [
        //         'id'         => '15',
        //         'title'      => 'user_delete',
        //         'created_at' => '2019-04-15 19:14:42',
        //         'updated_at' => '2019-04-15 19:14:42',
        //     ],
        //     [
        //         'id'         => '16',
        //         'title'      => 'user_access',
        //         'created_at' => '2019-04-15 19:14:42',
        //         'updated_at' => '2019-04-15 19:14:42',
        //     ],
        //     [
        //         'id'         => '17',
        //         'title'      => 'product_create',
        //         'created_at' => '2019-04-15 19:14:42',
        //         'updated_at' => '2019-04-15 19:14:42',
        //     ],
        //     [
        //         'id'         => '18',
        //         'title'      => 'product_edit',
        //         'created_at' => '2019-04-15 19:14:42',
        //         'updated_at' => '2019-04-15 19:14:42',
        //     ],
        //     [
        //         'id'         => '19',
        //         'title'      => 'product_show',
        //         'created_at' => '2019-04-15 19:14:42',
        //         'updated_at' => '2019-04-15 19:14:42',
        //     ],
        //     [
        //         'id'         => '20',
        //         'title'      => 'product_delete',
        //         'created_at' => '2019-04-15 19:14:42',
        //         'updated_at' => '2019-04-15 19:14:42',
        //     ],
        //     [
        //         'id'         => '21',
        //         'title'      => 'product_access',
        //         'created_at' => '2019-04-15 19:14:42',
        //         'updated_at' => '2019-04-15 19:14:42',
        //     ],
        //     [
        //         'id'         => '22',
        //         'title'      => 'npp_create',
        //         'created_at' => '2019-04-15 19:14:42',
        //         'updated_at' => '2019-04-15 19:14:42',
        //     ],
        //     [
        //         'id'         => '23',
        //         'title'      => 'npp_edit',
        //         'created_at' => '2019-04-15 19:14:42',
        //         'updated_at' => '2019-04-15 19:14:42',
        //     ],
        //     [
        //         'id'         => '24',
        //         'title'      => 'npp_show',
        //         'created_at' => '2019-04-15 19:14:42',
        //         'updated_at' => '2019-04-15 19:14:42',
        //     ],
        //     [
        //         'id'         => '25',
        //         'title'      => 'npp_delete',
        //         'created_at' => '2019-04-15 19:14:42',
        //         'updated_at' => '2019-04-15 19:14:42',
        //     ],
        //     [
        //         'id'         => '26',
        //         'title'      => 'npp_access',
        //         'created_at' => '2019-04-15 19:14:42',
        //         'updated_at' => '2019-04-15 19:14:42',
        //     ],
        //     [
        //         'id'         => '27',
        //         'title'      => 'detail_npp_create',
        //         'created_at' => '2019-04-15 19:14:42',
        //         'updated_at' => '2019-04-15 19:14:42',
        //     ],
        //     [
        //         'id'         => '28',
        //         'title'      => 'detail_npp_edit',
        //         'created_at' => '2019-04-15 19:14:42',
        //         'updated_at' => '2019-04-15 19:14:42',
        //     ],
        //     [
        //         'id'         => '29',
        //         'title'      => 'detail_npp_show',
        //         'created_at' => '2019-04-15 19:14:42',
        //         'updated_at' => '2019-04-15 19:14:42',
        //     ],
        //     [
        //         'id'         => '30',
        //         'title'      => 'detail_npp_delete',
        //         'created_at' => '2019-04-15 19:14:42',
        //         'updated_at' => '2019-04-15 19:14:42',
        //     ],
        //     [
        //         'id'         => '31',
        //         'title'      => 'bpb_access',
        //         'created_at' => '2019-04-15 19:14:42',
        //         'updated_at' => '2019-04-15 19:14:42',
        //     ],
        //     [
        //         'id'         => '32',
        //         'title'      => 'bpb_create',
        //         'created_at' => '2019-04-15 19:14:42',
        //         'updated_at' => '2019-04-15 19:14:42',
        //     ],
        //     [
        //         'id'         => '33',
        //         'title'      => 'bpb_edit',
        //         'created_at' => '2019-04-15 19:14:42',
        //         'updated_at' => '2019-04-15 19:14:42',
        //     ],
        //     [
        //         'id'         => '34',
        //         'title'      => 'bpb_show',
        //         'created_at' => '2019-04-15 19:14:42',
        //         'updated_at' => '2019-04-15 19:14:42',
        //     ],
        //     [
        //         'id'         => '35',
        //         'title'      => 'detail_bpb_access',
        //         'created_at' => '2019-04-15 19:14:42',
        //         'updated_at' => '2019-04-15 19:14:42',
        //     ],
        //     [
        //         'id'         => '36',
        //         'title'      => 'detail_bpb_create',
        //         'created_at' => '2019-04-15 19:14:42',
        //         'updated_at' => '2019-04-15 19:14:42',
        //     ],
        //     [
        //         'id'         => '37',
        //         'title'      => 'detail_bpb_edit',
        //         'created_at' => '2019-04-15 19:14:42',
        //         'updated_at' => '2019-04-15 19:14:42',
        //     ],
        //     [
        //         'id'         => '38',
        //         'title'      => 'detail_bpb_show',
        //         'created_at' => '2019-04-15 19:14:42',
        //         'updated_at' => '2019-04-15 19:14:42',
        //     ],
        //     [
        //         'id'         => '39',
        //         'title'      => 'detail_bpb_delete',
        //         'created_at' => '2019-04-15 19:14:42',
        //         'updated_at' => '2019-04-15 19:14:42',
        //     ]
        //     ,
        //     [
        //         'id'         => '40',
        //         'title'      => 'supplier_access',
        //         'created_at' => '2019-04-15 19:14:42',
        //         'updated_at' => '2019-04-15 19:14:42',
        //     ],
        //     [
        //         'id'         => '41',
        //         'title'      => 'supplier_create',
        //         'created_at' => '2019-04-15 19:14:42',
        //         'updated_at' => '2019-04-15 19:14:42',
        //     ],
        //     [
        //         'id'         => '42',
        //         'title'      => 'supplier_edit',
        //         'created_at' => '2019-04-15 19:14:42',
        //         'updated_at' => '2019-04-15 19:14:42',
        //     ],
        //     [
        //         'id'         => '43',
        //         'title'      => 'supplier_show',
        //         'created_at' => '2019-04-15 19:14:42',
        //         'updated_at' => '2019-04-15 19:14:42',
        //     ],
        //     [
        //         'id'         => '44',
        //         'title'      => 'supplier_delete',
        //         'created_at' => '2019-04-15 19:14:42',
        //         'updated_at' => '2019-04-15 19:14:42',
        //     ],
        //     [
        //         'id'         => '40',
        //         'title'      => 'perbaikan_access',
        //         'created_at' => '2019-04-15 19:14:42',
        //         'updated_at' => '2019-04-15 19:14:42',
        //     ],
        //     [
        //         'id'         => '41',
        //         'title'      => 'perbaikan_create',
        //         'created_at' => '2019-04-15 19:14:42',
        //         'updated_at' => '2019-04-15 19:14:42',
        //     ],
        //     [
        //         'id'         => '42',
        //         'title'      => 'perbaikan_edit',
        //         'created_at' => '2019-04-15 19:14:42',
        //         'updated_at' => '2019-04-15 19:14:42',
        //     ],
        //     [
        //         'id'         => '43',
        //         'title'      => 'perbaikan_show',
        //         'created_at' => '2019-04-15 19:14:42',
        //         'updated_at' => '2019-04-15 19:14:42',
        //     ],
        //     [
        //         'id'         => '44',
        //         'title'      => 'perbaikan_delete',
        //         'created_at' => '2019-04-15 19:14:42',
        //         'updated_at' => '2019-04-15 19:14:42',
        //     ],
            [
                'title'      => 'printer_access',
                'created_at' => '2019-04-15 19:14:42',
                'updated_at' => '2019-04-15 19:14:42',
            ],
            [
                'title'      => 'printer_create',
                'created_at' => '2019-04-15 19:14:42',
                'updated_at' => '2019-04-15 19:14:42',
            ],
            [
                'title'      => 'printer_edit',
                'created_at' => '2019-04-15 19:14:42',
                'updated_at' => '2019-04-15 19:14:42',
            ],
            [
                'title'      => 'printer_show',
                'created_at' => '2019-04-15 19:14:42',
                'updated_at' => '2019-04-15 19:14:42',
            ],
            [
                'title'      => 'printer_delete',
                'created_at' => '2019-04-15 19:14:42',
                'updated_at' => '2019-04-15 19:14:42',
            ],
            [
                'title'      => 'komputer_access',
                'created_at' => '2019-04-15 19:14:42',
                'updated_at' => '2019-04-15 19:14:42',
            ],
            [
                'title'      => 'komputer_create',
                'created_at' => '2019-04-15 19:14:42',
                'updated_at' => '2019-04-15 19:14:42',
            ],
            [
                'title'      => 'komputer_edit',
                'created_at' => '2019-04-15 19:14:42',
                'updated_at' => '2019-04-15 19:14:42',
            ],
            [
                'title'      => 'komputer_show',
                'created_at' => '2019-04-15 19:14:42',
                'updated_at' => '2019-04-15 19:14:42',
            ],
            [
                'title'      => 'komputer_delete',
                'created_at' => '2019-04-15 19:14:42',
                'updated_at' => '2019-04-15 19:14:42',
            ]
        ];

        Permission::insert($permissions);
    }
}
