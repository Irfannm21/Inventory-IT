<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Gate;
use App\Komputer;

class StoreKomputerRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return \Gate::allows('komputer_create');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'kode' =>   'required|min:12|max:12|unique:komputers,kode',
            'system' =>   'required',
            'nomor_ip' => 'required',
            'motherboard' =>   'required',
            'processor' => 'required',
            'powersupply' => 'required',
            'ram' =>   'required',
            'vga' => 'required',
            'disk' => 'required',
            'split' => 'required',
            'monitor1' => 'required',
        ];
    }
}
