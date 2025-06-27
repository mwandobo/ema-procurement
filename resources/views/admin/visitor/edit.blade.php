@extends('layout.master')



@section('content')

    <section class="section">
<div class="section-body">
            <div class="row">
                <div class="col-12 col-sm-12 col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Edit Visitor</h4>
                        </div>
                        <div class="card-body">
                           
                            <div class="tab-content tab-bordered" id="myTab3Content">

                                <div class="tab-pane fade  active show "
                                    id="profile2" role="tabpanel" aria-labelledby="profile-tab2">

                                    <div class="card">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-sm-12 ">
                                                    
                                             {{ Form::open(['route' => 'visitors.visitor_update']) }}
                                                        @method('POST')
                                                        
                                             <input type="hidden" name="id" class="form-control " value="{{$visitingDetails->id }}" required />            
                                                
                                            <div class="form-group row">
                                                <label class="col-lg-2 col-form-label">First Name <span class="text-danger">*</span></label>
                                                <div class="col-lg-10">
                                            <input type="text" name="first_name" class="form-control " value="{{ old('first_name',$visitingDetails->visitor->first_name) }}" required />
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label class="col-lg-2 col-form-label">Last Name <span class="text-danger">*</span></label>
                                                <div class="col-lg-10">
                                                    <input ntype="text" name="last_name"class="form-control " value="{{ old('first_name',$visitingDetails->visitor->last_name) }}"  required/>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label class="col-lg-2 col-form-label">Email</label>
                                                <div class="col-lg-10">
                                                    <input type="email" name="email" class="form-control " value="{{ old('first_name',$visitingDetails->visitor->email) }}"  />
                                                </div>
                                            </div>
                                            
                                            
                                             <div class="form-group row">
                                                <label class="col-lg-2 col-form-label">Phone <span class="text-danger">*</span></label>
                                                <div class="col-lg-10">
                                                    <input ype="text" name="phone" class="form-control " value="{{ old('phone',$visitingDetails->visitor->phone) }}" required />
                                                </div>
                                            </div>
                                            
                                            
                                             <div class="form-group row">
                                                <label class="col-lg-2 col-form-label">Card Number</label>
                                                <div class="col-lg-10">
                                            <input type="text" name="national_identification_no" class="form-control" value="{{ old('first_name',$visitingDetails->visitor->national_identification_no) }}"  />
                                                </div>
                                            </div>


                                                    <div class="form-group row">
                                                        <div class="col-lg-offset-2 col-lg-12">
                                                                <button class="btn btn-sm btn-primary float-right m-t-n-xs"
                                                                    type="submit">Update</button>
                                                        </div>
                                                    </div>
                                                    {!! Form::close() !!}
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>

@endsection
