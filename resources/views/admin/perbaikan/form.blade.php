<div class="col-md-4 {{ $errors->has('tanggal') ? 'has-error' : '' }}">
    <label for="tanggal">Tanggal</label>
    <input type="date" id="tanggal" name="tanggal" class="form-control"
        value="{{ old('tanggal') ?? ($results->tanggal ?? '') }}">
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
    <label for="type">Tipe Perbaikan</label>
    <select name="type" id="type" class="form-control">
        <option value="" selected>-- Pilih --</option>
        <option value="printer"
            {{ (old('type') || isset($results) ? $results->hardwareable_type : '') == 'App\printer' ? 'selected' : '' }}>
            Printer</option>
        <option value="komputer"
            {{ (old('type') || isset($results) ? $results->hardwareable_type : '') == 'App\komputer' ? 'selected' : '' }}>
            Komputer</option>
        <option value="TableBarangJaringan"
            {{ (old('type') || isset($results) ? $results->hardwareable_type : '') == 'App\TableBarangJaringan' ? 'selected' : '' }}>
            Jaringan Telepon & Internet</option>
    </select>
    @if ($errors->has('type'))
        <em class="invalid-feedback">
            {{ $errors->first('type') }}
    @endif
    </em>
    <p class="helper-block text-muted">
        *Pilih Tipe Perbaikan
    </p>
</div>

<div class="col-md-4 {{ $errors->has('nama') ? 'has-error' : '' }}">
    <label for="nama">Nama</label>
    <select name="nama" id="nama" class="form-control namaBarang select2">
        <option value="">-- Pilih --</option>
        @isset($results)
            @if ($results->hardwareable_type == 'App\printer')
                @foreach ($printer as $id => $item)
                    <option value="{{ $id }}"
                        {{ (old('nama') || isset($results) ? $results->hardwareable_id : '') === $item->id ? 'selected' : '' }}>
                        {{ $item->kode }}</option>
                @endforeach
            @elseif ($results->hardwareable_type == 'App\komputer')
                @foreach ($komputer as $id => $item)
                    <option value="{{ $id }}"
                        {{ (old('nama') || isset($results) ? $results->hardwareable_id : '') === $id ? 'selected' : '' }}>
                        {{ $item->kode }}</option>
                @endforeach
            @else
                @foreach ($jaringan as $id => $item)
                    <option value="{{ $id }}"
                        {{ (old('nama') || isset($results) ? $results->hardwareable_id : '') === $id ? 'selected' : '' }}>
                        {{ $item->kode }}</option>
                @endforeach
            @endif
        @endisset
    </select>
    @if ($errors->has('nama'))
        <em class="invalid-feedback">
            {{ $errors->first('nama') }}
    @endif
    </em>
    <p class="helper-block text-muted">
        *Pilih nama
    </p>
</div>

<div class="col-md-4 {{ $errors->has('bp') ? 'has-error' : '' }}">
    <label for="bp">Nomor Bon Pengambilan</label>
    <select name="bp" id="bp" class="form-control">
        <option value="">-- Tidak ada --</option>
    </select>
    @if ($errors->has('bp'))
        <em class="invalid-feedback">
            {{ $errors->first('bp') }}
    @endif
    </em>
    <p class="helper-block text-muted">
        *Masukan jika ada bon pengambilan
    </p>
</div>

<div class="col-md-4 {{ $errors->has('kerusakan') ? 'has-error' : '' }}">
    <label for="kerusakan">Nama Kerusakan</label>
    <input type="text" id="kerusakan" name="kerusakan" class="form-control"
        value="{{ old('kerusakan', isset($results) ? $results->kerusakan : '') }}"
        placeholder="Cth: Printer Papper Jump">
    @if ($errors->has('kerusakan'))
        <em class="invalid-feedback">
            {{ $errors->first('kerusakan') }}
    @endif
    </em>
    <p class="helper-block text-muted">
        *Masukan Data kerusakan
    </p>
</div>

<div class="col-md-4 {{ $errors->has('tindakan') ? 'has-error' : '' }}">
    <label for="tindakan">Tindakan</label>
    <input type="text" id="tindakan" name="tindakan" class="form-control"
        value="{{ old('tindakan', isset($results) ? $results->tindakan : '') }}"
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
{{-- <div class="col-md-4 {{ $errors->has('stop') ? 'has-error' : '' }}">
    <label for="stop">Mulai Perbaikan</label>
    <input type="time" id="stop" name="stop" class="form-control"
        value="{{ old('stop', isset($results) ? date('H:i', strtotime($results->stop)) : '') }}">
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
        value="{{ old('selesai', isset($results) ? date('H:i', strtotime($results->mulai)) : '') }}"
        placeholder="Cth: 001/MKT/065">
    @if ($errors->has('Selesai'))
        <em class="invalid-feedback">
            {{ $errors->first('Selesai') }}
    @endif
    </em>
    <p class="helper-block text-muted">
        *Masukan Selesai Perbaikan
    </p>
</div> --}}

{{-- <div class="col-md-4 {{ $errors->has('petugas') ? 'has-error' : '' }}">
    <label for="petugas">Nama Petugas</label>
    <select name="petugas" id="petugas" class="form-control">
        <option value="" selected>-- Pilih --</option>
        <option value="Irfan Nur Muhammad" {{ old('petugas', isset($results) && $results->petugas == "Irfan Nur Muhammad" ? 'selected' : '') }}>Irfan Nur Muhammad</option>
        <option value="Yudi Hadiandi" {{ old('petugas', isset($results) && $results->petugas == "Yudi Hadiandi" ? 'selected' : '') }}>Yudi Hadiandi</option>
    </select>
    @if ($errors->has('petugas'))
        <em class="invalid-feedback">
            {{ $errors->first('petugas') }}
    @endif
    </em>
    <p class="helper-block text-muted">
        *Masukan petugas IT
    </p>
</div> --}}
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
                        options += `<option selected>-- Pilih --</option>`;

                        if ($('#type').val() == "TableBarangJaringan") {
                            for (let item of response) {
                                options += `<option value='${item.id}'>${item.kode}</option>`;
                            }
                        } else {
                            for (let item of response) {
                                if (item.klien != null) {
                                    options +=
                                        `<option value='${item.id}'>${item.klien.kode}</option>`;
                                } else {
                                    continue;
                                }
                            }
                        }

                        $('.namaBarang').html(options);
                    }
                })
            });
        })
    </script>
@endsection
