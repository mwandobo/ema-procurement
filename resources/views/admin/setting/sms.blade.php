@extends('admin.setting.index')



@section('admin.setting.layout')
     <div class="col-md-9">
        <div class="card">
            <div class="card-body">
                <form class="form-horizontal" role="form" method="POST" action="{{ route('setting.sms-update') }}">
                    @csrf
                    <?php

$data = App\Models\Setting::all()->last();

?>
                    <fieldset class="setting-fieldset">
                        <legend class="setting-legend">{{ __('SMS Setting') }}</legend>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="twilio_auth_token">{{ __('Twilio Auth Token') }}</label> <span
                                        class="text-danger">*</span>
                                    <input name="twilio_auth_token" id="twilio_auth_token" type="text"
                                        class="form-control {{ $errors->has('twilio_auth_token') ? ' is-invalid ' : '' }}"
                                        value="{{ old('twilio_auth_token',$data->twilio_auth_token) }}">
                                    @if ($errors->has('twilio_auth_token'))
                                    <div class="invalid-feedback">
                                        {{ $errors->first('twilio_auth_token') }}
                                    </div>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="twilio_from">{{ __('Twilio From') }}</label> <span
                                        class="text-danger">*</span>
                                    <input name="twilio_from" id="twilio_from" type="text"
                                        class="form-control {{ $errors->has('twilio_from') ? ' is-invalid ' : '' }}"
                                        value="{{ old('twilio_from',$data->twilio_from) }}">
                                    @if ($errors->has('twilio_from'))
                                    <div class="invalid-feedback">
                                        {{ $errors->first('twilio_from') }}
                                    </div>
                                    @endif
                                </div>
                            </div>
                            
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="twilio_account_sid">{{ __('Twilio Accounts id') }}</label>
                                    <span class="text-danger">*</span>
                                    <input name="twilio_account_sid" id="twilio_account_sid" type="text"
                                        class="form-control {{ $errors->has('twilio_account_sid') ? ' is-invalid ' : '' }}"
                                        value="{{ old('twilio_account_sid',$data->twilio_account_sid) }}">
                                    @if ($errors->has('twilio_account_sid'))
                                    <div class="invalid-feedback">
                                        {{ $errors->first('twilio_account_sid') }}
                                    </div>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label>{{ __('Status') }}</label> <span class="text-danger">*</span>
                                    <select name="twilio_disabled" id="twilio_disabled"
                                        class="form-control @error('twilio_disabled') is-invalid @enderror">
                                        <option value="1" {{ (old($data->twilio_disabled) == 1) ? 'selected' : '' }}> {{ __('Enable') }}</option>
                                        <option value="0" {{ (old($data->twilio_disabled) == 0) ? 'selected' : '' }}> {{ __('Disable') }}</option>
                                    </select>
                                    @error('twilio_disabled')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </fieldset>
                    <div class="row">
                        <div class="form-group col-md-6">
                            <button class="btn btn-primary">
                                <span>{{ __('Update') }}</span>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

