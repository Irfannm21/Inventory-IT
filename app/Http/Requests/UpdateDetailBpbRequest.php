<?php

namespace App\Http\Requests;

use Gate;
use Illuminate\Foundation\Http\FormRequest;

class UpdateDetailBpbRequest extends FormRequest
{

    public function authorize()
    {
        return \Gate::allows('bpb_edit');
    }

    public function rules()
    {
        return [
            "bpb_id" => "required",
        ];
    }
}
