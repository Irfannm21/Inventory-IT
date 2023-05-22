<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Gate;

class UpdateBarangRequest extends FormRequest
{
    public function authorize()
    {
        return \Gate::allows('barang_edit');
    }

    public function rules()
    {
        return [
            'kode' => 'required',
            'nama' => 'required',
        ];
    }
}
