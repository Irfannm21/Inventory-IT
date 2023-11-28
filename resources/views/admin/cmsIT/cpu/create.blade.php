@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        Buat Data Komputer
    </div>

    <div class="card-body">
        <form action="{{ route("it.komputers.store") }}" method="POST" enctype="multipart/form-data">
            @csrf
            @include('admin.cmsIT.cpu.form')
            <div>
                <input class="btn btn-danger" type="submit" value="{{ trans('global.save') }}">
            </div>
        </form>
    </div>
</div>

@endsection
