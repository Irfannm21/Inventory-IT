<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MasterKaryawansController extends Controller
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
