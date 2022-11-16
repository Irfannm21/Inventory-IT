<?php

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\bpb;
use App\Detail_bpb;
use App\detail_npp;

use App\Http\Requests\UpdateDetailBpbRequest;

class DetailBpbController extends Controller
{
    public function index()
    {
        $results = Detail_bpb::has('bpb')->get();
        return view('admin.detail_bpb.index', compact('results'));
    }

    public function edit(Request $request, $id)
    {
        $result = Detail_bpb::find($id);

        $npp = $result->bpb->npp->id;
        $bpb = detail_npp::where("npp_id",$npp)->get()->pluck('nama','id');
        return view('admin.detail_bpb.edit', compact('result','bpb'));
    }

    public function update(UpdateDetailBpbRequest $request, Detail_bpb $detail_bpb)
    {
        $detail_bpb->update($request->all());
        return redirect()->route('admin.detail_bpbs.index');
    }
}
