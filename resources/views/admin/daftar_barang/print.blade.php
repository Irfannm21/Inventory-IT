<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        table,
        td,
        th {
            border: 1px solid black;
        }

        table {
            border-collapse: collapse;
            width: 100%;
        }

        tr,
        td {
            text-align: center;
            font-size: 10px;
        }
    </style>
</head>

<body>

    <table>
        <tr>
            <td colspan="8">
                <b>LAPORAN MUTASI GUDANG SPAREPART</b>
            </td>
        </tr>
        <tr>
            <td colspan="8">
                <b>1 S/D 31 JANUARI 2023</b>
            </td>
        </tr>
        <tr>
            <th>Nomor Kode</th>
            <th>Kelompok</th>
            <th>Nama Barang</th>
            <th>Stok Awal</th>
            <th>Masuk</th>
            <th>Keluar</th>
            <th>Saldo Akhir</th>
            <th>Satuan</th>
        </tr>
        @foreach ($result as $item)
            @php
                // dd($result);
                $masuk = $item
                    ->stocks()
                    ->where('stockable_type', 'App\Detail_bpb')
                    ->whereBetWeen('tanggal',[$from,$to])
                    ->sum('jumlah');
                $keluar = $item
                    ->stocks()
                    ->where('stockable_type', 'App\BonPengambilan')
                    ->whereBetWeen('tanggal',[$from,$to])
                    ->sum('jumlah');
                $total = $masuk - $keluar;



                $before_masuk = $item
                    ->stocks()
                    ->where('stockable_type', 'App\Detail_bpb')
                    ->whereBetWeen('tanggal',[$from,$to])
                    ->sum('jumlah');
                $before_keluar = $item
                    ->stocks()
                    ->where('stockable_type', 'App\BonPengambilan')
                    ->whereBetWeen('tanggal',[$from,$to])
                    ->sum('jumlah');
                    $total_before = $masuk - $keluar;

            @endphp
            <tr>
                <td>{{ $item->kode ?? '' }}</td>
                <td>{{ $item->kelompok ?? '' }}</td>
                <td>{{ $item->nama ?? '' }}</td>
                <td>{{ $total_before ?? ''}}</td>
                <td>{{ $masuk }}</td>
                <td>{{ $keluar }}</td>
                <td>{{ $total_before +   $total }}</td>

                <td>{{$item->satuan ?? ''}}</td>
            </tr>
        @endforeach
    </table>

</body>

</html>
