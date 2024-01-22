@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        Edit Data
    </div>

    <div class="card-body">
        <form action="{{ route("admin.kliens.update", [$klien->id]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            @include('admin.pengguna.form')
            <div>
                <input class="btn btn-success" type="submit" value="{{ trans('global.save') }}">
            </div>
        </form>
    </div>
</div>

@endsection
