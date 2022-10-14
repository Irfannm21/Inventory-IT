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
                    <div class="form-group col-md-4 {{ $errors->has('detail_id') ? 'has-error' : '' }}">
                        <label id="hasil">Nama Barang</label>
                        <select name="detail_id" id="detail_id" class="form-control detail_id">
                            @foreach ($detail as $i => $item)
                                <option value="{{ $i }}">{{ $item }}</option>
                            @endforeach
                            <option value=""></option>
                        </select>
                        @if ($errors->has('detail_id'))
                            <em class="invalid-feedback">
                                {{ $errors->first('detail_id') }}
                            </em>
                        @endif
                        <p class="helper-block">
                            {{ trans('*Masukan Nama Barang') }}
                        </p>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-md-2 {{ $errors->has('jumlah') ? 'has-error' : '' }}">
                        <label for="">Jumlah</label>
                        <input type="number" name="jumlah" class="form-control"
                            value="{{ old('jumlah', isset($bpb) ? $bpb->jumlah : '') }}" placeholder="Cth: 001/ENG/22">
                        @if ($errors->has('jumlah'))
                            <em class="invalid-feedback">
                                {{ $errors->first('jumlah') }}
                            </em>
                        @endif
                        <p class="helper-block">
                            {{ trans('*Masukan jumlah barang') }}
                        </p>
                    </div>
                    <div class="form-group col-md-2 {{ $errors->has('satuan') ? 'has-error' : '' }}">
                        <label for="">Satuan</label>
                        <select name="satuan" id="satuan" class="form-control">
                            @if (!isset($bpb))
                                <option value="" selected>-- Pilih --</option>
                            @endif
                            <option value="unit">Unit</option>
                            <option value="pcs">Pcs</option>
                            <option value="kg">Kg</option>
                            <option value="meter">Meter</option>
                            <option value="inch">Inch</option>
                        </select>
                        @if ($errors->has('satuan'))
                            <em class="invalid-feedback">
                                {{ $errors->first('satuan') }}
                            </em>
                        @endif
                        @if ($errors->has('satuan'))
                            <em class="invalid-feedback">
                                {{ $errors->first('satuan') }}
                            </em>
                        @endif
                        <p class="helper-block">
                            {{ trans('*Pilih Satuan Barang') }}
                        </p>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-md-4 {{ $errors->has('supplier') ? 'has-error' : '' }}">
                        <label for="">Supplier</label>
                        <input type="text" name="supplier" class="form-control"
                            value="{{ old('supplier', isset($bpb) ? $bpb->supplier : '') }}" placeholder="Cth: 001/ENG/22">
                        @if ($errors->has('supplier'))
                            <em class="invalid-feedback">
                                {{ $errors->first('supplier') }}
                            </em>
                        @endif
                        <p class="helper-block">
                            {{ trans('*Masukan nama supplier') }}
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
        $(document).ready(function() {
            $(document)
                .on('change', '#kode_npp', function() {
                    $.ajax({
                        method: 'GET',
                        url: '{{ url('admin/npps/options') }}',
                        data: {
                            npp_id: $(this).val()
                        },
                        success: function(response) {
                            console.log(204, response);
                            let options = '';
                            for (let item of response) {
                                options += `<option value='${item.id}'>${item.nama}</option>`;
                            }
                            $('.detail_id').html(options);
                        }
                    })
                })
        })



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
