<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller     ;
use App\Models\it\gudangIT;
use App\Models\it\printer;
use App\Models\it\komputer;
use Illuminate\Http\Request;

class GudangITController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $results = gudangIT::whereHasMorph('gudangitable',['App\Models\it\printer','App\Models\it\komputer'])->get();
        return view('admin.cmsIT.gudang.index',compact('results'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.cmsIT.gudang.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());

        // if ($val_printer = printer::findOrFail(2) == true) {
        //     #
        // }
        $val = new gudangIT;
        $val->tanggal = $request->tanggal;
        $val->keterangan = $request->keterangan;

        $val_printer->gudangitable()->save($val);

        return redirect()->route('admin.gudangits.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\gudangIT  $gudangIT
     * @return \Illuminate\Http\Response
     */
    public function show(gudangIT $gudangIT)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\gudangIT  $gudangIT
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
        $gudang = gudangIT::findORFail($id);
        if($gudang->gudangitable_type == "App\Models\it\printer")
        {
            $gudang->jenis = "printer";
            $printer = printer::all();
        } elseif($gudang->gudangitable_type == "App\Models\it\komputer") {
            $gudang->jenis = "komputer";
            $komputer = komputer::all();
        } else {
            dd("none");
        }

        return view('admin.cmsIT.gudang.edit',compact('gudang','printer'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\gudangIT  $gudangIT
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, gudangIT $gudangIT)
    {
        dd($request);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\gudangIT  $gudangIT
     * @return \Illuminate\Http\Response
     */
    public function destroy(gudangIT $gudangIT)
    {
        dd($gudangIT);
    }

    public function jenisPerangkat(Request $request)
    {
        if ($request->nama == 'printer') {
            return printer::select('id','kode as nama')->doesntHave('gudangitable')->get();
        } elseif ($request->nama == 'cpu')
        {
            return komputer::select('id','kode as nama')->doesntHave('gudangitable')->get();
        } else {
            return "None";
        }

        // return __tooString($request->nama)::all();
    }
}
