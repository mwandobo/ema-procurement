@extends('layout.master')



@section('content')
<section class="section">
    <div class="section-body">
        <div class="row">
            <div class="col-12 col-sm-12 col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4>All Members </h4>
                    </div>
                    <div class="card-body">
                        <ul class="nav nav-tabs" id="myTab2" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link @if(empty($id)) active show @endif" id="home-tab2" data-toggle="tab"
                                    href="#home" role="tab" aria-controls="home" aria-selected="true">Member
                                    List</a>
                            </li>
                            
                            <li class="nav-item">
                            <a class="nav-link" id="home-tab2" data-toggle="tab"
                                    href="#home4" role="tab" aria-controls="home" aria-selected="true">Non Issued Member ID List
                                   </a>
                            </li>
                            
                       <li class="nav-item">
                                <a class="nav-link @if(!empty($id)) active show @endif" id="home-tab2" data-toggle="tab"
                                    href="#home2" role="tab" aria-controls="home" aria-selected="true">Create Member
                                   </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="home-tab2" data-toggle="tab" href="#home3" role="tab"
                                    aria-controls="home" aria-selected="true">Import Member
                                </a>
                            </li>


                        </ul>
                        <div class="tab-content tab-bordered" id="myTab3Content">
                            <div class="tab-pane fade @if(empty($id)) active show @endif" id="home" role="tabpanel"
                                aria-labelledby="home-tab2">
                                <div class="table-responsive">
                                    <table class="table datatable-basic table-striped">
                                        <thead>
                                            <tr>
                                                <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0"
                                                    rowspan="1" colspan="1"
                                                    aria-label="Browser: activate to sort column ascending"
                                                    style="width: 28.531px;">#</th>
                                                <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0"
                                                    rowspan="1" colspan="1"
                                                    aria-label="Platform(s): activate to sort column ascending"
                                                    style="width: 200.484px;">Full Name</th>
                                                <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0"
                                                    rowspan="1" colspan="1"
                                                    aria-label="Platform(s): activate to sort column ascending"
                                                    style="width: 250.484px;">Membership Class</th>  <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0"
                                                    rowspan="1" colspan="1"
                                                    aria-label="Platform(s): activate to sort column ascending"
                                                    style="width: 120.484px;">Membership ID</th>

                                                <!--<th class="sorting" tabindex="0" aria-controls="DataTables_Table_0"
                                                    rowspan="1" colspan="1"
                                                    aria-label="Platform(s): activate to sort column ascending"
                                                    style="width: 120.484px;">Email</th> -->

                                                    <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0"
                                                    rowspan="1" colspan="1"
                                                    aria-label="Platform(s): activate to sort column ascending"
                                                    style="width: 100.484px;">Due Date</th>



                                                <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0"
                                                    rowspan="1" colspan="1"
                                                    aria-label="CSS grade: activate to sort column ascending"
                                                    style="width: 98.1094px;">Actions</th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            @if(!@empty($list))
                                            @foreach ($list as $row)
                                            <tr class="gradeA even" role="row">
                                                <th>{{ $loop->iteration }}</th>
                                                <td>{{$row->full_name}}</td>


                                                <?php $result =  App\Models\Visitors\Visitor::find($row->owner_id); ?>

                                                <?php $balance =  App\Models\Cards\TemporaryDeposit::where('visitor_id',$row->owner_id)->where('card_id',$row->id)->get()->sum('debit'); ?>


                                                <td>{{!empty($row->membership_types)? $row->membership_types->name : '' }} {{ isset($row->membership_types->class) ?  '- '. $row->membership_types->class : ''}}
                                                </td>

                                                <td>{{$row->member_id}}</td>

                                                <!-- <td>{{$row->email}}</td> -->

                                                <td><?php echo date("d/m/Y", strtotime($row->due_date)); ?></td>

                                                <td>
                                                 <div class="form-inline">
                                                     <div class="dropdown">
						<a href="#" class="list-icons-item dropdown-toggle text-teal" data-toggle="dropdown"><i class="icon-cog6"></i></a>
                                                                <div class="dropdown-menu">
                                                    <a class="nav-link" title="View More"
                                                        href="{{ route('manage_member.show', $row->id)}}">View
                                                        Details
                                                    </a>
                                                    
                                                    <a class="nav-link" title="Change Password"
                                                        href="{{ route('member.change_password', $row->id)}}">Change Password
                                                    </a>
                                                    
                                                      @if(auth()->user()->id == 595)
                                                     <a class="nav-link" title="Delete" onclick="return confirm('Are you sure?')"
                                                        href="{{ route('member.disable', $row->id)}}">Delete
                                                    </a>
                                                    @endif
                                                    
                                                   {{-- <a class="nav-link" title="Approve"
                                                        href="{{ route('manage_member.edit', $row->id)}}">Approve
                                                    </a>--}}
                                                      
                                                    @if($row->status == 1)
                                                      <a class="nav-link" title="Deposit"
                                                        href="{{ route('member.deposit', $row->id)}}">Deposit
                                                    </a>

                                                            <a class="nav-link" title="Deposit"
                                                        href="{{ route('transaction_list', $row->id)}}">Transaction List
                                                    </a>
                                                    
                                                    

                                                                @if($row->is_dependant == 0)
                                                            <a class="nav-link" title="Adjust Due Date"
                                                                data-toggle="modal" href=""  value="{{ $row->id}}" data-type="date" data-target="#appFormModal"
                                                                onclick="model({{ $row->id }},'date')">Adjust Due Date
                                                                    </a>                          

                                                                      @if($row->adjusted_date != ''  )
                                                                          @can('approve-due-date')
                                                                   <a class="nav-link" id="profile-tab2"
                                                                        href="{{ route('member.approve_date',$row->id)}}"
                                                                        role="tab"
                                                                        aria-selected="false" onclick="return confirm('Are you sure?')">Approve Adjustment 
                                                                            </a>
                                                                           @endcan
                                                                            @endif @endif

                                                                        @endif
                                                     </div>
                                                     
                                                       </div>
					                			</div>
                                                </td>
                                            </tr>
                                            @endforeach

                                            @endif

                                        </tbody>
                                    </table>
                                </div>

                            </div>
                            
                            
                             <div class="tab-pane fade" id="home4" role="tabpanel"
                                aria-labelledby="home-tab2">
                                <div class="table-responsive">
                                    <table class="table datatable-basic table-striped">
                                        <thead>
                                            <tr role="row">

                                                <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0"
                                                    rowspan="1" colspan="1"
                                                    aria-label="Browser: activate to sort column ascending"
                                                    style="width: 30.531px;">#</th>
                                                <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0"
                                                    rowspan="1" colspan="1"
                                                    aria-label="Platform(s): activate to sort column ascending"
                                                    style="width: 160.484px;">Full Name</th>
                                                <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0"
                                                    rowspan="1" colspan="1"
                                                    aria-label="Platform(s): activate to sort column ascending"
                                                    style="width: 100.484px;">Membership Type</th>
                                                <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0"
                                                    rowspan="1" colspan="1"
                                                    aria-label="CSS grade: activate to sort column ascending"
                                                    style="width: 105.1094px;">Actions</th>    
                                               
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @if(!@empty($non_member_ids))
                                            @foreach ($non_member_ids as $row)
                                            <tr class="gradeA even" role="row">
                                                <th>{{ $loop->iteration }}</th>
                                                <td>{{$row->full_name}} </td>
                                                <td>
                                                {{$row->membership_types->name}} {{ isset($row->membership_types->class) ?  '- '. $row->membership_types->class : ''}}
                                                </td>
                                                                 <td>
                                                                 {!! Form::open(['route' => ['member_list.updateMemberId',$row->id], 'method' => 'POST']) !!}
                                                                 @csrf
                                                                 @method('PUT')
                                                    <div class="form-inline">

                                                        
                                                        <input type="text" name="member_id" required placeholder="Enter Member ID Here" class="form-control mb-3"  />
                                                        &nbsp;
                                                         &nbsp;
                                                      &nbsp;
                                                        
                                                        <button class="btn btn-sm btn-primary form-control"  type="submit">Save Member ID</button>
                                                                                                    
                                                     
                                                    </div>
                                                    
                                                    {{ Form::close() }}

                                </td>
                                        
                                </tr>
                                @endforeach

                                @endif

                                </tbody>
                                </table>
                            </div>
                        </div>


                          <div class="tab-pane fade @if(!empty($id)) active show @endif" id="home2" role="tabpanel"
                                aria-labelledby="home-tab2">
                                <div class="card">
                                <div class="card-header">
                                    @if(!empty($id))
                                            <h5>Edit Member</h5>
                                            @else
                                            <h5>Add New Member</h5>
                                            @endif

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

                                 
                                </div>

                               

                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-sm-12 ">
                                            
                                                 @if(isset($id))
                                                    <form id="msform" name="msform"
                                                                                action="{{route('member_reg_admin_updates', $data->id)}}"
                                                                                enctype="multipart/form-data"
                                                                                method="POST">
                                                                                @csrf
                                                                                @method('PUT')
                                                                        @else
                                                                        <form id="msform" name="msform"
                                                                                action="{{route('member_reg_admin')}}"
                                                                                enctype="multipart/form-data"
                                                                                method="POST">
                                                                                @csrf
                                                    @endif


<div class="row">

                                                                                            <div class="col-md-6">
                                                                                                <label class="pay">Full
                                                                                                    Name*</label>
                                                                                                <input type="text"
                                                                                                    name="full_name"
                                                                                                    id="full_name"
                                                                                                    required
                                                                                                    placeholder="Full Name"
                                                                                                    value="{{ !empty($data) ? $data->full_name : ''}}"
                                                                                                    class="form-control mb-3 @error('full_name') is-invalid @enderror"  />
                                                                                                    @error('full_name')
                                                                                                    <div
                                                                                                        class="alert alert-danger">
                                                                                                        {{ $message }}</div>
                                                                                                    @enderror
                                                                                            </div>
                                                                                            
                                                                                             <div class="col-md-6">
                                                                                                <label class="pay">
                                                                                                    Member ID*</label>

                                                                                                    @if(!empty(auth()->user()->member_id))
                                                                                                       <input type="text"
                                                                                                    name="member_id"
                                                                                                    required
                                                                                                    id="member_id"
                                                                                                    placeholder="Member ID"
                                                                                                    value="{{ !empty($data) ? $data->member_id : ''}}"
                                                                                                    class="form-control mb-3"  readonly/>
                                                                                                       @else
                                                                                                <input type="text"
                                                                                                    name="member_id"
                                                                                                    required
                                                                                                    id="member_id"
                                                                                                    placeholder="Member ID"
                                                                                                    value="{{ !empty($data) ? $data->member_id : ''}}"
                                                                                                    class="form-control mb-3 @error('member_id') is-invalid @enderror"  />
                                                                                                    @error('member_id')
                                                                                                    <div
                                                                                                        class="alert alert-danger">
                                                                                                        {{ $message }}</div>
                                                                                                    @enderror
                                                                                            
                                                                                                     @endif
                                                                                        </div>
                                                                                        </div>


                                                                                        
                                                                                        <div class="row">
                                                                                        
                                                                                        <div class="col-md-6">
                                                                                        <label class="pay">Select Type
                                                                                            of
                                                                                            Membership*</label>
                                                                                        <select
                                                                                            class="m-b form-control membership_class"
                                                                                            name="membership_class" required>
                                                                                            <option value="">Select
                                                                                                Class of Membership
                                                                                            </option>
                                                                                            @if(!empty($membership_type))
                                                                                                    @foreach($membership_type as $row)
                         <option value="{{$row->id}}" @if(isset($data)) {{ $data->membership_class == $row->id  ? 'selected' : ''}}  @endif>{{$row->name}} {{ isset($row->class) ?  '- '. $row->class : ''}}</option>
                                                                                                   @endforeach
                                                                                                 @endif
                                                                                        </select>
                                                                                    </div>
                                                                                    
                                                                                        
                                                                                            <div class="col-md-6">
                                                                                                <label
                                                                                                    class="pay">Nationality*</label>
                                                                                                  <select  id="nationality" name="nationality" class=" m-b form-control ">
                                                                                                  <option value ="">Select Nationality</option>
                                                                                                                     @if(!empty($country))
                                                                                                                    @foreach($country as $row)
                                                                                                                    <option @if(isset($data)) {{ $data->nationality == $row->name  ? 'selected' : ''}}  @endif value="{{$row->name}}">{{$row->name}}</option>
                                                                                                                    @endforeach
                                                                                                                    @endif
                                                                                                                </select>
                                                                                            </div>
                                                                                             </div>
                                                                                            <br>

                                                                              <input type="hidden" class="form-control cor"  value="{{ $corp->id}}">
                                                                                                       
                                                                                                        

                                                                                      @if(!empty($data->corporate_name))
                                                                                         <div class="row" id="corporate">
                                                                                            <div class="col-md-12">
                                                                                               <label class="">
                                                                                                   Corporate Name *</label>
                                                                                                    <input type="text"
                                                                                                        name="corporate_name" value="{{ !empty($data) ? $data->corporate_name : ''}}"
                                                                                                        placeholder=" Corporate Name"
                                                                                                        class="form-control" />
                                                                                                </div>
                                                                                                                                                                                     
                                                                                            </div>                                                                                      

                                                                                         @else
                                                                                          <div class="row" id="corporate" style="display:none;">
                                                                                            <div class="col-md-12">
                                                                                               <label class="">
                                                                                                   Corporate Name *</label>
                                                                                                    <input type="text"
                                                                                                        name="corporate_name" value="{{ !empty($data) ? $data->corporate_name : ''}}"
                                                                                                        placeholder=" Corporate Name"
                                                                                                        class="form-control" />
                                                                                                </div>
                                                                                                                                                                                     
                                                                                            </div>
                                                                                           @endif

                                                                                       <br>
                                                                                     
                                                                                        <div class="row">
                                                                                            <div class="col-md-6">
                                                                                                <label class="pay">Birth
                                                                                                    Date</label>
                                                                                                <input type="date"
                                                                                                    name="d_o_birth"
                                                                                                    value="{{ !empty($data) ? $data->d_o_birth : ''}}"
                                                                                                    placeholder=""
                                                                                                    class="form-control mb-3"
                                                                                                    rows="3">

                                                                                            </div>
                                                                                            <div class="col-md-6">
                                                                                                <label>{{__('Gender')}}</label>
                                                                                                <div
                                                                                                    class="custom-radio-1">
                                                                                                    <label for="rdo-1"
                                                                                                        class="btn-radio">
                                                                                                        <input
                                                                                                            type="radio"
                                                                                                            value="Male"
                                                                                                            {{(!empty($data))?($data->gender=='Male')?'checked':'':''}}
                                                                                                            id="rdo-1"
                                                                                                            name="gender">
                                                                                                       
                                                                                                        <span>{{__('Male')}}</span>&nbsp&nbsp
                                                                                                    </label>
                                                                                                    <label for="rdo-2"
                                                                                                        class="btn-radio">
                                                                                                        <input
                                                                                                            type="radio"
                                                                                                            value="Female"
                                                                                                            {{(!empty($data))?($data->gender=='Female')?'checked':'':''}}
                                                                                                            id="rdo-2"
                                                                                                            name="gender">
                                                                                                        
                                                                                                        <span>{{__('Female')}}</span>
                                                                                                    </label>
                                                                                                </div>
                                                                                            </div></div>
                                                                                        

                                                                                         <div class="row">
                                                                                            <div class="col-md-6">
                                                                                               <label class="">
                                                                                                   Contact No *</label>
                                                                                                    <input type="text"
                                                                                                        name="phone1" value="{{ !empty($data) ? $data->phone1 : ''}}"
                                                                                                        placeholder="Contact No1."
                                                                                                        class="form-control" />
                                                                                                </div>
                                                                                           
                                                                                            <div class="col-md-6">
                                                                                                <label class="">
                                                                                                   Other Contact No </label>
                                                                                                    <input type="text"
                                                                                                        name="phone2" value="{{ !empty($data) ? $data->phone2 : ''}}"
                                                                                                        placeholder="Other Contacts"
                                                                                                        class="form-control" />
                                                                                                </div>
                                                                                            </div>
                                                                                       
                                                                                  <br>

                                                                                     <div class="row">
                                                                                        <div class="col-md-6">
                                                                                                <label class="">
                                                                                                    Email*</label>
                                                                                            <input type="text"
                                                                                                name="email" 
                                                                                                value="{{ !empty($data) ? $data->email : ''}}"
                                                                                                class="form-control email"
                                                                                                placeholder="Email">
                                                                                       
                                                                                        <div class=""> <p class="form-control-static" id="errors" style="text-align:center;color:red;"></p>   </div>
                                                                                        </div>
                                                                                        <div class="col-md-6">
                                                                                                <label
                                                                                                    class="pay">Address</label>
                                                                                                <textarea type="text"
                                                                                                    name="address"
                                                                                                    
                                                                                                    placeholder=""
                                                                                                    class="form-control mb-3"
                                                                                                    rows="3">{{ !empty($data) ? $data->address : ''}}</textarea>

                                                                                            </div> </div>

                                                                                     <br>
                                                                                    
                                                                                     <div class="row">
                                                                                        
                                                                                        <div class="col-md-6">
                                                                                        <label class="pay">Select Whether
                                                                                            You Have Dependant Or Not
                                                                                            </label>
                                                                                        <select
                                                                                            class=" m-b list-dt form-control mb-3 membership_class23"
                                                                                            name="dependant_option">
                                                                                            <option selected>Select
                                                                                                Dependant Option...
                                                                                            </option>
                                                                                            <option value="1">Yes</option>
                                                                                            <option value="2">No</option>
                                                                                                  
                                                                                        </select>
                                                                                        </div>
                                                                                    
                                                                                       
                                                                                        
                                                                                         <div class="col-md-6">
                                                                                                <label
                                                                                                    class="pay">Dependant Name/Member ID</label>
                                                                                                  <select  id="depends_on" name="depends_on" class=" m-b list-dt form-control mb-3 ">
                                                                                                  <option value ="">Select/Search Dependant Name/Member ID</option>
                                                                                                                     @if(!empty($members))
                                                                                                                    @foreach($members as $row)
                                                                                                                <option value="{{$row->id}}">{{$row->full_name}}-{{$row->member_id}}</option>
                                                                                                                    @endforeach
                                                                                                                    @endif
                                                                                                                </select>
                                                                                            
                                                                                            
                                                                                        </div>
                                                                                        </div>

                                                                           <br>
                                                                           <div class="row">

                                                                                            <div class="col-md-6">
                                                                                        <label class="pay">State briefly
                                                                                            your reason for
                                                                                            wanting to become a member
                                                                                            of the club:*</label>
                                                                                        <textarea type="text"
                                                                                            name="membership_reason"
                                                                                            placeholder=""
                                                                                            class="form-control mb-3"
                                                                                            rows="3">{{ !empty($data) ? $data->membership_reason : ''}}</textarea>
                                                                                           </div>
                                                                                          <div class="col-md-6">
                                                                                        <label class="pay">State here
                                                                                            any other information
                                                                                            you feel may assist your
                                                                                            application:*</label>
                                                                                        <textarea type="text"
                                                                                            name="other_info"
                                                                                            placeholder=""
                                                                                            class="form-control mb-3"
                                                                                            rows="3">{{ !empty($data) ? $data->other_info : ''}}</textarea>
                                                                                    </div></div>


                                                                 <div class="row">
                                                                       

                                                                                            <div class="col-md-6">
                                                                                        <label
                                                                                            class="">Upload
                                                                                           Passport Size </label>
                                                                                        
                                                                                            @if(!@empty($data->picture))
                                                                                              <input type="file"
                                                                                                name="picture"
                                                                                                value="{{$data->picture }}"
                                                                                                class="form-control"
                                                                                                onchange="loadBigFile(event)"><br>
                                                                                            <img src="{{url('assets/img/member_pasport_size')}}/{{!empty($data->picture)? $data->picture : '' }}"
                                                                                                alt="{{$data->picture}}"
                                                                                                width="100"><br>
                                                                                            
                                                                                            @else
                                                                                            <input type="file"
                                                                                                name="picture" 
                                                                                                class="form-control"
                                                                                                onchange="loadBigFile(event)">
                                                                                            @endif

                                                                                            <br>
                                                                                            <img id="big_output"
                                                                                                width="100">
                                                                                        </div>
                                                                                    </div>

                                                                                 

                                                                             <div class="form-group row">
                                                    <div class="col-lg-offset-2 col-lg-12">
                                                          @if(isset($id))
                                                                                    <input type="submit"
                                                                                        name="make_payment2"
                                                                                        id="saveButton2"
                                                                                        class=" action-button btn btn-primary float-right m-t-n-xs"
                                                                                        value="Update" />
                                                                                
                                                                                    @else
                                                                                    <input type="submit"
                                                                                        name="make_payment"
                                                                                        id="saveButton"
                                                                                        class=" action-button btn btn-primary float-right m-t-n-xs"
                                                                                        value="Save" />
                                                                                    @endif
                                                    </div>
                                                </div>
                                                                                  

                                          
                                        </form>
                                       
                                    </div>

                                        </div>

                                    </div>
                                </div>
                            </div>

                            



                            <div class="tab-pane fade" id="home3" role="tabpanel"
                                aria-labelledby="home-tab2">
                                <div class="card">
                                <div class="card-header">
                                     <form action="{{ route('sample') }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <button class="btn btn-success">Download Sample</button>
                                        </form>
                                 
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-sm-12 ">
                                            <div class="container mt-5 text-center">
                                                <h4 class="mb-4">
                                                 Import Excel & CSV File   
                                                </h4>
                                                <form action="{{ route('import') }}" method="POST" enctype="multipart/form-data">
                                            
                                                    @csrf
                                                    <div class="form-group mb-4">
                                                        <div class="custom-file text-left">
                                                            <input type="file" name="file" class="form-control" id="customFile" required>
                                                        </div>
                                                    </div>
                                                    <button class="btn btn-primary">Import Member</button>
                                          
                                        </form>
                                       
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

<!-- discount Modal -->
<div class="modal fade" id="appFormModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
    </div>
</div>


<script>


</script>

@endsection



@section('scripts')

<script>
$('.datatable-basic').DataTable({
    autoWidth: false,
    "columnDefs": [{
        "orderable": false,
        "targets": [3]
    }],
    dom: '<"datatable-header"fl><"datatable-scroll"t><"datatable-footer"ip>',
    "language": {
        search: '<span>Filter:</span> _INPUT_',
        searchPlaceholder: 'Type to filter...',
        lengthMenu: '<span>Show:</span> _MENU_',
        paginate: {
            'first': 'First',
            'last': 'Last',
            'next': $('html').attr('dir') == 'rtl' ? '&larr;' : '&rarr;',
            'previous': $('html').attr('dir') == 'rtl' ? '&rarr;' : '&larr;'
        }
    },

});
</script>

<script>
    function model(id,type) {

$.ajax({
    type: 'GET',
    url: '{{url("memberModal")}}',
    data: {
        'id': id,
        'type':type,
    },
    cache: false,
    async: true,
    success: function(data) {
        //alert(data);
        $('.modal-dialog').html(data);
    },
    error: function(error) {
        $('#appFormModal').modal('toggle');

    }
});

}
</script>

<script>
  var loadBigFile=function(event){
    var output=document.getElementById('big_output');
    output.src=URL.createObjectURL(event.target.files[0]);
  };
</script>


<script>
    $(document).ready(function() {
    
      
    
        $(document).on('change', '.email', function() {
            var id = $(this).val();
            $.ajax({
                url: '{{url("members/findEmail")}}',
                type: "GET",
                data: {
                    id: id,
                },
                dataType: "json",
                success: function(data) {
                  console.log(data);
                $("#errors").empty();
                $("#next").attr("disabled", false);
                 if (data != '') {
               $("#errors").append(data);
               $("#next").attr("disabled", true);
    } else {
      
    }
                
           
                }
    
            });
    
        });

    });
    </script>



<script>
$(document).ready(function() {

    $(document).on('change', '.membership_class', function() {
        var id = $(this).val();
  console.log(id);

 var cor= $('.cor').val();

 if (id == cor){  
     $("#corporate").css("display", "block");   

}

else{
  $("#corporate").css("display", "none");   

}
    
    });



});

</script>


@endsection