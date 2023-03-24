@extends('layouts.admin')
@section('content')
@can('product_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
                <a class="btn btn-success" href="{{ route("admin.karyawans.create") }}">
                    {{ trans('Tambah Karyawan') }}
                </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        Daftar Karyawan
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            Kode Finger
                        </th>
                        <th>
                            Nama
                        </th>
                        <th>
                            Departemen
                        </th>
                        <th>
                            Bagian
                        </th>
                        <th>
                            Aksi
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($karyawans as $karyawan)
                    <tr data-entry-id="">
                        <td>

                        </td>
                            <td>
                            {{$karyawan->kode}}
                            </td>
                            <td>
                            {{$karyawan->nama}}
                            </td>
                            <td>
                            {{$karyawan->departemen}}
                            </td>
                            <td>
                            {{$karyawan->bagian}}
                            </td>
                            <td>
                                @can('product_show')
                                    <a class="btn btn-xs btn-primary" href="{{route('admin.karyawans.test', $karyawan->id)}}">
                                        View
                                    </a>
                                @endcan
                                @can('product_edit')
                                    <a class="btn btn-xs btn-info" href="{{route('admin.karyawans.edit', $karyawan->id)}}">
                                        Edit
                                    </a>
                                @endcan
                                @can('product_delete')
                                    <form action="" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
    url: "{{ route('admin.products.massDestroy') }}",
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
@can('product_delete')
  dtButtons.push(deleteButton)
@endcan

  $('.datatable:not(.ajaxTable)').DataTable({ buttons: dtButtons })
})

</script>
@endsection
@endsection
