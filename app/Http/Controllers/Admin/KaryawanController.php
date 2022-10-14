<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
// use App\Http\Requests\MassDestroyProductRequest;
// use App\Http\Requests\StoreProductRequest;
// use App\Http\Requests\UpdateProductRequest;
use App\Karyawan;
use App\master_karyawans;
use App\TransaksiBca;
use App\departemen;
use Haruncpi\LaravelIdGenerator\IdGenerator;


class KaryawanController extends Controller
{
    public function index(){
        $pers = master_karyawans::where('jabatan','=','operator')->orderBy('nama','ASC')->get();
        $ksr = master_karyawans::whereNotIn('jabatan',['operator'])->get();

        $kserrr = "KSR";
        $year = date('my', strtotime(today()));

        $hitung = count($pers);

        $config =['table'=>'transaksi_bcas','length'=>15,'prefix'=>"ISI01$kserrr$year"];
        $id = idGenerator::generate($config);

        for($i=0; $i < $hitung; $i++) {

            $id;
            foreach($pers as $val) {
                echo $id++. " " .$val->nama . " " . $val->jabatan . "<br>";
            }
        }


    }

    public function show(karyawan $karyawan){

        $karyawan = Karyawan::where('id',$karyawan->id)->first();

        return view('admin.karyawans.show', compact('karyawan'));
    }

    public function edit(karyawan $karyawan){
        return view('admin.karyawans.edit', compact('karyawan'));
    }
}
