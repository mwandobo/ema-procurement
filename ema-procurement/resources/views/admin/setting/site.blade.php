@extends('admin.setting.index')


@section('admin.setting.layout')
<div class="col-md-9">
    <div class="card">
        <div class="card-body">
            <form class="form-horizontal" role="form" method="POST" action="{{ route('setting.site-update') }}"
                enctype="multipart/form-data">
                @csrf
                <?php

                  $data = App\Models\Setting::all()->last();

                ?>
                <fieldset class="setting-fieldset">
                    <legend class="setting-legend">{{ __('General Setting') }}</legend>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="site_name">{{ __('Site Name') }}</label>
                                <span class="text-danger">*</span>
                                <input name="site_name" id="site_name" type="text"
                                    class="form-control @error('site_name') is-invalid @enderror"
                                    value="{{ old('site_name',$data->site_name) }}" required>
                                @error('site_name')
                                <div class="invalid-feedback">
                                    <strong>{{ $message }}</strong>
                                </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="site_phone_number">{{ __('Site Phone Number') }}</label>
                                <span class="text-danger">*</span>
                                <input name="site_phone_number" id="site_phone_number" type="text"
                                    class="form-control @error('site_phone_number') is-invalid @enderror"
                                    value="{{ old('site_phone_number',$data->site_phone_number) }}" required>
                                @error('site_phone_number')
                                <div class="invalid-feedback">
                                    <strong>{{ $message }}</strong>
                                </div>
                                @enderror
                            </div>
                            
                             <div class="form-group">
                                <label for="site_address">{{ __('Site address') }}</label> <span
                                    class="text-danger">*</span>
                                <textarea name="site_address" id="site_address" cols="30" rows="3" required
                                    class="form-control small-textarea-height @error('site_address') is-invalid @enderror">{{ old('site_address',$data->site_address) }}</textarea>
                                @error('site_address')
                                <div class="invalid-feedback">
                                    <strong>{{ $message }}</strong>
                                </div>
                                @enderror
                            </div>



                          
                           

                            <div class="form-group">
                                <label for="customFile">{{ __('Site Logo') }}</label>
                                <div class="custom-file">
                                    <input name="site_logo" type="file"
                                        class="file-upload-input custom-file-input @error('site_logo') is-invalid @enderror"
                                        id="customFile" onchange="readURL(this);">
                                    <label class="custom-file-label"
                                        for="customFile">{{ __('Choose File') }}</label>
                                </div>
                                @error('site_logo')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror

                                
                             
                                
                                <img class="img-thumbnail image-width mt-4 mb-3" id="previewImage"
                                    src="{{ asset('images/$data->site_logo') }}" alt="{{ __('Visitor pass Logo') }}" />
                                
                            </div>


                        </div>

                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="site_email">{{ __('Site Email') }}</label> <span
                                    class="text-danger">*</span>
                                <input name="site_email" id="site_email"
                                    class="form-control @error('site_email') is-invalid @enderror"
                                    value="{{ old('site_email',$data->site_email) }}" required>
                                @error('site_email')
                                <div class="invalid-feedback">
                                    <strong>{{ $message }}</strong>
                                </div>
                                @enderror
                            </div>
                            
                             <div class="form-group">
                                <label for="site_address">{{ __('Site TIN') }}</label>
                              <input name="tin" id="tin"
                                    class="form-control @error('tin') is-invalid @enderror"
                                    value="{{ old('tin',$data->tin) }}">
                                @error('tin')
                                <div class="invalid-feedback">
                                    <strong>{{ $message }}</strong>
                                </div>
                                @enderror
                            </div>


                           
                            <div class="form-group">
                                <label for="site_description">{{ __('Description') }}</label> 
                                <textarea name="site_description" id="site_description" cols="30" rows="3"
                                    class="form-control small-textarea-height @error('site_description') is-invalid @enderror">{{ old('site_description',$data->site_description) }}</textarea>
                                @error('site_description')
                                <div class="invalid-feedback">
                                    <strong>{{ $message }}</strong>
                                </div>
                                @enderror
                            </div>
                            
                              <div class="form-group">
                                <label for="site_footer">{{ __('Site Footer') }}</label> 
                                <input name="site_footer" id="site_footer"
                                    class="form-control @error('site_footer') is-invalid @enderror"
                                    value="{{ old('site_footer',$data->site_footer) }}">
                                @error('site_footer')
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

@section('scripts')
    <script src="{{ asset('assets/modules/select2/dist/js/select2.full.min.js') }}"></script>
    <script src="{{ asset('assets/modules/summernote/summernote-bs4.js') }}"></script>
    <script src="{{ asset('assets/modules/bootstrap-datepicker/js/bootstrap-datepicker.min.js') }}"></script>
    <script src="{{ asset('assets/modules/bootstrap-timepicker/js/bootstrap-timepicker.min.js') }}"></script>
    <script src="{{ asset('js/preregister/create.js') }}"></script>
@endsection
