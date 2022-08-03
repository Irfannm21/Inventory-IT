<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
// use App\Http\Requests\MassDestroyProductRequest;
// use App\Http\Requests\StoreProductRequest;
// use App\Http\Requests\UpdateProductRequest;
use App\Karyawan;

class KaryawanController extends Controller
{
    public function index(){
        $karyawans = Karyawan::all();
        return view('admin.karyawans.index', compact('karyawans'));
    }

    public function show(karyawan $karyawan){

        $karyawan = Karyawan::where('id',$karyawan->id)->first();

        return view('admin.karyawans.show', compact('karyawan'));
    }

    public function edit(karyawan $karyawan){
        return view('admin.karyawans.edit', compact('karyawan'));
    }
}
