<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Gate;
use App\bpb;
use Illuminate\Http\Request;

class StoreBpbRequest extends FormRequest
{
    /**
     * Determine if the user is autkhorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return \Gate::allows('bpb_create');
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
            'kelompok' => 'required',
            'tanggal' => 'required',
            'supplierID' => 'required_if:nama,null',
            'nama' => 'required_if:supplierID,null',
            'kota' => 'required_if:supplierID,null',
        ];


    }
}
