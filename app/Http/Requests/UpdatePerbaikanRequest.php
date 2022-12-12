<?php

namespace App\Http\Requests;

use App\Perbaikan;
use Illuminate\Foundation\Http\FormRequest;

class UpdatePerbaikanRequest extends FormRequest
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
            'tanggal' => 'required',
            'kerusakan' => 'required',
            'tindakan' => 'required',
            'stop' => 'required',
            'mulai' => 'required',
            'total' => 'required',
            'petugas' => 'required',
        ];
    }
}
