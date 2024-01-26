<?php

namespace App\Http\Controllers\CmsIT;

use App\Models\it\printer;
use App\Models\it\Perbaikan;
use Illuminate\Http\Request;


use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;
use App\Http\Requests\PrinterStoreUpdateRequest;

class PrinterController extends Controller
{
   public function index()
   {
        $results = Printer::with('gudangitable')->get();

        return view('admin.cmsIT.printer.index', compact('results'));
   }

   public function create()
    {
        abort_unless(\Gate::allows('printer_create'), 403);
        return view('admin.cmsIT.printer.create');
    }

   public function show(printer $printer)
   {
        return view('admin.cmsIT.printer.show', compact('printer'));
   }

   public function store(Request $request)
   {
    // dd($request->all());
    // $record->save($request->all());
        printer::create($request->all());
        Alert::alert()->success('Berhasil',"Data Berhasil disimpan");
        return redirect()->route('it.printers.index');
   }

   public function edit(printer $printer)
   {
        // dd($printer);
        abort_unless(\Gate::allows('printer_edit'), 403);
        return view('admin.cmsIT.printer.edit', compact('printer'));
   }

   public function update(Request $request, printer $printer)
   {
        abort_unless(\Gate::allows('product_edit'), 403);
        Alert::alert()->success('Berhasil',"Data Berhasil Diubah");
        return $printer->handleStoreOrUpdate($request);
   }

   public function destroy(printer $printer)
   {
        abort_unless(\Gate::allows('printer_delete'), 403);
        Alert::alert()->success('Berhasil',"Data Berhasil Dihapus");
        return $printer->handleDestroy();
   }

   public function massDestroy(MassDestroyPrinterRequest $request)
   {
        Printer::whereIn('id', request('ids'))->delete();
        return response(null, 204);
   }

}
