@extends('layouts.admin')
@section('content')

@can('perbaikan_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route("admin.perbaikans.create",['id'=> $komputer->id, 'type' => 'komputer'])}}">
                Buat Perbaikan
            </a>
        </div>
    </div>
@endcan


<div class="card">
    <div class="card-header">
       Data Komputer
    </div>

    <div class="card-body">
        <table class="table table-bordered table-striped">
            <tbody>
                <tr>
                    <th>
                       Tanggal Pembelian
                    </th>
                    <td>
                        {{ $komputer->created_at }}
                    </td>
                </tr>
                <tr>
                    <th>
                       Kode Komputers
                    </th>
                    <td>
                        {!! $komputer->kode !!}
                    </td>
                </tr>
                <tr>
                    <th>
                       Sistem Operasi
                    </th>
                    <td>
                        {{ $komputer->system }}
                    </td>
                </tr>
                <tr>
                    <th>
                       Motherboard
                    </th>
                    <td>
                        {{ $komputer->motherboard }}
                    </td>
                </tr>
                <tr>
                    <th>
                       Processor
                    </th>
                    <td>
                        {{ $komputer->processor }}
                    </td>
                </tr>
                <tr>
                    <th>
                       Powersupply
                    </th>
                    <td>
                        {{ $komputer->powersupply }}
                    </td>
                </tr>
                <tr>
                    <th>
                       RAM
                    </th>
                    <td>
                        {{ $komputer->ram }}
                    </td>
                </tr>
                <tr>
                    <th>
                       Media Penyimpanan
                    </th>
                    <td>
                        {{ $komputer->disk }}
                    </td>
                </tr>
                <tr>
                    <th>
                       VGA
                    </th>
                    <td>
                        {{ $komputer->vga }}
                    </td>
                </tr>
                <tr>
                    <th>
                       Split Komputer
                    </th>
                    <td>
                        {{ $komputer->split }}
                    </td>
                </tr>
                <tr>
                    <th>
                       Monitor
                    </th>
                    <td>
                        {{ $komputer->monitor1 }}
                    </td>
                </tr>
                <tr>
                    <th>
                       Monitor
                    </th>
                    <td>
                        {{ $komputer->monitor2 }}
                    </td>
                </tr>
            </tbody>
        </table>

        <div class="card-body">
            <div class="text-center h3">
                Daftar Perbaikan {{$komputer->kode}}
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
                        @foreach($komputer->perbaikans as $key => $value)
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
                                    @can('perbaikan_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route("admin.perbaikans.edit", $value->id)  }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                    @endcan
                                    @can('perbaikan_delete')
                                        <form action="{{ route('admin.komputers.destroy', $value->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
