@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        Buat Data Komputer
    </div>

    <div class="card-body">
        <form action="{{ route("admin.daftar_barang_spareparts.store") }}" method="POST" enctype="multipart/form-data">
            @csrf
            @include('admin.inventori_sparepart.form')
            <div>
                <input class="btn btn-success" type="submit" value="{{ trans('global.save') }}">
            </div>
        </form>
    </div>
</div>

@endsection
