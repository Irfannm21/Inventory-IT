
    <div class="form-row">
        <div class="form-group {{ $errors->has('kode_bpb') ? 'has-error' : '' }}">
        <label for="">Kode BPB</label>
        <select name="kode_bpb" id="kode_bpb" class="form-control select2">
            <option value="" selected>-- Pilih Kode BPB --</option>
            @foreach ($bpb as $i => $item)
                <option value="{{$item}}">{{ $item }}</option>
            @endforeach
        </select>
        @if ($errors->has('kode_bpb'))
        <em class="invalid-feedback">
                {{ $errors->first('kode_bpb') }}
            </em>
        @endif
        <p class="helper-block">
            {{ trans('*Pilih Kode NPP') }}
        </p>
    </div>
</div>

<button class="btn btn-primary" id="addBtn" type="button">Tambah</button>

<table class="table table-responsive table-borderless" id="detailTBody">
    <tr>
        <td style="width: 500px">
            <div class="form-group {{ $errors->has('bpb_id') ? 'has-error' : '' }}">
                <label for=""> Nama dan Jumlah Barang</label>
                <select name="bpb_id[]" class="form-control nama_bpb">

                </select>
                @if ($errors->has('bpb_id'))
                    <em class="invalid-feedback">
                        {{ $errors->first('bpb_id') }}
                    </em>
                @endif
            </div>
        </td>
        <td style="width: 300px">
            <div class="form-group {{ $errors->has('harga_satuan') ? 'has-error' : '' }}">
                <label for="">Harga Satuan</label>
               <input type="text" name="harga_satuan[]" class="form-control">
                @if ($errors->has('harga_satuan'))
                    <em class="invalid-feedback">
                        {{ $errors->first('harga_satuan') }}
                    </em>
                @endif
            </div>
        </td>
        <td style="width: 300px">
            <div class="form-group {{ $errors->has('ppn') ? 'has-error' : '' }}">
                <label for="">Total PPN</label>
               <input type="text" name="ppn[]" class="form-control">
                @if ($errors->has('kode_bpb'))
                    <em class="invalid-feedback">
                        {{ $errors->first('ppn') }}
                    </em>
                @endif
            </div>
        </td>
        <td style="width: 300px">
            <div class="form-group {{ $errors->has('jenis_pembayaran') ? 'has-error' : '' }}">
                <label for="">Jenis Pembayaran</label>
                <select name="jenis_pembayaran[]" id="" class="form-control">
                    <option value="" selected>-- Pilih --</option>
                    <option value="Cash">Cash</option>
                    <option value="Kredit">Kredit</option>
                </select>
                @if ($errors->has('jenis_pembayaran'))
                    <em class="invalid-feedback">
                        {{ $errors->first('ppn') }}
                    </em>
                @endif
            </div>
        </td>
        <td style="width: 300px">
            <div class="form-group {{ $errors->has('ppn') ? 'has-error' : '' }}">
                <label for="">Lama Kredit</label>
                <select name="lama_kredit[]" id="" class="form-control">
                    <option value="" selected>-- Pilih --</option>
                    @for ($i=1; $i<=36; $i++)
                        <option value="{{$i}}">{{$i}} Bulan </option>
                    @endfor
                </select>
                @if ($errors->has('kode_bpb'))
                    <em class="invalid-feedback">
                        {{ $errors->first('ppn') }}
                    </em>
                @endif
            </div>
        </td>
    </tr>
</table>

<template id="detailTmpl">
    <tr>
        <td style="width: 500px">
            <div class="form-group {{ $errors->has('bpb_id') ? 'has-error' : '' }}">
                <select name="bpb_id[]" class="form-control nama_bpb">

                </select>
                @if ($errors->has('bpb_id'))
                    <em class="invalid-feedback">
                        {{ $errors->first('bpb_id') }}
                    </em>
                @endif
            </div>
        </td>
        <td style="width: 300px">
            <div class="form-group {{ $errors->has('harga_satuan') ? 'has-error' : '' }}">
                <input type="text" name="harga_satuan[]" class="form-control">
                 @if ($errors->has('harga_satuan'))
                     <em class="invalid-feedback">
                         {{ $errors->first('harga_satuan') }}
                     </em>
                 @endif
             </div>
        </td>
        <td style="width: 300px">
            <div class="form-group {{ $errors->has('ppn') ? 'has-error' : '' }}">
                <input type="text" name="ppn[]" class="form-control">
                 @if ($errors->has('ppn'))
                     <em class="invalid-feedback">
                         {{ $errors->first('ppn') }}
                     </em>
                 @endif
             </div>
        </td>
        <td style="width: 300px">
            <div class="form-group {{ $errors->has('jenis_pembayaraan') ? 'has-error' : '' }}">
                <select name="jenis_pembayaran[]" id="" class="form-control">
                    <option value="" selected>-- Pilih --</option>
                    <option value="Cash">Cash</option>
                    <option value="Kredit">Kredit</option>
                </select>
                @if ($errors->has('kode_bpb'))
                    <em class="invalid-feedback">
                        {{ $errors->first('jenis_pembayaraan') }}
                    </em>
                @endif
            </div>
        </td>
        <td style="width: 300px">
            <div class="form-group {{ $errors->has('lama_kredit') ? 'has-error' : '' }}">
                <select name="lama_kredit[]" id="" class="form-control">
                    <option value="" selected>-- Pilih --</option>
                    @for ($i=1; $i<=36; $i++)
                        <option value="{{$i}}">{{$i}} Bulan </option>
                    @endfor
                </select>
                @if ($errors->has('kode_bpb'))
                    <em class="invalid-feedback">
                        {{ $errors->first('lama_kredit') }}
                    </em>
                @endif
            </div>
        </td>
        <td style="width: 300px">
            <button class="btn btn-danger removeBtn">Del</button>
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
                .on('change', '#kode_bpb', function() {
                    $.ajax({
                        method: 'GET',
                        url: '{{ url('admin/pembayarans/options') }}',
                        data: {
                            kode: $(this).val()
                        },
                        success: function(response) {
                            console.log(204, response);
                            let options = '';
                            for (let item of response) {
                                options += `<option value='${item.id}'>${item.detail.nama} | ${item.jumlah} ${item.satuan}</option>`;
                            }
                            $('.nama_bpb').html(options);
                        }
                    })
                });
                $("#detailTBody").on('click','.removeBtn',function() {
                    $(this).closest('tr').remove();
                })
        })

    </script>
@endsection
