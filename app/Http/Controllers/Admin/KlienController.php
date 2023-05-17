<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\it\klien;
use App\Models\it\printer;
use App\Models\it\komputer;
use App\master_karyawans;
use App\Http\Requests\StoreKlienRequest;
use App\Http\Requests\UpdateKlienRequest;

class KlienController extends Controller
{
    public function index()
    {
        $results = klien::all();
        return view ('admin.pengguna.index', compact('results'));
    }

    public function show(printer $printer)
    {
        dd($printer);
    }

    public function create()
    {
        abort_unless(\Gate::allows('klien_create'), 403);
        $karyawans = master_karyawans::all()->pluck('nama','id');
        $printer = printer::all()->pluck('nama','id');
        $komputer = komputer::all()->pluck('kode','id');
        return view('admin.pengguna.create',compact('komputer','printer','karyawans'));
    }

    public function store(StoreKlienRequest $request)
    {
        abort_unless(\Gate::allows('klien_create'), 403);
        $klien = klien::create($request->all());
        return redirect()->route('admin.kliens.index');
    }

    public function edit(Request $request,$id)
    {
        abort_unless(\Gate::allows('klien_edit'), 403);
        $karyawans = master_karyawans::all()->pluck('nama','id');
        $printer = printer::all()->pluck('nama','id');
        $komputer = komputer::all()->pluck('kode','id');
        $klien = klien::with('karyawan','komputer','printer')->find($id);
        return view('admin.pengguna.edit', compact('klien','karyawans','printer','komputer'));
    }

    public function update (StoreKlienRequest $request, klien $klien)
    {
        abort_unless(\Gate::allows('klien_edit'), 403);
        $klien->update($request->all());
        return redirect()->route('admin.kliens.index');
    }

    public function destroy(klien $klien)
    {
        abort_unless(\Gate::allows('klien_delete'), 403);
        $klien->delete();
        return back();
    }
}
