<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\Model;
class KomputerStoreUpdateRequest extends FormRequest
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
        $id = $this->komputer->id ?? '';
        return [
            'kode' =>   'required|min:12|max:12|unique:komputers,kode,' . $id,
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
