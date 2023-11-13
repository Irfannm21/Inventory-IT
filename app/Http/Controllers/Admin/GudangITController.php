<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller     ;
use App\Models\it\gudangIT;
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
        $results = gudangIT::all();
        // dd($results->gudangitable_type);
        return view('admin.cmsIT.gudang.index',compact('results'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        dd("TE");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
    public function edit(gudangIT $gudangIT)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\gudangIT  $gudangIT
     * @return \Illuminate\Http\Response
     */
    public function destroy(gudangIT $gudangIT)
    {
        //
    }
}
