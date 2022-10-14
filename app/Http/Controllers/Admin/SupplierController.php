<?php

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\StoreSupplierRequest;

use App\supplier;

class SupplierController extends Controller
{
    public function store(StoreSupplierRequest $request)
    {
        dd($request);
        supplier::create($request->all());
        return view('admin.printer.index');
    }
}
