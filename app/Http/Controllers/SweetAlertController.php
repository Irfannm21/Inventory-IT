<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class SweetAlertController extends Controller
{
    public function alertSuccess()
    {
        Alert::alert('Selamat!','Anda berhasil menjalankan Sweet Alert','success');
        return view('swal-laravel');

    }
}
