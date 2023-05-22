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

        // dd($request->all());
        return [
            'kode' =>   'required|max:30|min:5|unique:printers,kode',
            'tanggal' => 'required',
            'deskripsi' => 'required',
        ];
    }
}
