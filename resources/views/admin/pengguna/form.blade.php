<div class="form-group {{ $errors->has('karyawan_id') ? 'has-error' : '' }}">
    <label for="karyawan_id">Kode Klien</label>
    <input type="text" class="form-control" name="kode" value="{{ old('kode', isset($klien) ? $klien->kode : '') }}">
    @if($errors->has('karyawan_id'))
        <em class="invalid-feedback">
            {{ $errors->first('karyawan_id') }}
        </em>
    @endif
    <p class="helper-block text-muted">
        *Pilih Karyawan
    </p>
</div>
<div class="form-group {{ $errors->has('karyawan_id') ? 'has-error' : '' }}">
    <label for="karyawan_id">Nama Karyawan</label>
    <select name="karyawan_id" id="karyawan_id" class="form-control select2">
        <option value="" selected>-- Pilih--</option>
        @foreach ($karyawans as $id => $value)
            <option value="{{ $id }}" @if (isset($klien->karyawan_id) && $klien->karyawan_id == $id) selected @endif>
                {{ $value }}
            </option>
        @endforeach
    </select>
    @if ($errors->has('karyawan_id'))
        <em class="invalid-feedback">
            {{ $errors->first('karyawan_id') }}
        </em>
    @endif
    <p class="helper-block text-muted">
        *Pilih Karyawan
    </p>
</div>

<div class="form-group {{ $errors->has('printer_id') ? 'has-error' : '' }}">
    <label for="printer_id">Kode Printer</label>
    <select name="printer_id" id="printer_id" class="form-control select2">
            <option value="" selected>-- Pilih--</option>
        @foreach ($printer as $id => $value)
            <option value="{{ $id }}" @if (isset($klien->printer_id) && $klien->printer_id == $id) selected @endif>
                {{ $value }}
            </option>
        @endforeach
    </select>
    @if ($errors->has('printer_id'))
        <em class="invalid-feedback">
            {{ $errors->first('printer_id') }}
        </em>
    @endif
    <p class="helper-block text-muted">
        *Pilih Printer
    </p>
</div>

<div class="form-group {{ $errors->has('komputer_id') ? 'has-error' : '' }}">
    <label for="komputer_id">Kode Komputer</label>
    <select name="komputer_id" id="komputer_id" class="form-control select2">
        @if (!isset($klien))
            <option value="" selected>-- Pilih--</option>
        @endif
        @foreach ($komputer as $id => $value)
            <option value="{{ $id }}" @if (isset($klien->komputer_id) && $klien->komputer_id == $id) selected @endif>
                {{ $value }}
            </option>
        @endforeach
    </select>
    @if ($errors->has('komputer_id'))
        <em class="invalid-feedback">
            {{ $errors->first('komputer_id') }}
        </em>
    @endif
    <p class="helper-block text-muted">
        *Pilih Komputer
    </p>
</div>
