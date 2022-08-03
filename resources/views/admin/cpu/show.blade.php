@extends('layouts.admin')
@section('content')

@can('perbaikan_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route("admin.perbaikans.create",['id'=> $komputer->id, 'type' => 'komputer'])}}">
                Buat Perbaikan
            </a>
        </div>
    </div>
@endcan


<div class="card">
    <div class="card-header">
       Data Komputer
    </div>

    <div class="card-body">
        <table class="table table-bordered table-striped">
            <tbody>
                <tr>
                    <th>
                       Tanggal Pembelian
                    </th>
                    <td>
                        {{ $komputer->created_at }}
                    </td>
                </tr>
                <tr>
                    <th>
                       Kode Komputers
                    </th>
                    <td>
                        {!! $komputer->kode !!}
                    </td>
                </tr>
                <tr>
                    <th>
                       Sistem Operasi
                    </th>
                    <td>
                        {{ $komputer->system }}
                    </td>
                </tr>
                <tr>
                    <th>
                       Motherboard
                    </th>
                    <td>
                        {{ $komputer->motherboard }}
                    </td>
                </tr>
                <tr>
                    <th>
                       Processor
                    </th>
                    <td>
                        {{ $komputer->processor }}
                    </td>
                </tr>
                <tr>
                    <th>
                       Powersupply
                    </th>
                    <td>
                        {{ $komputer->powersupply }}
                    </td>
                </tr>
                <tr>
                    <th>
                       RAM
                    </th>
                    <td>
                        {{ $komputer->ram }}
                    </td>
                </tr>
                <tr>
                    <th>
                       Media Penyimpanan
                    </th>
                    <td>
                        {{ $komputer->disk }}
                    </td>
                </tr>
                <tr>
                    <th>
                       VGA
                    </th>
                    <td>
                        {{ $komputer->vga }}
                    </td>
                </tr>
                <tr>
                    <th>
                       Split Komputer
                    </th>
                    <td>
                        {{ $komputer->split }}
                    </td>
                </tr>
                <tr>
                    <th>
                       Monitor
                    </th>
                    <td>
                        {{ $komputer->monitor1 }}
                    </td>
                </tr>
                <tr>
                    <th>
                       Monitor
                    </th>
                    <td>
                        {{ $komputer->monitor2 }}
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

@endsection
