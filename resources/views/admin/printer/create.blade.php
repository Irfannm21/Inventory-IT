@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        Tambah Data Printer
    </div>

    <div class="card-body">
        <form action="{{ route("it.printers.store") }}" method="POST" enctype="multipart/form-data">
            @csrf
                @include('admin.printer.form')
            <div>
                <input class="btn btn-danger" type="submit" value="{{ trans('global.save') }}">
            </div>
        </form>
    </div>
</div>

@endsection
