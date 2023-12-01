
@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.product.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            Tanggal
                        </th>
                        <th>
                            Nama Klien
                        </th>
                        <th>
                            Hardware ID
                        </th>
                        <th>
                            Kerusakan
                        </th>
                        <th>
                            Tindakan
                        </th>
                        <th>
                            Waktu Perbaikan
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
                    @foreach($results as $value)
                        <tr data-entry-id="{{ $value->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $value->tanggal ?? '' }}
                            </td>
                            <td>
                                {{$value->hardwareable->klien->kode ?? ''}}
                             </td>
                            <td>
                               {{$value->hardwareable->kode ?? ''}}
                            </td>
                            <td>
                                {{ $value->kerusakan ?? '' }}
                            </td>
                            <td>
                                {{ $value->tindakan ?? '' }}
                            </td>
                            <td>
                                {{ $value->total ?? '' }}
                            </td>
                            <td>
                                {{ $value->petugas ?? '' }}
                            </td>

                            <td>
                                {{-- @can('perbaikan_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.cmsIT.perbaikan.show', $value->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan --}}
                                @can('perbaikan_edit')
                                <a class="btn btn-xs btn-info" href="{{ route("it.perbaikans.edit", $value->id)  }}">
                                    {{ trans('global.edit') }}
                                </a>
                                @endcan
                                @can('perbaikan_delete')
                                    <form action="{{ route('it.perbaikans.destroy', $value->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
    url: "{{ route('it.perbaikans.massDestroy') }}",
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
@can('perbaikan_delete')
  dtButtons.push(deleteButton)
@endcan

  $('.datatable:not(.ajaxTable)').DataTable({ buttons: dtButtons })
})

</script>
@endsection
@endsection
