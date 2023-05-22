<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
// use App\Http\Requests\MassDestroyProductRequest;
// use App\Http\Requests\StoreProductRequest;
// use App\Http\Requests\UpdateProductRequest;
use Illuminate\Http\Request;
use App\Karyawan;
use App\master_karyawans;
use App\TransaksiBca;
use App\departemen;
use Haruncpi\LaravelIdGenerator\IdGenerator;


class KaryawanController extends Controller
{
    public function index(){
        $karyawans = master_karyawans::all();
        return view('admin.karyawans.index', compact('karyawans'));
    }

    public function test(Request $id){
        dd($id->all());
        $karyawan = Karyawan::where('id',$karyawan->id)->first();
        dd($karyawan);
        return view('admin.karyawans.show', compact('karyawan'));
    }

    public function edit(karyawan $karyawan){
        return view('admin.karyawans.edit', compact('karyawan'));
    }
}
