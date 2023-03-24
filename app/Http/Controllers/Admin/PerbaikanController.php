<?php

namespace App\Http\Controllers\Admin;

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

class PerbaikanController extends Controller
{
    public function index()
    {
        $results = Perbaikan::all();
        // foreach($results as $item) {
        //     echo $item->id;
        //     echo $item->hardwareable->kode;
        //     echo "<br>";
        // }
        // die;
        return view('admin.perbaikan.index', compact('results'));
    }

    public function create(Request $request)
    {

        abort_unless(\Gate::allows('perbaikan_create'), 403);
        return view('admin.perbaikan.create');
    }

    public function store(StorePerbaikanRequest $request)
    {
        // dd($request->all());

        $type = $request->type;
        if ($type == 'printer') {
            $result = Printer::find($request->nama);
        } elseif($type == 'komputer') {
            $result = komputer::find($request->nama);
        } elseif($type == "TableBarangJaringan") {
            $result = TableBarangJaringan::find($request->nama);
        }

        // $stop = carbon::createFromFormat('H:i', $request->stop);
        // $selesai = carbon::createFromFormat('H:i', $request->selesai);

        // $detik = $selesai->diffInSeconds($stop);

        // $day = $selesai->diffInDays($selesai->copy()->addSeconds($detik));
        // $jam = $selesai->diffInHours($selesai->copy()->addSeconds($detik)->subDays($day));
        // $menit = $selesai->diffInMinutes($selesai->copy()->addSeconds($detik)->subDays($day)->subHours($jam));

        // $a = CarbonInterval::hours($jam)->minutes($menit);

        // $totall = carbon::createFromFormat("H:i",$a->h.":".$a->i);

        $perbaikan =  new Perbaikan;
        $perbaikan->tanggal = $request->tanggal;
        $perbaikan->kerusakan = $request->kerusakan;
        $perbaikan->tindakan = $request->tindakan;
        // $perbaikan->stop = $request->stop;
        // $perbaikan->mulai = $request->selesai;
        // $perbaikan->total = $totall;
        $perbaikan->petugas = $request->petugas;

        $result->perbaikans()->save($perbaikan);

        return redirect()->route('admin.perbaikans.index');
    }

    public function edit($id)
    {
        $results = Perbaikan::find($id);
        $printer = printer::get(['id',"kode"]);
        $komputer = komputer::get(["id","kode"]);
        $jaringan = TableBarangJaringan::get(["id","kode"]);
        abort_unless(\Gate::allows('perbaikan_edit'), 403);
        return view('admin.perbaikan.edit', compact('results','printer','komputer','jaringan'));
    }

    public function update(Perbaikan $perbaikan, Request $request)
    {
        // dd($perbaikan->hardwareable_id);
        $type = $request->type;
        if ($type == 'printer') {
            $result = Printer::find($perbaikan->hardwareable_id);
            $result2 = Printer::find($request->nama);
        } elseif($type == 'komputer') {
            $result = komputer::find($request->nama);
        } elseif($type == "TableBarangJaringan") {
            $result = TableBarangJaringan::find($request->nama);
        }

        // dd($result);
        // $stop = carbon::createFromFormat('H:i', $request->stop);
        // $selesai = carbon::createFromFormat('H:i', $request->selesai);

        // $detik = $selesai->diffInSeconds($stop);

        // $day = $selesai->diffInDays($selesai->copy()->addSeconds($detik));
        // $jam = $selesai->diffInHours($selesai->copy()->addSeconds($detik)->subDays($day));
        // $menit = $selesai->diffInMinutes($selesai->copy()->addSeconds($detik)->subDays($day)->subHours($jam));

        // $a = CarbonInterval::hours($jam)->minutes($menit);

        // $totall = carbon::createFromFormat("H:i",$a->h.":".$a->i);

        $result->perbaikans()->update([
            'hardwareable_id' => $result2->id,
           "tanggal" => $request->tanggal,
           "kerusakan" => $request->kerusakan,
           "tindakan" => $request->tindakan,
        //    "stop" => $request->stop,
        //    "mulai" => $request->selesai,
        //    "total" => $totall,
           "petugas" => $request->petugas,
        ]);

        return redirect()->route('admin.perbaikans.index');
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
}
