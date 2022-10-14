
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Cetak BPB</title>
    <link href="{{ asset('/css/app.css')}} " rel="stylesheet">

</head>
  <body>
    <div class="container">
      <div class="row">
        <div class="col">1</div>
        <div class="col">2</div>
        <div class="col">3</div>
      </div>
    </div>
    {{-- Kode BPB : {{$result[0]->kode}} <br>
    Kode NPP :  {{$result[0]->npp->kode}} <br>
    Tanggal  : {{$result[0]->tanggal }}<br> --}}
    {{-- {{$item->detail->nama}} {{$item->jumlah ." ". $item->satuan}} {{$item->detail->keterangan}}<br> --}}
    <script src="{{asset('/js/app.js')}}"></script>
  </body>
</html>
