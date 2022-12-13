<?php

namespace App\Http\Requests;

use App\Perbaikan;
use Illuminate\Foundation\Http\FormRequest;

class UpdatePerbaikanRequest extends FormRequest
{

    public function authorize()
    {
        return \Gate::allows('perbaikan_edit');
    }

    public function rules()
    {
        // $stop = carbon::createFromFormat('H:i', $request->stop);
        // $selesai = carbon::createFromFormat('H:i', $request->selesai);

        // $detik = $selesai->diffInSeconds($stop);

        // $day = $selesai->diffInDays($selesai->copy()->addSeconds($detik));
        // $jam = $selesai->diffInHours($selesai->copy()->addSeconds($detik)->subDays($day));
        // $menit = $selesai->diffInMinutes($selesai->copy()->addSeconds($detik)->subDays($day)->subHours($jam));

        // $a = CarbonInterval::hours($jam)->minutes($menit);

        // $totall = carbon::createFromFormat("H:i",$a->h.":".$a->i);

        return [
            'tanggal' => 'required',
            'kerusakan' => 'required',
            'tindakan' => 'required',
            'stop' => 'required',
            'selesai' => 'required',
            // "total" => $totall,
            'petugas' => 'required',
        ];
    }
}
