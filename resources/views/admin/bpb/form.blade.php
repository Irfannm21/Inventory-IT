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
    <div class="form-group col-md-4 {{ $errors->has('kode') ? 'has-error' : '' }}">
        <label for="">Kelompok BPB</label>
        <select name="kelompok" id="kelompok" class="form-control">
            <option value="" selected>-- Pilih --   </option>
            <option value="Sparepart">Sparepart</option>
            <option value="Administrasi">Administrasi</option>
            <option value="Elektrik">Elektrik</option>
            <option value="Mobil">Mobil</option>
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
    <div class="form-group col-md-4 {{ $errors->has('tanggal') ? 'has-error' : '' }}">
        <label for="">Tanggal</label>
        <input type="date" name="tanggal" class="form-control"
            value="{{ old('tanggal', isset($bpb) ? $bpb->tanggal : '') }}">
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
    <div class="form-group col-md-4 {{ $errors->has('npp_id') ? 'has-error' : '' }}">
        <label for="">Kode NPP</label>
        <select name="npp_id" id="npp_id" class="form-control select2">
            <option value="" selected>-- Pilih --</option>
            @foreach ($npp as $i => $item)
            <option value="{{$i}}">{{$item}}</option>
            @endforeach
        </select>
        @if ($errors->has('npp_id'))
            <em class="invalid-feedback">
                {{ $errors->first('npp_id') }}
            </em>
        @endif
        <p class="helper-block">
            {{ trans('*Pilih Kode NPP') }}
        </p>
    </div>
</div>

<button class="btn btn-primary" id="addBtn" type="button">Tambah</button>

<table class="table table-responsive table-borderless" id="detailTBody">
    <tr>
        <td style="width: 300px">
            <div class="form-group {{ $errors->has('detail_id') ? 'has-error' : '' }}">
                <label id="hasil">Nama Barang</label>
                <select name="detail_id[]" id="detail_id" class="form-control detail_id">

                </select>
                @if ($errors->has('detail_id'))
                    <em class="invalid-feedback">
                        {{ $errors->first('detail_id') }}
                    </em>
                @endif
            </div>
        </td>
        <td style="width: 200px">
            <div class="form-group {{ $errors->has('jumlah') ? 'has-error' : '' }}">
                <label for="">Jumlah</label>
                <input type="number" name="jumlah[]" class="form-control"
                    value="{{ old('jumlah', isset($bpb) ? $bpb->jumlah : '') }}">
                @if ($errors->has('jumlah'))
                    <em class="invalid-feedback">
                        {{ $errors->first('jumlah') }}
                    </em>
                @endif
            </div>
        </td>
        <td style="width: 200px">
            <div class="form-group{ $errors->has('satuan') ? 'has-error' : '' }}">
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
        </td>
    </tr>
</table>

<template id="detailTmpl">
    <tr style="padding:0px">
        <td style="width: 300px">
            <div class="form-group{{ $errors->has('detail_id') ? 'has-error' : '' }}">
                <select name="detail_id[]" id="detail_id" class="form-control detail_id">

                </select>
                @if ($errors->has('detail_id'))
                    <em class="invalid-feedback">
                        {{ $errors->first('detail_id') }}
                    </em>
                @endif
            </div>
        </td>
        <td style="width: 200px">
            <div class="form-group {{ $errors->has('jumlah') ? 'has-error' : '' }}">
                <input type="number" name="jumlah[]" class="form-control"
                    value="{{ old('jumlah', isset($bpb) ? $bpb->jumlah : '') }}">
                @if ($errors->has('jumlah'))
                    <em class="invalid-feedback">
                        {{ $errors->first('jumlah') }}
                    </em>
                @endif
            </div>
        </td>
        <td style="width: 200px">
            <div class="form-group{ $errors->has('satuan') ? 'has-error' : '' }}">
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
        </td>
        <td>
            <button class="btn btn-danger removeBtn">
                Del
            </button>
        </td>
    </tr>
</template>
@section('scripts')
    <script>
        $(document).ready(function() {
            $(document)
                .on('click', '#addBtn', function() {
                    $('#detailTBody').append($('#detailTmpl').html());
                })
                .on('change', '#npp_id', function() {
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
                });
                $("#detailTBody").on("click",".removeBtn", function() {
                    $(this).closest('tr').remove();
                })

        })

    </script>
@endsection
