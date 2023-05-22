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
            'kelompok' => 'required',
            'tanggal' => 'required',
        ];
    }
}
