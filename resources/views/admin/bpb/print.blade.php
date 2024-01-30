<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Print</title>
</head>

<style>
body {
    /* background-color: pink; */
    margin: 0px;
}
.header  {
    /* background-color: red; */
    font-style: bold;
    margin-bottom: 100px;
    margin-left: 20px;
}

.header td {
    /* background-color: yellow; */
    width: 300px;
    padding: 10px;

}

.content {
    /* background-color: red; */
    margin-left: 0px

}

.content td {
    /* background-color: yellow; */
    width: 100px;
}

.content td:first-child {
    width: 10px
}

.content td:nth-child(2) {
    /* background-color: aqua; */
    width: 260px;
}

.content td:nth-child(3),td:nth-child(3) {
    /* background-color: aqua; */
    width: 40px;
}
@page {size:21cm 21cm;}
</style>
<body>
    <div class="header">
        <table>
            <tr>
                <td>
                    {{$result->supplier->nama}}
                </td>
                <td>
                    {{$result->supplier->kota}}
                </td>
            </tr>
            <tr>
                <td>
                    {{$result->kode}}
                </td>
                <td>
                    {{$result->tanggal}}
                </td>
            </tr>
        </table>
    </div>


    <div class="content">
       <b><span>NPP : {{$result->npp->kode}}</span></b>
        <table>
            @foreach ($result->detail_bpbs as $item)
                <tr>
                    <td>
                        {{$loop->iteration}}.
                    </td>
                    <td>
                        {{$item->detail_npp->nama}}
                    </td>
                    <td>
                        {{$item->jumlah}}
                    </td>
                    <td>
                        {{$item->stock->satuan}}
                    </td>
                    <td>
                        {{$item->detail_npp->keterangan}}
                    </td>

                </tr>
            @endforeach
        </table>
    </div>
{{--
    <div id="footer">
        <table>
            <tr>
                <td>

                </td>
            </tr>
        </table>
    </div> --}}

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous">
    </script>
</body>
</html>
