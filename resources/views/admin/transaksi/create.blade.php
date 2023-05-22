@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        Buat Data Pembayaran
    </div>

    <div class="card-body">
        <form action="{{ route("admin.pembayarans.store") }}" method="POST" enctype="multipart/form-data">
            @csrf
            @include('admin.transaksi.form')
            <div>
                <input class="btn btn-danger" type="submit" value="{{ trans('global.save') }}">
            </div>
        </form>
    </div>
</div>

@endsection
