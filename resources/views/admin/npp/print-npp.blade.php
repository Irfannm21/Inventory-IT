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

    .val:nth-child(1) {
        width: 350px !important;
    }

    .val:nth-child(2) {
        padding-left: 10px;
        width: 50px;
    }

    .val:nth-child(3) {
        padding-left: 10px;
        width: 100px;
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
                    {{ $result->bagian->departemen->nama }}
                </td>
            </tr>
            <tr>
                <td>
                    {{ $result->kode }}
                </td>
            </tr>
            <tr>
                <td>
                    {{ date('d-M-Y', strtotime($result->tanggal)) }}
                </td>
            </tr>
        </table>
    </div>
    <div id="content">
        <table>
            @foreach ($result->details as $item)
            <tr>
                <td class="val">
                    {{ $loop->iteration }}. {{ $item->nama }}
                </td>
                <td class="val">
                    @php
                        if($item->stok >= 0) {

                        } else {
                            echo $item->stok;
                        }
                    @endphp
                </td>
                <td class="val">
                    {{ $item->jumlah . ' ' . $item->satuan }}
                </td>
                <td class="val">
                    {{ $item->keterangan }}
                </td>
            </tr>
        @endforeach

        </table>
    </div>

    <div id="footer">
        <table>
            <tr>
                <td style="width:140px">
                    
                </td>
                <td style="width:140px">
                    <?php 
                    switch ($result->bagian->departemen->nama) {
                        case 'Engineering':
                            echo "Enjang H.R";
                            break;
                        case 'Marketing':
                            echo "Alvons";
                            break;
                        case 'Accounting':
                            echo "Lanawati";
                            break;
                        case 'Logistics':
                            echo "Dani";
                            break;
                        case 'Umum dan Personalia':
                            echo "Rikrik Gumilar";
                            break;
                        case 'Weaving':
                            echo "Dewie M";
                            break;
                        case 'Spinning':
                            echo "E.Fauzi F";
                            break;
                        case 'Dyeing Finishing':
                            echo "Euis S";
                            break;
                        default:
                            echo "";
                            break;
                    }
                    ?>
                </td>

                <td style="width:140px">
                    <?php 
                    switch ($result->bagian->departemen->nama) {
                        case 'Engineering':
                            echo "The Pek Kiong";
                            break;
                        case 'Marketing':
                            echo "Fitria W";
                            break;
                        case 'Accounting':
                            echo "The Pek Kiong";
                            break;
                        case 'Logistics':
                            echo "The Pek Kiong";
                            break;
                        case 'Umum dan Personalia':
                            echo "The Pek Kiong";
                            break;
                        case 'Weaving':
                            echo "Alvi TW";
                            break;
                        case 'Spinning':
                            echo "The Pek Kiong";
                            break;
                        case 'Dyeing Finishing':
                            echo "Alvi TW";
                            break;
                        default:
                            echo "";
                            break;
                    }
                    ?>
                </td>

                <td style="width:140px">
                    Hanning Yanwar
                </td>

                <td style="width:140px">
                    Dani
                </td>
            </tr>
        </table>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous">
    </script>
</body>
</html>
