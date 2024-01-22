<div class="col-md-6 {{ $errors->has('kode') ? 'has-error' : '' }}">
    <label for="kode">Kode</label>
    @if (isset($hardware))
    <input type="text" id="kode" name="kode" class="form-control" value="{{ old('kode', isset($hardware) ? $hardware->kode : "Tidak ada") }}" readonly>
    @else
    <input type="text" name="tipe" class="form-control" value="{{ old('kode') ?? ($result->hardwareable->kode ?? '') }}" readonly>
    @endif
    @if ($errors->has('kode'))
        <em class="invalid-feedback">
            {{ $errors->first('kode') }}
    @endif
    </em>
</div>

<div class="col-md-6 {{ $errors->has('tanggal') ? 'has-error' : '' }}">
    <label for="tanggal">Tanggal</label>
    <input type="date" id="tanggal" name="tanggal" class="form-control"
        value="{{ old('tanggal') ?? ($result->tanggal ?? '') }}">
    @if ($errors->has('tanggal'))
        <em class="invalid-feedback">
            {{ $errors->first('tanggal') }}
    @endif
    </em>

</div>



<div class="col-md-6 {{ $errors->has('bp') ? 'has-error' : '' }}">
    <div class="row">
        <div class="col">
            <label for="bp">Nomor Bon Pengambilan</label>
            <select name="bp" id="bp" class="form-control">
                <option value="">-- Pilih --</option>
            @foreach ($BonKeluar as $item)
                <option value="{{$item->kode}}">{{$item->kode}}</option>
            @endforeach
            </select>
        </div>
        <div class="col">
            <label for="barang_id">Nama Barang</label>
            <select name="barang_id" id="barang_id" class="form-control">
                <option value="">-- Pilih --</option>
            </select>
        </div>
    </div>

    @if ($errors->has('bp'))
        <em class="invalid-feedback">
            {{ $errors->first('bp') }}
    @endif
    </em>

</div>

<div class="col-md-6 {{ $errors->has('kerusakan') ? 'has-error' : '' }}">
    <label for="kerusakan">Nama Kerusakan</label>
    <input type="text" id="kerusakan" name="kerusakan" class="form-control"
        value="{{ old('kerusakan', isset($result) ? $result->kerusakan : '') }}"
        placeholder="Cth: Printer Papper Jump">
    @if ($errors->has('kerusakan'))
        <em class="invalid-feedback">
            {{ $errors->first('kerusakan') }}
    @endif
    </em>

</div>

<div class="col-md-6 {{ $errors->has('tindakan') ? 'has-error' : '' }}">
    <label for="tindakan">Tindakan</label>
    <input type="text" id="tindakan" name="tindakan" class="form-control"
        value="{{ old('tindakan', isset($result) ? $result->tindakan : '') }}"
        placeholder="Cth: Membersikan isi printer">
    @if ($errors->has('tindakan'))
        <em class="invalid-feedback">
            {{ $errors->first('tindakan') }}
    @endif
    </em>

</div>
<div class="col-md-6 {{ $errors->has('stop') ? 'has-error' : '' }}">
    <label for="stop">Mulai Perbaikan</label>
    <input type="time" id="stop" name="stop" class="form-control"
        value="{{ old('stop', isset($result) ? date('H:i', strtotime($result->stop)) : '') }}">
    @if ($errors->has('stop'))
        <em class="invalid-feedback">
            {{ $errors->first('stop') }}
    @endif
    </em>

</div>

<div class="col-md-6 {{ $errors->has('Selesai') ? 'has-error' : '' }}">
    <label for="selesai">Selesai Perbaikan</label>
    <input type="time" id="Selesai" name="selesai" class="form-control"
        value="{{ old('selesai', isset($result) ? date('H:i', strtotime($result->mulai)) : '') }}"
        placeholder="Cth: 001/MKT/065">
    @if ($errors->has('Selesai'))
        <em class="invalid-feedback">
            {{ $errors->first('Selesai') }}
    @endif
    </em>

</div>

<div class="col-md-6 {{ $errors->has('petugas') ? 'has-error' : '' }}">
    <label for="petugas">Nama Petugas</label>
    <select name="petugas" id="petugas" class="form-control">
        <option value="" selected>-- Pilih --</option>
        <option value="Irfan Nur Muhammad" {{ old('petugas', isset($result) && $result->petugas == "Irfan Nur Muhammad" ? 'selected' : '') }}>Irfan Nur Muhammad</option>
        <option value="Yudi Hadiandi" {{ old('petugas', isset($result) && $result->petugas == "Yudi Hadiandi" ? 'selected' : '') }}>Yudi Hadiandi</option>
    </select>
    @if ($errors->has('petugas'))
        <em class="invalid-feedback">
            {{ $errors->first('petugas') }}
    @endif
    </em>

</div>
@section('scripts')
    <script>
        $(document).ready(function() {
            $(document).on('change', "#bp", function() {
                $.ajax({
                    method: 'GET',
                    url: '{{ url('cms-it/perbaikans/cariItem') }}',
                    data: {
                        kode: $(this).val()
                    },
                    success: function(response) {
                        console.log(204, response);
                        let options = '';

                        for (let item of response.detail_bons) {
                                options += `<option value='${item.barang.id}'>${item.barang.nama}</option>`;
                            }
                            $('#barang_id').html(options);

                    }
                })
            });
        })
    </script>
@endsection
