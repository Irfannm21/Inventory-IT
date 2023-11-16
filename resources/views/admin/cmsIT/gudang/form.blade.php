<div class="col-md-4 {{ $errors->has('perangkat') ? 'has-error' : '' }}">
    <label for="perangkat">Jenis Perangkat</label>
    <select name="perangkat" id="perangkat"  class="form-control">
        <option value="test" selected>-- Pilih --</option>
        <option value="printer" {{"printer" == (old('perangkat') ?? ($gudang->jenis ?? '') ?? isset($gudang->jenis)) ? 'selected' : '' }}>Printer</option>
        <option value="komputer" {{"komputer" == (old('perangkat') ?? ($gudang->jenis ?? '') ?? isset($gudang->jenis)) ? 'selected' : '' }}>Komputer</option>
    </select>
   @if($errors->has('perangkat'))
        <em class="invalid-feedback">
            {{ $errors->first('perangkat') }}
            @endif
        </em>
    <p class="helper-block text-muted">
        *Pilih Hardware
    </p>
</div>

<div class="col-md-4 {{ $errors->has('id') ? 'has-error' : '' }}">
    <label for="id">ID Perangkat</label>
    <select name="id" id="id" class="form-control">
        <option value="" selected> -- Pilih --</option>
        @if (isset($printer || $komputer)== true)
            @foreach ($printer as $key => $item)
                <option value="{{$key}}">{{$item->kode}}</option>
            @endforeach
        @endif
    </select>
   @if($errors->has('id'))
        <em class="invalid-feedback">
            {{ $errors->first('id') }}
            @endif
        </em>
    <p class="helper-block text-muted">
        *Pilih Hardware
    </p>
</div>

<div class="col-md-4 {{ $errors->has('tanggal') ? 'has-error' : '' }}">
    <label for="tanggal">Tanggal</label>
    <input type="date" id="tanggal" name="tanggal" class="form-control" value="{{ old('tanggal', isset($gudang) ? $gudang->tanggal : '') }}" placeholder="Cth: 01/L220/065">
    @if($errors->has('tanggal'))
        <em class="invalid-feedback">
            {{ $errors->first('tanggal') }}
            @endif
        </em>
    <p class="helper-block text-muted">
        *Masukan Tanggal Masuk Gudang
    </p>
</div>


<div class="col-md-4 {{ $errors->has('keterangan') ? 'has-error' : '' }}">
    <label for="keterangan">Keterangan</label>
    <input type="text" id="keterangan" name="keterangan" class="form-control" value="{{ old('keterangan', isset($gudang) ? $gudang->keterangan : '') }}" placeholder="Cth: Elco rusak">
    @if($errors->has('keterangan'))
        <em class="invalid-feedback">
            {{ $errors->first('keterangan') }}
        </em>
    @endif
    <p class="helper-block text-muted">
        *Keterangan Masuk ke gudang
    </p>
</div>
