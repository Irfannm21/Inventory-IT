<?php

namespace App\Http\Controllers\CmsIT;

use App\Http\Controllers\Controller;
use App\Http\Requests\KomputerStoreUpdateRequest;
use App\Http\Requests\MassDestroyKomputerRequest;
use Illuminate\Http\Request;

use App\Models\it\komputer;

class KomputerController extends Controller
{
    public function index()
    {
        $result = Komputer::all();
        return view('admin.cmsIT.cpu.index', compact('result'));
    }

    public function show(komputer $komputer)
    {
        return view('admin.cmsIT.cpu.show', compact('komputer'));
    }

    public function create()
    {
        abort_unless(\Gate::allows('komputer_create'), 403);
        return view('admin.cmsIT.cpu.create');
    }

    public function store(KomputerStoreUpdateRequest $request)
    {
        // dd($request->all());
        $result = Komputer::create($request->all());
        return redirect()->route('it.komputers.index');
    }

    public function edit(komputer $komputer)
    {
        abort_unless(\Gate::allows('komputer_edit'), 403);
        return view('admin.cmsIT.cpu.edit', compact('komputer'));
    }

    public function update(KomputerStoreUpdateRequest $request, Komputer $komputer)
    {
        abort_unless(\Gate::allows('komputer_edit'), 403);
        $komputer->update($request->all());
        return redirect()->route('it.komputers.index');
    }

    public function destroy(Komputer $komputer)
    {
        abort_unless(\Gate::allows('komputer_delete'), 403);
        $komputer->delete();
        return back();
    }

    public function massDestroy(MassDestroyKomputerRequest $request)
    {
         komputer::whereIn('id', request('ids'))->delete();
         return response(null, 204);
    }
}
