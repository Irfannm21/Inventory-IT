@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        Buat Data BP
    </div>

    <div class="card-body">
        <form action="{{ route("admin.bons.store") }}" method="POST" enctype="multipart/form-data">
            @csrf
            @include('admin.bon.form')
            <div>
                <input class="btn btn-success" type="submit" value="{{ trans('global.save') }}">
            </div>
        </form>
    </div>
</div>

@endsection
