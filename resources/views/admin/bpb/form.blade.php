<div class="row">
    <div class="col">

        <div class="card">
            <div class="card-body">
                <h5 class="card-title text-center">Masukan Data BPB</h5>
                <hr>
                <div class="form-group row">
                    <label for="kodeBpb" class="col-sm-3 col-form-label {{ $errors->has('kode') ? 'has-error' : '' }}">Kode Bpb</label>
                    <div class="col-sm-9">
                        <input type="text" name="kode" class="form-control" value="{{ old('kode', isset($bpb) ? $bpb->kode : '') }}"
                            placeholder="Cth: 001/ENG/22">
                        @if ($errors->has('kode'))
                            <em class="invalid-feedback">
                                {{ $errors->first('kode') }}
                            </em>
                        @endif
                        <p class="helper-block">
                            {{ trans('*Wajib isi kode BPB') }}
                        </p>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="kelompok" class="col-sm-3 col-form-label {{ $errors->has('kelompok') ? 'has-error' : '' }}">Kelompok</label>
                    <div class="col-sm-9">
                        <select name="kelompok" id="kelompok" class="form-control">
                            <option value="" selected>-- Pilih --   </option>
                            <option value="Sparepart">Sparepart</option>
                            <option value="Administrasi">Administrasi</option>
                            <option value="Elektrik">Elektrik</option>
                            <option value="Mobil">Mobil</option>
                            <option value="PT">PT</option>
                            <option value="UM">UM</option>
                            <option value="Spinning">Spinning</option>
                        </select>
                        @if ($errors->has('kelompok'))
                            <em class="invalid-feedback">
                                {{ $errors->first('kelompok') }}
                            </em>
                        @endif
                        <p class="helper-block">
                            {{ trans('*Wajib pilih kelompok') }}
                        </p>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="tanggal" class="col-sm-3 col-form-label {{ $errors->has('tanggal') ? 'has-error' : '' }}">Tanggal</label>
                    <div class="col-sm-9">
                        <input type="date" name="tanggal" class="form-control"
                            value="{{ old('tanggal', isset($bpb) ? $bpb->tanggal : '') }}">
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
                    <label for="kode_npp" class="col-sm-3 col-form-label {{ $errors->has('kode_npp') ? 'has-error' : '' }}">Kode NPP</label>
                    <div class="col-sm-9">
                        <select name="npp_id" id="npp_id" class="form-control select2">
                            <option>-- Pilih --</option>
                            @foreach ($npp as $i => $item)
                            <option value="{{$i}}">{{$item}}</option>
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
    <div class="col">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title text-center">Cari Supplier yang sudah ada</h5>
                <hr>
                <div class="form-group row">
                    <label for="namaSupplier" class="col-sm-3 col-form-label">Nama Supplier</label>
                    <div class="col-sm-9">
                        <select name="supplierId" id="supplierId" class="form-control select2">
                            <option value="" selected>-- Pilih --</option>
                            @foreach ($suppliers as $i => $item)
                            <option value="{{$i}}">{{$item}}</option>
                            @endforeach
                        </select>
                        @if ($errors->has('supplierId'))
                            <em class="invalid-feedback">
                                {{ $errors->first('supplierId') }}
                            </em>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="accordion" id="accordionSupplier">
                <div class="card-body">
                    <h5 class="card-title text-center"><button class="btn btn-xs btn-primary" type="button" data-toggle="collapse" data-target="#bukaSupplier">Buat Supplier Baru</button></h5>
                    <hr>
                    <div id="bukaSupplier" class="collapse" data-parent="#accordionSupplier">
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
                                    {{ trans('*Wajib di isi') }}
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
                                    {{ trans('*Wajib di isi') }}
                                </p>
                            </div>

                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-4 {{ $errors->has('email') ? 'has-error' : '' }}">
                                <label for="">Alamat Email</label>
                                <input type="text" name="email" class="form-control" value="{{ old('email') }}"
                                    placeholder="Cth: info@insansandang.com">
                                @if ($errors->has('email'))
                                    <em class="invalid-feedback">
                                        {{ $errors->first('email') }}
                                    </em>
                                @endif
                            </div>
                            <div class="form-group col-md-4 {{ $errors->has('telepon') ? 'has-error' : '' }}">
                                <label for="">Nomor Telepon</label>
                                <input type="text" name="telepon" class="form-control" value="{{ old('telepon') }}"
                                    placeholder="Cth: 089681558231">
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
                                <input type="text" name="alamat" class="form-control" value="{{ old('alamat') }}"
                                    placeholder="Cth: Jl. Rancaekek No.KM 22, RW.5, Cinta Mulya, Kec. Jatinangor, Kabupaten Sumedang, Jawa Barat 45363">
                                @if ($errors->has('alamat'))
                                    <em class="invalid-feedback">
                                        {{ $errors->first('alamat') }}
                                    </em>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            </div>



    </div>
</div>

<button class="btn btn-primary" id="addBtn" type="button">Tambah Baris Baru</button>

<table class="table table-responsive table-borderless" id="detailTBody">
    <tr>
        <td style="width: 300px">
            <div class="form-group {{ $errors->has('detail_id') ? 'has-error' : '' }}">
                <label id="hasil">Nama Pesanan Barang</label>
                <select name="detail_id[]" id="detail_id" class="form-control detail_id">

                </select>
                @if ($errors->has('detail_id'))
                    <em class="invalid-feedback">
                        {{ $errors->first('detail_id') }}
                    </em>
                @endif
            </div>
        </td>
        <td style="width: 300px">
            <div class="form-group {{ $errors->has('detail_id') ? 'has-error' : '' }}">
                <label id="hasil">Nama di Inventori</label>
                <select name="barang_id[]" id="" class="form-control select2">
                            <option value="" selected> -- Pilih --</option>
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
        </td>
        <td style="width: 200px">
            <div class="form-group {{ $errors->has('jumlah') ? 'has-error' : '' }}">
                <label for="">Jumlah</label>
                <input type="number" name="jumlah[]" class="form-control"
                    value="{{ old('jumlah', isset($bpb) ? $bpb->jumlah : '') }}">
                @if ($errors->has('jumlah'))
                    <em class="invalid-feedback">
                        {{ $errors->first('jumlah') }}
                    </em>
                @endif
            </div>
        </td>
        <td style="width: 200px">
            <div class="form-group{ $errors->has('satuan') ? 'has-error' : '' }}">
                <label for="">Satuan</label>
                <select name="satuan[]" id="satuan" class="form-control">
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
                    <em class="invalid-feedback">
                        {{ $errors->first('satuan') }}
                    </em>
                @endif
            </div>
        </td>
    </tr>
</table>

<template id="detailTmpl">
    <tr style="padding:0px">
        <td style="width: 300px">
            <div class="form-group{{ $errors->has('detail_id') ? 'has-error' : '' }}">
                <select name="detail_id[]" id="detail_id" class="form-control detail_id">

                </select>
                @if ($errors->has('detail_id'))
                    <em class="invalid-feedback">
                        {{ $errors->first('detail_id') }}
                    </em>
                @endif
            </div>
        </td>
        <td style="width: 300px">
            <div class="form-group {{ $errors->has('detail_id') ? 'has-error' : '' }}">
                <select name="barang_id[]" id="" class="form-control select2">
                            <option value="" selected> -- Pilih --</option>
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
        </td>
        <td style="width: 200px">
            <div class="form-group {{ $errors->has('jumlah') ? 'has-error' : '' }}">
                <input type="number" name="jumlah[]" class="form-control"
                    value="{{ old('jumlah', isset($bpb) ? $bpb->jumlah : '') }}">
                @if ($errors->has('jumlah'))
                    <em class="invalid-feedback">
                        {{ $errors->first('jumlah') }}
                    </em>
                @endif
            </div>
        </td>
        <td style="width: 200px">
            <div class="form-group{ $errors->has('satuan') ? 'has-error' : '' }}">
                <select name="satuan[]" id="satuan" class="form-control">
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
                    <em class="invalid-feedback">
                        {{ $errors->first('satuan') }}
                    </em>
                @endif
            </div>
        </td>
        <td>
            <button class="btn btn-danger removeBtn">
                Del
            </button>
        </td>
    </tr>
</template>
@section('scripts')
    <script>
        $(document).ready(function() {
            $(document)
                .on('click', '#addBtn', function() {
                    $('#detailTBody').append($('#detailTmpl').html());
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
                            $('.detail_id').html(options);
                        }
                    })
                });
                $("#detailTBody").on("click",".removeBtn", function() {
                    $(this).closest('tr').remove();
                })

        })

    </script>
@endsection
