@extends('frontend.layouts.app')
@section('main-content')
    <div class="container-fluid margin-top-20">
        <div class="row sticky-wrapper">
            @include('frontend.account.partials._sidebar')
            <section class="col-lg-8 col-md-8 padding-left-30">
                <h4 class="headline margin-top-0 margin-bottom-30">{{ __('frontend.profile') }}</h4>
                <!-- Profile form-->
                <form action="{{ route('account.profile.update', $user) }}" method="POST"
                      enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="row gx-4 gy-3">
                        <div class="form-group col-md-6">
                            <label>{{ __('frontend.first_name') }} <span
                                class="text-danger">*</span></label>
                            <input type="text" name="first_name"
                                   class="form-control @error('first_name') is-invalid @enderror"
                                   value="{{ old('first_name', $user->first_name) }}">
                            @error('first_name')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group col-md-6">
                            <label>{{ __('frontend.last_name') }} <span
                                class="text-danger">*</span></label>
                            <input type="text" name="last_name"
                                   class="form-control @error('last_name') is-invalid @enderror"
                                   value="{{ old('last_name', $user->last_name) }}">
                            @error('last_name')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>

                    <div class="row gx-4 gy-3">
                        <div class="form-group col-md-6">
                            <label>{{ __('frontend.email') }} <span class="text-danger">*</span></label>
                            <input type="email" name="email"
                                   class="form-control @error('email') is-invalid @enderror"
                                   value="{{ old('email', $user->email) }}">
                            @error('email')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group col-md-6">
                            <label>{{ __('frontend.phone') }}</label>
                            <input type="text" name="phone" class="form-control @error('phone') is-invalid @enderror"
                                   value="{{ old('phone', $user->phone) }}" onkeypress='validate(event)'>
                            @error('phone')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                    </div>

                    <div class="row gx-4 gy-3">
                        <div class="form-group col-md-6">
                            <label>{{ __('frontend.username') }}</label>
                            <input type="text" name="username"
                                   class="form-control @error('username') is-invalid @enderror"
                                   value="{{ old('username', $user->username) }}">
                            @error('username')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                    <div class="row gx-4 gy-3">
                        <div class="form-group col-md-6">
                            <label>{{ __('frontend.address') }}</label>
                            <textarea name="address" class="form-control small-textarea-height"
                                      id="address" cols="1"
                                      rows="1">{{ old('address', $user->address) }}</textarea>
                            @error('address')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                    <div class="row gx-4 gy-3">
                        <div class="form-group col-md-6">
                            <label for="customFile">{{ __('frontend.image') }}</label>
                            <div class="custom-file">
                                <input name="image" type="file"
                                       class="custom-file-input @error('image') is-invalid @enderror"
                                       id="customFile" onchange="readURL(this);">
                            </div>
                            @if ($errors->has('image'))
                                <div class="help-block text-danger">
                                    {{ $errors->first('image') }}
                                </div>
                            @endif
                            <img class="img-thumbnail image-width mt-4 mb-3" id="previewImage"
                                 src="{{ $user->image }}"
                                 alt="{{ $user->name }} profile image" />
                        </div>
                    </div>

                    <div class="form-row margin-top-10">
                        <div class="form-group col">
                            <button type="submit" class="button medium border"><i class="sl sl-icon-docs"></i> {{ __('frontend.update_profile') }}</button>
                        </div>
                    </div>
                </form>
            </section>
        </div>
    </div>
@endsection
@section('extra-js')
    <script src="{{ asset('js/profile/index.js') }}"></script>
    <script src="{{ asset('js/phone_validation/index.js') }}"></script>
@endsection
