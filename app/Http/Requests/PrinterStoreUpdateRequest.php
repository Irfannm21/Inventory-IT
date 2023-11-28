<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

use App\printer;
class PrinterStoreUpdateRequest extends FormRequest
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
        // dd($this->request-> all());
        return  [
            'kode' => 'required',
            'tanggal' => 'required',
            'deskripsi' => 'required',
        ];
    }
}
