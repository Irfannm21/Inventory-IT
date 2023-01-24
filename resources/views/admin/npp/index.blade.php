@extends('layouts.admin')
@section('content')
@can('product_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route("admin.npps.create") }}">
                {{ trans('global.add') }} Buat NPP
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
                            Kode NPP
                        </th>
                        <th>
                            Tanggal
                        </th>
                        <th>
                            Bagian
                        </th>
                        <th>
                            Departemen
                        </th>
                        <th>
                            Status
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
                                {{ $value->kode ?? '' }}
                            </td>
                            <td>
                                {{ date('d-m-Y', strtotime($value->tanggal)) ?? '' }}
                            </td>
                            <td>
                                {{ $value->bagian->nama ?? '' }}
                            </td>
                            <td>
                                {{ $value->bagian->departemen->nama ?? '' }}
                            </td>
                            <td>
                                <span class="badge badge-warning badge-pill align-items-center">Pending</span>
                            </td>
                            <td>
                                @can("npp_access")
                                <a class="btn btn-xs btn-success" style="color:black" href="{{ route("admin.npps.show", $value->id, "Status->Terima")}}">
                                    Terima
                                </a>
                                <a class="btn btn-xs btn-danger" style="color:black" href="{{ route("admin.npps.show", $value->id)  }}">
                                    Tolak
                                </a>
                                @endcan
                                @can('npp_show')
                                    <a href="{{route('admin.npps.print',['npp' => $value->id])}}" class="btn btn-xs btn-dark" style="color:white">
                                        Print
                                    </a>
                                @endcan
                                @can('npp_edit')
                                <a class="btn btn-xs btn-primary" style="color:black" href="{{ route("admin.npps.edit", $value->id)  }}">
                                    {{ trans('global.edit') }}
                                </a>
                                @endcan
                                @can('npp_delete')
                                    <form  action="{{ route('admin.npps.destroy', $value->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
