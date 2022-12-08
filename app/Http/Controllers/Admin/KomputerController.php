<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreKomputerRequest;
use App\Http\Requests\UpdateKomputerRequest;
use App\Http\Requests\MassDestroyKomputerRequest;
use Illuminate\Http\Request;
use App\komputer;

class KomputerController extends Controller
{
    public function index()
    {
        $result = Komputer::all();
        return view('admin.cpu.index', compact('result'));
    }

    public function show(komputer $komputer)
    {
        return view('admin.cpu.show', compact('komputer'));
    }

    public function create()
    {
        abort_unless(\Gate::allows('komputer_create'), 403);
        return view('admin.cpu.create');
    }

    public function store(StoreKomputerRequest $request)
    {
        $result = Komputer::create($request->all());
        return redirect()->route('admin.komputers.index');
    }

    public function edit(komputer $komputer)
    {
        abort_unless(\Gate::allows('komputer_edit'), 403);
        return view('admin.cpu.edit', compact('komputer'));
    }

    public function update(UpdateKomputerRequest $request, Komputer $komputer)
    {
        abort_unless(\Gate::allows('komputer_edit'), 403);
        $komputer->update($request->all());
        return redirect()->route('admin.komputers.index');
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
