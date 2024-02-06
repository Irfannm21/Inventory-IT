@php
    // dd($result->kode);
@endphp
@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        Edit Data
    </div>

    <div class="card-body">
        <form action="{{ route("it.perbaikans.update", $result->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            @include('admin.cmsIT.perbaikan.form')

            <div class="mt-3 ml-3">
                <input class="btn btn-success" type="submit" value="{{ trans('global.save') }}">
            </div>
        </form>
    </div>
</div>

@section('scripts')
<script>
    $(document).ready(function() {
        $(document).on('change',"#type", function() {
            $.ajax({
                    method: 'GET',
                    url: '{{ url('admin/perbaikans/cariItem') }}',
                    data: {
                        nama: $(this).val()
                    },
                    success: function(response) {
                        console.log(204, response);
                        let options = '';
                        for (let item of response) {
                            options += `<option value='${item.id}'>${item.kode}</option>`;
                        }
                        $('.namaBarang').html(options);
                    }
                })
        });
    })
</script>
@endsection

@endsection