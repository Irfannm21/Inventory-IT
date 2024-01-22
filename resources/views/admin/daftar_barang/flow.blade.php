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
                    <select name="" id="namaBarang" class="form-control select2"
                        data-url="{{ url('admin/stock_spareparts/cariNamaBarangs') }}">
                        <option value="" selected>-- Pilih --</option>
                        @foreach ($results as $id => $item)
                            <option value="{{ $id }}">{{ $item }}</option>
                        @endforeach

                    </select>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-md-2">
                    <label for="">Kode Barang</label>
                    <input type="kode" class="form-control" id="kode" readonly>
                </div>
                <div class="col-md-4">
                    <label for="">Nama Barang</label>
                    <input type="nama" class="form-control" id="nama" readonly>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-md-3">
                    <label for="">Part Nomor</label>
                    <input type="nomor_part" class="form-control" id="nomor_part" readonly>
                </div>
                <div class="col-md-3">
                    <label for="">Nomor Kartu</label>
                    <input type="no_kartu" class="form-control" id="no_kartu" readonly>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-md-2">
                    <label for="jenis">Jenis Barang</label>
                    <select name="jenis" id="jenis" class="form-control" readonly>
                        <option value="" selected>-- Belum Di Update --</option>
                        <option value="Administrasi">Administrasi</option>
                        <option value="AJL">AJL</option>
                        <option value="Bearing">Bearing</option>
                        <option value="Benninger">Benninger</option>
                        <option value="Best Air">Best Air</option>
                        <option value="Blowing">Blowing</option>
                        <option value="Boiler">Boiler</option>
                        <option value="Bolt dan Nut">Bolt & Nut</option>
                        <option value="Blowing">Blowing</option>
                    </select>
                </div>
                <div class="col-md-2">
                    <label for="kelompok">Kelompok Barang</label>
                    <select name="kelompok" id="kelompok" class="form-control" readonly>
                        <option value="" selected>-- Belum Di Update --</option>
                        <option value="Administrasi">Administrasi</option>
                        <option value="Sparepart Insan">Sparepart Insan</option>
                        <option value="Sparepart Spinning">Sparepart Spinning</option>
                        <option value="Packing Material">Packing Material</option>
                        <option value="Elektirk">Elektik</option>
                        <option value="Kendaraan">Kendaraan</option>
                    </select>
                </div>
                <div class="col-md-2">
                    <label for="satuan">Satuan</label>
                    <select name="satuan" id="satuan" class="form-control" readonly>
                        <option value="" selected>Belum Di Update</option>
                        <option value="Batang">Batang</option>
                        <option value="Bungkus">Bungkus</option>
                        <option value="Buah">Buah</option>
                        <option value="Blek">Blek</option>
                        <option value="Dus">Dus</option>
                        <option value="Kilo">Kilo</option>
                        <option value="Lembar">Lembar</option>
                        <option value="Liter">Liter</option>
                        <option value="Meter">Meter</option>
                        <option value="Karung">Karung</option>
                        <option value="Pasang">Pasang</option>
                        <option value="Pcs">Pcs</option>
                        <option value="Roll">Roll</option>
                        <option value="Unit">Unit</option>
                        <option value="Set">Set</option>
                        <option value="Tube">Tube</option>
                    </select>
                </div>
            </div>
        </div>

        <div class="card-body">
            <h3 class="text-center">Data Transaksi <span id="total"></span> </h3>
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
        $(document).ready(function() {
            $(document).on('change', '#namaBarang', function() {
                $.ajax({
                    method: "GET",
                    url: '{{ url('admin/stock_spareparts/cariNamaBarangs') }}',
                    data: {
                        nama: $(this).val()
                    },
                    success: function(response) {
                        console.log(204, response);
                        for (let item of response) {
                            $("#kode").val(item.kode);
                            $("#nama").val(item.nama);
                            $("#nomor_part").val(item.nomor_part);
                            $("#no_kartu").val(item.no_kartu);
                            $("#jenis").val(item.jenis);
                            $("#kelompok").val(item.kelompok);
                            $("#satuan").val(item.satuan);
                        }
                    }
                })
            }).on('change', '#namaBarang', function() {
                $.ajax({
                    method: "GET",
                    url: '{{ url('admin/stock_spareparts/cariDataStocks') }}',
                    data: {
                        id: $(this).val()
                    },
                    success: function(response) {
                        console.log(204, response);
                        let baris = '';
                        let masuk = 0;
                        let keluar = 0;

                        for (let value of response) {
                            let total = value.jumlah;
                            baris += `<tr data-entry-id=${value.id}>`;
                            baris += `<td></td>`;
                            switch (value.stockable_type) {
                                case "App\\Models\\StokSparepart\\Detail_bpb" :
                                console.log(value);
                                baris += `<td>${value.stockable.bpb.kode}</td>`;
                                baris += `<td>${value.stockable.bpb.tanggal}</td>`;
                                baris += "<td><span class='badge rounded-pill bg-success'>Saldo Masuk</td>";
                                    // let total = value.jumlah;
                                if ($.isNumeric(total)) {
                                    masuk += parseFloat(total);
                                }
                                break;
                                case "App\\Models\\StokSparepart\\DetailBon" :
                                console.log(value.stockable.bon.kode);
                                baris += `<td>${value.stockable.bon.kode}</td>`;
                                baris += `<td>${value.stockable.bon.tanggal}</td>`;
                                baris += "<td><span class='badge rounded-pill bg-danger'>Saldo Keluar</td>";
                                    // let total = total;
                                if ($.isNumeric(total)) {
                                    keluar += parseFloat(total);
                                }
                                break;
                                default :
                                    console.log(204,response)
                            }

                            baris += `<td>${value.jumlah}</td>`;
                            baris += `</tr>`;
                        }
                        // console.log(masuk);
                        let hasil = masuk - keluar;
                        baris += "<tr>";
                        baris += "<td></td>";
                        baris += "<td></td>";
                        baris += "<td> </td>";
                        baris += "<td>Saldo </td>";
                        baris += `<td>${hasil}</td>`;
                        baris += "</tr>";

                        $('#content').html(baris);

                    }
                })
            })
        })



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
