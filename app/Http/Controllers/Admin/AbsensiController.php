<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Karyawan;
use App\Absensi;

class AbsensiController extends Controller
{
    public function index()
    {

        $absensis = absensi::has('karyawan')->get();
        return view('admin.absensi.index', compact('absensis'));
    }

    public function create()
    {
        return view('admin.absensi.create');
    }

    public function show(karyawan $karyawan){
        $karyawan = Karyawan::where('id',$karyawan->id)->first();
        dd($karyawan);
    }

}
