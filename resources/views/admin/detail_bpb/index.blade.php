@extends('layouts.admin')
@section('content')
    @can('bpb_create')
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
                                Nama Barang
                            </th>
                            <th>
                                Jumlah dan Satuan
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
                                    {{ $value->bpb->kode ?? '' }}
                                </td>

                                <td>
                                    {{ $value->bpb->npp->kode ?? '' }}
                                </td>
                                <td>
                                    {{ $value->bpb->tanggal ?? '' }}
                                </td>

                                </td>
                                <td>
                                    {{ $value->detail_npp->nama  ?? '' }}
                                </td>
                                <td>
                                    {{ $value->stock->jumlah ?? '' . " " . $value->stock->satuan  ?? '' }}
                                </td>

                                <td>
                                    @can('detail_bpb_edit')
                                        <a class="btn btn-xs btn-primary" style="color:black"
                                            href="{{ route('admin.detail_bpbs.edit', $value->id) }}">
                                            {{ trans('global.edit') }}
                                        </a>
                                    @endcan
                                    @can('detail_bpb_delete')
                                        <form action="{{ route('admin.detail_bpbs.destroy', $value->id) }}" method="POST"
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

                <div class="modal fade add_supplier" id="add_supplier" tabindex="-1">
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
                                            <input type="text" class="form-control bpb_id" id="bpb_id" readonly>
                                            @if ($errors->has('kode_bpb'))
                                                <em class="invalid-feedback">
                                                    {{ $errors->first('kode_bpb') }}
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
        function modalSupplier(el) {
            var link = $(el) //refer `a` tag which is clicked
            var modal = $("#modalSupplier") //your modal
            var code = link.data('code')
            modal.find('#bpb_id').val(code);
        }

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
