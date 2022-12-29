<div class="col-md-4 {{ $errors->has('kode') ? 'has-error' : '' }}">
    <label for="kode">Kode</label>
    <input type="text" id="kode" name="kode" class="form-control" value="{{ old('kode', isset($printer) ? $printer->kode : '') }}" placeholder="Cth: ">
    @if($errors->has('kode'))
        <em class="invalid-feedback">
            {{ $errors->first('kode') }}
            @endif
        </em>
    <p class="helper-block text-muted">

    </p>
</div>

<div class="col-md-4 {{ $errors->has('nama') ? 'has-error' : '' }}">
    <label for="nama">Nama</label>
    <input type="text" id="nama" name="nama" class="form-control" value="{{ old('nama', isset($printer) ? $printer->nama : '') }}" placeholder="Cth: Tinta">
    @if($errors->has('nama'))
        <em class="invalid-feedback">
            {{ $errors->first('nama') }}
            @endif
        </em>
    <p class="helper-block">
        {{ trans('global.printer.fields.nama') }}
    </p>
</div>


<div class="col-md-4 {{ $errors->has('nomor_part') ? 'has-error' : '' }}">
    <label for="nomor_part">Nomor Part</label>
    <input type="text" id="nomor_part" name="nomor_part" class="form-control" value="{{ old('nomor_part', isset($printer) ? $printer->nomor_part : '') }}" placeholder="Cth: EP989811">
    @if($errors->has('nomor_part'))
        <em class="invalid-feedback">
            {{ $errors->first('nomor_part') }}
        </em>
    @endif
    <p class="helper-block">
        {{ trans('global.printers.fields.nomor_part') }}
    </p>
</div>

<div class="col-md-4 {{ $errors->has('no_kartu') ? 'has-error' : '' }}">
    <label for="no_kartu">Nomor Kartu</label>
    <input type="text" id="no_kartu" name="no_kartu" class="form-control" value="{{ old('no_kartu', isset($printer) ? $printer->no_kartu : '') }}" placeholder="Cth: EP 2099029 ">
    @if($errors->has('no_kartu'))
        <em class="invalid-feedback">
            {{ $errors->first('no_kartu') }}
        </em>
    @endif
    <p class="helper-block">
        {{ trans('global.printers.fields.no_kartu') }}
    </p>
</div>

<div class="col-md-4 {{ $errors->has('kelompok') ? 'has-error' : '' }}">
    <label for="kelompok">kelompok Barang</label>
   <select name="kelompok" id="kelompok" class="form-control">
    <option value="" selected>-- Pilih --</option>
    <option value="Administrasi">Administrasi</option>
    <option value="Sparepart Insan">Sparepart Insan</option>
    <option value="Sparepart Spinning">Sparepart Spinning</option>
    <option value="Packing Material">Packing Material</option>
    <option value="Elektirk">Elektik</option>
    <option value="Kendaraan">Kendaraan</option>
   </select>
    @if($errors->has('kelompok'))
        <em class="invalid-feedback">
            {{ $errors->first('kelompok') }}
        </em>
    @endif
    <p class="helper-block">
        {{ trans('global.printers.fields.kelompok') }}
    </p>
</div>


<div class="col-md-4 {{ $errors->has('jenis') ? 'has-error' : '' }}">
    <label for="jenis">Kelompok Barang</label>
   <select name="jenis" id="jenis" class="form-control">
    <option value="" selected>-- Pilih --</option>
    <option value="Administrasi">Administrasi</option>
    <option value="AJL">AJL</option>
    <option value="Bearing">Bearing</option>
    <option value="Benninger">Benninger</option>
    <option value="Best Air">Best Air</option>
    <option value="Blowing">Blowing</option>
    <option value="Boiler">Boiler</option>
    <option value="Bolt dan Nut">Bolt & Nut</option>
    <option value="Blowing">Blowing</option>
   </select>
    @if($errors->has('jenis'))
        <em class="invalid-feedback">
            {{ $errors->first('jenis') }}
        </em>
    @endif
    <p class="helper-block">
        {{ trans('global.printers.fields.jenis') }}
    </p>
</div>

<div class="col-md-4 {{ $errors->has('satuan') ? 'has-error' : '' }}">
    <label for="satuan">Satuan</label>
   <select name="satuan" id="satuan" class="form-control">
    <option value="" selected>-- Pilih --</option>
    <option value="Buah">Buah</option>
    <option value="Bungkus">Bungkus</option>
    <option value="Blek">Blek</option>
    <option value="Batang">Batang</option>
    <option value="Dus">Dus</option>
    <option value="Kilo">Kilo</option>
    <option value="Karung">Karung</option>
    <option value="Lembar">Lembar</option>
    <option value="Liter">Liter</option>
    <option value="Meter">Meter</option>
    <option value="Pasang">Pasang</option>
    <option value="Roll">Roll</option>
    <option value="Set">Set</option>
    <option value="Tube">Tube</option>
    <option value="Unit">Unit</option>
    <option value="Pcs">Pcs</option>
   </select>
    @if($errors->has('satuan'))
        <em class="invalid-feedback">
            {{ $errors->first('satuan') }}
        </em>
    @endif
    <p class="helper-block">
        {{ trans('global.printers.fields.satuan') }}
    </p>
</div>
