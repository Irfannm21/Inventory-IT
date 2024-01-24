<?php

namespace App\Http\Controllers\Admin;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateDetailRequest;
use App\Models\StokSparepart\npp;
use App\Models\StokSparepart\detail_npp;


class DetailNppController extends Controller
{

    public function index()
    {

        $results = detail_npp::orderBY('created_at',"DESC")->get();
        return view('admin.detail_npp.index', compact('results'));
    }

    public function edit(detail_npp $detail)
    {
        return view('admin.detail_npp.edit',compact('detail'));
    }

    public function update(UpdateDetailRequest $request, detail_npp $detail)
    {
        $detail->update($request->all());
        return redirect()->route('admin.details.index');
    }

    public function destroy(detail_npp $detail)
    {
        // dd($detail);
        $detail->delete();
        return back();
    }

}
