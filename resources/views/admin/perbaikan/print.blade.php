<?php
    // dd($result->perbaikans());
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Print</title>
    <style>
        #rekap {
            border:2px 2px 2px 2px solid black;
        }

    </style>
</head>

<body>
    <article>
        <figure>
            <figcaption>
                Data Perbaikan {{$result->kode}}
            </figcaption>
            <hr>

            <table>
                <tr>
                    <td>
                        Tanggal Pembelian
                    </td>
                    <td>
                        :
                    </td>
                    <td>
                        {{$result->tanggal}}
                    </td>
                </tr>
                <tr>
                    <td>
                        Kode
                    </td>
                    <td>
                        :
                    </td>
                    <td>
                        {{$result->kode}}
                    </td>
                </tr>
                <tr>
                    <td>
                        Keterangan
                    </td>
                    <td>
                        :
                    </td>
                    <td>
                        {{$result->nama}}
                    </td>
                </tr>
            </table>
            <br>

            <figcaption style="text-align: center">
                Rekap Data Perbaikan
            </figcaption>
            <hr>

            <table id="rekap" style="border">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            Tanggal
                        </th>
                        <th>
                            Hardware ID
                        </th>
                        <th>
                            Kerusakan
                        </th>
                        <th>
                            Tindakan
                        </th>
                        <th>
                            Petugas
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($result->perbaikans as $key => $value)
                    <tr data-entry-id="{{ $value->id }}">
                        <td>

                        </td>
                        <td>
                            {{ $value->tanggal ?? '' }}
                        </td>
                        <td>
                           {{$value->hardwareable->kode ?? ''}}
                        </td>
                        <td>
                            {{ $value->kerusakan ?? '' }}
                        </td>
                        <td>
                            {{ $value->tindakan ?? '' }}
                        </td>
                        <td>
                            {{ $value->petugas ?? '' }}
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </figure>
    </article>
</body>

</html>
