<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePerbaikanRequest;
use App\Http\Requests\UpdatePerbaikanRequest;
use App\Http\Requests\MassDestroyPerbaikanRequest;

use Illuminate\Http\Request;
use App\Perbaikan;
use App\printer;
use App\komputer;
use App\Klien;
use App\TableBarangJaringan;

class PerbaikanController extends Controller
{
    public function index()
    {
        $results = Perbaikan::all();
        return view('admin.perbaikan.index', compact('results'));
    }

    public function create(Request $request)
    {

        abort_unless(\Gate::allows('perbaikan_create'), 403);
        return view('admin.perbaikan.create');
    }

    public function store(request $request)
    {
        dd($request->all());

        $type = $request->type;
        if ($type == 'printer') {
            $result = Printer::find($request->hardware);
        } elseif($type == 'komputer') {
            $result = komputer::find($request->hardware);
        }

        $perbaikan =  new Perbaikan;
        $perbaikan->tanggal = $request->tanggal;
        $perbaikan->keterangan = $request->keterangan;

        $result->perbaikans()->save($perbaikan);

        return redirect()->route('admin.perbaikans.index');
    }

    public function edit(Perbaikan $perbaikan)
    {
        abort_unless(\Gate::allows('perbaikan_edit'), 403);
        return view('admin.perbaikan.edit', compact('perbaikan'));
    }

    public function update(UpdatePerbaikanRequest $request, perbaikan $perbaikan)
    {
        abort_unless(\Gate::allows('product_edit'), 403);
        $perbaikan->update($request->all());
        return redirect()->route('admin.perbaikans.index');
    }

    public function destroy(Perbaikan $perbaikan)
    {
        abort_unless(\Gate::allows('perbaikan_delete'), 403);
        $perbaikan->delete();
        return back();
    }

    public function massDestroy(MassDestroyPerbaikanRequest $request)
    {
        Perbaikan::whereIn('id', request('ids'))->delete();

        return response(null, 204);
    }

    public function cariItem(Request $request)
    {
        if($request->nama == 'komputer') {
            return komputer::select('id','kode')->get();
        } elseif ($request->nama == 'printer') {
            return printer::select('id','kode')->get();
        } elseif ($request->nama == 'TableBarangJaringan') {
            return TableBarangJaringan::select('id','kode')->get();
        } elseif ($request->nama == 'pengguna') {
            return pengguna::select('id','kode')->get();
        } else {
            return $request->nama;
        }
    }
}
