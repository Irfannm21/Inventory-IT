@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('global.user.title_singular') }}
    </div>

    <div class="card-body">
        <form action="{{ route("admin.users.update", [$user->id]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                <label for="name">{{ trans('global.user.fields.name') }}*</label>
                <input type="text" id="name" name="name" class="form-control" value="{{ old('name', isset($user) ? $user->name : '') }}">
                @if($errors->has('name'))
                    <em class="invalid-feedback">
                        {{ $errors->first('name') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('global.user.fields.name_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
                <label for="email">{{ trans('global.user.fields.email') }}*</label>
                <input type="email" id="email" name="email" class="form-control" value="{{ old('email', isset($user) ? $user->email : '') }}">
                @if($errors->has('email'))
                    <em class="invalid-feedback">
                        {{ $errors->first('email') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('global.user.fields.email_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('password') ? 'has-error' : '' }}">
                <label for="password">{{ trans('global.user.fields.password') }}</label>
                <input type="password" id="password" name="password" class="form-control">
                @if($errors->has('password'))
                    <em class="invalid-feedback">
                        {{ $errors->first('password') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('global.user.fields.password_helper') }}
                </p>
            </div>

            <div class="form-group {{ $errors->has('departemen') ? 'has-error' : '' }}">
                <label for="roles">{{ trans('Departemen') }} </label>
                <select name="departemen" id="departemen" class="form-control">
                    <option value="" selected>-- Pilih --</option>
                    <option value="Insan"{{"Insan" == (old('departemen') ?? ($user->departemen ?? '') ?? isset($user->departemen)) ? 'selected' : '' }}>Access All Departemen</option>
                   <option value="Engineering"{{"Engineering" == (old('departemen') ?? ($user->departemen ?? '') ?? isset($user->departemen)) ? 'selected' : '' }}>Engineering</option>
                   <option value="Weaving"{{"Weaving" == (old('departemen') ?? ($user->departemen ?? '') ?? isset($user->departemen)) ? 'selected' : '' }}>Weaving</option>
                   <option value="Dyeing Finishing"{{"Dyeing Finishing" == (old('departemen') ?? ($user->departemen ?? '') ?? isset($user->departemen)) ? 'selected' : '' }}> Dyeing Finishing</option>
                   <option value="Marketing"{{"Marketing" == (old('departemen') ?? ($user->departemen ?? '') ?? isset($user->departemen)) ? 'selected' : '' }}>Marketing</option>
                   <option value="Umum dan Personalia" {{"Umum dan Personalia" == (old('    ') ?? ($user->departemen ?? '') ?? isset($user->departemen)) ? 'selected' : '' }}>Umum dan Personalia</option>
                   <option value="Accounting"{{"Accounting" == (old('departemen') ?? ($user->departemen ?? '') ?? isset($user->departemen)) ? 'selected' : '' }}>Accounting</option>
                   <option value="Logistik"{{"Logistik" == (old('departemen') ?? ($user->departemen ?? '') ?? isset($user->departemen)) ? 'selected' : '' }}>Logistik</option>
                   
                </select>
                @if($errors->has('roles'))
                    <em class="invalid-feedback">
                        {{ $errors->first('roles') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('global.user.fields.roles_helper') }}
                </p>
            </div>

            <div class="form-group {{ $errors->has('roles') ? 'has-error' : '' }}">
                <label for="roles">{{ trans('global.user.fields.roles') }}*
                    <span class="btn btn-info btn-xs select-all">Select all</span>
                    <span class="btn btn-info btn-xs deselect-all">Deselect all</span></label>
                <select name="roles[]" id="roles" class="form-control select2" multiple="multiple">
                    @foreach($roles as $id => $roles)
                        <option value="{{ $id }}" {{ (in_array($id, old('roles', [])) || isset($user) && $user->roles->contains($id)) ? 'selected' : '' }}>
                            {{ $roles }}
                        </option>
                    @endforeach
                </select>
                @if($errors->has('roles'))
                    <em class="invalid-feedback">
                        {{ $errors->first('roles') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('global.user.fields.roles_helper') }}
                </p>
            </div>
            <div>
                <input class="btn btn-success" type="submit" value="{{ trans('global.save') }}">
            </div>
        </form>
    </div>
</div>

@endsection
