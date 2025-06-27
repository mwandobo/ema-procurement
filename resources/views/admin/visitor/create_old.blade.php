@extends('layout.master')

@section('title') Add Visitor @endsection

@section('content')

<section class="section">
    <div class="section-body">
       
        <div class="row">
            <div class="col-12 col-sm-6 col-lg-12">
                <div class="card">
                 <div class="card-header header-elements-sm-inline">
								<h4 class="card-title"> Add Visitor</h4>
								<div class="header-elements">
								   
                             
                     <a href="{{route('visitors.index')}}" class="btn btn-secondary btn-xs px-4">
                                <i class="fa fa-arrow-alt-circle-left"></i>
                                Back
                            </a>
									
				                	</div>
			                	
							</div>

                  
                    <div class="card-body">
                   
                        <div class="tab-content tab-bordered" id="myTab3Content">
                            <div class="tab-pane fade @if(empty($id)) active show @endif" id="home2" role="tabpanel"
                                aria-labelledby="home-tab2"
                            <form action="{{ route('visitors.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                                <div class="form-row">
                                    <div class="form-group col">
                                        <label for="first_name">{{ __('first name') }}</label> <span class="text-danger">*</span>
                                        <input id="first_name" type="text" name="first_name" class="form-control {{ $errors->has('first_name') ? " is-invalid " : '' }}" value="{{ old('first_name') }}">
                                        @error('first_name')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                    <div class="form-group col">
                                        <label for="last_name">{{ __('last name') }}</label> <span class="text-danger">*</span>
                                        <input id="last_name" type="text" name="last_name" class="form-control {{ $errors->has('last_name') ? " is-invalid " : '' }}" value="{{ old('last_name') }}" required>
                                       
                                    </div>

                                </div>
                                <div class="form-row">
                                    <div class="form-group col">
                                        <label>{{ __('email address') }}</label> 
                                        <input type="text" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}">
                                        
                                    </div>
                                    <div class="form-group col">
                                        <label>{{ __('phone') }}</label> <span class="text-danger">*</span>
                                        <input type="text" name="phone" class="form-control @error('phone') is-invalid @enderror" value="{{ old('phone') }}">
                                       
                                    </div>
                                </div>
                               
                                  

                                <div class="form-row">
                                    <div class="form-group col">
                                        <label>{{ __('card no') }}</label>
                                        <input type="text" name="national_identification_no" class="form-control @error('national_identification_no') is-invalid @enderror" value="{{ old('national_identification_no') }}">
                                       
                                    </div>
                                
                                </div>
                                <div class="form-row">
                                
                                
                            </div>

                             <div class="ibox-footer">
                <div class="row justify-content-end mr-1">
                                <button class="btn btn-primary mr-1" type="submit">{{ __('submit') }}</button>
                                
                            </div></div>
                        </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>


<!-- Main Body Ends -->
@endsection

<!-- push external js if any -->
@push('plugin-scripts')
{!! Html::script('assets/js/loader.js') !!}
{!! Html::script('plugins/table/datatable/datatables.js') !!}
<!--  The following JS library files are loaded to use Copy CSV Excel Print Options-->
{!! Html::script('plugins/table/datatable/button-ext/dataTables.buttons.min.js') !!}
{!! Html::script('plugins/table/datatable/button-ext/jszip.min.js') !!}
{!! Html::script('plugins/table/datatable/button-ext/buttons.html5.min.js') !!}
{!! Html::script('plugins/table/datatable/button-ext/buttons.print.min.js') !!}
<!-- The following JS library files are loaded to use PDF Options-->
{!! Html::script('plugins/table/datatable/button-ext/pdfmake.min.js') !!}
{!! Html::script('plugins/table/datatable/button-ext/vfs_fonts.js') !!}
@endpush


