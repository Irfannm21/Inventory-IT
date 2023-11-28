
@extends('layouts.admin')
@section('content')
    @can('bpb_create')
        <div style="margin-bottom: 10px;" class="row">
            <div class="col-lg-12">
                <a class="btn btn-success" href="{{ route('it.gudangits.create') }}">
                    Tambah Data
                </a>
            </div>
        </div>
    @endcan

    <div class="card">
        <div class="card-header">
            Data Perangkat Rusak Total
        </div>

        <div class="card-body bg-black">
            <div class="table-responsive">
                <table class="table table-bordered table-striped table-hover datatable">
                    <thead>
                        <tr>
                            <th width="10">

                            </th>
                            <th>
                                Hardware ID
                            </th>
                            <th>
                                Jenis
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
                        @foreach($results as $value)
                            <tr data-entry-id="{{ $value->id }}">
                                <td>

                                </td>
                                <td>
                                    {{$value->gudangitable->kode ?? ''}}
                                </td>
                                <td>
                                    @if ($value->gudangitable_type == "App\Models\it\printer")
                                        Printer
                                    @else
                                    Komputer
                                    @endif
                                </td>
                                <td>
                                    {{$value->tanggal ?? ''}}
                                </td>
                                <td>
                                    {{$value->keterangan ?? ''}}
                                </td>
                                <td>
                                    @can('bpb_create')
                                    <a href="{{ route('admin.bpbs.print', ['bpb' => $value->kode]) }}" class="btn btn-xs btn-dark"
                                        style="color:white">
                                        Print
                                    </a>
                                @endcan
                                @can('bpb_edit')
                                    <a class="btn btn-xs btn-primary" style="color:black"
                                        href="{{ route('it.gudangits.edit',[$value->id]) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan
                                @can('npp_delete')
                                    <form action="{{ route('it.gudangits.destroy', $value->id) }}" method="POST"
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

                            </div>
                            <div class="modal-body">
                                <form action="{{ route('admin.bpbs.store') }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div>
                                        <form action=""></form>
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
                url: "{{ route('it.komputers.massDestroy') }}",
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
