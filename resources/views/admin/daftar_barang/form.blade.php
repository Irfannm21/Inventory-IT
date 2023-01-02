<div class="col-md-4 {{ $errors->has('kode') ? 'has-error' : '' }}">
    <label for="kode">Kode</label>
    <input type="text" id="kode" name="kode" class="form-control" value="{{ old('kode', isset($barang) ? $barang->kode : '') }}" placeholder="Cth: SPI/ADM/TH64">
    @if($errors->has('kode'))
        <em class="invalid-feedback">
            {{ $errors->first('kode') }}
            @endif
        </em>
</div>

<div class="col-md-4 {{ $errors->has('nama') ? 'has-error' : '' }}">
    <label for="nama">Nama</label>
    <input type="text" id="nama" name="nama" class="form-control" value="{{ old('nama', isset($barang) ? $barang->nama : '') }}" placeholder="Cth: Tinta">
    @if($errors->has('nama'))
        <em class="invalid-feedback">
            {{ $errors->first('nama') }}
            @endif
        </em>
</div>


<div class="col-md-4 {{ $errors->has('nomor_part') ? 'has-error' : '' }}">
    <label for="nomor_part">Nomor Part</label>
    <input type="text" id="nomor_part" name="nomor_part" class="form-control" value="{{ old('nomor_part', isset($barang) ? $barang->nomor_part : '') }}" placeholder="Cth: EP989811">
    @if($errors->has('nomor_part'))
        <em class="invalid-feedback">
            {{ $errors->first('nomor_part') }}
        </em>
    @endif
</div>

<div class="col-md-4 {{ $errors->has('no_kartu') ? 'has-error' : '' }}">
    <label for="no_kartu">Nomor Kartu</label>
    <input type="text" id="no_kartu" name="no_kartu" class="form-control" value="{{ old('no_kartu', isset($barang) ? $barang->no_kartu : '') }}" placeholder="Cth: EP 2099029 ">
    @if($errors->has('no_kartu'))
        <em class="invalid-feedback">
            {{ $errors->first('no_kartu') }}
        </em>
    @endif
</div>

<div class="col-md-4 {{ $errors->has('kelompok') ? 'has-error' : '' }}">
    <label for="kelompok">Kelompok Barang</label>
   <select name="kelompok" id="kelompok" class="form-control">
    <option value="" selected>-- Pilih --</option>
    <option value="Administrasi" @if(isset($barang) && $barang->kelompok=="Administrasi") selected @endif>Administrasi</option>
    <option value="Sparepart Insan" @if(isset($barang) && $barang->kelompok=="Sparepart Insan") selected @endif>Sparepart Insan</option>
    <option value="Sparepart Spinning" @if(isset($barang) && $barang->kelompok=="Sparepart Spinning") selected @endif>Sparepart Spinning</option>
    <option value="Packing Material" @if(isset($barang) && $barang->kelompok=="Packing Material") selected @endif>Packing Material</option>
    <option value="Elektrik" @if(isset($barang) && $barang->kelompok=="Elektrik") selected @endif>Elektrik</option>
    <option value="Kendaraan" @if(isset($barang) && $barang->kelompok=="Kendaraan") selected @endif>Kendaraan</option>
   </select>
    @if($errors->has('kelompok'))
        <em class="invalid-feedback">
            {{ $errors->first('kelompok') }}
        </em>
    @endif
</div>


<div class="col-md-4 {{ $errors->has('jenis') ? 'has-error' : '' }}">
    <label for="jenis">Jenis Barang</label>
   <select name="jenis" id="jenis" class="form-control">
    <option value="" selected>-- Pilih --</option>
    <option value="Administrasi" @if(isset($barang) && $barang->jenis=="Administrasi") selected @endif>Administrasi</option>
    <option value="AJL" @if(isset($barang) && $barang->jenis=="AJL") selected @endif>AJL</option>
    <option value="Bearing" @if(isset($barang) && $barang->jenis=="Bearing") selected @endif>Bearing</option>
    <option value="Benninger" @if(isset($barang) && $barang->jenis=="Benninger") selected @endif>Benninger</option>
    <option value="Best Air" @if(isset($barang) && $barang->jenis=="Best Air") selected @endif>Best Air</option>
    <option value="Blowing" @if(isset($barang) && $barang->jenis=="Blowing") selected @endif>Blowing</option>
    <option value="Boiler" @if(isset($barang) && $barang->jenis=="Boiler") selected @endif>Boiler</option>
    <option value="Bolt & Nut" @if(isset($barang) && $barang->jenis=="Bolt & Nut") selected @endif>Bolt & Nut</option>

   </select>
    @if($errors->has('jenis'))
        <em class="invalid-feedback">
            {{ $errors->first('jenis') }}
        </em>
    @endif
</div>

<div class="col-md-4 {{ $errors->has('satuan') ? 'has-error' : '' }}">
    <label for="satuan">Satuan</label>
   <select name="satuan" id="satuan" class="form-control">
    <option value="" selected>-- Pilih --</option>
    <option value="Buah" @if(isset($barang) && $barang->satuan=="Buah") selected @endif>Buah</option>
    <option value="Bungkus" @if(isset($barang) && $barang->satuan=="Bungkus") selected @endif>Bungkus</option>
    <option value="Blek" @if(isset($barang) && $barang->satuan=="Blek") selected @endif>Blek</option>
    <option value="Batang" @if(isset($barang) && $barang->satuan=="Batang") selected @endif>Batang</option>
    <option value="Dus" @if(isset($barang) && $barang->satuan=="Dus") selected @endif>Dus</option>
    <option value="Kilo" @if(isset($barang) && $barang->satuan=="Kilo") selected @endif>Kilo</option>
    <option value="Karung" @if(isset($barang) && $barang->satuan=="Karung") selected @endif>Karung</option>
    <option value="Lembar" @if(isset($barang) && $barang->satuan=="Lembar") selected @endif>Lembar</option>
    <option value="Liter" @if(isset($barang) && $barang->satuan=="Liter") selected @endif>Liter</option>
    <option value="Meter" @if(isset($barang) && $barang->satuan=="Meter") selected @endif>Meter</option>
    <option value="Pasang" @if(isset($barang) && $barang->satuan=="Pasang") selected @endif>Pasang</option>
    <option value="Roll" @if(isset($barang) && $barang->satuan=="Roll") selected @endif>Roll</option>
    <option value="Set" @if(isset($barang) && $barang->satuan=="Set") selected @endif>Set</option>
    <option value="Tube" @if(isset($barang) && $barang->satuan=="Tube") selected @endif>Tube</option>
    <option value="Unit" @if(isset($barang) && $barang->satuan=="Unit") selected @endif>Unit</option>
    <option value="Pcs" @if(isset($barang) && $barang->satuan=="Pcs") selected @endif>Pcs</option>
   </select>
    @if($errors->has('satuan'))
        <em class="invalid-feedback">
            {{ $errors->first('satuan') }}
        </em>
    @endif
    <br>
</div>
