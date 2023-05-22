<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePrinterRequest;
use App\Http\Requests\UpdatePrinterRequest;
use App\Http\Requests\MassDestroyPrinterRequest;
use Illuminate\Http\Request;


use App\Models\it\printer;
use App\Models\it\Perbaikan;

class PrinterController extends Controller
{
   public function index()
   {
        $results = Printer::all();
        return view('admin.printer.index', compact('results'));
   }

   public function create()
    {
        abort_unless(\Gate::allows('printer_create'), 403);
        return view('admin.printer.create');
    }

   public function show(printer $printer)
   {
        return view('admin.printer.show', compact('printer'));

   }

   public function store(StorePrinterRequest $request)
   {
        // $valudateData = $request->validate();

        $result = Printer::create($request->all());
        return redirect()->route('admin.printers.index');
   }

   public function edit(printer $printer)
   {
        abort_unless(\Gate::allows('printer_edit'), 403);
        return view('admin.printer.edit', compact('printer'));
   }

   public function update(UpdatePrinterRequest $request, printer $printer)
   {
        abort_unless(\Gate::allows('product_edit'), 403);
        $printer->update($request->all());
        return redirect()->route('admin.printers.index');
   }

   public function destroy(printer $printer)
   {
        abort_unless(\Gate::allows('printer_delete'), 403);
        $printer->delete();
        return back();
   }

   public function massDestroy(MassDestroyPrinterRequest $request)
   {
        Printer::whereIn('id', request('ids'))->delete();
        return response(null, 204);
   }

}
