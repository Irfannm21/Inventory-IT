@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        Edit Karyawan
    </div>

    <div class="card-body">
        <form action="{{ route("admin.karyawans.update", [$karyawan->id]) }}" method="POST" enctype="multipart/form-data">
    <div class="row">
        <div class="col-sm-12 col-md-6">
                @csrf
                @method('PUT')
                <div class="form-group {{ $errors->has('kode') ? 'has-error' : '' }}">
                    <label for="kode">ID Finger</label>
                    <input type="text" id="kode" name="kode" class="form-control" value="{{ old('kode', isset($karyawan) ? $karyawan->kode : '') }}">
                    @if($errors->has('kode'))
                        <em class="invalid-feedback">
                            {{ $errors->first('kode') }}
                        </em>
                    @endif
                    <p class="helper-block">
                        {{ trans('global.product.fields.name_helper') }}
                    </p>
                </div>

                <div class="form-group {{ $errors->has('nama') ? 'has-error' : '' }}">
                    <label for="nama">Nama</label>
                    <input type="text" id="nama" name="nama" class="form-control" value="{{ old('nama', isset($karyawan) ? $karyawan->nama : '') }}">
                    @if($errors->has('nama'))
                        <em class="invalid-feedback">
                            {{ $errors->first('nama') }}
                        </em>
                    @endif
                    <p class="helper-block">
                        {{ trans('global.product.fields.name_helper') }}
                    </p>
                </div>

                <div class="form-group {{ $errors->has('tempat_lahir') ? 'has-error' : '' }}">
                    <label for="tempat_lahir">Tempat Lahir</label>
                    <input type="text" id="tempat_lahir" name="tempat_lahir" class="form-control" value="{{ old('tempat_lahir', isset($karyawan) ? $karyawan->tempat_lahir : '') }}">
                    @if($errors->has('tempat_lahir'))
                        <em class="invalid-feedback">
                            {{ $errors->first('tempat_lahir') }}
                        </em>
                    @endif
                    <p class="helper-block">
                        {{ trans('global.product.fields.name_helper') }}
                    </p>
                </div>

                <div class="form-group {{ $errors->has('tanggal_lahir') ? 'has-error' : '' }}">
                    <label for="tanggal_lahir">Tanggal Lahir</label>
                    <input type="date" id="tanggal_lahir" name="tanggal_lahir" class="form-control" value="{{ old('tanggal_lahir', isset($karyawan) ? $karyawan->tanggal_lahir : '') }}">
                    @if($errors->has('tanggal_lahir'))
                        <em class="invalid-feedback">
                            {{ $errors->first('tanggal_lahir') }}
                        </em>
                    @endif
                    <p class="helper-block">
                        {{ trans('global.product.fields.name_helper') }}
                    </p>
                </div>

                <div class="form-group {{ $errors->has('agama') ? 'has-error' : '' }}">
                    <label for="agama">Agama</label>
                    <input type="text" id="agama" name="agama" class="form-control" value="{{ old('agama', isset($karyawan) ? $karyawan->agama : '') }}">
                    @if($errors->has('agama'))
                        <em class="invalid-feedback">
                            {{ $errors->first('agama') }}
                        </em>
                    @endif
                    <p class="helper-block">
                        {{ trans('global.product.fields.name_helper') }}
                    </p>
                </div>

                <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
                    <label for="email">Alamat Email</label>
                    <input type="text" id="email" name="email" class="form-control" value="{{ old('email', isset($karyawan) ? $karyawan->email : '') }}">
                    @if($errors->has('email'))
                        <em class="invalid-feedback">
                            {{ $errors->first('email') }}
                        </em>
                    @endif
                    <p class="helper-block">
                        {{ trans('global.product.fields.name_helper') }}
                    </p>
                </div>

                <div class="form-group {{ $errors->has('nik') ? 'has-error' : '' }}">
                    <label for="nik">Nomor NIK</label>
                    <input type="text" id="nik" name="nik" class="form-control" value="{{ old('nik', isset($karyawan) ? $karyawan->nik : '') }}">
                    @if($errors->has('nik'))
                        <em class="invalid-feedback">
                            {{ $errors->first('nik') }}
                        </em>
                    @endif
                    <p class="helper-block">
                        {{ trans('global.product.fields.name_helper') }}
                    </p>
                </div>

                <div class="form-group {{ $errors->has('no_kk') ? 'has-error' : '' }}">
                    <label for="no_kk">Nomor Kartu Keluarga</label>
                    <input type="text" id="no_kk" name="no_kk" class="form-control" value="{{ old('no_kk', isset($karyawan) ? $karyawan->no_kk : '') }}">
                    @if($errors->has('no_kk'))
                        <em class="invalid-feedback">
                            {{ $errors->first('no_kk') }}
                        </em>
                    @endif
                    <p class="helper-block">
                        {{ trans('global.product.fields.name_helper') }}
                    </p>
                </div>


                <div class="form-group {{ $errors->has('ektp') ? 'has-error' : '' }}">
                    <label for="ektp">Nomor E-KTP</label>
                    <input type="text" id="ektp" name="ektp" class="form-control" value="{{ old('ektp', isset($karyawan) ? $karyawan->ektp : '') }}">
                    @if($errors->has('ektp'))
                        <em class="invalid-feedback">
                            {{ $errors->first('ektp') }}
                        </em>
                    @endif
                    <p class="helper-block">
                        {{ trans('global.product.fields.name_helper') }}
                    </p>
                </div>


                <div class="form-group {{ $errors->has('no_kpj') ? 'has-error' : '' }}">
                    <label for="no_kpj">Nomor KPJ</label>
                    <input type="text" id="no_kpj" name="no_kpj" class="form-control" value="{{ old('no_kpj', isset($karyawan) ? $karyawan->no_kpj : '') }}">
                    @if($errors->has('no_kpj'))
                        <em class="invalid-feedback">
                            {{ $errors->first('no_kpj') }}
                        </em>
                    @endif
                    <p class="helper-block">
                        {{ trans('global.product.fields.name_helper') }}
                    </p>
                </div>


                <div class="form-group {{ $errors->has('no_npwp') ? 'has-error' : '' }}">
                    <label for="no_npwp">Nomor NPWP</label>
                    <input type="text" id="no_npwp" name="no_npwp" class="form-control" value="{{ old('no_npwp', isset($karyawan) ? $karyawan->no_npwp : '') }}">
                    @if($errors->has('no_npwp'))
                        <em class="invalid-feedback">
                            {{ $errors->first('no_npwp') }}
                        </em>
                    @endif
                    <p class="helper-block">
                        {{ trans('global.product.fields.name_helper') }}
                    </p>
                </div>

                <div class="form-group {{ $errors->has('telepon') ? 'has-error' : '' }}">
                    <label for="telepon">Telepon Rumah</label>
                    <input type="text" id="telepon" name="telepon" class="form-control" value="{{ old('telepon', isset($karyawan) ? $karyawan->telepon : '') }}">
                    @if($errors->has('telepon'))
                        <em class="invalid-feedback">
                            {{ $errors->first('telepon') }}
                        </em>
                    @endif
                    <p class="helper-block">
                        {{ trans('global.product.fields.name_helper') }}
                    </p>
                </div>

                <div class="form-group {{ $errors->has('no_hp') ? 'has-error' : '' }}">
                    <label for="no_hp">Nomor Smartphone</label>
                    <input type="text" id="no_hp" name="no_hp" class="form-control" value="{{ old('no_hp', isset($karyawan) ? $karyawan->no_hp : '') }}">
                    @if($errors->has('no_hp'))
                        <em class="invalid-feedback">
                            {{ $errors->first('no_hp') }}
                        </em>
                    @endif
                    <p class="helper-block">
                        {{ trans('global.product.fields.name_helper') }}
                    </p>
                </div>

                <div class="form-group {{ $errors->has('nama_bank') ? 'has-error' : '' }}">
                    <label for="nama_bank">Nama</label>
                    <input type="text" id="nama_bank" name="nama_bank" class="form-control" value="{{ old('nama_bank', isset($karyawan) ? $karyawan->nama_bank : '') }}">
                    @if($errors->has('nama_bank'))
                        <em class="invalid-feedback">
                            {{ $errors->first('nama_bank') }}
                        </em>
                    @endif
                    <p class="helper-block">
                        {{ trans('global.product.fields.name_helper') }}
                    </p>
                </div>

                <div class="form-group {{ $errors->has('no_rekening') ? 'has-error' : '' }}">
                    <label for="no_rekening">Nomor Rekening</label>
                    <input type="text" id="no_rekening" name="no_rekening" class="form-control" value="{{ old('no_rekening', isset($karyawan) ? $karyawan->no_rekening : '') }}">
                    @if($errors->has('no_rekening'))
                        <em class="invalid-feedback">
                            {{ $errors->first('no_rekening') }}
                        </em>
                    @endif
                    <p class="helper-block">
                        {{ trans('global.product.fields.name_helper') }}
                    </p>
                </div>

            </div>

            <div class="col-sm-12 col-md-6">
                <div class="form-group {{ $errors->has('departemen') ? 'has-error' : '' }}">
                    <label for="departemen">Departemen</label>
                    <input type="text" id="departemen" name="departemen" class="form-control" value="{{ old('departemen', isset($karyawan) ? $karyawan->departemen : '') }}">
                    @if($errors->has('departemen'))
                        <em class="invalid-feedback">
                            {{ $errors->first('departemen') }}
                        </em>
                    @endif
                    <p class="helper-block">
                        {{ trans('global.product.fields.name_helper') }}
                    </p>
                </div>

                <div class="form-group {{ $errors->has('bagian') ? 'has-error' : '' }}">
                    <label for="bagian">Posisi Pekerjaan</label>
                    <input type="text" id="bagian" name="bagian" class="form-control" value="{{ old('bagian', isset($karyawan) ? $karyawan->bagian : '') }}">
                    @if($errors->has('bagian'))
                        <em class="invalid-feedback">
                            {{ $errors->first('bagian') }}
                        </em>
                    @endif
                    <p class="helper-block">
                        {{ trans('global.product.fields.name_helper') }}
                    </p>
                </div>

                <div class="form-group {{ $errors->has('jabatan') ? 'has-error' : '' }}">
                    <label for="jabatan">Jabatan</label>
                    <input type="text" id="jabatan" name="jabatan" class="form-control" value="{{ old('jabatan', isset($karyawan) ? $karyawan->jabatan : '') }}">
                    @if($errors->has('jabatan'))
                        <em class="invalid-feedback">
                            {{ $errors->first('jabatan') }}
                        </em>
                    @endif
                    <p class="helper-block">
                        {{ trans('global.product.fields.name_helper') }}
                    </p>
                </div>

                <div class="form-group {{ $errors->has('tmk') ? 'has-error' : '' }}">
                    <label for="tmk">Tanggal Masuk Kerja</label>
                    <input type="date" id="tmk" name="tmk" class="form-control" value="{{ old('tmk', isset($karyawan) ? $karyawan->tmk : '') }}">
                    @if($errors->has('tmk'))
                        <em class="invalid-feedback">
                            {{ $errors->first('tmk') }}
                        </em>
                    @endif
                    <p class="helper-block">
                        {{ trans('global.product.fields.name_helper') }}
                    </p>
                </div>

                <div class="form-group {{ $errors->has('shift') ? 'has-error' : '' }}">
                    <label for="shift">Shift Kerja</label>
                    <input type="text" id="shift" name="shift" class="form-control" value="{{ old('shift', isset($karyawan) ? $karyawan->shift : '') }}">
                    @if($errors->has('shift'))
                        <em class="invalid-feedback">
                            {{ $errors->first('shift') }}
                        </em>
                    @endif
                    <p class="helper-block">
                        {{ trans('global.product.fields.name_helper') }}
                    </p>
                </div>

                <div class="form-group {{ $errors->has('serikat_pekerja') ? 'has-error' : '' }}">
                    <label for="serikat_pekerja">Anggota Serikat</label>
                    <input type="text" id="serikat_pekerja" name="serikat_pekerja" class="form-control" value="{{ old('serikat_pekerja', isset($karyawan) ? $karyawan->serikat_pekerja : '') }}">
                    @if($errors->has('serikat_pekerja'))
                        <em class="invalid-feedback">
                            {{ $errors->first('serikat_pekerja') }}
                        </em>
                    @endif
                    <p class="helper-block">
                        {{ trans('global.product.fields.name_helper') }}
                    </p>
                </div>

                <div class="form-group {{ $errors->has('status_pegawai') ? 'has-error' : '' }}">
                    <label for="status_pegawai">Nomor status_pegawai</label>
                    <input type="text" id="status_pegawai" name="status_pegawai" class="form-control" value="{{ old('status_pegawai', isset($karyawan) ? $karyawan->status_pegawai : '') }}">
                    @if($errors->has('status_pegawai'))
                        <em class="invalid-feedback">
                            {{ $errors->first('status_pegawai') }}
                        </em>
                    @endif
                    <p class="helper-block">
                        {{ trans('global.product.fields.name_helper') }}
                    </p>
                </div>

                <div class="form-group {{ $errors->has('catatan') ? 'has-error' : '' }}">
                    <label for="catatan">Catatan</label>
                    <input type="text" id="catatan" name="catatan" class="form-control" value="{{ old('catatan', isset($karyawan) ? $karyawan->catatan : '') }}">
                    @if($errors->has('catatan'))
                        <em class="invalid-feedback">
                            {{ $errors->first('catatan') }}
                        </em>
                    @endif
                    <p class="helper-block">
                        {{ trans('global.product.fields.name_helper') }}
                    </p>
                </div>


                <div class="form-group {{ $errors->has('no_vaklaring') ? 'has-error' : '' }}">
                    <label for="no_vaklaring">Nomor Vaklaring</label>
                    <input type="text" id="no_vaklaring" name="no_vaklaring" class="form-control" value="{{ old('no_vaklaring', isset($karyawan) ? $karyawan->no_vaklaring : '') }}">
                    @if($errors->has('no_vaklaring'))
                        <em class="invalid-feedback">
                            {{ $errors->first('no_vaklaring') }}
                        </em>
                    @endif
                    <p class="helper-block">
                        {{ trans('global.product.fields.name_helper') }}
                    </p>
                </div>


                <div class="form-group {{ $errors->has('alasan_keluar') ? 'has-error' : '' }}">
                    <label for="alasan_keluar">Alasan Keluar</label>
                    <input type="text" id="alasan_keluar" name="alasan_keluar" class="form-control" value="{{ old('alasan_keluar', isset($karyawan) ? $karyawan->alasan_keluar : '') }}">
                    @if($errors->has('alasan_keluar'))
                        <em class="invalid-feedback">
                            {{ $errors->first('alasan_keluar') }}
                        </em>
                    @endif
                    <p class="helper-block">
                        {{ trans('global.product.fields.name_helper') }}
                    </p>
                </div>

                <div>
                    <input class="btn btn-danger" type="submit" value="{{ trans('global.save') }}">
                </div>
            </div>

        </div>
</form>
</div>

@endsection
