<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Print</title>
</head>

<style>
    body {
        font-size: 12px;
    }
    #header {
        margin-top: 20px;
        margin-left: 80px;
        margin-bottom: 50px;
    }

    #header table{
       /* border : solid black; */
       padding: 0px;
       border-spacing: 10px;
    }

    #content{
        margin-left: 5px;
        /* background-color: red; */
    }

    #content table tr td {
        vertical-align: top;
        text-align: left;
    }

    #content table tr td:nth-child(1) {
        /* background-color: yellow; */
        width: 310px;
       
    }

    #content table tr td:nth-child(2) {
        /* background-color: pink; */
        width: 60px;
    }

    #content table tr td:nth-child(3) {
        /* background-color: pink; */
        width: 60px;
        text-align: center;
    }

    #content table tr td:nth-child(4) {
        /* background-color: pink; */
        padding-left: 50px;
        width: 220px;
    }

    #footer {
        position: absolute;
        /* border: solid black; */
        top: 480px;
        width: 700px
    }

    #footer table {
        border-spacing: 20px;
    }

    #footer table tr td {
        width: 120px;
        /* border: solid red; */
    }

</style>
<body>
    <div id="header">
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
                <td>
                    {{ $loop->iteration }}. {{ $item->nama }}
                </td>
                <td>
                    @php
                     if($item->stok < 1) {
                        echo "-";
                     } else {
                        echo $item->stok . " Unit";
                     }
                    @endphp
                </td>
                <td>
                    {{ $item->jumlah . ' ' . $item->satuan }}
                </td>
                <td>
                    {{ $item->keterangan }}
                </td>
            </tr>
        @endforeach
        </table>
    </div>

    <div id="footer">
        <table>
            <tr>
                <td>
                    <?php
                    switch ($result->bagian->nama) {
                        case 'IT':
                            echo "Yudi Hadiandi";
                            break;
                            case 'Utility':
                            echo "Teguh W";
                            break;
                            case 'IT':
                            echo "Yudi Hadiandi";
                            break;
                            case 'IT':
                            echo "Yudi Hadiandi";
                            break;
                            case 'IT':
                            echo "Yudi Hadiandi";
                            break;
                            case 'IT':
                            echo "Yudi Hadiandi";
                            break;
                            
                        default:
                            echo "";
                            break;
                    }
                    // ?>
                </td>
                <td>
                    <?php
                    switch ($result->bagian->departemen->nama) {
                        case 'Marketing':
                            echo "Alvons Gunawan";
                            break;
                        case 'Accounting':
                            echo "Rinawati Gunawan";
                            break;
                        case 'Logistics':
                            echo "Dani";
                            break;
                        case 'Umum dan Personalia':
                            echo "Rikrik Gumilar";
                            break;
                        case 'Weaving':
                            echo "Dewie Murni";
                            break;
                        case 'Spinning':
                            echo "E.Fauzi Fattah";
                            break;
                        case 'Dyeing Finishing':
                            echo "Euis Sahidah";
                            break;
                        default:
                            echo "";
                            break;
                    }
                    // ?>
                </td>

                <td>
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

                <td>
                    Hanning Yanwar
                </td>

                <td>
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
