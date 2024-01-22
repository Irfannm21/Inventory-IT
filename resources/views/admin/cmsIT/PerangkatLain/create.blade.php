@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        Tambah Data Perangkat
    </div>

    <div class="card-body">
        <form action="{{ route("it.perangkats.store") }}" method="POST" enctype="multipart/form-data">
            @csrf
                @include('admin.cmsIT.PerangkatLain.form')
            <div>
                <input class="btn btn-success" type="submit" value="{{ trans('global.save') }}">
            </div>
        </form>
    </div>
</div>

@endsection
