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
        if($request->perangkat == "printer") {
            $perangkat = printer::findOrFail($request->id);
        }elseif($request->perangkat == 'komputer')
        {
            $perangkat = komputer::findOrFail($request->id);
        }

        $val = new gudangIT;
        $val->tanggal = $request->tanggal;
        $val->keterangan = $request->keterangan;

        $perangkat->gudangitable()->save($val);

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
        // dd($gudang);
        $gudang = gudangIT::findORFail($id);
        if($gudang->gudangitable_type == "App\Models\it\printer")
        {
            $gudang->jenis = "printer";
            $perangkat = printer::all();
        } elseif($gudang->gudangitable_type == "App\Models\it\komputer") {
            $gudang->jenis = "komputer";
            $perangkat = komputer::all();
        } else {
            dd("none");
        }

        return view('admin.cmsIT.gudang.edit',compact('gudang','perangkat'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\gudangIT  $gudangIT
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        // dd($gudangIT);
        if($request->perangkat == "printer")
        {
            $result = gudangIT::findOrFail($id);
            $perangkat = printer::findOrFail($request->id);
            $result->gudangitable_id = $perangkat->id;
            $result->tanggal = $request->tanggal;
            $result->keterangan = $request->keterangan;
            $result->push();

            return redirect()->route('admin.gudangits.index');
        }
        // dd($request->all());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\gudangIT  $gudangIT
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $result = gudangIT::findOrFail($id);
        $result->delete();
        return redirect()->route('admin.gudangits.index');
    }

    public function jenisPerangkat(Request $request)
    {
        if ($request->nama == 'printer') {
            return printer::select('id','kode as nama')->doesntHave('gudangitable')->get();
        } elseif ($request->nama == 'komputer')
        {
            return komputer::select('id','kode as nama')->doesntHave('gudangitable')->get();
        } else {
            return "None";
        }

    }
}
