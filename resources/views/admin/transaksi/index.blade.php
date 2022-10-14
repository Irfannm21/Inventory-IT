@extends('layouts.admin')
@section('content')
    @can('product_create')
        <div style="margin-bottom: 10px;" class="row">
            <div class="col-lg-12">
                <a class="btn btn-success" href="{{ route('admin.pembayarans.create') }}">
                    Buat Data Pembayaran
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
                                Tanggal
                            </th>
                            <th>
                                Kode BPB
                            </th>
                            <th>
                                Nama Barang
                            </th>
                             <th>
                                Harga Satuan
                            </th>
                            <th>
                                Jumlah
                            </th>
                            <th>
                                Pembayaran
                            </th>
                            <th>
                                Lama Kredit
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
                                    <?php
                                        $tanggal = strtotime($value->bpb->tanggal)
                                        ?>
                                    {{ date('d-m-Y',$tanggal) ?? '' }}
                                </td>
                                <td>
                                    {{ $value->bpb->kode ?? '' }}
                                </td>
                                <td>
                                    {{ $value->bpb->detail->nama ?? '' }}
                                </td>
                                 <td>
                                    {{ $value->harga_satuan ?? '' }}
                                </td>
                                <td>
                                    {{ $value->bpb->jumlah . " " . $value->bpb->satuan ?? '' }}
                                </td>
                                <td>
                                    {{ $value->jenis_pembayaran ?? '' }}
                                </td>
                                <td>
                                    {{ $value->lama_kredit ?? 'None' }}
                                </td>
                                <td>
                                 @can('bpb_create')
                                 <button href="{{route('admin.bpbs.print',['bpb' => $value->id])}}" class="btn btn-xs btn-secondary">Cetak</button>

                                 @endcan
                                    @can('bpb_edit')
                                        <a href="{{route('admin.pembayarans.edit',[$value->id])}}" class="btn btn-xs btn-primary">Ubah</a>
                                    @endcan
                                    @can('npp_delete')
                                        <form action="{{ route('admin.bpbs.destroy', $value->id) }}" method="POST"
                                            onsubmit="return confirm('{{ trans('global.areYouSure') }}');"
                                            style="display: inline-block;">
                                            <input type="hidden" name="_method" value="DELETE">
                                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                            <input type="submit" class="btn btn-xs btn-danger"
                                                value="{{ trans('Hapus') }}">
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
