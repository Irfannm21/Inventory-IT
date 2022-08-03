<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Klien;

class UpdateKlienRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return \Gate::allows('printer_edit');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'karyawan_id' =>   'required',
            'printer_id' =>   'required',
            'komputer_id' => 'required',
        ];
    }
}
