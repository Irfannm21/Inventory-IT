<?php

namespace App\Http\Requests;

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
        // return \Gate::allows('printer_create');
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {

        // dd($this->request->all());
        // $id = $this->printer->id ?? 0;
        return  [
            'kode' => 'required|max:30|min:5|unique:printers',
            'tanggal' => 'required',
            'deskripsi' => 'required',
        ];
        // return $rules;
    }

    public function messsages()
    {
        return [
            // 'unique_with' => "Data Sudah ada"
        ];
    }
}
