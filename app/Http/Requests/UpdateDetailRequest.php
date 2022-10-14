<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\detail_npp;

class UpdateDetailRequest extends FormRequest
{

    public function authorize()
    {
        return \Gate::allows('detail_edit');
    }


    public function rules()
    {
        return [
            'nama' =>   'required',
            'jumlah' =>   'required',
            'satuan' => 'required',
            'stok' => 'required',
            'keterangan' => 'required',
        ];
    }
}
