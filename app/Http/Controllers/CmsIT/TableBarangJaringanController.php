<?php

namespace App\Http\Controllers\cmsIT;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\it\TableBarangJaringan;
use App\Http\Requests\PerangkatStoreUpdateRequest;
class TableBarangJaringanController extends Controller
{
    public function index()
    {
        $results = TableBarangJaringan::all();
        return view("admin.cmsIt.Perangkatlain.index",compact('results'));
    }

    public function show()
    {
        dd("TEST");
    }

    public function create()
    {
        return view('admin.cmsIT.PerangkatLain.create');
    }

    public function store(PerangkatStoreUpdateRequest $perangkat)
    {
        TableBarangJaringan::create($perangkat->all());
        return redirect()->route('it.perangkats.index');
    }

    public function edit(TableBarangJaringan $perangkat)
    {
        $result = $perangkat;
        return view('admin.cmsIt.PerangkatLain.edit', compact('result'));
    }

    public function update(PerangkatStoreUpdateRequest $request,TableBarangJaringan $perangkat)
    {
        $perangkat->update($request->all());
        return redirect()->route('it.perangkats.index');
    }

    public function destroy(TableBarangJaringan $perangkat)
    {
        $perangkat->delete();
        return redirect()->route('it.perangkats.index');
    }
}
