@extends('layouts.admin')
@section('content')
    <div class="card">
        <div class="card-header">
            {{ trans('global.product.title_singular') }} {{ trans('global.list') }}
        </div>

        <div class="card-body bg-black">
            <div class="form-group row">
                <div class="col-md-6">
                    <label for="">Cari Data Barang</label>
                    <select name="" id="namaBarang" class="form-control select2 namaBarang">
                        <option value="" selected>-- Pilih --</option>

                    </select>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-md-2">
                    <label for="">Kode Barang</label>
                    <input type="kode" class="form-control" id="kode">
                </div>
                <div class="col-md-4">
                    <label for="">Nama Barang</label>
                    <input type="nama" class="form-control" id="nama">
                </div>
            </div>
            <div class="form-group row">
                <div class="col-md-3">
                    <label for="">Part Nomor</label>
                    <input type="nomor_part" class="form-control" id="nomor_part">
                </div>
                <div class="col-md-3">
                    <label for="">Nomor Kartu</label>
                    <input type="no_kartu" class="form-control" id="no_kartu">
                </div>
            </div>
            <div class="form-group row">
                <div class="col-md-3">
                    <label for="">Jenis Barang</label>
                    <input type="jenis" class="form-control" id="jenis">
                </div>
                <div class="col-md-3    ">
                    <label for="">Kelompok Barang</label>
                    <input type="kelompok" class="form-control" id="kelompok">
                </div>
            </div>

        </div>

        <div class="card-body">
            <h3 class="text-center">Data Transaksi </h3>
            <hr class="w-25">
            <div class="table-responsive">
                <table class="table table-bordered table-striped table-hover datatable">
                    <thead>
                        <tr>
                            <th width="10"> </th>
                            <th>Kode BPB</th>
                            <th>Tanggal</th>
                            <th>Status</th>
                            <th>Jumlah</th>
                        </tr>
                    </thead>
                    <tbody id="content">

                    </tbody>
                </table>
            </div>
        </div>
    </div>
    </div>

@section('scripts')
    @parent
    <script>
        $("#namaBarang").keyup(function() {
            $.ajax({
                method: "GET",
                url: '{{ url('admin/stock_spareparts/cariDataStocks') }}',
                data: {
                    nama: $(this).val()
                },
                success: function(data) {
                    console.log(204,response);
                    let opt = '';
                    for(let item of response){
                        opt += `<option>${item.id}<option>`;
                    }
                    $("#namaBarang").html(opt);
                }
            });
        })

        $(document).ready(function() {
            $(document).on('change', '#namaBarang', function() {
                $.ajax({
                    method: "GET",
                    url: '{{ url('admin/stock_spareparts/cariDataStocks') }}',
                    data: {
                        id: $(this).val()
                    },
                    success: function(response) {
                        console.log(204, response);
                        let baris = '';
                        for (let value of response) {
                            baris += `<tr data-entry-id=${value.id}>`;
                            baris += `<td></td>`;
                            baris += `<td>${value.stockable.bpb.kode}</td>`;
                            baris += `<td>${value.stockable.bpb.tanggal}</td>`;
                            if (value.stockable_type == "App\\Detail_bpb") {
                                baris +=
                                    "<td><span class='badge rounded-pill bg-success'>Saldo Masuk</td>";
                            } else {
                                baris += "<td>Keluar</td>";
                            }
                            baris += `<td>${value.jumlah}</td>`;
                            baris += `</tr  >`;
                        }
                        $('#content').html(baris);
                    }
                })
            })
        })



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
