@extends('layouts.admin')
@section('content')
    <div class="card">
        <div class="card-header">
            Ubah Data Pembayaran
        </div>

        <div class="card-body">
            <form action="{{ route('admin.pembayarans.update', [$result->id]) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="form-row">
                    <div class="form-group col-md-4 {{ $errors->has('bpb_id') ? 'has-error' : '' }}">
                        <label for="">Kode Bpb</label>
                        <input type="text" class="form-control"
                            value="{{ old('bpb_id', isset($result) ? $result->bpb->kode: '') }}" disabled>

                        @if ($errors->has('bpb_id'))
                            <em class="invalid-feedback">
                                {{ $errors->first('bpb_id') }}
                            </em>
                        @endif
                        <p class="helper-block">
                            {{ trans('*Masukan Nama Barang') }}
                        </p>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-md-4 {{ $errors->has('bpb_id') ? 'has-error' : '' }}">
                        <label for="">Nama Barang</label>
                      <select name="bpb_id" id="bpb_id" class="form-control">
                             @foreach ($bpb as $item)
                                <option value="{{$item->id}}">{{$item->detail->nama}}</option>
                             @endforeach
                      </select>

                        @if ($errors->has('bpb_id'))
                            <em class="invalid-feedback">
                                {{ $errors->first('bpb_id') }}
                            </em>
                        @endif
                        <p class="helper-block">
                            {{ trans('*Masukan Nama Barang') }}
                        </p>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-md-4 {{ $errors->has('harga_satuan') ? 'has-error' : '' }}">
                        <label for="">Harga Satuan</label>
                        <input type="text" name="harga_satuan" class="form-control"
                            value="{{ old('harga_satuan', isset($result) ? $result->harga_satuan : '') }}" placeholder="Cth: 001/ENG/22">

                        @if ($errors->has('harga_satuan'))
                            <em class="invalid-feedback">
                                {{ $errors->first('harga_satuan') }}
                            </em>
                        @endif
                        <p class="helper-block">
                            {{ trans('*Masukan harga satuan') }}
                        </p>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-md-4 {{ $errors->has('ppn') ? 'has-error' : '' }}">
                        <label for="">PPN 11%</label>
                        <input type="text" name="ppn" class="form-control"
                            value="{{ old('ppn', isset($result) ? $result->ppn : '') }}" placeholder="Cth: 001/ENG/22">

                        @if ($errors->has('ppn'))
                            <em class="invalid-feedback">
                                {{ $errors->first('ppn') }}
                            </em>
                        @endif
                        <p class="helper-block">
                            {{ trans('*Masukan harga satuan') }}
                        </p>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-md-4 {{ $errors->has('jenis_pembayaran') ? 'has-error' : '' }}">
                        <label for="">Jenis Pembayaran</label>
                       <select name="jenis_pembayaran" id="jenis_pembayaran" class="form-control">
                        @if ($result->jenis_pembayaran == (old('jenis_pembayaran') ?? "Cash"))
                            <option value="{{$result->jenis_pembayaran}}" selected>{{$result->jenis_pembayaran}}</option>
                            <option value="Kredit">Kredit</option>
                        @else
                            <option value="{{$result->jenis_pembayaran}}">{{$result->jenis_pembayaran}}</option>
                            <option value="Cash">Cash</option>
                        @endif
                       </select>

                        @if ($errors->has('jenis_pembayaran'))
                            <em class="invalid-feedback">
                                {{ $errors->first('jenis_pembayaran') }}
                            </em>
                        @endif
                        <p class="helper-block">
                            {{ trans('*Masukan harga satuan') }}
                        </p>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-md-4 {{ $errors->has('lama_kredit') ? 'has-error' : '' }}">
                        <label for="">Lama Kredit</label>
                        <select name="lama_kredit" id="" class="form-control">
                            @for ($i=1; $i <= 36; $i++)
                                <option value="{{$i}}" {{ $result->lama_kredit==$i?'selected':'' }}>{{$i}}</option>
                            @endfor[]

                        </select>

                        @if ($errors->has('lama_kredit'))
                            <em class="invalid-feedback">
                                {{ $errors->first('lama_kredit') }}
                            </em>
                        @endif
                        <p class="helper-block">
                            {{ trans('*Masukan harga satuan') }}
                        </p>
                    </div>
                </div>


                <div>
                    <input class="btn btn-success" type="submit" value="{{ trans('global.save') }}">
                </div>
            </form>
        </div>
    </div>
    <script>
        $(document).ready(function() {
            $(document)
                .on('change', '#kode_npp', function() {
                    $.ajax({
                        method: 'GET',
                        url: '{{ url('admin/npps/options') }}',
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
                })
        })



        let namaBarang = document.getElementById("kode_npp");

        const generateNpp = () => {
            let request = new XMLHttpRequest();
            request.open("GET", "../../kode-npp.php", false);
            request.send();
            namaBarang.innerHTML = request.responseText;
        }

        generateNpp();
    </script>
@endsection
