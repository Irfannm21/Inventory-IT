<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePerbaikanRequest;
use App\Http\Requests\UpdatePerbaikanRequest;
use App\Http\Requests\MassDestroyPerbaikanRequest;

use Illuminate\Http\Request;
use App\Perbaikan;
use App\printer;
use App\komputer;
use App\Klien;
use App\TableBarangJaringan;
use Carbon\Carbon;
use Carbon\CarbonInterval;

class PerbaikanController extends Controller
{
    public function index()
    {
        $results = Perbaikan::all();
        return view('admin.perbaikan.index', compact('results'));
    }

    public function create(Request $request)
    {

        abort_unless(\Gate::allows('perbaikan_create'), 403);
        return view('admin.perbaikan.create');
    }

    public function store(request $request)
    {
        // dd($request->all());
        $type = $request->type;
        if ($type == 'printer') {
            $result = Printer::find($request->nama);
        } elseif($type == 'komputer') {
            $result = komputer::find($request->nama);
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

    public function edit(Perbaikan $perbaikan)
    {
        if($perbaikan->hardwareable_type == "App\printer") {
            $results = printer::all()->pluck('nama','id');
        } else {
            $results = komputer::all()->pluck('kode', "id");
        }

        abort_unless(\Gate::allows('perbaikan_edit'), 403);
        return view('admin.perbaikan.edit', compact('perbaikan','results'));
    }

    public function update(UpdatePerbaikanRequest $request, perbaikan $perbaikan)
    {
        $type = $request->type;
        if ($type == 'printer') {
            $result = Printer::find($request->nama);
        } elseif($type == 'komputer') {
            $result = komputer::find($request->nama);
        }

        $stop = carbon::createFromFormat('H:i', $request->stop);
        $selesai = carbon::createFromFormat('H:i', $request->selesai);

        $detik = $selesai->diffInSeconds($stop);

        $day = $selesai->diffInDays($selesai->copy()->addSeconds($detik));
        $jam = $selesai->diffInHours($selesai->copy()->addSeconds($detik)->subDays($day));
        $menit = $selesai->diffInMinutes($selesai->copy()->addSeconds($detik)->subDays($day)->subHours($jam));

        $a = CarbonInterval::hours($jam)->minutes($menit);

        $totall = carbon::createFromFormat("H:i",$a->h.":".$a->i);

        $result->perbaikans()->update([
           "tanggal" => $request->tanggal,
           "kerusakan" => $request->kerusakan,
           "tindakan" => $request->tindakan,
           "stop" => $request->stop,
           "mulai" => $request->selesai,
           "total" => $totall,
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
        if($request->nama == 'komputer') {
            return komputer::select('id','kode')->get();
        } elseif ($request->nama == 'printer') {
            return printer::has('klien')->select('id','nama as kode')->get();
        } elseif ($request->nama == 'TableBarangJaringan') {
            return TableBarangJaringan::select('id','kode')->get();
        } elseif ($request->nama == 'pengguna') {
            return pengguna::select('id','kode')->get();
        } else {
            return $request->nama;
        }
    }
}
