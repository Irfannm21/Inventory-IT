<div class="col-md-4 {{ $errors->has('tanggal') ? 'has-error' : '' }}">
    <label for="tanggal">Tanggal</label>
    <input type="date" id="tanggal" name="tanggal" class="form-control"
        value="{{ old('tanggal') ?? ($perbaikan->tanggal ?? '') }}">
    @if ($errors->has('tanggal'))
        <em class="invalid-feedback">
            {{ $errors->first('tanggal') }}
    @endif
    </em>
    <p class="helper-block text-muted">
        *Masukan Tanggal Perbaikan
    </p>
</div>

<div class="col-md-4 {{ $errors->has('type') ? 'has-error' : '' }}">
    <label for="type">Type Barang</label>
    <select name="type" id="type" class="form-control">
        @if (isset($perbaikan) && $perbaikan->hardwareable_type == 'App\printer')
            <option value="">-- Pilih --</option>
            <option value="printer" selected>Printer</option>
            <option value="komputer">Komputer</option>
            <option value="TableBarangJaringan">Jaringan</option>
            <option value="pengguna">Software</option>
        @elseif (isset($perbaikan) && $perbaikan->hardwareable_type == 'App\komputer')
            <option value="">-- Pilih --</option>
            <option value="printer">Printer</option>
            <option value="komputer" selected>Komputer</option>
            <option value="TableBarangJaringan">Jaringan</option>
            <option value="pengguna">Software</option>
        @else
            <option value="" selected>-- Pilih --</option>
            <option value="printer">Printer</option>
            <option value="komputer">Komputer</option>
            <option value="TableBarangJaringan">Jaringan</option>
            <option value="pengguna">Software</option>
        @endif

    </select>
    @if ($errors->has('type'))
        <em class="invalid-feedback">
            {{ $errors->first('type') }}
    @endif
    </em>
</div>

<div class="col-md-4 {{ $errors->has('nama') ? 'has-error' : '' }}">
    <label for="nama">Nama Barang</label>
    <select name="nama" id="nama" class="form-control namaBarang">
        <option value="">-- Pilih --</option>
        @isset($perbaikan)
            @foreach ($results as $id => $item)
                @if ($id == $perbaikan->hardwareable_id)
                    <option value="{{$id}}" selected>{{$item}}</option>
                @else
                    <option value="{{$id}}">{{$item}}</option>
                @endif
            @endforeach
        @endisset
    </select>
    @if ($errors->has('nama'))
        <em class="invalid-feedback">
            {{ $errors->first('nama') }}
    @endif
    </em>
</div>

<div class="col-md-4 {{ $errors->has('bp') ? 'has-error' : '' }}">
    <label for="bp">Kode BP</label>
    <select name="bp" id="bp" class="form-control">
        <option value="">-- Tidak ada --</option>
    </select>
    @if ($errors->has('bp'))
        <em class="invalid-feedback">
            {{ $errors->first('bp') }}
    @endif
    </em>
</div>

<div class="col-md-4 {{ $errors->has('kerusakan') ? 'has-error' : '' }}">
    <label for="kerusakan">Jenis Kerusakan</label>
    <input type="text" id="kerusakan" name="kerusakan" class="form-control"
        value="{{ old('kerusakan', isset($perbaikan) ? $perbaikan->kerusakan : '') }}"
        placeholder="Cth: Printer Papper Jump">
    @if ($errors->has('kerusakan'))
        <em class="invalid-feedback">
            {{ $errors->first('kerusakan') }}
    @endif
    </em>
    <p class="helper-block text-muted">
        *Masukan kerusakan Perbaikan
    </p>
</div>

<div class="col-md-4 {{ $errors->has('tindakan') ? 'has-error' : '' }}">
    <label for="tindakan">Tindakan</label>
    <input type="text" id="tindakan" name="tindakan" class="form-control"
        value="{{ old('tindakan', isset($perbaikan) ? $perbaikan->tindakan : '') }}"
        placeholder="Cth: Membersikan isi printer">
    @if ($errors->has('tindakan'))
        <em class="invalid-feedback">
            {{ $errors->first('tindakan') }}
    @endif
    </em>
    <p class="helper-block text-muted">
        *Masukan tindakan Perbaikan
    </p>
</div>

<div class="col-md-4 {{ $errors->has('stop') ? 'has-error' : '' }}">
    <label for="stop">Mulai Perbaikan</label>
    <input type="time" id="stop" name="stop" class="form-control"
        value="{{ old('stop', isset($perbaikan) ? date('H:i', strtotime($perbaikan->stop)) : '') }}">
    @if ($errors->has('stop'))
        <em class="invalid-feedback">
            {{ $errors->first('stop') }}
    @endif
    </em>
    <p class="helper-block text-muted">
        *Masukan stop Perbaikan
    </p>
</div>

<div class="col-md-4 {{ $errors->has('Selesai') ? 'has-error' : '' }}">
    <label for="selesai">Selesai Perbaikan</label>
    <input type="time" id="Selesai" name="selesai" class="form-control"
        value="{{ old('selesai', isset($perbaikan) ? date('H:i', strtotime($perbaikan->mulai)) : '') }}"
        placeholder="Cth: 001/MKT/065">
    @if ($errors->has('Selesai'))
        <em class="invalid-feedback">
            {{ $errors->first('Selesai') }}
    @endif
    </em>
    <p class="helper-block text-muted">
        *Masukan Selesai Perbaikan
    </p>
</div>

<div class="col-md-4 {{ $errors->has('petugas') ? 'has-error' : '' }}">
    <label for="petugas">Nama Petugas</label>
    <select name="petugas" id="petugas" class="form-control">
        <option value="" selected>-- Pilih --</option>
        <option value="Irfan Nur Muhammad" {{ old('petugas', isset($perbaikan) && $perbaikan->petugas == "Irfan Nur Muhammad" ? 'selected' : '') }}>Irfan Nur Muhammad</option>
        <option value="Yudi Hadiandi" {{ old('petugas', isset($perbaikan) && $perbaikan->petugas == "Yudi Hadiandi" ? 'selected' : '') }}>Yudi Hadiandi</option>
    </select>
    @if ($errors->has('petugas'))
        <em class="invalid-feedback">
            {{ $errors->first('petugas') }}
    @endif
    </em>
    <p class="helper-block text-muted">
        *Masukan petugas IT
    </p>
</div>
@section('scripts')
    <script>
        $(document).ready(function() {
            $(document).on('change', "#type", function() {
                $.ajax({
                    method: 'GET',
                    url: '{{ url('admin/perbaikans/cariItem') }}',
                    data: {
                        nama: $(this).val()
                    },
                    success: function(response) {
                        console.log(204, response);
                        let options = '';
                        for (let item of response) {
                            options += `<option value='${item.id}'>${item.kode}</option>`;
                        }
                        $('.namaBarang').html(options);
                    }
                })
            });
        })
    </script>
@endsection
