<?php
// dd($result->detail_bpbs());
    // foreach ($result as $value) {
    //   echo $value->kode . "<br>";
    //   foreach ($value->detail_bpbs as $key) {
    //     echo $key->detail_npp->nama . " | " . $key->stock->jumlah . "<br>";
    //   }
    // }
    // echo "<hr>";
    // die();
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Cetak BPB</title>
    <link href="{{ asset('/css/app.css')}} " rel="stylesheet">

</head>
  <body>
      <table>
        @foreach ($result as $item)
        <tr>
            <td>
                {{$item->supplier->nama}}
            </td>
            <td>
              &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; {{$item->kode}}
            </td>
        </tr>
        <tr>
          <td>
            {{$item->supplier->kota}}
          </td>
          <td>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; {{$item->tanggal}}
          </td>
        </tr>
        @endforeach
        <br>
        <br>
        <br>
        <br>
        <br>
          <tr>
            <td>
             Nomor NPP : {{$item->npp->kode}}
            </td>
          </tr>
          @foreach ($item->detail_bpbs as $item)
            <tr>
              <td>
                {{$loop->iteration .". ". $item->detail_npp->nama}}
              </td>
              <td>
                {{$item->stock->jumlah . " " .$item->stock->satuan ?? "Kosong"}}
              </td>
              <td>
                {{$item->detail_npp->keterangan}}
              </td>
            </tr>
          @endforeach
    </table>
    <script src="{{asset('/js/app.js')}}"></script>
  </body>
</html>
