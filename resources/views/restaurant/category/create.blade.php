@extends('layout.master')

@push('plugin-styles')
    {!! Html::style('assets/css/tables/tables.css') !!}
	<link rel="stylesheet" href="{{ asset('assets/modules/summernote/summernote-bs4.css') }}">
@endpush

@section('content')
    <!--  Navbar Starts / Breadcrumb Area  -->
    <div class="sub-header-container">
        <header class="header navbar navbar-expand-sm">
            <a href="javascript:void(0);" class="sidebarCollapse" data-placement="bottom">
                <i class="las la-bars"></i>
            </a>
            <ul class="navbar-nav flex-row">
                <li>
                    <div class="page-header">
                        <nav class="breadcrumb-one" aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="javascript:void(0);">{{__('Starter')}}</a></li>
                                <li class="breadcrumb-item active" aria-current="page"><span>{{ __('restaurant.categories') }}</span></li>
                            </ol>
                        </nav>
                    </div>
                </li>
            </ul>
        </header>
    </div>
    <!--  Navbar Ends / Breadcrumb Area  -->
    <!-- Main Body Starts -->
    <div class="layout-px-spacing">
        <div class="layout-top-spacing mb-2">
            <div class="col-md-12">
                <div class="row">
                    <div class="container p-0">
                        <div class="row layout-top-spacing">
                            <div class="col-lg-12 layout-spacing">
                                {{-- new codes start --}}
								<section class="section">
									<div class="section-body">
										<div class="row">
											   <div class="col-12 col-md-12 col-lg-12">
												<div class="card">
													<form action="{{ route('category.store') }}" method="POST" enctype="multipart/form-data">
														@csrf
														<div class="card-body">
															<div class="form-row">
																<div class="form-group col">
																	<label>{{ __('levels.name') }}</label> <span class="text-danger">*</span>
																	<input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}">
																	@error('name')
																	<div class="invalid-feedback">
																		{{ $message }}
																	</div>
																	@enderror
																</div>
																@if(auth()->user()->myrole == 1)
																	<div class="form-group col">
																		<label>{{ __('levels.status') }}</label> <span class="text-danger">*</span>
																		<select name="status" class="form-control @error('status') is-invalid @enderror">
																			@foreach(trans('statuses') as $key => $status)
																				<option value="{{ $key }}" {{ (old('status') == $key) ? 'selected' : '' }}>{{ $status }}</option>
																			@endforeach
																		</select>
																		@error('status')
																		<div class="invalid-feedback">
																			{{ $message }}
																		</div>
																		@enderror
																	</div>
																@endif
															</div>
							
															<div class="form-row">
																<div class="form-group col">
																	<label for="customFile">{{ __('restaurant.category_image') }}</label>
																	<div class="custom-file">
																		<input name="image" type="file" class="custom-file-input @error('image') is-invalid @enderror" id="customFile" onchange="readURL(this);">
																		<label  class="custom-file-label" for="customFile">{{ __('levels.choose_file') }}</label>
																	</div>
																	@if ($errors->has('image'))
																		<div class="help-block text-danger">
																			{{ $errors->first('image') }}
																		</div>
																	@endif
							
																	<img class="img-thumbnail mt-4 mb-3 default-img img-width" id="previewImage" src="{{ asset('frontend/images/default/category.png') }}" alt="your image"/>
																</div>
							
																<div class="form-group col">
																	<label>{{ __('levels.description') }}</label>
																	<textarea name="description" class="summernote-simple form-control height-textarea @error('description') is-invalid @enderror" id="description" cols="30" rows="10">{{ old('description') }}</textarea>
																	@error('description')
																	<div class="invalid-feedback">
																		{{ $message }}
																	</div>
																	@enderror
																</div>
															</div>
														</div>
														
														<div class="card-footer">
															<button class="btn btn-primary mr-1" type="submit">{{ __('levels.submit') }}</button>
														  </div>
													</form>
												</div>
											</div>
										</div>
									</div>
								</section>
								{{-- new codes ends --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Main Body Ends -->
@endsection

@push('plugin-scripts')

@endpush

@push('custom-scripts')
<script src="{{ asset('assets/modules/summernote/summernote-bs4.js') }}"></script>
<script src="{{ asset('js/category/create.js') }}"></script>
@endpush