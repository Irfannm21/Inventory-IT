<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreBarangRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return \Gate::allows('barang_create');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            "kode" => "required",
            "nama"  => "required",
            "kelompok" => 'required',
            "jenis" => 'required',
            "satuan" => 'required',
        ];
    }
}
