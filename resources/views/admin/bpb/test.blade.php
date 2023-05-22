<div class="form-row">
    <div class="form-group col-md-4 {{ $errors->has('kode') ? 'has-error' : '' }}">
        <label for="">Kode BPB</label>
        <input type="text" name="kode" class="form-control" value="{{ old('kode', isset($bpb) ? $bpb->kode : '') }}"
            placeholder="Cth: 001/ENG/22">
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
            {{ trans('*Masukan Kode BPB') }}
        </p>
    </div>
</div>

<div class="form-row">
    <div class="form-group col-md-4 {{ $errors->has('kode_npp') ? 'has-error' : '' }}">
        <label for="">Kode NPP</label>
        <select name="kode_npp" id="kode_npp" class="form-control select2">

        </select>
        @if ($errors->has('kode_npp'))
            <em class="invalid-feedback">
                {{ $errors->first('kode_npp') }}
            </em>
        @endif
        <p class="helper-block">
            {{ trans('*Pilih Kode NPP') }}
        </p>
    </div>
</div>

<button class="btn btn-primary" id="addBtn" type="button">Tambah</button>

<div class="form-row pt-2" id="detailTBody">
    <div class="form-group col-md-3 {{ $errors->has('detail_id') ? 'has-error' : '' }}">
        <label id="hasil">Nama Barang</label>
        <select name="detail_id[]" id="detail_id" class="form-control detail_id">

        </select>
        @if ($errors->has('detail_id'))
            <em class="invalid-feedback">
                {{ $errors->first('detail_id') }}
            </em>
        @endif

    </div>

    <div class="form-group col-md-1 {{ $errors->has('jumlah') ? 'has-error' : '' }}">
        <label for="">Jumlah</label>
        <input type="number" name="jumlah[]" class="form-control"
            value="{{ old('jumlah', isset($bpb) ? $bpb->jumlah : '') }}">
        @if ($errors->has('jumlah'))
            <em class="invalid-feedback">
                {{ $errors->first('jumlah') }}
            </em>
        @endif
    </div>

    <div class="form-group col-md-2 {{ $errors->has('satuan') ? 'has-error' : '' }}">
        <label for="">Satuan</label>
        <select name="satuan[]" id="satuan" class="form-control">
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
    </div>

    <div class="form-group col-md-2 {{ $errors->has('harga') ? 'has-error' : '' }}">
        <label for="">Harga</label>
        <input type="text" name="harga[]" class="form-control"
            value="{{ old('harga', isset($bpb) ? $bpb->harga : '') }}">
        @if ($errors->has('harga'))
            <em class="invalid-feedback">
                {{ $errors->first('harga') }}
            </em>
        @endif
    </div>

    <div class="form-group col-md-4 {{ $errors->has('keterangan') ? 'has-error' : '' }}">
        <label for="">Keterangan</label>
        <input type="text" name="keterangan[]" class="form-control"
            value="{{ old('keterangan', isset($bpb) ? $bpb->keterangan : '') }}">
        @if ($errors->has('keterangan'))
            <em class="invalid-feedback">
                {{ $errors->first('keterangan') }}
            </em>
        @endif
    </div>
</div>


<template id="detailTmpl">
        <div class="form-group col-md-3 {{ $errors->has('npp_id') ? 'has-error' : '' }}">
            <select name="detail_id[]" id="detail_id" class="form-control detail_id">

        </select>
        @if ($errors->has('npp_id'))
            <em class="invalid-feedback">
                {{ $errors->first('npp_id') }}
            </em>
        @endif

    </div>

    <div class="form-group col-md-1 {{ $errors->has('jumlah') ? 'has-error' : '' }}">
        <input type="number" name="jumlah[]" class="form-control"
            value="{{ old('jumlah', isset($bpb) ? $bpb->jumlah : '') }}">
        @if ($errors->has('jumlah'))
            <em class="invalid-feedback">
                {{ $errors->first('jumlah') }}
            </em>
        @endif
    </div>

    <div class="form-group col-md-2 {{ $errors->has('satuan') ? 'has-error' : '' }}">
        <select name="satuan[]" id="satuan" class="form-control">
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
    </div>

    <div id="test2" class="form-group col-md-2 {{ $errors->has('harga') ? 'has-error' : '' }}">
        <input type="text" name="harga[]" class="form-control"
            value="{{ old('harga', isset($bpb) ? $bpb->harga : '') }}">
        @if ($errors->has('harga'))
            <em class="invalid-feedback">
                {{ $errors->first('harga') }}
            </em>
        @endif
    </div>

    <div id="test" class="form-group col-md-3 {{ $errors->has('keterangan') ? 'has-error' : '' }}">
        <input type="text" name="keterangan[]" class="form-control"
            value="{{ old('keterangan', isset($bpb) ? $bpb->keterangan : '') }}">
        @if ($errors->has('keterangan'))
            <em class="invalid-feedback">
                {{ $errors->first('keterangan') }}
            </em>
        @endif
    </div>

    <div class="col-md-1">

    </div>

</template>

@section('scripts')
    <script>
        $(document).ready(function() {
            $(document)
                .on('click', '#addBtn', function() {
                    $('#detailTBody').append($('#detailTmpl').html());
                })
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
