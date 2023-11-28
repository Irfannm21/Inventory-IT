<?php

namespace App\Http\Controllers\CmsIT;

use App\Http\Controllers\Controller;
use App\Http\Requests\PrinterStoreUpdateRequest;
use Illuminate\Http\Request;


use App\Models\it\printer;
use App\Models\it\Perbaikan;

class PrinterController extends Controller
{
   public function index()
   {
        $results = Printer::with('gudangitable')->get();

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

   public function store(Request $request)
   {
    // dd($request->all());
    // $record->save($request->all());
        printer::create($request->all());
        return redirect()->route('it.printers.index')->with('success','Data Printer Berhasil ditambahkan.');
   }

   public function edit(printer $printer)
   {
        // dd($printer);
        abort_unless(\Gate::allows('printer_edit'), 403);
        return view('admin.printer.edit', compact('printer'));
   }

   public function update(Request $request, printer $printer)
   {
        abort_unless(\Gate::allows('product_edit'), 403);
        return $printer->handleStoreOrUpdate($request);
   }

   public function destroy(printer $printer)
   {
        abort_unless(\Gate::allows('printer_delete'), 403);
        return $printer->handleDestroy();
   }

   public function massDestroy(MassDestroyPrinterRequest $request)
   {
        Printer::whereIn('id', request('ids'))->delete();
        return response(null, 204);
   }

}
