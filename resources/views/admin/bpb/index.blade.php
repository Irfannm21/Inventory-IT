@extends('layouts.admin')
@section('content')
    @can('product_`')
        <div style="margin-bottom: 10px;" class="row">
            <div class="col-lg-12">
                <a class="btn btn-success" href="{{ route('admin.bpbs.create') }}">
                    Buat BPB
                </a>
            </div>
        </div>
    @endcan

    <div class="card">
        <div class="card-header">
            {{ trans('global.product.title_singular') }} {{ trans('global.list') }}
        </div>

        <div class="card-body bg-black">
            <div class="table-responsive">
                <table class="table table-bordered table-striped table-hover datatable">
                    <thead>
                        <tr>
                            <th width="10">

                            </th>
                            <th>
                                Kode BPB
                            </th>
                            <th>
                                Kode NPP
                            </th>
                            <th>
                                Tanggal
                            </th>
                            <th>
                                Kelompok
                            </th>
                            <th>
                                Supplier
                            </th>
                            <th>
                                Aksi
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($results as $value)
                            <tr data-entry-id="{{ $value->id }}">
                                <td>

                                </td>
                                <td>
                                    {{ $value->kode ?? '' }}
                                </td>
                                <td>
                                    {{ $value->npp->kode ?? '' }}
                                </td>
                                </td>
                                <td>
                                    {{ $value->tanggal ?? '' }}
                                </td>
                                <td>
                                    {{ $value->kelompok ?? '' }}
                                </td>
                                <td>
                                    @if (!isset($value->sipplier->nama))
                                        <button type="button" class="btn btn-xs btn-primary" data-toggle="modal"
                                            data-target="#buatSupplier--{{ $value->id }}">Buat Supplier</button>
                                    @else
                                        {{ $value->sipplier->nama ?? '' }}
                                    @endif
                                </td>
                                <td>
                                    @can('bpb_create')
                                        <a href="{{ route('admin.bpbs.print', ['bpb' => $value->kode]) }}" class="fa fa-print"
                                            style="color:black">
                                            Print
                                        </a>
                                    @endcan
                                    @can('bpb_edit')
                                        <a class="fa fa-pencil" style="color:black"
                                            href="{{ route('admin.bpbs.edit', $value->id) }}">
                                            {{ trans('global.edit') }}
                                        </a>
                                    @endcan
                                    @can('npp_delete')
                                        <form action="{{ route('admin.bpbs.destroy', $value->id) }}" method="POST"
                                            onsubmit="return confirm('{{ trans('global.areYouSure') }}');"
                                            style="display: inline-block;">
                                            <input type="hidden" name="_method" value="DELETE">
                                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                            <input type="submit" class="btn btn-xs btn-danger"
                                                value="{{ trans('global.delete') }}">
                                        </form>
                                    @endcan
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                <div class="modal fade" id="buatSupplier--{{ $value->id }}" tabindex="-1">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Buat Supplier</h5>
                                <button type="button" class="close" data-dismiss="modal">
                                    <span>&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form action="{{ route('admin.bpbs.store') }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-row">
                                        <div class="form-group {{ $errors->has('kode_bpb') ? 'has-error' : '' }}">
                                            <label for="">Kode BPB</label>
                                            <input type="text" class="form-control" value="{{ $value->kelompok }}"
                                                readonly>
                                            @if ($errors->has('kode_bpb'))
                                                <em class="invalid-feedback">
                                                    {{ $errors->first('kode_bpb') }}
                                                </em>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="form-row">
                                        <div class="form-group {{ $errors->has('nama') ? 'has-error' : '' }}">
                                        <label for="">Nama Supplier</label>
                                        <input type="text" class="form-control" name="nama">
                                        @if ($errors->has('nama'))
                                        <em class="invalid-feedback">
                                                {{ $errors->first('nama') }}
                                            </em>
                                        @endif
                                    </div>
                                </div>


                                    <div class="form-row">
                                        <div class="form-group {{ $errors->has('type') ? 'has-error' : '' }}">
                                            <label for="">Type Perusahaan</label>
                                            <select name="type" id="type" name="type" class="form-control">
                                                <option value="" selected>-- Pilih --</option>
                                                <option value="PT">PT</option>
                                                <option value="">CV</option>
                                                <option value="">Firma</option>
                                            </select>
                                            @if ($errors->has('type'))
                                                <em class="invalid-feedback">
                                                    {{ $errors->first('type') }}
                                                </em>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="form-row">
                                        <div class="form-group {{ $errors->has('telepon') ? 'has-error' : '' }}">
                                        <label for="">Telepon</label>
                                        <input type="text" class="form-control" name="telepon">
                                        @if ($errors->has('telepon'))
                                        <em class="invalid-feedback">
                                                {{ $errors->first('telepon') }}
                                            </em>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="form-group {{ $errors->has('Email') ? 'has-error' : '' }}">
                                    <label for="">Email</label>
                                    <input type="email" class="form-control" name="email">
                                    @if ($errors->has('Email'))
                                    <em class="invalid-feedback">
                                            {{ $errors->first('Email') }}
                                        </em>
                                    @endif
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group {{ $errors->has('kota') ? 'has-error' : '' }}">
                                <label for="">Ko Supplier</label>
                                <input type="text" class="form-control" name="kota">
                                @if ($errors->has('kota'))
                                <em class="invalid-feedback">
                                        {{ $errors->first('kota') }}
                                    </em>
                                @endif
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group {{ $errors->has('alamat') ? 'has-error' : '' }}">
                            <label for="">Alamat Supplier</label>
                            <input type="text" class="form-control" name="alamat">
                            @if ($errors->has('alamat'))
                            <em class="invalid-feedback">
                                    {{ $errors->first('alamat') }}
                                </em>
                            @endif
                        </div>
                    </div>


                                    <div>
                                        <input class="btn btn-danger" type="submit" value="{{ trans('global.save') }}">
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@section('scripts')
    @parent
    <script>
        $(function() {
            let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
            let deleteButton = {
                text: deleteButtonTrans,
                url: "{{ route('admin.komputers.massDestroy') }}",
                className: 'btn-danger',
                action: function(e, dt, node, config) {
                    var ids = $.map(dt.rows({
                        selected: true
                    }).nodes(), function(entry) {
                        return $(entry).data('entry-id')
                    });

                    if (ids.length === 0) {
                        alert('{{ trans('global.datatables.zero_selected') }}')

                        return
                    }

                    if (confirm('{{ trans('global.areYouSure') }}')) {
                        $.ajax({
                                headers: {
                                    'x-csrf-token': _token
                                },
                                method: 'POST',
                                url: config.url,
                                data: {
                                    ids: ids,
                                    _method: 'DELETE'
                                }
                            })
                            .done(function() {
                                location.reload()
                            })
                    }
                }
            }
            let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
            @can('komputer_delete')
                dtButtons.push(deleteButton)
            @endcan

            $('.datatable:not(.ajaxTable)').DataTable({
                buttons: dtButtons
            })
        })
    </script>
@endsection
@endsection
