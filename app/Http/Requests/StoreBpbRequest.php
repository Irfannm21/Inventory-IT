<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Gate;
use App\bpb;
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
            'tanggal' =>   'required',
            'kelompok' =>   'required',
            "npp_id" => "required",
            "detail_id" => "required",
            "jumlah" => "required",
            "satuan" => "required",
        ];
    }
}
