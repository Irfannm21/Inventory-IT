@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        Buat Data NPP
    </div>

    <div class="card-body">
        <form action="{{ route("admin.npps.store") }}" method="POST" enctype="multipart/form-data">
            @csrf
            @include('admin.npp.form')
            <div>
                <input class="btn btn-danger" type="submit" value="{{ trans('global.save') }}">
            </div>
        </form>
    </div>
</div>

@endsection
