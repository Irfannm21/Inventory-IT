<?php

namespace App\Http\Controllers\CmsIT;

use Carbon\Carbon;
use App\Models\it\klien;
use App\Models\it\printer;
use Carbon\CarbonInterval;

use App\Models\it\komputer;
use App\Models\it\Perbaikan;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Http\Controllers\Controller;
use App\Models\it\TableBarangJaringan;
use App\Models\StokSparepart\BonKeluar;
use RealRashid\SweetAlert\Facades\Alert;
use App\Http\Requests\StorePerbaikanRequest;
use App\Http\Requests\UpdatePerbaikanRequest;
use App\Http\Requests\MassDestroyPerbaikanRequest;

class PerbaikanController extends Controller
{
    public function index()
    {
        $results = Perbaikan::all();
        return view('admin.cmsIT.perbaikan.index', compact('results'));
    }

    public function create(Request $request)
    {
        $BonKeluar = BonKeluar::select('id','kode')->get();
        switch ($request->type) {
            case 'printer':
                $hardware = printer::find($request->id);
                break;
            case 'komputer':
                $hardware = komputer::find($request->id);
                break;
            default:
                # code...
                break;
        }
        $tipe = $request->type;
        // dd($hadrware);
        abort_unless(\Gate::allows('perbaikan_create'), 403);
        return view('admin.cmsIT.perbaikan.create',compact('hardware','tipe','BonKeluar'));
    }

    public function show(StorePerbaikanRequest $request) {
        dd($request->all());
    }

    public function store(StorePerbaikanRequest $request)
    {
        // dd($request->all());
        if (Printer::where("kode",$request->kode)->first() == true) {
            $result = Printer::where("kode",$request->kode)->first();
            $perbaikan = perbaikan::find($result->id);
        } elseif(komputer::where("kode",$request->kode)->first() == true) {
            $result = komputer::where("kode",$request->kode)->first();
            $perbaikan = perbaikan::find($result->id);
        } else {
            dd("none");
        }

        $datetime = new \Datetime($request->stop);
        $datetime2 = new \Datetime($request->selesai);

        $interval = $datetime->diff($datetime2)->format('%H:%I:%S');

        $perbaikan =  new Perbaikan;
        $perbaikan->tanggal = $request->tanggal;
        $perbaikan->kerusakan = $request->kerusakan;
        $perbaikan->tindakan = $request->tindakan;
        $perbaikan->stop = $datetime->format('H:i:s');
        $perbaikan->mulai = $datetime2->format('H:i:s');
        $perbaikan->total = $interval;
        $perbaikan->detail_id = $request->barang_id;
        $perbaikan->petugas = $request->petugas;

        // dd($perbaikan);
        $result->perbaikans()->save($perbaikan);

        Alert::alert()->success('Berhasil',"Data Berhasil disimpan");
        return redirect()->route('it.perbaikans.index');
    }

    public function edit($id)
    {
        // dd($id);
        $result = perbaikan::with('detail_bon')->find($id);
        // dd($result->detail_bon->bon->kode);
        $BonKeluar = BonKeluar::select('id','kode')->get();
        abort_unless(\Gate::allows('perbaikan_edit'), 403);
        return view('admin.cmsIT.perbaikan.edit', compact('result','BonKeluar'));
    }

    public function update(Request $request, $id)
    {
        // dd($request->all());
        $result = perbaikan::find($id);


        // $type = $request->type;
        // if (Printer::where("kode",$request->kode)->first() == true) {
        //     $result = Printer::where("kode",$request->kode)->first();
        //     $perbaikan = perbaikan::find($result->id);
        // } elseif(komputer::where("kode",$request->kode)->first() == true) {
        //     $result = komputer::where("kode",$request->kode)->first();
        //     $perbaikan = perbaikan::find($result->id);
        // } else {
        //     dd("none");
        // }

        $datetime = new \Datetime($request->stop);
        $datetime2 = new \Datetime($request->selesai);

        $interval = $datetime->diff($datetime2)->format('%H:%I:%S');

        $result->update([
            "tanggal" => $request->tanggal,
            "kerusakan" => $request->kerusakan,
            "tindakan" => $request->tindakan,
            "stop" => $datetime,
            "mulai" => $datetime2,
            "total" => $interval,
            "detail_id" => $request->barang_id,
            "petugas" => $request->petugas,

        ]);

        Alert::alert()->success('Berhasil',"Data Berhasil Diubah");
        return redirect()->route('it.perbaikans.index');
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
        return BonKeluar::with('detail_bons.barang')->where("kode",$request->kode)->first();
    }

    public function print(Request $request)
    {
        // dd($request->all());
        if(printer::where('kode',$request->perangkat) == true) {
            $printer = printer::where("kode",$request->perangkat)->first();

            $results = printer::find($printer->kode)
            ->perbaikans()
            ->whereBetween('tanggal',[$request->mulai,$request->sampai])
            ->get();
            $pdf = PDF::loadView('admin.cmsIT.perbaikan.print',['perangkat' => $printer, 'results' => $results , 'awal' => $request->mulai, 'akhir' => $request->sampai])->setPaper('a4','landscape');

            return $pdf->stream();
        } else {
            $komputer = komputer::where("kode",$request->perangkat)->first();

            $results = komputer::find($komputer->kode)
            ->perbaikans()
            ->whereBetween('tanggal',[$request->mulai,$request->sampai])
            ->get();
            $pdf = PDF::loadView('admin.cmsIT.perbaikan.print',['perangkat' => $komputer, 'results' => $results , 'awal' => $request->mulai, 'akhir' => $request->sampai])->setPaper('a4','landscape');

            return $pdf->stream();
        }
    }
}
