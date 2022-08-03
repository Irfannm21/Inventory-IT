<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\departemen;
use App\bagian_dept;

class DepartemenController extends Controller
{
    public function index()
    {
        $dept = departemen::where('nama','Engineering')->first();

        $dept->bagians()->createMany([
            ['nama' => 'Boiler'],
            ['nama' => 'Workshop']
        ]);

        if ($dept == false) {
            echo "gagal";
        } else {
            echo "Berhasil";
        }


    }
}
