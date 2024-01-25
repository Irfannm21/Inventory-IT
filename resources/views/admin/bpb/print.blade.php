<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Print</title>
</head>

<style>
    .header {
        margin-top: 25px;
        margin-left: 85px;
        margin-bottom: 50px;
    }

    .header > table > tr {
        margin-block-end: 0em;
    }

    .val:nth-child(1) {
        width: 350px !important;
    }

    .val:nth-child(2) {
        padding-left: 10px;
        width: 50px;
    }

    .val:nth-child(3) {
        padding-left: 10px;
        width: 50px;
    }

    .val:nth-child(4) {
        padding-left: 20px;
        width: 250px;
    }
    #footer{
        position: absolute;
        bottom: 180px;
    }


@page {size:21cm 21cm;}
</style>
<body>
    <div class="header">
        <table>
            <tr>
                <td>
                    <b>
                        {{$result->supplier->nama}}
                    </b>
                </td>
                <td>
                    <b>
                        {{$result->kode}}
                    </b>
                </td>
            </tr>
            <tr>
                <td>
                    {{$result->supplier->kota}}
                </td>
                <b>
                    {{$result->tanggal}}
                </b>
            </tr>
        </table>
    </div>
    <div id="content">
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

    <div id="footer">
        <table>
            <tr>

            </tr>
        </table>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous">
    </script>
</body>
</html>
