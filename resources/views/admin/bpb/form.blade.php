    {{-- {{ dd($errors, $errors->first('kode')) }} --}}

    <div class="row">
        <div class="col-sm-12 col-lg-6">
    
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title text-center">Masukan Data BPB</h5>
                    <hr>
                    <div class="form-group row  {{ $errors->has('kode') ? 'has-error' : '' }}">
                        <label for="kodeBpb"
                            class="col-sm-3 col-form-label">Kode Bpb</label>
                        <div class="col-sm-9">
                            <input type="text" name="kode" class="form-control"
                                value="{{ old('kode', isset($bpb) ? $bpb->kode : '') }}" placeholder="Cth: 001/ENG/22" required>
                            @if ($errors->has('kode'))
                                <em class="invalid-feedback">
                                    {{ $errors->first('kode') }}
                                </em>
                            @endif
    
    
    
                        </div>
                    </div>
                    <div class="form-group row  {{ $errors->has('kelompok') ? 'has-error' : '' }}">
                        <label for="kelompok"
                            class="col-sm-3 col-form-label">Kelompok Bpb</label>
                        <div class="col-sm-9">
                            <select name="kelompok" id="kelompok" class="form-control" required>
                                <option value="">-- Pilih -- </option>
                                <option value="Sparepart" {{"Sparepart" == (old('kelompok') ?? ($bpb->kelompok ?? '') ?? isset($bpb->kelompok)) ? 'selected' : '' }}>Sparepart</option>
                                <option value="Administrasi" {{"Administrasi" == (old('kelompok') ?? ($bpb->kelompok ?? '') ?? isset($bpb->kelompok)) ? 'selected' : '' }}>Administrasi</option>
                                <option value="Elektrik" {{"Elektrik" == (old('kelompok') ?? ($bpb->kelompok ?? '') ?? isset($bpb->kelompok)) ? 'selected' : '' }}>Elektrik</option>
                                <option value="Mobil" {{"Mobil" == (old('kelompok') ?? ($bpb->kelompok ?? '') ?? isset($bpb->kelompok)) ? 'selected' : '' }}>Mobil</option>
                                <option value="PT" {{"PT" == (old('kelompok') ?? ($bpb->kelompok ?? '') ?? isset($bpb->kelompok)) ? 'selected' : '' }}>PT</option>
                                <option value="UM" {{"UM" == (old('kelompok') ?? ($bpb->kelompok ?? '') ?? isset($bpb->kelompok)) ? 'selected' : '' }}>UM</option>
                                <option value="Spinning" {{"Spinning" == (old('kelompok') ?? ($bpb->kelompok ?? '') ?? isset($bpb->kelompok)) ? 'selected' : '' }}>Spinning</option>
                            </select>
                            @if ($errors->has('kelompok'))
                                <em class="invalid-feedback">
                                    {{ $errors->first('kelompok') }}
                                </em>
                            @endif
                            <p class="helper-block">
                                {{ trans('*Wajib isi kelompok BPB') }}
                            </p>
                        </div>
                    </div>
                    <div class="form-group row {{ $errors->has('tanggal') ? 'has-error' : '' }}">
                        <label for="tanggal"
                            class="col-sm-3 col-form-label">Tanggal</label>
                        <div class="col-sm-9">
                            <input type="date" name="tanggal" class="form-control"
                                value="{{ old('tanggal', isset($bpb) ? $bpb->tanggal : '') }}" required>
                            @if ($errors->has('tanggal'))
                                <em class="invalid-feedback">
                                    {{ $errors->first('tanggal') }}
                                </em>
                            @endif
                            <p class="helper-block">
                                {{ trans('*Wajib isi tanggal pembuatan BPB') }}
                            </p>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="kode_npp"
                            class="col-sm-3 col-form-label {{ $errors->has('kode_npp') ? 'has-error' : '' }}">Kode
                            NPP</label>
                        <div class="col-sm-9">
                            <select name="npp_id" id="npp_id" class="form-control select2" required>
                                <option>-- Pilih --</option>
                                @foreach ($npp as $i => $item)
                                    <option value="{{ $i }}" {{$item == (old('npp_id') ?? ($bpb->npp->kode ?? '') ?? isset($bpb->npp->kode)) ? 'selected' : '' }}>{{ $item }}</option>
                                @endforeach
                            </select>
                            @if ($errors->has('npp_id'))
                                <em class="invalid-feedback">
                                    {{ $errors->first('npp_id') }}
                                </em>
                            @endif
                            <p class="helper-block">
                                {{ trans('*Pilih BPB untuk mengisi barang yang sudah datang') }}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
    
        </div>
        <div class="col-sm-12 col-lg-6">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title text-center">Cari Supplier yang sudah ada</h5>
                    <hr>
                    <div class="form-group row  {{ $errors->has('supplierID') ? 'has-error' : '' }}">
                        <label for="namaSupplier" class="col-sm-3 col-form-label">Nama Supplier</label>
                        <div class="col-sm-9">
                            <select name="supplierID" id="supplierID" class="form-control select2">
                                <option value="" selected>-- Pilih --</option>
                                @foreach ($suppliers as $i => $item)
                                    <option value="{{$i}}" {{$i == (old('supplierID') ?? ($bpb->supplier->id ?? '') ?? isset($bpb->supplier->id)) ? 'selected' : '' }}>{{ $item }}</option>
                                @endforeach
                            </select>
                            @if ($errors->has('supplierID'))
                            <em class="invalid-feedback">
                                {{ $errors->first('supplierID') }}
                            </em>
                        @endif
                        <p class="helper-block">
    
                        </p>
                        </div>
                    </div>
                </div>
            </div>
    
    
            <div class="card">
                <div class="accordion" id="accordionSupplier">
                    <div class="card-body">
                        <h5 class="card-title text-center">Buat Data Supplier Baru</h5>
                        <hr>
                            <div class="form-row">
                                <div class="form-group col-md-8 {{ $errors->has('nama') ? 'has-error' : '' }}">
                                    <label for="">Nama Supplier</label>
                                    <input type="text" name="nama" class="form-control" value="{{ old('nama') }}"
                                        placeholder="Cth: PT.Insansandang Internusa">
                                    @if ($errors->has('nama'))
                                        <em class="invalid-feedback">
                                            {{ $errors->first('nama') }}
                                        </em>
                                    @endif
                                    <p class="helper-block">
    
                                    </p>
                                </div>
                                <div class="form-group col-md-4 {{ $errors->has('kota') ? 'has-error' : '' }}">
                                    <label for="">Kota Asal</label>
                                    <input type="text" name="kota" class="form-control" value="{{ old('kota') }}"
                                        placeholder="Cth: Bandung">
                                    @if ($errors->has('kota'))
                                        <em class="invalid-feedback">
                                            {{ $errors->first('kota') }}
                                        </em>
                                    @endif
                                    <p class="helper-block">
    
                                    </p>
                                </div>
                            </div>
                            <div id="bukaSupplier" class="collapse" data-parent="#accordionSupplier">
                            <div class="form-row">
                                <div class="form-group col-md-4 {{ $errors->has('email') ? 'has-error' : '' }}">
                                    <label for="">Alamat Email</label>
                                    <input type="text" name="email" class="form-control"
                                        value="{{ old('email') }}" placeholder="Cth: info@insansandang.com">
                                    @if ($errors->has('email'))
                                        <em class="invalid-feedback">
                                            {{ $errors->first('email') }}
                                        </em>
                                    @endif
                                </div>
                                <div class="form-group col-md-4 {{ $errors->has('telepon') ? 'has-error' : '' }}">
                                    <label for="">Nomor Telepon</label>
                                    <input type="text" name="telepon" class="form-control"
                                        value="{{ old('telepon') }}" placeholder="Cth: 089681558231">
                                    @if ($errors->has('telepon'))
                                        <em class="invalid-feedback">
                                            {{ $errors->first('telepon') }}
                                        </em>
                                    @endif
                                </div>
                                <div class="form-group col-md-4 {{ $errors->has('type') ? 'has-error' : '' }}">
                                    <label for="">Tipe Perusahaan</label>
                                    <select name="type" id="type" class="form-control">
                                        <option value="" selected>-- Pilih --</option>
                                        <option value="Perseorangan">Perseorangan</option>
                                        <option value="CV">CV</option>
                                        <option value="PT">PT</option>
                                        <option value="Koperasi">Koperasi</option>
                                        <option value="Firma">Firma</option>
                                        <option value="Persero">Persero</option>
                                    </select>
                                    @if ($errors->has('type'))
                                        <em class="invalid-feedback">
                                            {{ $errors->first('type') }}
                                        </em>
                                    @endif
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-12 {{ $errors->has('alamat') ? 'has-error' : '' }}">
                                    <label for="">Alamat Lengkap</label>
                                    <input type="text" name="alamat" class="form-control"
                                        value="{{ old('alamat') }}"
                                        placeholder="Cth: Jl. Rancaekek No.KM 22, RW.5, Cinta Mulya, Kec. Jatinangor, Kabupaten Sumedang, Jawa Barat 45363">
                                    @if ($errors->has('alamat'))
                                        <em class="invalid-feedback">
                                            {{ $errors->first('alamat') }}
                                        </em>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <h5 class="card-title text-center"><button class="btn btn-xs btn-primary" type="button"
                            data-toggle="collapse" data-target="#bukaSupplier">Isi Detail Supplier</button></h5>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <button class="btn btn-primary mb-2" id="addBtn" type="button">Tambah Baris Baru</button>
    
        @if (isset($bpb))
        @foreach ($bpb->detail_bpbs as $val)
        <div class="card p-2" id="detailTBody">
            <div class="card-title">
                <div class="row">
                    <div class="col-sm-12 col-md-3">
                        <div class="form-group">
                            <label id="hasil">Nama di NPP</label>
                            <input type="text" id="" class="form-control" name="id[]" value="{{$val->id}}" hidden>
                            <select name="detail_id[]" id="detail_id" class="form-control detail_id" required>
                                <option value="">-- Pilih --</option>
                                @foreach ($bpb->detail_bpbs as $item)
                                <option value="{{ $item->detail_npp->id }}" {{$item->detail_id == (old('detail_id') ?? ($val->detail_npp->id ?? '') ?? isset($val->detail_npp->id)) ? 'selected' : '' }}>{{ $item->detail_npp->nama }}</option>
                             @endforeach
                            </select>
                            @if ($errors->has('detail_id'))
                            <em class="invalid-feedback">
                                {{ $errors->first('detail_id') }}
                                </em>
                            @endif
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-3">
                        <div class="form-group {{ $errors->has('barang_id') ? 'has-error' : '' }}">
                            <label id="hasil">Nama di Inventori </label>
                            <select name="barang_id[]" id="" class="form-control select2">
                                <option value="">-- Pilih --</option>
                                @foreach ($barang as $i => $item)
                                <option value="{{ $i}}" {{$val->stock->barang_id == (old('barang_id') ?? ($i ?? '') ?? isset($i)) ? 'selected' : '' }}>{{ $item }}</option>
                             @endforeach
                            </select>
                            @if ($errors->has('barang_id'))
                                <em class="invalid-feedback">
                                    {{ $errors->first('barang_id') }}
                                </em>
                            @endif
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-3">
                        <div class="form-group {{ $errors->has('jumlah[]') ? 'has-error' : '' }}">
                            <label id="hasil">Jumlah</label>
                            <input type="number" id="" class="form-control" name="jumlah[]" value="{{old('jumlah') ?? ($val->stock->jumlah ?? '') ?? isset($val->stock->jumlah)}}" required>
                            @if ($errors->has('jumlah'))
                                <em class="invalid-feedback">
                                    {{ $errors->first('jumlah') }}
                                </em>
                            @endif
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-3">
                        <div class="form-group{ $errors->has('satuan') ? 'has-error' : '' }}">
                            <label for="">Satuan</label>
                            <select name="satuan[]" id="satuan" class="form-control">
                                <option value="" selected>-- Pilih --</option>
                                <option value="Pcs" {{"Pcs" == (old('satuan') ?? ($val->stock->satuan ?? '') ?? isset($val->stock->satuan)) ? 'selected' : '' }}>Pcs</option>
                                <option value="Unit" {{"Unit" == (old('satuan') ?? ($val->stock->satuan ?? '') ?? isset($val->stock->satuan)) ? 'selected' : '' }}>Unit</option>
                                <option value="Pack" {{"Pack" == (old('satuan') ?? ($val->stock->satuan ?? '') ?? isset($val->stock->satuan)) ? 'selected' : '' }}>Pack</option>
                                <option value="Dus" {{"Dus" == (old('satuan') ?? ($val->stock->satuan ?? '') ?? isset($val->stock->satuan)) ? 'selected' : '' }}>Dus</option>
                                <option value="Kg" {{"Kg" == (old('satuan') ?? ($val->stock->satuan ?? '') ?? isset($val->stock->satuan)) ? 'selected' : '' }}>Kg</option>
                                <option value="Liter" {{"Liter" == (old('satuan') ?? ($val->stock->satuan ?? '') ?? isset($val->stock->satuan)) ? 'selected' : '' }}>Liter</option>
                                <option value="Meter" {{"Meter" == (old('satuan') ?? ($val->stock->satuan ?? '') ?? isset($val->stock->satuan)) ? 'selected' : '' }}>Meter</option>
                            </select>
                            @if ($errors->has('satuan'))
                                <em class="invalid-feedback">
                                    {{ $errors->first('satuan') }}
                                </em>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
        @else
        <div class="card p-2" id="detailTBody">
            <div class="card-title">
                <div class="row">
            <div class="col-sm-12 col-md-3">
                <div class="form-group {{ $errors->has('detail_id') ? 'has-error' : '' }}">
                    <label id="hasil">Nama di NPP</label>
                    <select name="detail_id[]" id="detail_id" class="form-control detail_id">
    
                    </select>
                    @if ($errors->has('detail_id'))
                        <em class="invalid-feedback">
                            {{ $errors->first('detail_id') }}
                        </em>
                    @endif
                </div>
            </div>
            <div class="col-sm-12 col-md-3">
                <div class="form-group {{ $errors->has('detail_id') ? 'has-error' : '' }}">
                    <label id="hasil">Nama di Inventori</label>
                    <select name="barang_id[]" id="" class="form-control select2">
                                <option value="" selected> -- None --</option>
                            @foreach ($barang as $id => $item)
                                <option class="form-control" value="{{$id}}">{{$item}}</option>
                            @endforeach
                    </select>
                    @if ($errors->has('detail_id'))
                        <em class="invalid-feedback">
                            {{ $errors->first('detail_id') }}
                        </em>
                    @endif
                </div>
            </div>
            <div class="col-sm-12 col-md-3">
                <div class="form-group {{ $errors->has('jumlah') ? 'has-error' : '' }}">
                    <label for="">Jumlah</label>
                    <input type="number" name="jumlah[]" class="form-control"
                        value="{{ old('jumlah', isset($bpb) ? $bpb->jumlah : '') }}" required>
                    @if ($errors->has('jumlah'))
                        <em class="invalid-feedback">
                            {{ $errors->first('jumlah') }}
                        </em>
                    @endif
                </div>
            </div>
            <div class="col-sm-12 col-md-3">
                <div class="form-group{ $errors->has('satuan') ? 'has-error' : '' }}">
                    <label for="">Satuan</label>
                    <select name="satuan[]" id="satuan" class="form-control" required>
                        @if (!isset($bpb))
                            <option value="" selected>-- Pilih --</option>
                        @endif
                        <option value="Pcs">Pcs</option>
                        <option value="Unit">Unit</option>
                        <option value="Pack">Pack</option>
                        <option value="Dus">Dus</option>
                        <option value="Kg">Kg</option>
                        <option value="Liter">Liter</option>
                        <option value="Meter">Meter</option>
                    </select>
                    @if ($errors->has('satuan'))
                        <em class="invalid-feedback"    >
                            {{ $errors->first('satuan') }}
                        </em>
                    @endif
                </div>
            </div>
        </div>
    </div>
    </div>
        @endif
    
    
    
    <template id="detailTmpl">
        <div class="card p-2" id="detailTBody">
            <div class="card-title">
                <div class="row">
            <div class="col-sm-12 col-md-3">
                <div class="form-group {{ $errors->has('detail_id') ? 'has-error' : '' }}">
                    <label id="hasil">Nama di NPP</label>
    
                    {{-- <input type="text" class="form-control" name="id[]" value="{{null}}" hidden> --}}
                    <select name="detail_id[]" id="detail_id" class="form-control detail_id">
    
                    </select>
                    @if ($errors->has('detail_id'))
                        <em class="invalid-feedback">
                            {{ $errors->first('detail_id') }}
                        </em>
                    @endif
                </div>
            </div>
            <div class="col-sm-12 col-md-3">
                <div class="form-group {{ $errors->has('detail_id') ? 'has-error' : '' }}">
                    <label id="hasil">Nama di Inventori</label>
                    <select name="barang_id[]" id="" class="form-control select2">
                                <option value="" selected> -- None --</option>
                            @foreach ($barang as $id => $item)
                                <option class="form-control" value="{{$id}}">{{$item}}</option>
                            @endforeach
                    </select>
                    @if ($errors->has('detail_id'))
                        <em class="invalid-feedback">
                            {{ $errors->first('detail_id') }}
                        </em>
                    @endif
                </div>
            </div>
            <div class="col-sm-12 col-md-3">
                <div class="form-group {{ $errors->has('jumlah') ? 'has-error' : '' }}">
                    <label for="">Jumlah</label>
                    <input type="number" name="jumlah[]" class="form-control"
                        value="{{ old('jumlah', isset($bpb) ? $bpb->jumlah : '') }}" required>
                    @if ($errors->has('jumlah'))
                        <em class="invalid-feedback">
                            {{ $errors->first('jumlah') }}
                        </em>
                    @endif
                </div>
            </div>
            <div class="col-sm-12 col-md-3">
                <div class="form-group{ $errors->has('satuan') ? 'has-error' : '' }}">
                    <label for="">Satuan</label>
                    <select name="satuan[]" id="satuan" class="form-control" required>
                        @if (!isset($bpb))
                            <option value="" selected>-- Pilih --</option>
                        @endif
                        <option value="Pcs">Pcs</option>
                        <option value="Unit">Unit</option>
                        <option value="Pack">Pack</option>
                        <option value="Dus">Dus</option>
                        <option value="Kg">Kg</option>
                        <option value="Liter">Liter</option>
                        <option value="Meter">Meter</option>
                    </select>
                    @if ($errors->has('satuan'))
                        <em class="invalid-feedback"    >
                            {{ $errors->first('satuan') }}
                        </em>
                    @endif
                </div>
            </div>
            <div class="col-sm-12 mt-2">
                <button class="btn btn-danger removeBtn">Hapus</button>
            </div>
        </div>
    </div>
    </div>
    </template>
    @section('scripts')
        <script>
            $(document).ready(function() {
                $(document)
                $(document).on('click', '#addBtn', function() {
                    $('#detailTBody').before($('#detailTmpl').html());
                    })
                    .on('change', '#npp_id', function() {
                        $.ajax({
                            method: 'GET',
                            url: '{{ url('admin/bpbs/options') }}',
                            data: {
                                npp_id: $(this).val()
                            },
                            success: function(response) {
                                console.log(204, response);
                                let options = '';
                                for (let item of response) {
                                    options += `<option value='${item.id}'>${item.nama}</option>`;
                                }
                                $(".detail_id").html(options);
                            }
                        })
                    });
            })
            $(document).on('click','.removeBtn',function() {
                    $(this).closest("#detailTBody").remove();
            })
        </script>
    @endsection
    