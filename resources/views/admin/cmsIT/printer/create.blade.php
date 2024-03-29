@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        Tambah Data Printer
    </div>

    <div class="card-body">
        <form action="{{ route("it.printers.store") }}" method="POST" enctype="multipart/form-data">
            @csrf
                @include('admin.cmsIT.printer.form')
            <div>
                <input class="btn btn-success" type="submit" value="{{ trans('global.save') }}">
            </div>
        </form>
    </div>
</div>

@endsection
