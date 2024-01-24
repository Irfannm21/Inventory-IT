@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        Buat Data Perbaikan
    </div>

    <div class="card-body">
        <form action="{{ route("it.perbaikans.store") }}" method="POST" enctype="multipart/form-data">
            @csrf
            @include('admin.cmsIT.perbaikan.form')
            <div class="mt-3 ml-3">
                <input class="btn btn-success" type="submit" value="{{ trans('global.save') }}">
            </div>
        </form>
    </div>
</div>

@endsection
