@extends('frontend.layouts.app')
@section('main-content')
    <div class="container-fluid margin-top-20">
        <div class="row sticky-wrapper">
            @include('frontend.account.partials._sidebar')
            <section class="col-lg-8 col-md-8 padding-left-30">
                <h4 class="headline margin-top-0 margin-bottom-30">{{__('frontend.change_password')}}</h4>
                <form method="post" action="{{ route('account.password.update') }}">
                    @csrf
                    @method('put')

                    <div class="card-body">
                        <div class="row">
                            <div class="form-group col-md-6 col-6">
                                <label for="old_password">{{ __('frontend.old_password') }} <span
                                        class="text-danger">*</span></label>
                                <input id="old_password" name="old_password" type="password"
                                       class="form-control @error('old_password') is-invalid @enderror">
                                @error('old_password')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="form-group col-md-6 col-6">
                                <label for="password">{{ __('frontend.password') }} <span
                                        class="text-danger">*</span></label>
                                <input id="password" name="password" type="password"
                                       class="form-control @error('password') is-invalid @enderror" />
                                @error('password')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="form-group col-md-6 col-6">
                                <label
                                    for="password_confirmation">{{ __('frontend.password_confirmation') }}  <span class="text-danger">*</span></label>
                                <input id="password_confirmation" name="password_confirmation"
                                       type="password"
                                       class="form-control @error('password_confirmation') is-invalid @enderror" />
                                @error('password_confirmation')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="form-row margin-top-8 col-md-12">
                                <div class="form-group col-md-12">
                                    <button type="submit" class="button medium border"><i class="sl sl-icon-docs"></i> {{__('frontend.update_password')}}</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>

            </section>
        </div>
    </div>
@endsection
