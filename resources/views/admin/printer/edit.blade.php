@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('global.product.title_singular') }}
    </div>

    <div class="card-body">
        <form action="{{ route("admin.printers.update", [$printer->id]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
             <div class="col-md-4 {{ $errors->has('kode') ? 'has-error' : '' }}">
                <label for="kode">Kode</label>
                <input type="text" id="kode" name="kode" class="form-control" value="{{ old('kode', isset($printer) ? $printer->kode : '') }}" placeholder="Cth: 01/L220/65">
                @if($errors->has('kode'))
                    <em class="invalid-feedback">
                        {{ $errors->first('kode') }}
                        @endif
                    </em>
                <p class="helper-block">
                    {{ trans('global.printer.fields.kode') }}
                </p>
            </div>


            <div class="col-md-4 {{ $errors->has('nama') ? 'has-error' : '' }}">
                <label for="nama">Deskripsi</label>
                <input type="text" id="nama" name="nama" class="form-control" value="{{ old('nama', isset($printer) ? $printer->nama : '') }}" placeholder="Cth: 01-Irfan-53/Epson-L220/192.168.1.65">
                @if($errors->has('nama'))
                    <em class="invalid-feedback">
                        {{ $errors->first('nama') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('global.printers.fields.nama') }}
                </p>
            </div>
            <div>
                <input class="btn btn-danger" type="submit" value="{{ trans('global.save') }}">
            </div>
        </form>
    </div>
</div>

@endsection
