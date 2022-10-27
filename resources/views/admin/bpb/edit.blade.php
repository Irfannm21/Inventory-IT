@extends('layouts.admin')
@section('content')
    <div class="card">
        <div class="card-header">
            {{ trans('global.edit') }} {{ trans('global.product.title_singular') }}
        </div>

        <div class="card-body">
            <form action="{{ route('admin.bpbs.update', [$bpb->id]) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-row">
                    <div class="form-group col-md-4 {{ $errors->has('npp_id') ? 'has-error' : '' }}">
                        <label for="">Kode NPP</label>
                        <input type="text" class="form-control"
                            value="{{ old('npp_id', isset($bpb) ? $bpb->npp->kode : '') }}" readonly>
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
                            value="{{ old('kode', isset($bpb) ? $bpb->kode : '') }}" placeholder="Cth: 001/ENG/22">
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
                            value="{{ old('tanggal', isset($bpb) ? $bpb->tanggal : '') }}" placeholder="Cth: 001/ENG/22">
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
                            @foreach ($results as $item)
                            <option value="{{$item->id}}">{{$item}}</option>

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
