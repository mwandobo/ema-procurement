@extends('layout.master')

@push('plugin-styles')

<style>

.help-block {
  color:red;

}
.has-error {
  background-color:#f8d7da;

}

</style>

@endpush


@section('content')
<section class="section">
    <div class="section-body">
        <div class="row">
            <div class="col-12 col-sm-6 col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Member - Dependant Information</h4>
                    </div>



<!-- Main Body Starts -->
<div class="card-body">

<div class="row">
<div class="col-sm-12 ">

                                                                    <p>
                                                                        @if ($errors->any())
                                                                    <div class="alert alert-danger">
                                                                        <ul>
                                                                            @foreach ($errors->all() as $error)
                                                                            <li>{{ $error }}</li>
                                                                            @endforeach

                                                                        </ul>
                                                                    </div>
                                                                    @endif
                                                                    </p>


                                                               
                                                                                            <p class="">*- Fill all required fields</p><br>
                                                                        
                                                                       <form id="msform" name="msform"
                                                                                action="{{route('member_dependent_update', $data->id)}}"
                                                                                enctype="multipart/form-data"
                                                                                method="POST">
                                                                                @csrf
                                                                                @method('PUT')
                                                                                     
                                                                                        <div class="row">
                                                                                            <div class="col-md-6">
                                                                                                <label
                                                                                                    class="pay">
                                                                                                    Name*</label>
                                                                                                <input type="text"
                                                                                                    name="name"
                                                                                                    value="{{ !empty($data) ? $data->name : ''}}"
                                                                                                    class="form-control mb-3" required/>
                                                                                            </div>
                                                                                            <div class="col-md-6">
                                                                                                <label
                                                                                                    class="pay">Date of Birth *</label>
                                                                                                <input type="date"
                                                                                                    name="birth_date"
                                                                                                    value="{{ !empty($data) ? $data->birth_date : ''}}"
                                                                                                    class="form-control mb-3" required />
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="row">
                                                                                            <div class="col-md-6">
                                                                                                <label
                                                                                                    class="pay">Gender*</label>
                                                                                           <select class="form-control m-b" name="gender"  required  id="main">
                                                                                            <option value="">Select</option>
                                                                                           <option  value="Male"  @if(isset($data))@if($data->gender == 'Male') selected @endif @endif>Male</option>
                                                                                           <option value="Female" @if(isset($data))@if($data->gender == 'Female') selected @endif @endif>Female</option>
                                                                                                  </select>
                                                                                               
                                                                                            </div>
                                                                                            
                                                                                              <div class="col-md-6">
                                                                                                <label
                                                                                                    class="pay">Profile Picture</label>
                                                                                                <input type="file"
                                                                                                name="picture"
                                                                                                value="{{$member->picture }}"
                                                                                                class="form-control"
                                                                                                onchange="loadBigFile(event)"><br>
                                                                                            <img src="{{url('assets/img/member_pasport_size')}}/{{!empty($member->picture)? $member->picture : '' }}"
                                                                                                alt="{{$member->picture}}"
                                                                                                width="100" id="big_output">
                                                                                            </div>
                                                                                        </div>

                                                                             <div class="form-group row">
                                                    <div class="col-lg-offset-2 col-lg-12">
                                                        
                                                                                    <input type="submit"
                                                                                        name="make_payment2"
                                                                                        id="saveButton2"
                                                                                        class=" action-button btn btn-primary float-right m-t-n-xs"
                                                                                        value="Update" />
                                                                                
                                                                                   
                                                    </div>
                                                </div>
                                                                                  

                                                                            </form>


                                                                       </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</section>




<!-- Main Body Ends -->
@endsection


@section('scripts')
<script>
  var loadBigFile=function(event){
    var output=document.getElementById('big_output');
    output.src=URL.createObjectURL(event.target.files[0]);
  };
</script>

@endsection