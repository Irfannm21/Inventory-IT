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

<button class="btn btn-primary" id="addBtn" type="button">Tambah</button>
<table class="table table-responsive table-borderless" id="detailTBody">
    @if(isset($npp))
    @foreach ($npp->details as $item)
    <tr class=" {{ $errors->has('nama') ? 'has-error' : '' }}">
        <td style="width: 300px">
            <div class="form-group">
                <label for=""> Nama Barang</label>
                <input type="text" id="" class="form-control" name="nama[]" value="{{old('nama') ?? ($item->nama ?? '') ?? isset($item->nama)}}">
                @if ($errors->has('nama'))
                    <em class="invalid-feedback">
                        {{ $errors->first('nama') }}
                    </em>
                @endif
            </div>
        </td>

        <td style="width: 150px">
            <div class="form-group {{ $errors->has('stok[]') ? 'has-error' : '' }}">
                <label for="">Stok</label>
                <input type="number" id="" class="form-control" name="stok[]" value="{{old('stok') ?? ($item->stok ?? '') ?? isset($item->stok)}}">
                @if ($errors->has('stok'))
                    <em class="invalid-feedback">
                        {{ $errors->first('stok') }}
                    </em>
                @endif
            </div>
        </td>

        <td style="width: 150px">
            <div class="form-group {{ $errors->has('jumlah[]') ? 'has-error' : '' }}">
                <label for=""> Jumlah Npp</label>
                <input type="number" id="" class="form-control" name="jumlah[]" value="{{old('jumlah') ?? ($item->jumlah ?? '') ?? isset($item->jumlah)}}">
                @if ($errors->has('jumlah'))
                    <em class="invalid-feedback">
                        {{ $errors->first('jumlah') }}
                    </em>
                @endif
            </div>
        </td>


        <td style="width: 150px">
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
        </td>

        <td style="width: 30    0px">
            <div class="form-group {{ $errors->has('keterangan[]') ? 'has-error' : '' }}">
                <label for="">Keterangan</label>
                <input type="text" id="" class="form-control" name="keterangan[]" value="{{old('keterangan') ?? ($item->keterangan ?? '') ?? isset($item->keterangan)}}">
                @if ($errors->has('keterangan'))
                    <em class="invalid-feedback">
                        {{ $errors->first('keterangan') }}
                    </em>
                @endif
            </div>
        </td>
        <td style="width: 50px">
            <div>
                <button class="btn btn-danger removeBtn">Del</button>
            </div>
        </td>
    </tr>
    @endforeach
    @else
    <tr class=" {{ $errors->has('nama') ? 'has-error' : '' }}">
        <td style="width: 300px">
            <div class="form-group">
                <label for=""> Nama Barang</label>
                <input type="text" id="" class="form-control" name="nama[]">
                @if ($errors->has('nama'))
                    <em class="invalid-feedback">
                        {{ $errors->first('nama') }}
                    </em>
                @endif
            </div>
        </td>

        <td style="width: 150px">
            <div class="form-group {{ $errors->has('stok[]') ? 'has-error' : '' }}">
                <label for="">Stok</label>
                <input type="number" id="" class="form-control" name="stok[]">
                @if ($errors->has('stok'))
                    <em class="invalid-feedback">
                        {{ $errors->first('stok') }}
                    </em>
                @endif
            </div>
        </td>

        <td style="width: 150px">
            <div class="form-group {{ $errors->has('jumlah[]') ? 'has-error' : '' }}">
                <label for=""> Jumlah Npp</label>
                <input type="number" id="" class="form-control" name="jumlah[]">
                @if ($errors->has('jumlah'))
                    <em class="invalid-feedback">
                        {{ $errors->first('jumlah') }}
                    </em>
                @endif
            </div>
        </td>


        <td style="width: 150px">
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
        </td>

        <td style="width: 350px">
            <div class="form-group {{ $errors->has('keterangan[]') ? 'has-error' : '' }}">
                <label for="">Keterangan</label>
                <input type="text" id="" class="form-control" name="keterangan[]">
                @if ($errors->has('keterangan'))
                    <em class="invalid-feedback">
                        {{ $errors->first('keterangan') }}
                    </em>
                @endif
            </div>
        </td>
    </tr>
    @endif

</table>






<template id="detailTmpl">
    <tr>
        <td style="width: 300px">
            <div class="form-group {{ $errors->has('nama[]') ? 'has-error' : '' }}">
                <input type="text" id="" class="form-control" name="nama[]">
                @if ($errors->has('nama'))
                    <em class="invalid-feedback">
                        {{ $errors->first('nama') }}
                    </em>
                @endif
            </div>
        </td>

        <td style="width: 150px">
            <div class="form-group {{ $errors->has('stok[]') ? 'has-error' : '' }}">
                <input type="number" id="" class="form-control" name="stok[]">
                @if ($errors->has('stok'))
                    <em class="invalid-feedback">
                        {{ $errors->first('stok') }}
                    </em>
                @endif
            </div>
        </td>

        <td style="width: 150px">
            <div class="form-group {{ $errors->has('jumlah[]') ? 'has-error' : '' }}">
                <input type="number" id="" class="form-control" name="jumlah[]">
                @if ($errors->has('jumlah'))
                    <em class="invalid-feedback">
                        {{ $errors->first('jumlah') }}
                    </em>
                @endif
            </div>
        </td>


        <td style="width: 150px">
            <div class="form-group {{ $errors->has('satuan[]') ? 'has-error' : '' }}">
                <select name="satuan[]" class="form-control" id="">
                    <option value="" selected>-- Pilih --</option>
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

        <td style="width: 350px">
            <div class="form-group {{ $errors->has('keterangan[]') ? 'has-error' : '' }}">
                <input type="text" id="" class="form-control" name="keterangan[]">
                @if ($errors->has('keterangan'))
                    <em class="invalid-feedback">
                        {{ $errors->first('keterangan') }}
                    </em>
                @endif
            </div>
        </td>

        <td style="width 50px">
            <button class="btn btn-danger removeBtn">Del</button>
        </td>
    </tr>
</template>
<br>
<br>
@section('scripts')
    <script>
        $(document).ready(function() {
            $(document).on('click', '#addBtn', function() {
                $('#detailTBody').append($('#detailTmpl').html());
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

        $("#detailTBody").on('click','.removeBtn',function() {
                $(this).closest('tr').remove();
        })

    </script>
@endsection
