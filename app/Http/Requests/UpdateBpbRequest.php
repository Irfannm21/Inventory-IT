<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Gate;

class UpdateBpbRequest extends FormRequest
{
    public function authorize()
    {
        return \Gate::allows('bpb_edit');
    }


    public function rules()
    {
        return [
            'kode' =>   'required',
            'tanggal' =>   'required',
            'detail_id' => 'required',
            'jumlah' => 'required',
            'supplier' => 'required',
        ];
    }
}
