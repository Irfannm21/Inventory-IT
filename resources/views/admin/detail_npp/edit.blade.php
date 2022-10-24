@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        Buat Data NPP
    </div>

    <div class="card-body">
    <form action="{{ route("admin.details.update", [$detail->id]) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group col-md-4 {{ $errors->has('npp_id') ? 'has-error' : '' }}">
            <label for="npp_id">Kode NPP</label>
            <input type="text" id="npp_id" name="npp_id" class="form-control" value="{{ old('npp_id', isset($detail->npp_id) ? $detail->npp->kode : '') }}" disabled>
            @if($errors->has('npp_id'))
                <em class="invalid-feedback">
                    {{ $errors->first('npp_id') }}
                </em>
            @endif
            <p class="helper-block text-muted">
                *Nomor NPP
            </p>
        </div>

        <div class="form-group col-md-4 {{ $errors->has('nama') ? 'has-error' : '' }}">
            <label for="nama">Nama</label>
            <input type="text" id="nama" name="nama" class="form-control" value="{{ old('nama', isset($detail->nama) ? $detail->nama : '') }}"  >
            @if($errors->has('nama'))
                <em class="invalid-feedback">
                    {{ $errors->first('nama') }}
                </em>
            @endif
            <p class="helper-block text-muted">
                *Nama Barang
            </p>
        </div>

        <div class="form-group col-md-4 {{ $errors->has('jumlah') ? 'has-error' : '' }}">
            <label for="jumlah">Jumlah</label>
            <input type="number" id="jumlah" name="jumlah" class="form-control" value="{{ old('jumlah', isset($detail->jumlah) ? $detail->jumlah : '') }}"  >
            @if($errors->has('jumlah'))
                <em class="invalid-feedback">
                    {{ $errors->first('jumlah') }}
                </em>
            @endif
            <p class="helper-block text-muted">
                *Jumlah Barang
            </p>
        </div>

        <div class="form-group col-md-4 {{ $errors->has('satuan') ? 'has-error' : '' }}">
            <label for="satuan">Satuan</label>
            <select name="satuan" class="form-control" id="">
                <option value="" selected>-- Pilih --</option>
                <option value="Pcs[]">Pcs</option>
                <option value="Unit">Unit</option>
                <option value="Pack">Pack</option>
                <option value="Dus">Dus</option>
                <option value="Kg">Kg</option>
                <option value="Liter">Liter</option>
                <option value="Meter">Meter</option>
            </select>
            @if ($errors->has('satuan'))
                <em class="invalid-feedback">
                    {{ $errors->first('satuan') }}
                </em>
            @endif
            <p class="helper-block text-muted">
                *Satuan
            </p>
        </div>

        <div class="form-group col-md-4 {{ $errors->has('stok') ? 'has-error' : '' }}">
            <label for="stok">stok</label>
            <input type="number" id="stok" name="stok" class="form-control" value="{{ old('stok', isset($detail->stok) ? $detail->stok : '') }}"  >
            @if($errors->has('stok'))
                <em class="invalid-feedback">
                    {{ $errors->first('stok') }}
                </em>
            @endif
            <p class="helper-block text-muted">
                *Satuan
            </p>
        </div>

        <div class="form-group col-md-4 {{ $errors->has('keterangan') ? 'has-error' : '' }}">
            <label for="keterangan">keterangan</label>
            <input type="text" id="keterangan" name="keterangan" class="form-control" value="{{ old('keterangan', isset($detail->keterangan) ? $detail->keterangan : '') }}"  >
            @if($errors->has('keterangan'))
                <em class="invalid-feedback">
                    {{ $errors->first('keterangan') }}
                </em>
            @endif
            <p class="helper-block text-muted">
                *Satuan
            </p>
        </div>

            </table>
            <div>
                <input class="btn btn-danger" type="submit" value="{{ trans('global.save') }}">
            </div>
        </form>
    </div>
</div>

@endsection
