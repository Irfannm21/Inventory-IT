<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Komputer;

class UpdateKomputerRequest extends FormRequest
{
    public function authorize()
    {
        return \Gate::allows('komputer_edit');
    }

    public function rules()
    {
        return [
            'kode' =>   'required',
            'system' =>   'required',
            'nomor_ip' => 'required',
            'motherboard' =>   'required',
            'processor' => 'required',
            'powersupply' => 'required',
            'ram' =>   'required',
            'disk' => 'required',
            'split' => 'required',
            'monitor1' => 'required',
        ];
    }
}
