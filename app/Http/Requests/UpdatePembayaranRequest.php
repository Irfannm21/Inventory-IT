<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Perbaikan;

class UpdatePembayaranRequest extends FormRequest
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
            "bpb_id" => 'required',
            "harga_satuan" => 'required',
            'jenis_pembayaran' => 'required'
        ];
    }
}
