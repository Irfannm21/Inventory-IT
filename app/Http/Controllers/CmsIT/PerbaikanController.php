<?php

namespace App\Http\Controllers\CmsIT;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePerbaikanRequest;
use App\Http\Requests\UpdatePerbaikanRequest;
use App\Http\Requests\MassDestroyPerbaikanRequest;

use Illuminate\Http\Request;
use App\Models\it\Perbaikan;
use App\Models\it\printer;
use App\Models\it\komputer;
use App\Models\it\klien;
use App\Models\it\TableBarangJaringan;
use Carbon\Carbon;
use Carbon\CarbonInterval;
use Barryvdh\DomPDF\Facade\Pdf;

class PerbaikanController extends Controller
{
    public function index()
    {
        $results = Perbaikan::all();
        return view('admin.perbaikan.index', compact('results'));
    }

    public function create(Request $request)
    {
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
        return view('admin.perbaikan.create',compact('hardware','tipe'));
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
        $stop = carbon::createFromFormat('H:i', $request->stop);
        $selesai = carbon::createFromFormat('H:i', $request->selesai);

        $detik = $selesai->diffInSeconds($stop);

        $day = $selesai->diffInDays($selesai->copy()->addSeconds($detik));
        $jam = $selesai->diffInHours($selesai->copy()->addSeconds($detik)->subDays($day));
        $menit = $selesai->diffInMinutes($selesai->copy()->addSeconds($detik)->subDays($day)->subHours($jam));

        $a = CarbonInterval::hours($jam)->minutes($menit);

        // Error jika kedua menit di angka 00
        if($a->i == 0) {
            $totall = carbon::createFromFormat("H:i",$a->h.":".$a->i.$a->i);
        } else {
            $totall = carbon::createFromFormat("H:i",$a->h.":".$a->i);
        }

        $perbaikan =  new Perbaikan;
        $perbaikan->tanggal = $request->tanggal;
        $perbaikan->kerusakan = $request->kerusakan;
        $perbaikan->tindakan = $request->tindakan;
        $perbaikan->stop = $request->stop;
        $perbaikan->mulai = $request->selesai;
        $perbaikan->total = $totall;
        $perbaikan->petugas = $request->petugas;

        $result->perbaikans()->save($perbaikan);

        return redirect()->route('it.perbaikans.index');
    }

    public function edit($id)
    {
        // dd($id);
        $result = perbaikan::find($id);
        // $result = $result->hardwareable->kode;
        // $printer = printer::get(['id',"kode"]);
        // $komputer = komputer::get(["id","kode"]);
        // $jaringan = TableBarangJaringan::get(["id","kode"]);
        abort_unless(\Gate::allows('perbaikan_edit'), 403);
        return view('admin.perbaikan.edit', compact('result'));
    }

    public function update(Request $request, $id)
    {
        // dd($request->all());
        $result = perbaikan::find($id);


        // die();
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

        // dd($result);
        $stop = carbon::createFromFormat('H:i', $request->stop);
        $selesai = carbon::createFromFormat('H:i', $request->selesai);

        $detik = $selesai->diffInSeconds($stop);

        $day = $selesai->diffInDays($selesai->copy()->addSeconds($detik));
        $jam = $selesai->diffInHours($selesai->copy()->addSeconds($detik)->subDays($day));
        $menit = $selesai->diffInMinutes($selesai->copy()->addSeconds($detik)->subDays($day)->subHours($jam));

        $a = CarbonInterval::hours($jam)->minutes($menit);

        if($a->i == 0) {
            $totall = carbon::createFromFormat("H:i",$a->h.":".$a->i.$a->i);
        } else {
            $totall = carbon::createFromFormat("H:i",$a->h.":".$a->i);
        }

        $result->update([
            "tanggal" => $request->tanggal,
            "kerusakan" => $request->kerusakan,
            "tindakan" => $request->tindakan,
            "stop" => $request->stop,
            "mulai" => $request->selesai,
            "total" => $totall,
            "petugas" => $request->petugas,

        ]);


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
        if($request->nama === "TableBarangJaringan") {
            return TableBarangJaringan::get(['id','kode']);
        } else {
            $model = "App\\".$request->nama;
            return $model::with('klien')->get(['id','kode']);
        }
    }

    public function print(Request $request)
    {
        // dd($request->all());
        if(printer::where('kode',$request->perangkat) == true) {
            $result = printer::where("kode",$request->perangkat)->whereBetween('tanggal', [$request->mulai, $request->sampai])->get();

            dd($result);

            $pdf = PDF::loadView('admin.perbaikan.print',['result' => $result])->setPaper('a4','potrait');

            return $pdf->stream();
        } else {
            dd("lain");
        }
    }
}
