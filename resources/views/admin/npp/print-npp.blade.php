
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>

</head>
  <body>
    <table>
        @foreach ($result as $val)
        <tr>
            <td>{{$val->departemen->nama}}</td>
        </tr>
        <tr>
            <td>{{$val->kode}}</td>
        </tr>
        <tr>
            <td>{{$val->tanggal}}</td>
        </tr>
        <br>
        <br>
        @foreach ($val->details as $item)
            <tr>
                <td>
                    {{$loop->iteration}}.  {{$item->nama}}
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  {{$item->stok== 0 ? "" : $item->stok }}
                </td>
                <td>
                 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; {{$item->jumlah ." ".$item->satuan}}
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; {{$item->keterangan}}
                </td>
            </tr>
        @endforeach
        @endforeach
    </table>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
  </body>
</html>
