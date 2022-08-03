<div class="col-md-4 {{ $errors->has('kode') ? 'has-error' : '' }}">
    <label for="kode">Kode</label>
    <input type="text" id="kode" name="kode" class="form-control" value="{{ old('kode', isset($komputer) ? $komputer->kode : '') }}" placeholder="Cth: 001/MKT/065">
    @if($errors->has('kode'))
        <em class="invalid-feedback">
            {{ $errors->first('kode') }}
            @endif
        </em>
    <p class="helper-block text-muted">
        *Tiga angka awal Nomor komputer<br>
        *Tiga huruf Inisial Departement<br>
        *Tiga angka terakhir nomor ip cpu
    </p>
</div>

<div class="col-md-4 {{ $errors->has('system') ? 'has-error' : '' }}">
    <label for="system">Operasi Sistem</label>
    <input type="text" id="system" name="system" class="form-control" value="{{ old('system', isset($komputer) ? $komputer->system : '') }}" placeholder="Cth: 192.168.1.51">
    @if($errors->has('system'))
        <em class="invalid-feedback">
            {{ $errors->first('system') }}
            @endif
        </em>
    <p class="helper-block text-muted">
        *Masukan Operasi System yg dipakai
    </p>
</div>

<div class="col-md-4 {{ $errors->has('nomor_ip') ? 'has-error' : '' }}">
    <label for="nomor_ip">Nomor IP</label>
    <input type="text" id="nomor_ip" name="nomor_ip" class="form-control" value="{{ old('nomor_ip', isset($komputer) ? $komputer->nomor_ip : '') }}" placeholder="Cth: 192.168.1.51">
    @if($errors->has('nomor_ip'))
        <em class="invalid-feedback">
            {{ $errors->first('nomor_ip') }}
            @endif
        </em>
    <p class="helper-block text-muted">
        *Masukan nomor ip cpu
    </p>
</div>

<div class="col-md-4 {{ $errors->has('motherboard') ? 'has-error' : '' }}">
    <label for="motherboard">Motherboad</label>
    <input type="text" id="motherboard" name="motherboard" class="form-control" value="{{ old('motherboard', isset($komputer) ? $komputer->motherboard : '') }}" placeholder="Cth: Asrock A230M">
    @if($errors->has('motherboard'))
        <em class="invalid-feedback">
            {{ $errors->first('motherboard') }}
            @endif
        </em>
    <p class="helper-block text-muted">
        *Masukan merk dan type
    </p>
</div>

<div class="col-md-4 {{ $errors->has('processor') ? 'has-error' : '' }}">
    <label for="processor">Processor</label>
    <input type="text" id="processor" name="processor" class="form-control" value="{{ old('processor', isset($komputer) ? $komputer->processor : '') }}" placeholder="Cth: Intel I5-10100">
    @if($errors->has('processor'))
        <em class="invalid-feedback">
            {{ $errors->first('processor') }}
            @endif
        </em>
    <p class="helper-block text-muted">
        *Masukan merk dan type
    </p>
</div>

<div class="col-md-4 {{ $errors->has('powersupply') ? 'has-error' : '' }}">
    <label for="powersupply">Power Supply</label>
    <input type="text" id="powersupply" name="powersupply" class="form-control" value="{{ old('powersupply', isset($komputer) ? $komputer->powersupply : '') }}" placeholder="Cth: Innovation 400W">
    @if($errors->has('powersupply'))
        <em class="invalid-feedback">
            {{ $errors->first('powersupply') }}
            @endif
        </em>
    <p class="helper-block text-muted">
        *Masukan merk dan type
    </p>
</div>

<div class="col-md-4 {{ $errors->has('ram') ? 'has-error' : '' }}">
    <label for="ram">RAM</label>
    <input type="text" id="ram" name="ram" class="form-control" value="{{ old('ram', isset($komputer) ? $komputer->ram : '') }}" placeholder="Cth: Corsair 8GB DDR4">
    @if($errors->has('ram'))
        <em class="invalid-feedback">
            {{ $errors->first('ram') }}
            @endif
        </em>
    <p class="helper-block text-muted">
        *Masukan merk dan type dan ukuran
    </p>
</div>


<div class="col-md-4 {{ $errors->has('disk') ? 'has-error' : '' }}">
    <label for="disk">Penyimpanan</label>
    <input type="text" id="disk" name="disk" class="form-control" value="{{ old('disk', isset($komputer) ? $komputer->disk : '') }}" placeholder="Cth: Midasforce 120GB NVME">
    @if($errors->has('disk'))
        <em class="invalid-feedback">
            {{ $errors->first('disk') }}
            @endif
        </em>
    <p class="helper-block text-muted">
        *Masukan merk dan type dan ukuran
    </p>
</div>

<div class="col-md-4 {{ $errors->has('vga') ? 'has-error' : '' }}">
    <label for="vga">VGA</label>
    <input type="text" id="vga" name="vga" class="form-control" value="{{ old('vga', isset($komputer) ? $komputer->vga : '') }}" placeholder="Cth: Nvidia Gt210">
    @if($errors->has('vga'))
        <em class="invalid-feedback">
            {{ $errors->first('vga') }}
            @endif
        </em>
    <p class="helper-block text-muted">
        *Masukan merk dan type dan ukuran
    </p>
</div>

<div class="col-md-4 {{ $errors->has('split') ? 'has-error' : '' }}">
    <label for="split">Split Monitor</label>
    <input type="text" id="split" name="split" class="form-control" value="{{ old('split', isset($komputer) ? $komputer->split : '') }}" placeholder="">
    @if($errors->has('split'))
        <em class="invalid-feedback">
            {{ $errors->first('split') }}
            @endif
        </em>
    <p class="helper-block text-muted">
        *Masukan keterangan
    </p>
</div>

<div class="col-md-4 {{ $errors->has('monitor1') ? 'has-error' : '' }}">
    <label for="monitor1">Monitor ke - 1</label>
    <input type="text" id="monitor1" name="monitor1" class="form-control" value="{{ old('monitor1', isset($komputer) ? $komputer->monitor1 : '') }}" placeholder="Cth: Acer 19 Inch">
    @if($errors->has('monitor1'))
        <em class="invalid-feedback">
            {{ $errors->first('monitor1') }}
            @endif
        </em>
    <p class="helper-block text-muted">
        *Masukan merk dan type
    </p>
</div>


<div class="col-md-4 {{ $errors->has('monitor2') ? 'has-error' : '' }}">
    <label for="monitor2">Monitor ke - 2</label>
    <input type="text" id="monitor2" name="monitor2" class="form-control" value="{{ old('monitor2', isset($komputer) ? $komputer->monitor2 : '') }}" placeholder="Cth: Acer 19 inch">
    @if($errors->has('monitor2'))
        <em class="invalid-feedback">
            {{ $errors->first('monitor2') }}
            @endif
        </em>
    <p class="helper-block text-muted">
        *Masukan merk dan type
    </p>
</div>
