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
            'hardware' => 'required',
            'tanggal' => 'required',
            'keterangan' => 'required',
        ];
    }
}
