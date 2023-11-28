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
                            Total NPP
                        </th>
                        <th>
                            Diterima
                        </th>
                        <th>
                            Sisa Barang
                        </th>
                        <th>
                            Keterangan
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($results as $value)
                        @php
                            $jumlah = $value->detail_bpbs->sum('jumlah');
                        @endphp
                            @if ($jumlah < $value->jumlah)

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
                                    {{ $value->jumlah ." " .$value->satuan ?? '' }}
                                </td>
                                <td>
                                    {{$jumlah. " " .$value->satuan ?? ''}}
                                </td>
                                <td>
                                    {{ ($value->jumlah - $jumlah) ." " .$value->satuan ?? '' }}
                                </td>
                                <td>
                                    {{$value->keterangan ?? ''}}
                                </td>
                            </tr>
                            @endif
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
    url: "{{ route('it.komputers.massDestroy') }}",
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
