<table>
    <tr>
        <td class="px-3">
            <label for="kode">Kode NPP</label>
        </td>

        <td class="pt-3">
            <input type="text" id="kode" name="kode" class="form-control" value="{{ old('kode', isset($npp) ? $npp->kode : '') }}" placeholder="Cth: 001/MKT/065">
            @if($errors->has('kode'))
                <em class="invalid-feedback">
                    {{ $errors->first('kode') }}
                    @endif
                </em>
                <p class="helper-block text-muted">
                *Masukan kode NPP
                </p>
        </td>
    </tr>
    <tr>
        <td class="px-3">
            <label for="tanggal">Tanggal</label>
        </td>

        <td class="pt-3">
            <input type="date" id="tanggal" name="tanggal" class="form-control" value="{{ old('tanggal', isset($npp) ? $npp->tanggal : '') }}" placeholder="Cth: 001/MKT/065">
            @if($errors->has('tanggal'))
                <em class="invalid-feedback">
                    {{ $errors->first('tanggal') }}
                    @endif
                </em>
                <p class="helper-block text-muted">
                *Masukan kode NPP
                </p>
        </td>
    </tr>
    <tr>
        <td class="px-3">
            <label for="departemen">Departemen</label>
        </td>

        <td class="pt-3">
            <select name="departemen" id="departemen" class="form-control">
                <option value="">-- Pilih --</option>
                @foreach ($dept as $id => $value)
                <option value="{{$id}}">{{$value}}</option>
                @endforeach
            </select>
            @if($errors->has('departemen'))
            <em class="invalid-feedback">
                {{ $errors->first('departemen') }}
                @endif
            </em>
            <p class="helper-block text-muted">
            *Pilih depar
        </td>
    </tr>

    <tr>
        <td class="px-3 ">
            <label for="bagian">Bagian</label>
        </td>

        <td class="pt-3">
            <select name="bagian" id="bagian" class="form-control">
                <option value="">-- Pilih --</option>
                @foreach ($bagian as $id => $value)
                <option value="{{$id}}">{{$value}}</option>
                @endforeach
            </select>
            @if($errors->has('bagian'))
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
<table>
    <thead>
        <th>Nama</th>
        <th>Jumlah</th>
        <th>Satuan</th>
        <th>Stok</th>
        <th>Keterangan</th>
    </thead>
    <tbody id="detailTBody">
        <tr>
            <td> <input type="text" id="" class="form-control" name="nama[]"></td>
            <td> <input type="number" id="" class="form-control" name="jumlah[]"> </td>
            <td> <input type="text" id="" class="form-control" name="satuan[]"></td>
            <td> <input type="number" id="" class="form-control" name="stok[]"> </td>
            <td> <input type="text" id="" class="form-control" name="keterangan[]"></td>
        </tr>
    </tbody>
</table>
<template id="detailTmpl">
    <tr>
        <td> <input type="text" id="" class="form-control" name="nama[]"></td>
        <td> <input type="number" id="" class="form-control" name="jumlah[]"> </td>
        <td> <input type="text" id="" class="form-control" name="satuan[]"></td>
        <td> <input type="number" id="" class="form-control" name="stok[]"> </td>
        <td> <input type="text" id="" class="form-control" name="keterangan[]"></td>
        <td><button type="submit" class="btn btn-danger" id="removeBtn"><i class="fas fa-trash"></i></button></td>
    </tr>
</template>
<br>
<br>
@section('scripts')
<script>
    $(document).ready(function(){
        $(document).on('click', '#addBtn', function(){
            $('#detailTBody').append($('#detailTmpl').html());
        });
    })

    $(document).ready(function(){
        $(document).on('click', '#removeBtn', function(){
            var $tmp = $('#detailTmpl').closest('$detilTmpl');
            $tmp.fadeOut(function(){$tmp.remove(); })
        })
    })
</script>
@endsection
