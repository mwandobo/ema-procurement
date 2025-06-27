@extends('admin.setting.index')


@section('admin.setting.layout')
    <div class="col-md-9">
        <div class="card">
            <div class="card-body">
                <form class="form-horizontal" role="form" method="POST" action="{{ route('setting.email-update') }}">
                    @csrf
                    <?php

$data = App\Models\Setting::all()->last();

?>
                    <fieldset class="setting-fieldset">
                        <legend class="setting-legend">{{ __('Email Setting') }}</legend>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="mail_host">{{ __('Mail Host') }}</label> <span class="text-danger">*</span>
                                    <input name="mail_host" id="mail_host" type="text"
                                        class="form-control @error('mail_host') is-invalid @enderror"
                                        value="{{ old('mail_host',$data->mail_host) }}">
                                    @error('mail_host')
                                    <div class="invalid-feedback">
                                        <strong>{{ $message }}</strong>
                                    </div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="mail_username">{{ __('Mail Username') }}</label> <span
                                        class="text-danger">*</span>
                                    <input name="mail_username" id="mail_username" type="text"
                                        class="form-control @error('mail_username') is-invalid @enderror"
                                        value="{{ old('mail_username',$data->mail_username) }}">
                                    @error('mail_username')
                                    <div class="invalid-feedback">
                                        <strong>{{ $message }}</strong>
                                    </div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="mail_from_name">{{ __('Mail From Name') }}</label> <span
                                        class="text-danger">*</span>
                                    <input name="mail_from_name" id="mail_from_name" type="text"
                                        class="form-control @error('mail_from_name') is-invalid @enderror"
                                        value="{{ old('mail_from_name',$data->mail_from_name) }}">
                                    @error('mail_from_name')
                                    <div class="invalid-feedback">
                                        <strong>{{ $message }}</strong>
                                    </div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label>{{ __('Status') }}</label> <span class="text-danger">*</span>
                                    <select name="mail_disabled" id="mail_disabled"
                                        class="form-control @error('mail_disabled') is-invalid @enderror">
                                        <option value="1" {{ (old('mail_disabled') == 1) ? 'selected' : '' }}> {{ __('Enable') }}</option>
                                        <option value="0" {{ (old('mail_disabled') == 0) ? 'selected' : '' }}> {{ __('Disable') }}</option>
                                    </select>
                                    @error('mail_disabled')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="mail_port">{{ __('Mail Port') }}</label> <span class="text-danger">*</span>
                                    <input name="mail_port" id="mail_port" class="form-control @error('mail_port') is-invalid @enderror"
                                        value="{{ old('mail_port',$data->mail_from_name) }}">
                                    @error('mail_port')
                                    <div class="invalid-feedback">
                                        <strong>{{ $message }}</strong>
                                    </div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="mail_password">{{ __('Mail Password') }}</label> <span
                                        class="text-danger">*</span>
                                    <input name="mail_password" id="mail_password" type="text"
                                        class="form-control @error('mail_password') is-invalid @enderror"
                                        value="{{ old('mail_password',$data->mail_password) }}">
                                    @error('mail_password')
                                    <div class="invalid-feedback">
                                        <strong>{{ $message }}</strong>
                                    </div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="mail_from_address">{{ __('Mail From Address') }}</label>
                                    <span class="text-danger">*</span>
                                    <textarea name="mail_from_address" id="mail_from_address" cols="30" rows="2"
                                        class="form-control @error('mail_from_address') is-invalid @enderror">{{ old('mail_from_address',$data->mail_from_address) }}</textarea>
                                    @error('mail_from_address')
                                    <div class="invalid-feedback">
                                        <strong>{{ $message }}</strong>
                                    </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </fieldset>
                    <div class="row">
                        <div class="form-group col-md-6">
                            <button type="submit" class="btn btn-primary">
                                <span>{{ __('Update Email Setting') }}</span>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
