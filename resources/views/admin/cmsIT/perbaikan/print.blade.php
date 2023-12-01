<?php
// dd($perangkat);
?>
<html>
<head>
    <title></title>
    <style>
        * {
            box-sizing: border-box;
        }

        /** Define the margins of your page **/
        @page {
            margin: 1cm;
        }

        header {
            position: fixed;
            top: 0px;
            left: 0;
            right: 0;
            /*margin-left: 10mm;*/
            /*margin-right: 5mm;*/
            /*line-height: 35px;*/
        }

        footer {
            position: fixed;
            bottom: -30px;
            left: 0px;
            right: 0;
            height: 30px;
            line-height: 35px;
        }

        body {
            margin-top: 2cm;
            font-size: 12pt;
            font-weight: normal;
        }

        .pagenum:before {
            content: counter(page);
            content: counter(page, decimal);
        }

        table {
            width: 100%;
            border: 1pt solid black;
            border-collapse: collapse;
        }

        tr th,
        tr td {
            border-bottom: 1pt solid black;
            border: 1pt solid black;
            border-right: 1pt solid black;
        }

        ul,
        ol {
            margin: 0;
            padding-left: 20px;
        }

        p {
            margin-top: 0;
        }

        td p {
            margin-bottom: 0;
        }


        .table-data {
            height: 44px;
            background-repeat: no-repeat;
            /*background-position: center center;*/
            border: 1px solid;
            /*text-align: justify;*/
            /*background-color: #ffffff;*/
            font-weight: normal;
            /*color: #555555;*/
            /*padding: 11px 5px 11px 5px;*/
            vertical-align: middle;
        }

        .table-data tr th,
        .table-data tr td {
            padding: 5px 8px;
        }

        .table-data tr td {
            vertical-align: top;
        }

        .page-break: {
            page-break-inside: always;
        }

        .nowrap {
            white-space: nowrap;
        }

        .wysiwyg-content {
            max-width: 100% !important;
            text-align: justify;
            width: 100% !important;
        }

        .wysiwyg-content img {
            max-height: 90% !important;
            max-width: 100% !important;
        }

        .table-detail th,
        .table-detail td {
            padding: .2em .4em;
        }
    </style>
</head>

<body class="page">
    <header>
        <table style="border:none; width: 100%;">
            <tr>
                <td style="border:none;" width="150px">
              </td>
                <td style="border:none;  text-align: center; font-size: 14pt;" width="auto">
                    <b>{{ strtoupper(__('Data Perbaikan Perangkat ' . $perangkat->kode)) }}</b>
                    <div style="font-size: 1em"><b>{{ strtoupper('Periode : ' . date('d-m-Y', strtotime($awal)) . ' - ' . date('d-m-Y', strtotime($akhir)))}}</b></div>
                </td>
                <td style="border:none; text-align: right; font-size: 12px;" width="150px">
                    <b></b>
                </td>
            </tr>
        </table>
        <hr>
    </header>

    <footer>
        <table width="100%" border="0" style="border: none;">
            <tr>
                <td style="width: 10%;border: none;" align="right"><span class="pagenum"></span></td>
            </tr>
        </table>
    </footer>
    <main>
       <table width="50%" border="0" style="border: none;">
       </table>
        <table class="table-detail">
            <thead>
                <tr>
                    <th class="text-center" style='border-none; width: 1em'>No</th>
                   <th class="text-center" style='border-none; '>Nama Operator</th>
                    <th class="text-center" style='border-none; '>Kerusakan</th>
                    <th class="text-center" style='border-none; '>Tindakan</th>
                    <th class="text-center" style='border-none; '>Tanggal</th>
                    <th class="text-center" style='border-none; '>Mulai</th>
                    <th class="text-center" style='border-none; '>Selesai</th>
                    <th class="text-center" style='border-none; '>Total</th>

                </tr>
            </thead>
            <tbody>
                @php
                    $i = 0;
                @endphp
                @foreach ($results as $value)

                    <tr>
                        <td style='border-none; text-align: center'>
                            {{ $loop->iteration ?? '' }}
                        </td>
                        <td style='text-align: left'>
                            {{$value->petugas ?? ''}}
                        </td>
                        <td class='text-bold' style='border-none; text-align: center'>
                            {{ $value->kerusakan ?? '' }}
                        </td>
                        <td style='border-none; text-align: center'>
                            {{$value->tindakan ?? ''}}
                        </td>
                        <td class='text-bold' style='border-none; text-align: center'>
                            {{ date('d-m-Y',strtotime($value->tanggal)) ?? '' }}
                        </td>
                        <td class='text-bold' style='border-none; text-align: center'>
                            {{ date('H:i',strtotime($value->stop)) ?? '' }}
                        </td>
                        <td class='text-bold' style='border-none; text-align: center'>
                            {{ date('H:i',strtotime($value->selesai)) ?? '' }}
                        </td>
                        <td style='text-align: center'>
                            {{ date('H:i',strtotime($value->total)) ?? '' }}
                        </td>

                    </tr>
                @endforeach
            </tbody>
            <tfoot>

                <tr style="font-weight: bold;">
                    <td colspan="7" style="text-align: right">Total Waktu Perbaikan </td>
                    <td style="text-align: center">
                        <?php
                        $totalSeconds = 0;
                        foreach($results as $val) {
                            list($hours,$minutes,$seconds) = explode(':',$val->total);
                            $totalSeconds += $hours * 3600 + $minutes * 60 + $seconds;
                        }

                        $total_time = gmDate("H:i", $totalSeconds);
                        echo $total_time
                        ?>
                    </td>
                </tr>
            </tfoot>
        </table>
    </main>
</body>

</html>
