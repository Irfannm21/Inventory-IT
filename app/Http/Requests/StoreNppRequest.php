<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Gate;

class StoreNppRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return \Gate::allows('npp_create');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'kode' =>   'required',
            'tanggal' =>   'required',
            'departemen' =>   'required',
            'bagian' =>   'required',
            'nama' =>   'required',
            'jumlah' =>   'required',
            'satuan' =>   'required',
            'stok' =>   'required',
            'keterangan' =>   'required',
        ];
    }
}
