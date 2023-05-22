<?php

namespace App\Http\Requests;

use App\Perbaikan;
use Gate;
use Illuminate\Foundation\Http\FormRequest;

class StorePerbaikanRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return \Gate::allows('perbaikan_create');
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
            'kerusakan' => 'required|min:3|max:50',
            'tindakan' => 'required|min:3|max:50',
            // 'stop' => 'required',
            // 'selesai' => 'required',
            // 'petugas' => 'required',
        ];


    }
}
