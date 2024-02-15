<table>
    <tr class="{{ $errors->has('kode') ? 'has-error' : '' }}">
        <td class="px-3">
            <label for="kode">Kode NPP</label>
        </td>

        <td class="pt-3">
            <input type="text" id="kode" name="kode" class="form-control"
                value="{{ old('kode', isset($npp) ? $npp->kode : '') }}" placeholder="Cth: 001/MKT/065">
            @if ($errors->has('kode'))
                <em class="invalid-feedback">
                    {{ $errors->first('kode') }}
            @endif
            </em>
            <p class="helper-block text-muted">
                *Masukan kode NPP
            </p>
        </td>
    </tr>
    <tr class="{{ $errors->has('tanggal') ? 'has-error' : '' }}">
        <td class="px-3">
            <label for="tanggal">Tanggal</label>
        </td>

        <td class="pt-3">
            <input type="date" id="tanggal" name="tanggal" class="form-control"
                value="{{ old('tanggal', isset($npp) ? $npp->tanggal : '') }}" placeholder="Cth: 001/MKT/065">
            @if ($errors->has('tanggal'))
                <em class="invalid-feedback">
                    {{ $errors->first('tanggal') }}
            @endif
            </em>
            <p class="helper-block text-muted">
                *Masukan kode NPP
            </p>
        </td>
    </tr>
    <tr class="{{ $errors->has('departemen') ? 'has-error' : '' }}">
        <td class="px-3">
            <label for="departemen">Departemen</label>
        </td>

        <td class="pt-3">
            <select name="departemen" id="departemen" class="form-control">
                <option value="">-- Pilih --</option>
                @foreach ($dept as $id => $value)
                    <option value="{{$id}}"{{$value == (old('departemen') ?? ($npp->bagian->departemen->nama ?? '') ?? isset($npp->bagian->departemen->nama)) ? 'selected' : '' }}>{{$value}}</option>
                @endforeach
            </select>
            @if ($errors->has('departemen'))
                <em class="invalid-feedback">
                    {{ $errors->first('departemen') }}
            @endif
            </em>
            <p class="helper-block text-muted">
                *Pilih departemen
        </td>
    </tr>

    <tr class="{{ $errors->has('bagian') ? 'has-error' : '' }}">
        <td class="px-3 ">
            <label for="bagian">Bagian</label>
        </td>

        <td class="pt-3">
            <select name="bagian" id="bagian" class="form-control">
                <option value="">-- Pilih --</option>
                @foreach ($bagian as $id => $value)
                    <option value="{{$id}}"{{$value == (old('bagian') ?? ($npp->bagian->nama ?? '') ?? isset($npp->bagian->nama)) ? 'selected' : '' }}>{{$value}}</option>
                @endforeach
            </select>
            @if ($errors->has('bagian'))
                <em class="invalid-feedback">
                    {{ $errors->first('bagian') }}
            @endif
            </em>
            <p class="helper-block text-muted">
                *Pilih Bagian
        </td>
    </tr>
</table>

<button class="btn btn-primary mb-2" id="addBtn" type="button">Tambah</button>
@if(isset($npp))
@foreach ($npp->details as $item)
<div class="card p-2" id="detailTBody">
    <div class="card-title">
        <div class="row">
            <div class="col-sm-12 col-lg-4">
                <div class="form-group">
                    <label for=""> Nama</label>
                    <input type="text" id="" class="form-control" name="id[]" value="{{old('nama') ?? ($item->id ?? '') ?? isset($item->id)}}" hidden>

                   <input type="text" id="" class="form-control" name="nama[]" value="{{old('nama') ?? ($item->nama ?? '') ?? isset($item->nama)}}">
                    @if ($errors->has('nama'))
                        <em class="invalid-feedback">
                            {{ $errors->first('nama') }}
                        </em>
                    @endif
                </div>
            </div>
            <div class="col">
                <div class="form-group {{ $errors->has('stok[]') ? 'has-error' : '' }}">
                    <label for="">Stok</label>
                    <input type="number" id="" class="form-control" name="stok[]" value="{{old('stok') ?? ($item->stok ?? '') ?? isset($item->stok)}}">
                    @if ($errors->has('stok'))
                        <em class="invalid-feedback">
                            {{ $errors->first('stok') }}
                        </em>
                    @endif
                </div>
            </div>
            <div class="col">
                <div class="form-group {{ $errors->has('jumlah[]') ? 'has-error' : '' }}">
                    <label for=""> Jumlah</label>
                    <input type="number" id="" class="form-control" name="jumlah[]"   value="{{old('jumlah') ?? ($item->jumlah ?? '') ?? isset($item->jumlah)}}">
                    @if ($errors->has('jumlah'))
                        <em class="invalid-feedback">
                            {{ $errors->first('jumlah') }}
                        </em>
                    @endif
                </div>
            </div>
            <div class="col">
                <div class="form-group {{ $errors->has('satuan[]') ? 'has-error' : '' }}">
                    <label for="">Satuan</label>
                    <select name="satuan[]" class="form-control" id="">
                        <option value="" selected>-- Pilih --</option>
                        <option value="Pcs" {{"Pcs" == (old('satuan') ?? ($item->satuan ?? '') ?? isset($item->satuan)) ? 'selected' : '' }}>Pcs</option>
                        <option value="Unit" {{"Unit" == (old('satuan') ?? ($item->satuan ?? '') ?? isset($item->satuan)) ? 'selected' : '' }}>Unit</option>
                        <option value="Pack" {{"Pack" == (old('satuan') ?? ($item->satuan ?? '') ?? isset($item->satuan)) ? 'selected' : '' }}>Pack</option>
                        <option value="Dus" {{"Dus" == (old('satuan') ?? ($item->satuan ?? '') ?? isset($item->satuan)) ? 'selected' : '' }}>Dus</option>
                        <option value="Kg" {{"Kg" == (old('satuan') ?? ($item->satuan ?? '') ?? isset($item->satuan)) ? 'selected' : '' }}>Kg</option>
                        <option value="Liter" {{"Liter" == (old('satuan') ?? ($item->satuan ?? '') ?? isset($item->satuan)) ? 'selected' : '' }}>Liter</option>
                        <option value="Meter" {{"Meter" == (old('satuan') ?? ($item->satuan ?? '') ?? isset($item->satuan)) ? 'selected' : '' }}>Meter</option>
                    </select>
                    @if ($errors->has('satuan'))
                        <em class="invalid-feedback">
                            {{ $errors->first('satuan') }}
                        </em>
                    @endif
            </div>
        </div>
        <div class="col-sm-12 col-lg-4">
            <div class="form-group {{ $errors->has('keterangan[]') ? 'has-error' : '' }}">
                <label for="">Keterangan</label>
                <input type="text" id="" class="form-control" name="keterangan[]" value="{{old('keterangan') ?? ($item->keterangan ?? '') ?? isset($item->keterangan)}}"    >
                @if ($errors->has('keterangan'))
                    <em class="invalid-feedback">
                        {{ $errors->first('keterangan') }}
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
            <div class="col-sm-12 col-lg-4">
                <div class="form-group">
                    <label for=""> Nama</label>
                    <input type="text" id="" class="form-control" name="nama[]" required>
                    @if ($errors->has('nama'))
                        <em class="invalid-feedback">
                            {{ $errors->first('nama') }}
                        </em>
                    @endif
                </div>
            </div>
            <div class="col">
                <div class="form-group {{ $errors->has('stok[]') ? 'has-error' : '' }}">
                    <label for="">Stok</label>
                    <input type="number" id="" class="form-control" name="stok[]">
                    @if ($errors->has('stok'))
                        <em class="invalid-feedback">
                            {{ $errors->first('stok') }}
                        </em>
                    @endif
                </div>
            </div>
            <div class="col">
                <div class="form-group {{ $errors->has('jumlah[]') ? 'has-error' : '' }}">
                    <label for=""> Jumlah</label>
                    <input type="number" id="" class="form-control" name="jumlah[]" required>
                    @if ($errors->has('jumlah'))
                        <em class="invalid-feedback">
                            {{ $errors->first('jumlah') }}
                        </em>
                    @endif
                </div>
            </div>
            <div class="col">
                <div class="form-group {{ $errors->has('satuan[]') ? 'has-error' : '' }}">
                    <label for="">Satuan</label>
                    <select name="satuan[]" class="form-control" id="" required>
                        <option value="" selected>-- Pilih --</option>
                        <option value="Pcs" {{"Pcs" == (old('satuan') ?? ($item->satuan ?? '') ?? isset($item->satuan)) ? 'selected' : '' }}>Pcs</option>
                        <option value="Unit" {{"Unit" == (old('satuan') ?? ($item->satuan ?? '') ?? isset($item->satuan)) ? 'selected' : '' }}>Unit</option>
                        <option value="Pack" {{"Pack" == (old('satuan') ?? ($item->satuan ?? '') ?? isset($item->satuan)) ? 'selected' : '' }}>Pack</option>
                        <option value="Dus" {{"Dus" == (old('satuan') ?? ($item->satuan ?? '') ?? isset($item->satuan)) ? 'selected' : '' }}>Dus</option>
                        <option value="Kg" {{"Kg" == (old('satuan') ?? ($item->satuan ?? '') ?? isset($item->satuan)) ? 'selected' : '' }}>Kg</option>
                        <option value="Liter" {{"Liter" == (old('satuan') ?? ($item->satuan ?? '') ?? isset($item->satuan)) ? 'selected' : '' }}>Liter</option>
                        <option value="Meter" {{"Meter" == (old('satuan') ?? ($item->satuan ?? '') ?? isset($item->satuan)) ? 'selected' : '' }}>Meter</option>
                    </select>
                    @if ($errors->has('satuan'))
                        <em class="invalid-feedback">
                            {{ $errors->first('satuan') }}
                        </em>
                    @endif
            </div>
        </div>
        <div class="col-sm-12 col-lg-4">
            <div class="form-group {{ $errors->has('keterangan[]') ? 'has-error' : '' }}">
                <label for="">Keterangan</label>
                <input type="text" id="" class="form-control" name="keterangan[]" required>
                @if ($errors->has('keterangan'))
                    <em class="invalid-feedback">
                        {{ $errors->first('keterangan') }}
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
                <div class="col-sm-12 col-lg-4">
                    <div class="form-group">
                        <label for=""> Nama</label>
                        <input type="text" class="form-control" name="id[]" value="{{null}}" hidden>

                        <input type="text" class="form-control" name="nama[]" required>
                        @if ($errors->has('nama'))
                            <em class="invalid-feedback">
                                {{ $errors->first('nama') }}
                            </em>
                        @endif
                    </div>
                </div>
                <div class="col">
                    <div class="form-group {{ $errors->has('stok[]') ? 'has-error' : '' }}">
                        <label for="">Stok</label>
                        <input type="number" id="" class="form-control" name="stok[]">
                        @if ($errors->has('stok'))
                            <em class="invalid-feedback">
                                {{ $errors->first('stok') }}
                            </em>
                        @endif
                    </div>
                </div>
                <div class="col">
                    <div class="form-group {{ $errors->has('jumlah[]') ? 'has-error' : '' }}">
                        <label for=""> Jumlah</label>
                        <input type="number" id="" class="form-control" name="jumlah[]" required>
                        @if ($errors->has('jumlah'))
                            <em class="invalid-feedback">
                                {{ $errors->first('jumlah') }}
                            </em>
                        @endif
                    </div>
                </div>
                <div class="col">
                    <div class="form-group {{ $errors->has('satuan[]') ? 'has-error' : '' }}">
                        <label for="">Satuan</label>
                        <select name="satuan[]" class="form-control" id="" required>
                            <option value="" selected>-- Pilih --</option>
                            <option value="Pcs" {{"Pcs" == (old('satuan') ?? ($item->satuan ?? '') ?? isset($item->satuan)) ? 'selected' : '' }}>Pcs</option>
                            <option value="Unit" {{"Unit" == (old('satuan') ?? ($item->satuan ?? '') ?? isset($item->satuan)) ? 'selected' : '' }}>Unit</option>
                            <option value="Pack" {{"Pack" == (old('satuan') ?? ($item->satuan ?? '') ?? isset($item->satuan)) ? 'selected' : '' }}>Pack</option>
                            <option value="Dus" {{"Dus" == (old('satuan') ?? ($item->satuan ?? '') ?? isset($item->satuan)) ? 'selected' : '' }}>Dus</option>
                            <option value="Kg" {{"Kg" == (old('satuan') ?? ($item->satuan ?? '') ?? isset($item->satuan)) ? 'selected' : '' }}>Kg</option>
                            <option value="Liter" {{"Liter" == (old('satuan') ?? ($item->satuan ?? '') ?? isset($item->satuan)) ? 'selected' : '' }}>Liter</option>
                            <option value="Meter" {{"Meter" == (old('satuan') ?? ($item->satuan ?? '') ?? isset($item->satuan)) ? 'selected' : '' }}>Meter</option>
                        </select>
                        @if ($errors->has('satuan'))
                            <em class="invalid-feedback">
                                {{ $errors->first('satuan') }}
                            </em>
                        @endif
                </div>
            </div>
            <div class="col-sm-12 col-lg-4">
                <div class="form-group {{ $errors->has('keterangan[]') ? 'has-error' : '' }}">
                    <label for="">Keterangan</label>
                    <input type="text" id="" class="form-control" name="keterangan[]">
                    @if ($errors->has('keterangan'))
                        <em class="invalid-feedback">
                            {{ $errors->first('keterangan') }}
                        </em>
                    @endif
                </div>
            </div>
            <div class="col-sm-12 col-lg-4">
                <button class="btn btn-danger removeBtn">Hapus</button>
            </div>
        </div>
    </div>
    </div>
</template>
<br>
<br>
@section('scripts')
    <script>
        $(document).ready(function() {
            $(document).on('click', '#addBtn', function() {
                $('#detailTBody').before($('#detailTmpl').html());

            }).on('change', '#departemen', function() {
                    $.ajax({
                        method: 'GET',
                        url: '{{ url('admin/npps/bagian') }}',
                        data: {
                            dept: $(this).val()
                        },
                        success: function(response) {
                            console.log(204, response);
                            let options = '';
                            for (let item of response) {
                                options += `<option value='${item.id}'>${item.nama}</option>`;
                            }
                            $('#bagian').html(options);
                        }
                    })
                });
        })

        $(document).on('click','.removeBtn',function() {
                $(this).closest("#detailTBody").remove();
        })

    </script>
@endsection
