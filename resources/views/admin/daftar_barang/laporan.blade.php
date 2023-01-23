@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        Buat Laporan Mutasi Barang
    </div>

    <div class="card-body">
        <div class="card-title">
            <h5 class="title">Buat Laporan Bulanan Mutasi Barang</h5>
        </div>
        <form action="{{ route("admin.daftar_barangs.print") }}" method="GET" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="">Dari Tanggal</label>
                <input type="date" class="form-control" name="dari">
            </div>
            <div class="form-group">
                <label for="">Sampai Tanggal</label>
                <input type="date" class="form-control" name="sampai">
            </div>

            <input class="btn btn-primary" type="submit" value=" {{ trans('global.save') }}">
        </form>
    </div>
</div>

@endsection
