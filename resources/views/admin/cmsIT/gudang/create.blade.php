@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        Buat Data Gudang
    </div>

    <div class="card-body">
        <form action="{{ route("admin.gudangits.store") }}" method="POST" enctype="multipart/form-data">
            @csrf
                @include('admin.cmsIT.gudang.form')
            <div>
                <input class="btn btn-danger" type="submit" value="{{ trans('global.save') }}">
            </div>
        </form>
    </div>
</div>

@endsection
@section('scripts')
    <script>
        $(document).ready(function() {
            $(document)
                .on('change', '#perangkat', function() {
                    console.log($(this).val())
                    $.ajax({
                        method: 'GET',
                        url: '{{ url('admin/gudangits/jenisPerangkats') }}',
                        data: {
                            nama: $(this).val()
                        },
                        success: function(response) {
                            console.log(204,response)
                            let opt = '';
                            opt += '<option selected>-- Pilih --</option>';
                            for(let item of response) {
                                opt += `<option value='${item.id}'>${item.nama}</option>`;
                            }
                            $("#id").html(opt);
                        }
                    })
                });
        })

    </script>
@endsection
