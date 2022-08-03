<?php

namespace App\Http\Requests;

use App\printer;
use Illuminate\Foundation\Http\FormRequest;

class StorePrinterRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return \Gate::allows('printer_create');
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
            'tanggal' => 'required',
            'nama' => 'required',
        ];
    }
}
