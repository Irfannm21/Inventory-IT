@extends('layouts.admin')
@section('content')
    <div class="card">
        <div class="card-header">
            {{ trans('global.edit') }} {{ trans('global.product.title_singular') }}
        </div>

        <div class="card-body">
            <form action="{{ route('admin.bpbs.update', [$bpb->id]) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                @include('admin.bpb.form')

                <div>
                    <input class="btn btn-danger" type="submit" value="{{ trans('global.save') }}">
                </div>
            </form>
        </div>
    </div>
    <script>

        let namaBarang = document.getElementById("kode_npp");

        const generateNpp = () => {
            let request = new XMLHttpRequest();
            request.open("GET", "../../kode-npp.php", false);
            request.send();
            namaBarang.innerHTML = request.responseText;
        }

        generateNpp();
    </script>
@endsection
