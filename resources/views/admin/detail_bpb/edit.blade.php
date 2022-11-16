@extends('layouts.admin')
@section('content')
    <div class="card">
        <div class="card-header">
            {{ trans('global.edit') }} {{ trans('global.product.title_singular') }}
        </div>

        <div class="card-body">
            <form action="{{ route('admin.detail_bpbs.update', [$result->id]) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-row">
                    <div class="form-group col-md-4 {{ $errors->has('kode-npp') ? 'has-error' : '' }}">
                        <label for="">Kode NPP</label>
                        <input type="text" class="form-control"
                            value="{{ old('kode-npp', isset($result) ? $result->bpb->npp->kode : '') }}" readonly>
                        @if ($errors->has('kode-npp'))
                            <em class="invalid-feedback">
                                {{ $errors->first('kode-npp') }}
                            </em>
                        @endif
                        <p class="helper-block">
                            {{ trans('*Masukan Kode NPP') }}
                        </p>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-md-4 {{ $errors->has('kode-npp') ? 'has-error' : '' }}">
                        <label for="">Kode BPB</label>
                        <input type="text" class="form-control"
                            value="{{ old('kode-npp', isset($result) ? $result->bpb->kode : '') }}" readonly>
                        @if ($errors->has('kode-npp'))
                            <em class="invalid-feedback">
                                {{ $errors->first('kode-npp') }}
                            </em>
                        @endif
                        <p class="helper-block">
                            {{ trans('*Masukan Kode NPP') }}
                        </p>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-md-4 {{ $errors->has('kode') ? 'has-error' : '' }}">
                        <label for="">Nama Barang</label>
                        <select name="detail_id" id="detail_id" class="form-control detail_id">
                            @foreach ($bpb as $i => $item)
                                <option value="{{ $i }}"
                                    {{ $result->detail_npp->id==$i ? 'selected' : '' }}>
                                    {{ $item }}</option>
                            @endforeach
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
                    <div class="form-group col-md-2 {{ $errors->has('kode') ? 'has-error' : '' }}">
                        <label for="">Jumlah Barang</label>
                        <input name="jumlah" type="text" class="form-control"
                            value="{{ old('bpb_id', isset($result) ? $result->jumlah : '') }}">
                        @if ($errors->has('kode'))
                            <em class="invalid-feedback">
                                {{ $errors->first('kode') }}
                            </em>
                        @endif

                    </div>
                    <div class="form-group col-md-2 {{ $errors->has('kode') ? 'has-error' : '' }}">
                        <label for="">Satuan</label>
                        <select name="satuan" id="satuan" class="form-control">
                        <option value="Unit" {{ $result->satuan =="Unit"? 'selected' : '' }}>Unit</option>
                        <option value="Pcs" {{ $result->satuan =="Pcs"? 'selected' : '' }}>Pcs</option>
                        <option value="Kg" {{ $result->satuan =="Kg"? 'selected' : '' }}>Kg</option>
                        <option value="Meter" {{ $result->satuan =="Meter"? 'selected' : '' }}>Meter</option>
                        <option value="Inch" {{ $result->satuan =="Inch"? 'selected' : '' }}>Inch</option>
                        <option value="Dus" {{ $result->satuan =="Dus"? 'selected' : '' }}>Dus</option>
                    </select>
                        @if ($errors->has('kode'))
                            <em class="invalid-feedback">
                                {{ $errors->first('kode') }}
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
