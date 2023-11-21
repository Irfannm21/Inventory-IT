@extends('layouts.admin')
@section('content')

@can('perbaikan_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            @if ($printer->gudangitable == true)

            @else
            <a class="btn btn-success" href="{{ route("admin.perbaikans.create",['id'=> $printer->id, 'type' => 'printer'])}}">
                Buat Perbaikan
            </a>
            @endif
        </div>
    </div>
@endcan

<div class="card">
    <div class="card-header">
       Data Printer
    </div>

    <div class="card-body">
        <div class="row">
            <div class="col-md-6">
                <table class="table table-bordered table-striped">
                    <tbody>
                        <tr>
                            <th>
                               Tanggal Pembelian
                            </th>
                            <td>
                                {{ $printer->tanggal }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                               Printer ID
                            </th>
                            <td>
                                {!! $printer->kode !!}
                            </td>
                        </tr>
                        <tr>
                            <th>
                               Keterangan
                            </th>
                            <td>
                                {{ $printer->nama }}
                            </td>
                        <tr>
                            <th>
                                Status
                            </th>
                            <td>
                                @if ($printer->gudangitable == true)
                                    <h5><span class="badge badge-danger">Digudang</span></h5>
                                @else
                                    <h5><span class="badge badge-success badge-sm">Dipakai</span></h5>
                                @endif
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="col-md-6">
                <form class="_blank" action="{{ route("admin.perbaikans.prints",['perangkat' => $printer->kode]) }}" method="post" enctype="multipart/form-data">
                    @csrf
                       <span>Cetak Rekap Data Pebaikan {{$printer->kode}}</span>
                    <hr>
                    <div class="row">
                        <div class="col">
                            <label for="">Mulai Tanggal :</label>
                        </div>
                        <div class="col">
                            <input type="date" name="mulai" class="form-control" required>
                        </div>
                    </div>
                    <div class="row" style="margin-top: 10px">
                        <div class="col">
                            <label for="">Sampai Tanggal :</label>
                        </div>
                        <div class="col">
                            <input type="date" name="sampai" class="form-control" required>
                        </div>
                    </div>
                    <div class="row" style="padding: 10px">
                        <div class="col">

                        </div>
                        <div class="col">
                            <input class="btn btn-danger" type="reset" value="Reset">
                            <input class="btn btn-success" type="submit" value="{{ trans('global.save')}}">
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <span class="text-muted"><u>*Hardware yang sudah masuk gudang tidak bisa menambah data kerusakan</u></span>
        <div class="card-body">
            <div class="text-center h3">
                Daftar Perbaikan {{$printer->kode}}
            </div>
            <hr width="50">
            <div class="table-responsive">
                <table class="table table-bordered table-striped table-hover datatable">
                    <thead>
                        <tr>
                            <th width="10">

                            </th>
                            <th>
                                Tanggal
                            </th>
                            <th>
                                Kerusakan
                            </th>
                            <th>
                                Tindakan
                            </th>
                            <th>
                                Mulai
                            </th>
                            <th>
                                Selesai
                            </th>
                            <th>
                                Total
                            </th>
                            <th>
                                Petugas
                            </th>
                            <th>
                                &nbsp;
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($printer->perbaikans as $key => $value)
                            <tr data-entry-id="{{ $value->id }}">
                                <td>

                                </td>
                                <td>
                                    {{ $value->tanggal ?? '' }}
                                </td>
                                <td>
                                    {{ $value->kerusakan ?? '' }}
                                </td>
                                <td>
                                    {{ $value->tindakan ?? '' }}
                                </td>
                                <td>
                                    {{ $value->stop ?? '' }}
                                </td>
                                <td>
                                    {{ $value->mulai ?? '' }}
                                </td>
                                <td>
                                    {{ $value->total ?? '' }}
                                </td>
                                <td>
                                    {{ $value->petugas ?? '' }}
                                </td>

                                <td>
                                    @can('perbaikan_create')
                                    <a class="btn btn-xs btn-info" href="{{ route("admin.printers.edit", $value->id)  }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                    @endcan
                                    @can('perbaikan_delete')
                                        <form action="{{ route('admin.printers.destroy', $value->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                                            <input type="hidden" name="_method" value="DELETE">
                                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                            <input type="submit" class="btn btn-xs btn-danger" value="{{ trans('global.delete') }}">
                                        </form>
                                    @endcan
                                </td>

                            </tr>
                        @endforeach
                    </tbody>
                </table>


            </div>
        </div>


    </div>
</div>
@endsection
