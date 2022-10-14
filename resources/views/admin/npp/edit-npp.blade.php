@extends('layouts.admin')
@section('content')
    <div class="card">
        <div class="card-header">
            {{ trans('global.edit') }} {{ trans('global.product.title_singular') }}
        </div>

        <div class="card-body">
            <form action="{{ route('admin.npps.update', [$npp->id]) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <table>
                    <tr>
                        <td class="px-3">
                            <label for="kode">Kode NPP</label>
                        </td>

                        <td class="pt-3">
                            <input type="text" id="kode" name="kode" class="form-control"
                                value="{{ old('kode', isset($npp) ? $npp->kode : '') }}" placeholder="Cth: 001/MKT/065">
                            @if ($errors->has('kode'))
                                <em class="invalid-feedback">
                                    {{ $errors->first('kode') }}
                            @endif
                            </em>
                            <p class="helper-block text-muted">
                                *Masukan kode NPP
                            </p>
                        </td>
                    </tr>
                    <tr>
                        <td class="px-3">
                            <label for="tanggal">Tanggal</label>
                        </td>

                        <td class="pt-3">
                            <input type="date" id="tanggal" name="tanggal" class="form-control"
                                value="{{ old('tanggal', isset($npp) ? $npp->tanggal : '') }}"
                                placeholder="Cth: 001/MKT/065">
                            @if ($errors->has('tanggal'))
                                <em class="invalid-feedback">
                                    {{ $errors->first('tanggal') }}
                            @endif
                            </em>
                            <p class="helper-block text-muted">
                                *Masukan kode NPP
                            </p>
                        </td>
                    </tr>
                    <tr>
                        <td class="px-3">
                            <label for="departemen">Departemen</label>
                        </td>

                        <td class="pt-3">
                            <select name="departemen" id="departemen" class="form-control">
                                @if (!isset($npp))
                                    <option value="">-- Pilih --</option>
                                @endif
                                @foreach ($dept as $id => $value)
                                    <option value="{{ $id }}" @if (isset($npp->departemen) && $npp->departemen_id == $id) selected @endif>
                                        {{ $value }}
                                    </option>
                                @endforeach
                            </select>
                            @if ($errors->has('departemen'))
                                <em class="invalid-feedback">
                                    {{ $errors->first('departemen') }}
                            @endif
                            </em>
                            <p class="helper-block text-muted">
                                *Pilih departemen
                        </td>
                    </tr>

                    <tr>
                        <td class="px-3 ">
                            <label for="bagian">Bagian</label>
                        </td>

                        <td class="pt-3">
                            <select name="bagian" id="bagian" class="form-control">
                                @if (!isset($npp))
                                    <option value="">-- Pilih --</option>
                                @endif
                                @foreach ($bagian as $id => $value)
                                    <option value="{{ $id }}" @if (isset($npp->bagian) && $npp->bagian_id == $id) selected @endif>
                                        {{ $value }}
                                    </option>
                                @endforeach
                            </select>
                            @if ($errors->has('bagian'))
                                <em class="invalid-feedback">
                                    {{ $errors->first('bagian') }}
                            @endif
                            </em>
                            <p class="helper-block text-muted">
                                *Pilih Bagian
                        </td>
                    </tr>
                </table>

                <div>
                    <input class="btn btn-danger" type="submit" value="{{ trans('global.save') }}">
                </div>
            </form>
        </div>
    </div>
@endsection
