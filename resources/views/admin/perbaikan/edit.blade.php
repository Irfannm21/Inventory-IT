@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('global.product.title_singular') }}
    </div>

    <div class="card-body">
        <form action="{{ route("admin.perbaikans.update", [$perbaikan->id]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="col-md-4 {{ $errors->has('tanggal') ? 'has-error' : '' }}">
                <label for="tanggal">Tanggal</label>
                <input type="date" id="tanggal" name="tanggal" class="form-control" value="{{ old('tanggal') ?? $perbaikan->tanggal ?? '' }}" placeholder="Cth: 001/MKT/065">
                @if($errors->has('tanggal'))
                    <em class="invalid-feedback">
                        {{ $errors->first('tanggal') }}
                        @endif
                    </em>
                <p class="helper-block text-muted">
                    *Masukan Tanggal Perbaikan
                </p>
            </div>

            <div class="col-md-4 {{ $errors->has('type') ? 'has-error' : '' }}">
                <label for="type">Type Barang</label>
                <select name="type" id="type" class="form-control">
                    @if ($perbaikan->id == (old('type') ?? $perbaikan->hardwareable_type=="App\komputer"))
                    <option value="komputer" selected>Komputer</option>
                    @elseif ($perbaikan->id == (old('type') ?? $perbaikan->hardwareable_type=="App\printer"))
                    <option value="printer" selected>Printer</option>

                    @elseif ($perbaikan->id == (old('type') ?? $perbaikan->hardwareable_type=="App\TableBarangJaringan"))
                    <option value="TableBarangJaringan" selected>Jaringan</option>
                    @else
                    <option value="pengguna" selected>Software</option>
                    @endif

                </select>
                @if($errors->has('type'))
                    <em class="invalid-feedback">
                        {{ $errors->first('type') }}
                        @endif
                    </em>
            </div>

            <div class="col-md-4 {{ $errors->has('nama') ? 'has-error' : '' }}">
                <label for="nama">Nama Barang</label>
                <select name="nama" id="nama" class="form-control namaBarang">
                    <option value="{{$perbaikan->hardwareable_id}}" selected>{{$perbaikan->hardwareable->nama}}</option>
                      @foreach ($result as $id => $item)
                        <option value="{{$item->id}}">{{$item->nama}}</option>
                      @endforeach
                </select>
                @if($errors->has('nama'))
                    <em class="invalid-feedback">
                        {{ $errors->first('nama') }}
                        @endif
                    </em>
            </div>

            <div class="col-md-4 {{ $errors->has('bp') ? 'has-error' : '' }}">
                <label for="bp">Kode BP</label>
                <select name="bp" id="bp" class="form-control">
                    <option value="">-- Tidak ada --</option>
                </select>
                @if($errors->has('bp'))
                    <em class="invalid-feedback">
                        {{ $errors->first('bp') }}
                        @endif
                    </em>
            </div>

            <div class="col-md-4 {{ $errors->has('kerusakan') ? 'has-error' : '' }}">
                <label for="kerusakan">Jenis Kerusakan</label>
                <input type="text" id="kerusakan" name="kerusakan" class="form-control" value="{{ old('kerusakan', isset($perbaikan) ? $perbaikan->kerusakan : '') }}" placeholder="Cth: Printer Papper Jump">
                @if($errors->has('kerusakan'))
                    <em class="invalid-feedback">
                        {{ $errors->first('kerusakan') }}
                        @endif
                    </em>
                <p class="helper-block text-muted">
                    *Masukan kerusakan Perbaikan
                </p>
            </div>

            <div class="col-md-4 {{ $errors->has('tindakan') ? 'has-error' : '' }}">
                <label for="tindakan">Tindakan</label>
                <input type="text" id="tindakan" name="tindakan" class="form-control" value="{{ old('tindakan', isset($perbaikan) ? $perbaikan->tindakan : '') }}" placeholder="Cth: Membersikan isi printer">
                @if($errors->has('tindakan'))
                    <em class="invalid-feedback">
                        {{ $errors->first('tindakan') }}
                        @endif
                    </em>
                <p class="helper-block text-muted">
                    *Masukan tindakan Perbaikan
                </p>
            </div>

            <div class="col-md-4 {{ $errors->has('stop') ? 'has-error' : '' }}">
                <label for="stop">Mulai Perbaikan</label>
                <input type="time" id="stop" name="stop" class="form-control" value="{{ old('stop', isset($perbaikan) ? date("H:i",strtotime($perbaikan->stop)) : '') }}">
                @if($errors->has('stop'))
                    <em class="invalid-feedback">
                        {{ $errors->first('stop') }}
                        @endif
                    </em>
                <p class="helper-block text-muted">
                    *Masukan stop Perbaikan
                </p>
            </div>

            <div class="col-md-4 {{ $errors->has('Selesai') ? 'has-error' : '' }}">
                <label for="selesai">Selesai Perbaikan</label>
                <input type="time" id="Selesai" name="selesai" class="form-control" value="{{ old('selesai', isset($perbaikan) ? date("H:i",strtotime($perbaikan->mulai)) : '') }}" placeholder="Cth: 001/MKT/065">
                @if($errors->has('Selesai'))
                    <em class="invalid-feedback">
                        {{ $errors->first('Selesai') }}
                        @endif
                    </em>
                <p class="helper-block text-muted">
                    *Masukan Selesai Perbaikan
                </p>
            </div>

            <div class="col-md-4 {{ $errors->has('petugas') ? 'has-error' : '' }}">
                <label for="petugas">Nama Petugas</label>
                <select name="petugas" id="petugas" class="form-control">
                    <option value="Irfan Nur Muhammad">Irfan Nur Muhammad</option>
                    <option value="Yudi Hadiandi">Yudi Hadiandi</option>
                </select>
                @if($errors->has('petugas'))
                    <em class="invalid-feedback">
                        {{ $errors->first('petugas') }}
                        @endif
                    </em>
                <p class="helper-block text-muted">
                    *Masukan petugas IT
                </p>
            </div>
            @section('scripts')
                <script>
                    $(document).ready(function() {
                        $(document).on('change',"#type", function() {
                            $.ajax({
                                    method: 'GET',
                                    url: '{{ url('admin/perbaikans/cariItem') }}',
                                    data: {
                                        nama: $(this).val()
                                    },
                                    success: function(response) {
                                        console.log(204, response);
                                        let options = '';
                                        for (let item of response) {
                                            options += `<option value='${item.id}'>${item.kode}</option>`;
                                        }
                                        $('.namaBarang').html(options);
                                    }
                                })
                        });
                    })
                </script>
            @endsection

            <div>
                <input class="btn btn-danger" type="submit" value="{{ trans('global.save') }}">
            </div>
        </form>
    </div>
</div>

@endsection
