@extends('layouts.admin')
@section('content')
@can('product_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route("admin.komputers.create") }}">
                {{ trans('global.add') }} {{ trans('global.product.title_singular') }}
            </a>
        </div>
    </div>
@endcan

<div class="card">
    <div class="card-header">
        {{ trans('global.product.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
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
                            Nomor IP
                        </th>
                        <th>
                            Processor
                        </th>
                        <th>
                            RAM
                        </th>
                        <th>
                            Split
                        </th>
                        <th>
                            VGA
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($result as $value)
                        <tr data-entry-id="{{ $value->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $value->kode ?? '' }}
                            </td>
                            <td>
                                {{ $value->nomor_ip ?? '' }}
                            </td>
                            <td>
                                {{ $value->processor ?? '' }}
                            </td>
                            <td>
                                {{ $value->ram ?? '' }}
                            </td>
                            <td>
                                {{ $value->split ?? '' }}
                            </td>
                            <td>
                                {{ $value->vga ?? '' }}
                            </td>
                            <td>
                                @can('komputer_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.komputers.show', $value->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan
                                @can('komputer_edit')
                                <a class="btn btn-xs btn-info" href="{{ route("admin.komputers.edit", $value->id)  }}">
                                    {{ trans('global.edit') }}
                                </a>
                                @endcan
                                @can('komputer_delete')
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
