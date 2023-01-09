<?php
// dd($result->bagian->departemen->nama);
// foreach ($result->details as $value) {
//     echo $value;
// }
// die();
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>

</head>

<body>
    <table>
        {{-- @foreach ($result as $val) --}}
        <tr>
            <td> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{ $result->bagian->departemen->nama }}</td>
        </tr>
        <tr>
            <td> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{ $result->kode }}</td>
        </tr>
        <tr>
            <td> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{ date('d-m-Y', strtotime($result->tanggal)) }}</td>
        </tr>
        <br>
        <br>
        @foreach ($result->details as $item)
            <tr>
                <td style="width: 400px">
                    {{ $loop->iteration }}. {{ $item->nama }}
                </td>
                <td style="width: 50px">
                    {{ $item->stok }}
                </td>
                <td style="width: 100px">
                    {{ $item->jumlah . ' ' . $item->satuan }}
                </td>
                <td>
                    {{ $item->keterangan }}
                </td>
            </tr>
        @endforeach
    </table>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous">
    </script>
</body>

</html>
