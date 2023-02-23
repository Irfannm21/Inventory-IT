<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Validator;


class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function validate(array $data) {
        $rules = [
            "tanggal" => 'required',
            "kerusakan" => 'required',
            "tindakan" => "required|min:5|max:10sss0",
        ];

        $pesan = [
            "tanggal.required" => "Tanggal harus di isi",
            "kerusakan.required" => "Kerusakan harus di isi",
            "tindakan.required" => "Tindakan harus di isi",
        ];

        $validator = Validator::make($data,$rules,$pesan);

        if($validator->fails()) {
            throw new ValidatorException($validator);
        }
    }
}
