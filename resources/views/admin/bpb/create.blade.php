@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        Buat Data BPB
    </div>

    <div class="card-body">
        <form action="{{ route("admin.bpbs.store") }}" method="POST" enctype="multipart/form-data">
            @csrf
            @include('admin.bpb.form')
            <div>
                <input class="btn btn-danger" type="submit" value="{{ trans('global.save') }}">
            </div>
        </form>
    </div>
</div>

@endsection
