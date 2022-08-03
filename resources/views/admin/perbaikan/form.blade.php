@csrf
<div class="form-group {{ $errors->has('hardware') ? 'has-error' : '' }}">
    <label for="hardware">Hardware ID</label>
    <input type="text" id="hardware" name="hardware" class="form-control" value="{{ old('hardware', isset($perbaikan) ? $perbaikan->kode : '') }}" placeholder="Cth: 01/L220/65" readonly>
    @if($errors->has('hardware'))
        <em class="invalid-feedback">
            {{ $errors->first('hardware') }}
            @endif
        </em>
</div>
<div class="form-group {{ $errors->has('type') ? 'has-error' : '' }}">
    <label for="type">Jenis Perangkat</label>
    <input type="text" id="type" name="type" class="form-control" value="{{ old('type', isset($type) ? $type : '') }}" placeholder="Cth: 01/L220/65" readonly>
    @if($errors->has('type'))
        <em class="invalid-feedback">
            {{ $errors->first('type') }}
            @endif
        </em>
</div>

<div class="form-group {{ $errors->has('tanggal') ? 'has-error' : '' }}">
    <label for="tanggal">Tanggal</label>
    <input type="date" id="tanggal" name="tanggal" class="form-control" value="{{ old('tanggal', isset($perbaikan->tanggal) ? $perbaikan->tanggal : '') }}">
    @if($errors->has('tanggal'))
        <em class="invalid-feedback">
            {{ $errors->first('tanggal') }}
            @endif
        </em>
    <p class="helper-block text-muted">
        *Masukan tanggal Perbaikan
    </p>
</div>

<div class="form-group {{ $errors->has('keterangan') ? 'has-error' : '' }}">
    <label for="keteragan">Keterangan</label>
    <input id="keterangan" name="keterangan" class="form-control" value="{{ old('keterangan', isset($perbaikan) ? $perbaikan->keterangan : '') }}">
    @if($errors->has('keteragan'))
        <em class="invalid-feedback">
            {{ $errors->first('keteragan') }}
        </em>
    @endif
    <p class="helper-block text-muted">
        *Masukan keterangan perbaikan
    </p>
</div>
