@extends('layouts.admin')
@section('content')

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
                            Kode NPP
                        </th>
                        <th>
                            Nama Barang
                        </th>
                        <th>
                            Jumlah
                        </th>
                        <th>
                            Satuan
                        </th>
                        <th>
                            Stok
                        </th>
                        <th>
                            Keterangan
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
                                    {{ $value->npp->kode ?? '' }}
                                </td>
                                <td>
                                    {{ $value->nama ?? '' }}
                                </td>
                                <td>
                                    {{ $value->jumlah ?? '' }}
                                </td>
                                <td>
                                    {{ $value->satuan ?? '' }}
                                </td>
                                <td>
                                    {{ $value->stok ?? '' }}
                                </td>
                                <td class="text-truncate" style="max-width: 50px">
                                    {{$value->keterangan ?? ''}}
                                </td>
                                <td>
                                    @can('komputer_show')
                                    <button type="button" class="btn btn-xs btn-primary" data-toggle="modal" data-target="#contohModal">View</button>
                                    <div class="modal fade" id="contohModal" tabindex="-1">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                 <div class="modal-body">
                                                    <table>
                                                        <thead>
                                                            <th>
                                                                Kode NPP
                                                            </th>
                                                            <th>
                                                                Nama
                                                            </th>
                                                            <th>
                                                                Jumlah
                                                            </th>
                                                            <th>
                                                                Stok
                                                            </th>
                                                            <th>
                                                                Keterangan
                                                            </th>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td>
                                                                    {{$value->npp->kode}}
                                                                </td>
                                                                <td>
                                                                    {{$value->nama}}
                                                                </td>
                                                                <td>
                                                                    {{$value->jumlah . " " . $value->satuan }}
                                                                </td>
                                                                <td>
                                                                    {{$value->stok}}
                                                                </td>
                                                                <td>
                                                                    {{$value->keterangan}}
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @endcan
                                    @can('detail_npp_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route("admin.details.edit", $value->id)  }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                    @endcan
                                    @can('detail_npp_delete')
                                    <form action="{{ route('admin.details.destroy', $value->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@section('scripts')
@parent
<script>
    $(function () {
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.komputers.massDestroy') }}",
    className: 'btn-danger',
    action: function (e, dt, node, config) {
      var ids = $.map(dt.rows({ selected: true }).nodes(), function (entry) {
          return $(entry).data('entry-id')
      });

      if (ids.length === 0) {
        alert('{{ trans('global.datatables.zero_selected') }}')

        return
      }

      if (confirm('{{ trans('global.areYouSure') }}')) {
        $.ajax({
          headers: {'x-csrf-token': _token},
          method: 'POST',
          url: config.url,
          data: { ids: ids, _method: 'DELETE' }})
          .done(function () { location.reload() })
      }
    }
  }
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('komputer_delete')
  dtButtons.push(deleteButton)
@endcan

  $('.datatable:not(.ajaxTable)').DataTable({ buttons: dtButtons })
})

</script>
@endsection
@endsection
