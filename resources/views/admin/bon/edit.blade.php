@extends('layouts.admin')
@section('content')
    <div class="card">
        <div class="card-header">
            Edit Data
        </div>

        <div class="card-body">
            <form action="{{ route('admin.bons.update', [$result->id]) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                @include('admin.bon.form')

                <div>
                    <input class="btn btn-success" type="submit" value="{{ trans('global.save') }}">
                </div>
            </form>
        </div>
    </div>
@endsection
