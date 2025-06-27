@extends('layout.master')
@section('content')
    <section class="section">
        <div class="section-body">
            <div class="row">
                <div class="col-12 col-sm-6 col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Visitor</h4>
                        </div>
                        <div class="card-body">
                           
                            <div class="tab-content tab-bordered" id="myTab3Content">

                                <div class="tab-pane fade  active show "
                                    id="profile2" role="tabpanel" aria-labelledby="profile-tab2">

                                    <div class="card">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-sm-12 ">
                                                    
                                                        {{ Form::open(['route' => 'visitors.store']) }}
                                                        @method('POST')
                                                
                                                    <div class="form-group row">
                                                        <label class="col-lg-2 col-form-label">First Name <span class="text-danger">*</span></label>
                                                        <div class="col-lg-10">
                                                            <input type="text" name="first_name" class="form-control " value="" required />
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <label class="col-lg-2 col-form-label">Last Name <span class="text-danger">*</span></label>
                                                        <div class="col-lg-10">
                                                            <input ntype="text" name="last_name"class="form-control " value=""  required/>
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <label class="col-lg-2 col-form-label">Email</label>
                                                        <div class="col-lg-10">
                                                            <input type="email" name="email" class="form-control " value=""  />
                                                        </div>
                                                    </div>
                                                    
                                                    
                                                     <div class="form-group row">
                                                        <label class="col-lg-2 col-form-label">Phone </label>
                                                        <div class="col-lg-10">
                                                            <input ype="text" name="phone" class="form-control " value=""  />
                                                        </div>
                                                    </div>
                                                    
                                                    
                                                     <div class="form-group row">
                                                        <label class="col-lg-2 col-form-label">Card Number</label>
                                                        <div class="col-lg-10">
                                                            <input type="text" name="national_identification_no" class="form-control " value=""  />
                                                        </div>
                                                    </div>


                                                    <div class="form-group row">
                                                        <div class="col-lg-offset-2 col-lg-12">
                                                                <button class="btn btn-sm btn-primary float-right m-t-n-xs"
                                                                    type="submit">Save</button>
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

