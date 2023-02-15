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

        // dd($request->all());
        return [
            'kode' =>   'required',
        ];
        // if('supplierId' == NULL) {
        //     return [
        //         'kode' =>   'required',
        //         'tanggal' =>   'required',
        //         'kelompok' =>   'required',
        //         "npp_id" => "required",
        //         "detail_id" => "required",
        //         "jumlah" => "required",
        //         "satuan" => "required",
        //         "nama" => 'required',
        //         "kota" => 'required',
        //     ];
        // } else {
        //     return [
        //         'kode' =>   'required',
        //         'tanggal' =>   'required',
        //         'kelompok' =>   'required',
        //         "npp_id" => "required",
        //         "detail_id" => "required",
        //         "jumlah" => "required",
        //         "satuan" => "required",
        //         "supplierId" => 'required',
        //     ];
        // }

    }
}
