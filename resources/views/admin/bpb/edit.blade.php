@extends('layouts.admin')
@section('content')
    <div class="card">
        <div class="card-header">
            {{ trans('global.edit') }} {{ trans('global.product.title_singular') }}
        </div>

        <div class="card-body">
            <form action="{{ route('admin.bpbs.update', [$result->id]) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-row">
                    <div class="form-group col-md-4 {{ $errors->has('npp_id') ? 'has-error' : '' }}">
                        <label for="">Kode NPP</label>
                        <input type="text" class="form-control"
                            value="{{ old('npp_id', isset($result) ? $result->npp->kode : '') }}" readonly>
                        @if ($errors->has('npp_id'))
                            <em class="invalid-feedback">
                                {{ $errors->first('npp_id') }}
                            </em>
                        @endif
                        <p class="helper-block">
                            {{ trans('*Masukan Kode NPP') }}
                        </p>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-md-4 {{ $errors->has('kode') ? 'has-error' : '' }}">
                        <label for="">Kode BPB</label>
                        <input type="text" name="kode" class="form-control"
                            value="{{ old('kode', isset($result) ? $result->kode : '') }}" placeholder="Cth: 001/ENG/22">
                        @if ($errors->has('kode'))
                            <em class="invalid-feedback">
                                {{ $errors->first('kode') }}
                            </em>
                        @endif
                        <p class="helper-block">
                            {{ trans('*Masukan Kode BPB') }}
                        </p>
                    </div>
                </div>


                <div class="form-row">
                    <div class="form-group col-md-4 {{ $errors->has('tanggal') ? 'has-error' : '' }}">
                        <label for="">Tanggal</label>
                        <input type="date" name="tanggal" class="form-control"
                            value="{{ old('tanggal', isset($result) ? $result->tanggal : '') }}" placeholder="Cth: 001/ENG/22">
                        @if ($errors->has('tanggal'))
                            <em class="invalid-feedback">
                                {{ $errors->first('tanggal') }}
                            </em>
                        @endif
                        <p class="helper-block">
                            {{ trans('*Masukan Tanggal') }}
                        </p>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-md-4 {{ $errors->has('kode') ? 'has-error' : '' }}">
                        <label for="">Kelompok BPB</label>
                        <select name="kelompok" id="kelompok" class="form-control">
                            <option value="Sparepart" {{old('kelompok', $result->kelompok=="Sparepart" ? 'selected' : ' ' )}}>Sparepart</option>
                            <option value="Administrasi" {{old('kelompok', $result->kelompok=="Administrasi" ? 'selected' : '   ' )}}>Administrasi</option>
                            <option value="Elektrik" {{old('kelompok', $result->kelompok== "Elektrik" ? 'selected' : '  ' )}}>Elektrik</option>
                            <option value="Mobil" {{old('kelompok', $result->kelompok== "Mobil" ? 'selected' : '' )}}>Mobil</option>
                            <option value="PT" {{old('kelompok', $result->kelompok=="PT" ? 'selected' : '' )}}>PT</option>
                            <option value="Spinning" {{old('kelompok', $result->kelompok== "Spinning" ? 'selected' : '  ' )}}>Spinning</option>
                            <option value="UM" {{old('kelompok', $result->kelompok== "UM" ? 'selected' : '  ' )}}>UM</option>
                        </select>
                        @if ($errors->has('kode'))
                            <em class="invalid-feedback">
                                {{ $errors->first('kode') }}
                            </em>
                        @endif
                        <p class="helper-block">
                            {{ trans('*Masukan Kode BPB') }}
                        </p>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-md-4 {{ $errors->has('kode') ? 'has-error' : '' }}">
                    <label for="supplier_id">Nama Supplier</label>
                        <select name="supplier_id" id="supplier_id" class="form-control select2">
                            <option value="" selected>-- Pilih --</option>
                            @foreach ($suppliers as $i => $item)
                            <option value="{{$i}}" {{ $result->supplier->nama==$item ? 'selected' : '' }}>{{$item}}</option>
                            @endforeach
                        </select>
                        @if ($errors->has('supplier_id'))
                            <em class="invalid-feedback">
                                {{ $errors->first('supplier_id') }}
                            </em>
                        @endif
                    </div>
                </div>


                <div>
                    <input class="btn btn-danger" type="submit" value="{{ trans('global.save') }}">
                </div>
            </form>
        </div>
    </div>
    <script>

        let namaBarang = document.getElementById("kode_npp");

        const generateNpp = () => {
            let request = new XMLHttpRequest();
            request.open("GET", "../../kode-npp.php", false);
            request.send();
            namaBarang.innerHTML = request.responseText;
        }

        generateNpp();
    </script>
@endsection
