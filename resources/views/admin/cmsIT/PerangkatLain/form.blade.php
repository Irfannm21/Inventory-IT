<div class="col-md-4 {{ $errors->has('kode') ? 'has-error' : '' }}">
    <label for="kode">Kode</label>
    <input type="text" id="kode" name="kode" class="form-control" value="{{ old('kode', isset($result) ? $result->kode : '') }}" placeholder="Cth: 001/JRGN.SWIT/MKTG">
    @if($errors->has('kode'))
        <em class="invalid-feedback">
            {{ $errors->first('kode') }}
            @endif
        </em>
    <p class="helper-block text-muted">
        *Masukan 3 angka untuk nomor printer <br>
        *Masukan Type Printer <br>
        *Masukan 3 angka nomor terakhir ip cpu yg dipakai
    </p>
</div>

<div class="col-md-4 {{ $errors->has('tanggal') ? 'has-error' : '' }}">
    <label for="tanggal">Tanggal Beli</label>
    <input type="date" id="tanggal" name="tanggal" class="form-control" value="{{ old('tanggal', isset($result) ? $result->tanggal : '') }}" placeholder="Cth: 01/L220/065">
    @if($errors->has('tanggal'))
        <em class="invalid-feedback">
            {{ $errors->first('tanggal') }}
            @endif
        </em>
    <p class="helper-block">
        {{ trans('global.printer.fields.tanggal') }}
    </p>
</div>

<div class="col-md-4 {{ $errors->has('kelompok') ? 'has-error' : '' }}">
    <label for="kelompok">Jenis Perangkat</label>
    <select name="kelompok" id="kelompok" class="form-control">
        <option value="">-- Pilih --</option>
        <option value="Jaringan Komputer"  {{ old('kelompok', isset($result) && $result->kelompok == "Jaringan Komputer" ? 'selected' : '') }}>Jaringan Komputer</option>
        <option value="Jaringan Telepon" {{ old('kelompok', isset($result) && $result->kelompok == "Jaringan Telepon" ? 'selected' : '') }}>Jaringan Telepon</option>
        <option value="Jaringan CCTV" {{ old('kelompok', isset($result) && $result->kelompok == "Jaringan CCTV" ? 'selected' : '') }}>Jaringan CCTV</option>
    </select>
    @if($errors->has('kelompok'))
        <em class="invalid-feedback">
            {{ $errors->first('kelompok') }}
            @endif
        </em>
    <p class="helper-block">
        {{ trans('global.printer.fields.kelompok') }}
    </p>
</div>


<div class="col-md-4 {{ $errors->has('nama') ? 'has-error' : '' }}">
    <label for="nama">Deskripsi</label>
    <input type="text" id="nama" name="nama" class="form-control" value="{{ old('nama', isset($result) ? $result->nama : '') }}" placeholder="Cth: Pesawat Telepon Hybrid">
    @if($errors->has('nama'))
        <em class="invalid-feedback">
            {{ $errors->first('nama') }}
        </em>
    @endif
    <p class="helper-block">
        {{ trans('global.printers.fields.nama') }}
    </p>
</div>
