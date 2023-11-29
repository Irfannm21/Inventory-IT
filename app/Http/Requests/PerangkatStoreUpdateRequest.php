<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PerangkatStoreUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $id = $this->perangkat->id ?? 0;

        return [
            "kode" => 'required|min:18|max:18|unique:table_barang_jaringans,kode,' . $id,
            "tanggal" => 'required',
            "kelompok" => 'required',
            'nama'  => 'required',
        ];
    }
}
