@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        Data Karyawan
    </div>

    <div class="card-body">
    </p>
    <ul class="nav nav-tabs">
        <li class="nav-item"><a href="#home" class="nav-link active" data-toggle="tab">Profile Karyawan</a></li>
        <li class="nav-item"><a href="#profile" class="nav-link" data-toggle="tab">Profile Pekerjaan</a></li>
        <li class="nav-item"><a href="#contact" class="nav-link" data-toggle="tab">Dokumen</a></li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane fade show active" id="home">
            <table class="table table-responsive table-bordered table-striped">
            <thead>
                    <th colspan="2">Biodata Pribadi</th>
            </thead>
            <tbody>
                <tr>
                    <td>
                        ID Finger
                    </td>
                    <td>{{$karyawan->kode}}</td>
                </tr>
                <tr>
                    <td>
                        Nama
                    </td>
                    <td>{{$karyawan->nama}}</td>
                </tr>
                <tr>
                    <td>
                        Tempat & Tanggal Lagir
                    </td>
                    <td>{{$karyawan->tempat_lahir .", " . $karyawan->tanggal_lahir}}</td>
                </tr>
                <tr>
                    <td>
                        Agama
                    </td>
                    <td>{{$karyawan->agama}}</td>
                </tr>
                <tr>
                    <td>
                        Email
                    </td>
                    <td>{{$karyawan->email}}</td>
                </tr>
                <tr>
                    <td>
                        NIK
                    </td>
                    <td>{{$karyawan->nik}}</td>
                </tr>
                <tr>
                    <td>
                        No E-KTP
                    </td>
                    <td>{{$karyawan->ektp}}</td>
                </tr>
                <tr>
                    <td>
                        No KPJ
                    </td>
                    <td>{{$karyawan->no_kpj}}</td>
                </tr>
                <tr>
                    <td>
                        No NPWP
                    </td>
                    <td>{{$karyawan->no_npwp}}</td>
                </tr>
                <tr>
                    <td>
                        No KK
                    </td>
                    <td>{{$karyawan->no_kk}}</td>
                </tr>
                <tr>
                    <td>
                        Nomor Telepon
                    </td>
                    <td>{{$karyawan->telepon}}</td>
                </tr>
                <tr>
                    <td>
                        Nomor Handphone
                    </td>
                    <td>{{$karyawan->no_hp}}</td>
                </tr>
                <tr>
                    <td>
                        Nama Bank
                    </td>
                    <td>{{$karyawan->nama_bank}}</td>
                </tr>
                <tr>
                    <td>
                        No Rekening
                    </td>
                    <td>{{$karyawan->no_rekening}}</td>
                </tr>
            </tbody>
        </table>
        </div>
        <div class="tab-pane fade show" id="profile">
            <table class="table table-bordered table-striped">
                <thead>
                        <th colspan="2">Biodata Pegawai</th>
                </thead>
                <tbody>
                    <tr>
                        <td>
                            Departemen
                        </td>
                        <td>{{$karyawan->departemen}}</td>
                    </tr>
                    <tr>
                        <td>
                            Poisisi Perkerjaan
                        </td>
                        <td>{{$karyawan->bagian}}</td>
                    </tr>
                    <tr>
                        <td>
                            Jabatan
                        </td>
                        <td>{{$karyawan->jabatan}}</td>
                    </tr>
                    <tr>
                        <td>
                            TMK
                        </td>
                        <td>{{$karyawan->tmk}}</td>
                    </tr>
                    <tr>
                        <td>
                            Shift
                        </td>
                        <td>{{$karyawan->shift}}</td>
                    </tr>
                    <tr>
                        <td>
                            Serikat Pekerja
                        </td>
                        <td>{{$karyawan->serikat_pekerja}}</td>
                    </tr>
                    <tr>
                        <td>
                            Status Pegawai
                        </td>
                        <td>{{$karyawan->status}}</td>
                    </tr>
                    <tr>
                        <td>
                            Catatan
                        </td>
                        <td>{{$karyawan->catatan}}</td>
                    </tr>
                    <tr>
                        <td>
                            No Vakalaring
                        </td>
                        <td>{{$karyawan->no_vaklaring}}</td>
                    </tr>
                    <tr>
                        <td>
                            Alasan Keluar
                        </td>
                        <td>{{$karyawan->alasan_keluar}}</td>
                    </tr>
                    <tr>
                        <td>
                            Dokumen
                        </td>
                        <td>


                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="tab-pane fade show" id="contact">
            <table class="table table-bordered table-striped">
                <thead>
                        <th colspan="2">Biodata Pegawai</th>
                </thead>
                <tbody>
                    <tr>
                        <td>
                            File KTP
                        </td>
                        <td> <a class="btn btn-xs btn-primary" href="">E-KTP</a></td>
                    </tr>
                    <tr>
                        <td>
                            File Kartu Keluarga
                        </td>
                        <td>
                            <a class="btn btn-xs btn-warning" href="">Kartu Keluarga</a></td>
                    </tr>
                    <tr>
                        <td>
                            File Ijazah
                        </td>
                        <td>  <a class="btn btn-xs btn-danger" href="">Ijazah</a></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    </div>
</div>

@endsection
