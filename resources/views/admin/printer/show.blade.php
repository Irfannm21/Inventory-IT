@extends('layouts.admin')
@section('content')

@can('perbaikan_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route("admin.perbaikans.create",['id'=> $printer->id, 'type' => 'printer'])}}">
                Buat Perbaikan
            </a>
        </div>
    </div>
@endcan


<div class="card">
    <div class="card-header">
       Data Printer
    </div>

    <div class="card-body">
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
            </tbody>
        </table>

        <div class="card-body">
            <div class="align-center h3 text-muted">
                Daftar Perbaikan {{$printer->kode}}
            </div>
            <div class="table-responsive">
                <table class="table table-bordered table-striped table-hover datatable">
                    <thead>
                        <tr>
                            <th width="10">

                            </th>
                            <th>
                                Kode
                            </th>
                            <th>
                                Tanggal
                            </th>
                            <th>
                                Deskripsi
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
                                    {{ $printer->kode ?? '' }}
                                </td>
                                <td>
                                    {{ $value->tanggal ?? '' }}
                                </td>
                                <td>
                                    {{ $value->keterangan ?? '' }}
                                </td>

                                <td>
                                    @can('perbaikan_show')
                                        <a class="btn btn-xs btn-primary" href="{{ route('admin.printers.show', $value->id) }}">
                                            {{ trans('global.view') }}
                                        </a>
                                    @endcan
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
