@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        Buat Data Perbaikan
    </div>

    <div class="card-body">
        <form action="{{ route("admin.perbaikans.store") }}" method="POST" enctype="multipart/form-data">
            @csrf
            @include('admin.perbaikan.form')
            <div>
                <input class="btn btn-danger" type="submit" value="{{ trans('global.save') }}">
            </div>
        </form>
    </div>
</div>

@endsection
