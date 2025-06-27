@extends('layout.master')

@section('title')    
Session Details
@endsection

@push('plugin-styles')

<style>
    .details-menu {
        background: #ffffff;
        box-shadow: 0 3px 12px 0 rgb(0 0 0 / 15%);
        margin-top: 10px !important;  
        padding-left: 0;
        list-style: none;
    }
    .details-menu a {
        border-bottom: 1px solid #cfdbe2;
    list-style: none;
      font-size: 13px;
        border-left: 3px solid transparent;
        border-top: 0;
        color: #444;
      padding: 6px 10px !important;
    }
    
   
    </style>

@endpush

@section('content')


<!-- Main Body Starts -->
<div class="layout-px-spacing">
    <div class="layout-top-spacing mb-2">
        <div class="col-md-12">

 
 
 
            <div class="row mt-lg">
                
                <div class="col-sm-3">
                
                                <div class="nav flex-column nav-pills mb-sm-0 mb-3 text-center mx-auto details-menu"
                                role="tablist" aria-orientation="vertical">
                                <a class="nav-link active" data-toggle="pill" href="#details" role="tab"
                                    aria-controls="v-border-pills-home"
                                    aria-selected="true">{{__('Details')}}</a>
                                <a class="nav-link  text-center" data-toggle="pill" href="#invoice"
                                    role="tab" aria-controls="v-border-pills-profile"
                                    aria-selected="false">{{__('Invoice')}}</a>
                                <a class="nav-link  text-center" data-toggle="pill" href="#payments"
                                    role="tab" aria-controls="v-border-pills-messages"
                                    aria-selected="false">{{__('Payments')}}</a>
                                <a class="nav-link  text-center" data-toggle="pill" href="#maintenance"
                                    role="tab" aria-controls="v-border-pills-messages"
                                    aria-selected="false">{{__('Maintenance')}}</a>
                                <a class="nav-link  text-center" data-toggle="pill" href="#service"
                                    role="tab" aria-controls="v-border-pills-messages"
                                    aria-selected="false">{{__('Service')}}</a>
                                <a class="nav-link  text-center" data-toggle="pill" href="#assets"
                                    role="tab" aria-controls="v-border-pills-messages"
                                    aria-selected="false">{{__('Assets')}}</a>
                                
                            </div>
                        </div>
                 
      

 <!-- Table -->

 
 <div class="col-sm-9">

         <div class="card">
            
                            <!-- Default panel contents -->                          
                               
                                <div class="tab-content" id="v-border-pills-tabContent">
                                    <div class="tab-pane show active" id="details" role="tabpanel"
                                        aria-labelledby="v-border-pills-home-tab">
                                        <div class="card-header"> <strong>Details</strong> </div>
                                        <div class="card-body">
                                        <table class="table mb-0 table">
                                            <thead>
                                                <tr>

                                                    <th>Facility Name</th>
                                                    <th>Location</th>
                                                    <th>Responsible personel</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>

                                                    <td>{{$data->name}}</td>
                                                    <td>{{$data->location}}</td>
                                                    <td>{{$data->personel}}</td>
                                                </tr>

                                            </tbody>
                                        </table>
                                    </div>
                                    </div>

                                    <div class="tab-pane fade" id="invoice" role="tabpanel"
                                        aria-labelledby="v-border-pills-about-tab">
                                        <div class="card-header"> <strong>Invoice</strong> </div>
                                        <div class="card-body">
                                       <ul class="nav nav-tabs" id="myTab2" role="tablist">
                                                    <li class="nav-item">
                                                        <a class="nav-link @if(empty($id)) active show @endif" id="home-tab2" data-toggle="tab"
                                                            href="#home2" role="tab" aria-controls="home" aria-selected="true">Invoice
                                                            List</a>
                                                    </li>
                                                  
                                                </ul>
                                                <br>
                                                <div class="tab-content tab-bordered" id="myTab3Content">
                                                    <div class="tab-pane fade  @if(empty($id)) active show @endif" id="home2" role="tabpanel"
                                                        aria-labelledby="home-tab2">
                                                        <div class="table-responsive">
                                                            <table id="basic-idt" class="table datatable-basic table-striped" style="width:100%">
                                                                <thead>
                                                                    <tr role="row">
                                    
                                    
                                                                        <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0"
                                                    rowspan="1" colspan="1"
                                                    aria-label="Browser: activate to sort column ascending"
                                                    style="width: 28.531px;">#</th>
                                                <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0"
                                                    rowspan="1" colspan="1"
                                                    aria-label="Platform(s): activate to sort column ascending"
                                                    style="width: 126.484px;">Date</th>
                                               <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0"
                                                    rowspan="1" colspan="1"
                                                    aria-label="Platform(s): activate to sort column ascending"
                                                    style="width: 106.484px;">Reference</th>
                                                <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0"
                                                    rowspan="1" colspan="1"
                                                    aria-label="CSS grade: activate to sort column ascending"
                                                    style="width: 128.1094px;">Item</th>
                                                    <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0"
                                                    rowspan="1" colspan="1"
                                                    aria-label="CSS grade: activate to sort column ascending"
                                                    style="width: 98.1094px;">Qty</th>
                                  <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0"
                                                    rowspan="1" colspan="1"
                                                    aria-label="CSS grade: activate to sort column ascending"
                                                    style="width: 98.1094px;">Fee</th>
                                              <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0"
                                                    rowspan="1" colspan="1"
                                                    aria-label="CSS grade: activate to sort column ascending"
                                                    style="width: 98.1094px;">Total Cost</th>
                                                  
                                                                    </tr>
                                                                </thead>
                                                                <tbody>

                                                                    @if(!@empty($invoice))
                                            @foreach ($invoice as $row)
                                                                    <tr class="gradeA even" role="row">
                                                                        <th>{{ $loop->iteration }}</th>
                                                <td>{{Carbon\Carbon::parse($row->invoice->invoice_date)->format('M d, Y')}}</td>
                                                                                                  
                                                <td>{{$row->invoice->reference_no}}</td>
                                                <td> {{$row->item->name}}
                                                    <td> {{number_format($row->due_quantity,2)}}  </td>
                                                   <td> {{number_format($row->price,2)}}  </td>
                                                   <td> {{number_format($row->total_cost,2)}}  </td>
                                              
                                                                    </tr>
                                                                
                                    
                                                                                @endforeach
                                    
                                                                                @endif
                                    
                                                                            </tbody>
                                                                     
                                                            </table>
                                                        </div>
                                                    </div>
                                    </div>
                                    </div>
 </div>

                                    <div class="tab-pane fade" id="payments" role="tabpanel"
                                        aria-labelledby="v-border-pills-messages-tab">

                                        <div class="card-header"> <strong>Payment</strong> </div>
                                        <div class="card-body">
                                        Payments Details
                                    </div>
                                    </div>


                                    <div class="tab-pane fade" id="maintenance" role="tabpanel"
                                        aria-labelledby="v-border-pills-messages-tab">
                                        <div class="card">
                                            <div class="card-header"> <strong>Maintainance</strong> </div>
                                                
                                            <div class="card-body">
                                                <ul class="nav nav-tabs" id="myTab2" role="tablist">
                                                    <li class="nav-item">
                                                        <a class="nav-link @if(empty($id)) active show @endif" id="home-tab2" data-toggle="tab"
                                                            href="#home2" role="tab" aria-controls="home" aria-selected="true">Maintainance
                                                            List</a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a class="nav-link @if(!empty($id)) active show @endif" id="profile-tab2"
                                                            data-toggle="tab" href="#profile2" role="tab" aria-controls="profile"
                                                            aria-selected="false">New Maintainance</a>
                                                    </li>
                                    
                                                </ul>
                                                <br>
                                                <div class="tab-content tab-bordered" id="myTab3Content">
                                                    <div class="tab-pane fade  @if(empty($id)) active show @endif" id="home2" role="tabpanel"
                                                        aria-labelledby="home-tab2">
                                                        <div class="table-responsive">
                                                            <table id="basic-dt" class="table datatable-basic table-striped" style="width:100%">
                                                                <thead>
                                                                    <tr role="row">
                                    
                                    
                                                                        <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0"
                                                    rowspan="1" colspan="1"
                                                    aria-label="Browser: activate to sort column ascending"
                                                    style="width: 28.531px;">#</th>
                                                <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0"
                                                    rowspan="1" colspan="1"
                                                    aria-label="Platform(s): activate to sort column ascending"
                                                    style="width: 126.484px;">Date</th>
                                               
                                                <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0"
                                                    rowspan="1" colspan="1"
                                                    aria-label="CSS grade: activate to sort column ascending"
                                                    style="width: 98.1094px;">Type</th>
                                                    <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0"
                                                    rowspan="1" colspan="1"
                                                    aria-label="CSS grade: activate to sort column ascending"
                                                    style="width: 98.1094px;">Mechanical</th>
                                                    <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0"
                                                    rowspan="1" colspan="1"
                                                    aria-label="CSS grade: activate to sort column ascending"
                                                    style="width: 98.1094px;">Status</th>
                                                <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0"
                                                    rowspan="1" colspan="1"
                                                    aria-label="CSS grade: activate to sort column ascending"
                                                    style="width: 98.1094px;">Action</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>

                                                                    @if(!@empty($maintain))
                                            @foreach ($maintain as $row)
                                                                    <tr class="gradeA even" role="row">
                                                                        <th>{{ $loop->iteration }}</th>
                                                <td>{{Carbon\Carbon::parse($row->date)->format('M d, Y')}}</td>
                                                
                                                    
                                                <td>{{$row->maintainance_type}}</td>
                                                <td> {{$row->staff->name}}
                                                   
                                                   
                                                  
                                                </td>

                                                      <td>
                                                    @if($row->status == 0)
                                                    <div class="badge badge-danger badge-shadow">Incomplete</div>
                                                    @elseif($row->status == 1)
                                                    <div class="badge badge-success badge-shadow">Complete</div>
                                                    @endif
                                                </td>
                                                <td>
                                        <div class="form-inline">
                                                    @if($row->status == 0)
                                                    <a class="list-icons-item text-success"
                                                    href="{{ route("maintainance.approve", $row->id)}}" onclick="return confirm('Are you sure, you want to change status?')" title="Change Status">
                                                    <i class="icon-checkmark"></i>
                                                </a>
                                                <a class="list-icons-item text-primary" title="Edit"
                                                data-toggle="modal" href=""  value="{{ $row->id}}" data-type="edit" data-target="#appFormModal"
                                                onclick="model({{ $row->id }},'maintainance')">
                                                        <i class="icon-pencil7"></i>
                                                    </a>
                                                   

                                                    {!! Form::open(['route' => ['maintainance.destroy',$row->id],
                                                    'method' => 'delete']) !!}
                                                  {{ Form::button('<i class="icon-trash"></i>', ['type' => 'submit', 'style' => 'border:none;background: none;', 'class' => 'list-icons-item text-danger', 'title' => 'Delete', 'onclick' => "return confirm('Are you sure?')"]) }}
                                                    {{ Form::close() }}
&nbsp

                                    @else
                                         @if($row->report == 0)
                         <a class="nav-link" title="Report"  style="color: #057df5;font-weight:bold;"
                                                    data-toggle="modal" href=""  value="{{ $row->id}}" data-type="assign" data-target="#appFormModal"
                                                    onclick="model({{ $row->id }},'report')">Create Mechanical Report </a>  
  @endif
@endif
</div>
                                                </td>
                                                                    </tr>
                                                                
                                    
                                                                                @endforeach
                                    
                                                                                @endif
                                    
                                                                            </tbody>
                                                                     
                                                            </table>
                                                        </div>
                                                    </div>
                                                    <div class="tab-pane fade  @if(!empty($id)) active show @endif" id="profile2"
                                                        role="tabpanel" aria-labelledby="profile-tab2">
                                    <br>
                                                        <div class="card">
                                                            <div class="card-header">
                                                                @if(!empty($id))
                                        <h5>Edit Maintainance</h5>
                                        @else
                                        <h5>Add New Maintainance</h5>
                                        @endif
                                                            </div>
                                                            <div class="card-body">
                                                                <div class="row">
                                                                    <div class="col-sm-12 ">
                                                                        @if(isset($id))
                                                                        {{ Form::model($id, array('route' => array('maintainance.update', $id), 'method' => 'PUT')) }}
                                                                        @else
                                                                        {{ Form::open(['route' => 'maintainance.store']) }}
                                                                        @method('POST')
                                                                        @endif
                                                                      <input type="hidden" name="facility" value="{{ $facility}}">
                                                                        <div class="form-group row">
                                                                            <label class="col-lg-2 col-form-label">Date</label>
                                                                            <div class="col-lg-4">
                                                                                <input type="date" name="date"
                                                                                    placeholder="0 if does not exist"
                                                                                    value="{{ isset($data) ? $data->date : ''}}"
                                                                                    class="form-control" required>
                                                                            </div>
                                                                        

                                                                            <label class="col-lg-2 col-form-label">Type</label>
                                                                           <div class="col-lg-4">
                                                                            <select class="form-control m-b" name="maintainance_type" required
                                                                            id="type">
                                                                            <option value="">Select Type</option>
                                                                            <option @if(isset($data))
                                                                                {{$data->type == 'Minor'  ? 'selected' : ''}}
                                                                                @endif value="Minor">Minor</option>
                                                                                <option @if(isset($data))
                                                                                {{$data->type == 'Major'  ? 'selected' : ''}}
                                                                                @endif value="Major">Major</option>
                                                                              
                                                                        </select>
                                                                            </div>
                                                                        </div>
                                                                       
                                                                        <div class="form-group row">
                                                                            <label
                                                                                class="col-lg-2 col-form-label">Mechanical</label>
                        
                                                                            <div class="col-lg-4">
                                                                                <select class="form-control m-b" name="mechanical" required
                                                                                id="mechanical">
                                                                        <option value="">Select Mechanical</option>
                                                                        @if(!empty($staff))
                                                                        @foreach($staff as $row)
                        
                                                                        <option @if(isset($data))
                                                                            {{$data->mechanical == $row->id  ? 'selected' : ''}}
                                                                            @endif value="{{ $row->id}}">{{$row->name}}</option>
                        
                                                                        @endforeach
                                                                        @endif
                        
                                                                    </select>
                                                                            </div>
                                                                       
                        
                                                                        <label
                                                                            class="col-lg-2 col-form-label">Reason</label>
                        
                                                                        <div class="col-lg-4">
                                                                            <textarea name="reason" 
                                                                    class="form-control" required>@if(isset($data)){{ $data->reason }} @endif</textarea>
                                                                        </div>
                                                                    </div>
                                                                     
                                    
                                                                    <div class="form-group row">
                                                                        <div class="col-lg-offset-2 col-lg-12">
                                                                            @if(!@empty($id))
                                                                            <button class="btn btn-sm btn-primary float-right m-t-n-xs"
                                                                                data-toggle="modal" data-target="#myModal"
                                                                                type="submit">Update</button>
                                                                            @else
                                                                            <button class="btn btn-sm btn-primary float-right m-t-n-xs"
                                                                                type="submit">Save</button>
                                                                            @endif
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

                                    <div class="tab-pane fade" id="service" role="tabpanel"
                                        aria-labelledby="v-border-pills-messages-tab">
                                        <div class="card">
                                            <div class="card-header"> <strong>Service</strong> </div>
                                                
                                            <div class="card-body">
                                                <ul class="nav nav-tabs" id="myTab2" role="tablist">
                                                    <li class="nav-item">
                                                        <a class="nav-link @if(empty($id)) active show @endif" id="home-tab2" data-toggle="tab"
                                                            href="#shome2" role="tab" aria-controls="home" aria-selected="true">Service
                                                            List</a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a class="nav-link @if(!empty($id)) active show @endif" id="profile-tab2"
                                                            data-toggle="tab" href="#sprofile2" role="tab" aria-controls="profile"
                                                            aria-selected="false">New Service</a>
                                                    </li>
                                    
                                                </ul>
                                                <br>
                                                <div class="tab-content tab-bordered" id="myTab3Content">
                                                    <div class="tab-pane fade  @if(empty($id)) active show @endif" id="shome2" role="tabpanel"
                                                        aria-labelledby="home-tab2">
                                                        <div class="table-responsive">
                                                            <table id="basic-sdt" class="table datatable-basic table-striped" style="width:100%">
                                                                <thead>
                                                                    <tr role="row">
                                    
                                    
                                                                        <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0"
                                                    rowspan="1" colspan="1"
                                                    aria-label="Browser: activate to sort column ascending"
                                                    style="width: 28.531px;">#</th>
                                                <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0"
                                                    rowspan="1" colspan="1"
                                                    aria-label="Platform(s): activate to sort column ascending"
                                                    style="width: 126.484px;">Date</th>
                                               
                                               
                                                    <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0"
                                                    rowspan="1" colspan="1"
                                                    aria-label="CSS grade: activate to sort column ascending"
                                                    style="width: 98.1094px;">Mechanical</th>
                                                    <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0"
                                                    rowspan="1" colspan="1"
                                                    aria-label="CSS grade: activate to sort column ascending"
                                                    style="width: 98.1094px;">Status</th>
                                                <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0"
                                                    rowspan="1" colspan="1"
                                                    aria-label="CSS grade: activate to sort column ascending"
                                                    style="width: 98.1094px;">Action</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>

                                                                    @if(!@empty($service))
                                            @foreach ($service as $row)
                                                                    <tr class="gradeA even" role="row">
                                                                        <th>{{ $loop->iteration }}</th>
                                                <td>{{Carbon\Carbon::parse($row->date)->format('M d, Y')}}</td>
                                                <td> {{$row->staff->name}}
                                                   
                                                   
                                                  
                                                </td>

                                                      <td>
                                                    @if($row->status == 0)
                                                    <div class="badge badge-danger badge-shadow">Incomplete</div>
                                                    @elseif($row->status == 1)
                                                    <div class="badge badge-success badge-shadow">Complete</div>
                                                    @endif
                                                </td>
                                                <td>
                                        <div class="form-inline">
                                                    @if($row->status == 0)
                                                    <a class="list-icons-item text-success"
                                                    href="{{ route("service.approve", $row->id)}}" onclick="return confirm('Are you sure, you want to change status?')" title="Change Status">
                                                    <i class="icon-checkmark"></i>
                                                </a>
                                                <a class="list-icons-item text-primary" title="Edit"
                                                data-toggle="modal" href=""  value="{{ $row->id}}" data-type="edit" data-target="#appFormModal"
                                                onclick="model({{ $row->id }},'service')">
                                                        <i class="icon-pencil7"></i>
                                                    </a>
                                                   

                                                    {!! Form::open(['route' => ['service.destroy',$row->id],
                                                    'method' => 'delete']) !!}
                                                  {{ Form::button('<i class="icon-trash"></i>', ['type' => 'submit', 'style' => 'border:none;background: none;', 'class' => 'list-icons-item text-danger', 'title' => 'Delete', 'onclick' => "return confirm('Are you sure?')"]) }}
                                                    {{ Form::close() }}
&nbsp

                                 
@endif
</div>
                                                </td>

                                              
                                                                    </tr>
                                                                
                                    
                                                                                @endforeach
                                    
                                                                                @endif
                                    
                                                                            </tbody>
                                                                     
                                                            </table>
                                                        </div>
                                                    </div>
                                                    <div class="tab-pane fade  @if(!empty($id)) active show @endif" id="sprofile2"
                                                        role="tabpanel" aria-labelledby="profile-tab2">
                                    <br>
                                                        <div class="card">
                                                            <div class="card-header">
                                                                @if(!empty($id))
                                                                <h5>Edit Service</h5>
                                                                @else
                                                                <h5>Add New Service</h5>
                                                                @endif
                                                            </div>
                                                            <div class="card-body">
                                                                <div class="row">
                                                                    <div class="col-sm-12 ">
                                                                        @if(isset($id))
                                                                        {{ Form::model($id, array('route' => array('service.update', $id), 'method' => 'PUT')) }}
                                                                        @else
                                                                        {{ Form::open(['route' => 'service.store']) }}
                                                                        @method('POST')
                                                                        @endif
                                                                      <input type="hidden" name="facility" value="{{ $facility}}">
                                                                        <div class="form-group row">
                                                                            <label class="col-lg-2 col-form-label">Date</label>
                                                                            <div class="col-lg-4">
                                                                                <input type="date" name="date"
                                                                                    placeholder="0 if does not exist"
                                                                                    value="{{ isset($data) ? $data->date : ''}}"
                                                                                    class="form-control" required>
                                                                            </div>
                                                                        
                                                                            <label
                                                                            class="col-lg-2 col-form-label">Mechanical</label>
                    
                                                                        <div class="col-lg-4">
                                                                            <select class="form-control m-b" name="mechanical" required
                                                                            id="supplier_id">
                                                                    <option value="">Select Mechanical</option>
                                                                    @if(!empty($staff))
                                                                    @foreach($staff as $row)
                    
                                                                    <option @if(isset($data))
                                                                        {{$data->mechanical == $row->id  ? 'selected' : ''}}
                                                                        @endif value="{{ $row->id}}">{{$row->name}}</option>
                    
                                                                    @endforeach
                                                                    @endif
                    
                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                       
                                                                        <div class="form-group row">
                                                                            <label
                                                                            class="col-lg-2 col-form-label">Service History</label>
                        
                                                                        <div class="col-lg-4">
                                                                            <textarea name="history" 
                                                                    class="form-control" required>@if(isset($data)){{ $data->history }} @endif</textarea>
                                                                        </div>
                                                                        <label
                                                                        class="col-lg-2 col-form-label">Next Major Service</label>
                        
                                                                    <div class="col-lg-4">
                                                                        <textarea name="major" 
                                                                class="form-control" required>@if(isset($data)){{ $data->major }} @endif</textarea>
                                                                    </div>
                                                                    </div>
                        
                                                                    <br>
                                                                     
                                                                    <h4 align="center">Enter Minor Service Details</h4>
                                                                    <hr>
                                                                    
                                                                    
                                                                    <button type="button" name="add" class="btn btn-success btn-xs add"><i
                                                                            class="fas fa-plus"> Add Minor Service</i></button><br>
                                                                    <br>
                                                                    <div class="table-responsive">
                                                                    <table class="table table-bordered" id="cart">
                                                                        <thead>
                                                                            <tr>
                                                                                <th>Next Minor Service</th>
                                                                                <th>Action</th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody>
                        
                        
                                                                        </tbody>
                                                           
                                                                    </table>
                                                                </div>
                        
                        
                                                                    <br>
                        
                                                                      <br>
                                                                    <h4 align="center">Enter Inventory</h4>
                                                                    <hr>
                                                                    
                                                                    
                                                                    <button type="button" name="add" class="btn btn-success btn-xs addReport"><i
                                                                            class="fas fa-plus"> Add Item</i></button><br>
                                                                    <br>
                                                                    <div class="table-responsive">
                                                                      <table class="table table-bordered" id="report">
                                                                        <thead>
                                                                            <tr>
                                                                                <th>Inventory Item</th>
                                                                                <th>Action</th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody>
                        
                        
                                                                        </tbody>
                                                                           
                                                                    </table>
                                                                </div>
                        
                        
                                                                    <br>
                        
                                                                    <div class="form-group row">
                                                                        <div class="col-lg-offset-2 col-lg-12">
                                                                            @if(!@empty($id))
                                                                            <button class="btn btn-sm btn-primary float-right m-t-n-xs"
                                                                                data-toggle="modal" data-target="#myModal"
                                                                                type="submit">Update</button>
                                                                            @else
                                                                            <button class="btn btn-sm btn-primary float-right m-t-n-xs"
                                                                                type="submit">Save</button>
                                                                            @endif
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


                                    <div class="tab-pane fade" id="assets" role="tabpanel"
                                        aria-labelledby="v-border-pills-messages-tab">
                                        <div class="card-header"> <strong>Asset</strong> </div>
                                        <div class="card-body">
                                        <p>
                                            {{__('Assets')}} Details
                                        </p>
                                    </div>
                                </div>

                                </div>
            </div>
        </div>
          </div>
        </div>
    </div>
</div>


        
   
<!-- discount Modal -->
<div class="modal fade" id="appFormModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
    </div>
</div>


       
<!-- Main Body Ends -->
@endsection

@section('scripts')
<script>
$(document).ready(function() {
 $('#basic-dt).DataTable({
            autoWidth: false,
            "columnDefs": [
                {"orderable": false, "targets": [3]}
            ],
           dom: '<"datatable-header"fl><"datatable-scroll"t><"datatable-footer"ip>',
            "language": {
               search: '<span>Filter:</span> _INPUT_',
                searchPlaceholder: 'Type to filter...',
                lengthMenu: '<span>Show:</span> _MENU_',
             paginate: { 'first': 'First', 'last': 'Last', 'next': $('html').attr('dir') == 'rtl' ? '&larr;' : '&rarr;', 'previous': $('html').attr('dir') == 'rtl' ? '&rarr;' : '&larr;' }
            },
        
        });
</script>

<script>
    $('#basic-sdt).DataTable({
            autoWidth: false,
            "columnDefs": [
                {"orderable": false, "targets": [3]}
            ],
           dom: '<"datatable-header"fl><"datatable-scroll"t><"datatable-footer"ip>',
            "language": {
               search: '<span>Filter:</span> _INPUT_',
                searchPlaceholder: 'Type to filter...',
                lengthMenu: '<span>Show:</span> _MENU_',
             paginate: { 'first': 'First', 'last': 'Last', 'next': $('html').attr('dir') == 'rtl' ? '&larr;' : '&rarr;', 'previous': $('html').attr('dir') == 'rtl' ? '&rarr;' : '&larr;' }
            },
        
        });
    </script>
    
<script>
    $('#basic-idt).DataTable({
            autoWidth: false,
            "columnDefs": [
                {"orderable": false, "targets": [3]}
            ],
           dom: '<"datatable-header"fl><"datatable-scroll"t><"datatable-footer"ip>',
            "language": {
               search: '<span>Filter:</span> _INPUT_',
                searchPlaceholder: 'Type to filter...',
                lengthMenu: '<span>Show:</span> _MENU_',
             paginate: { 'first': 'First', 'last': 'Last', 'next': $('html').attr('dir') == 'rtl' ? '&larr;' : '&rarr;', 'previous': $('html').attr('dir') == 'rtl' ? '&rarr;' : '&larr;' }
            },
        
        });
    </script>

<script>
    $('#basic-pdt).DataTable({
            autoWidth: false,
            "columnDefs": [
                {"orderable": false, "targets": [3]}
            ],
           dom: '<"datatable-header"fl><"datatable-scroll"t><"datatable-footer"ip>',
            "language": {
               search: '<span>Filter:</span> _INPUT_',
                searchPlaceholder: 'Type to filter...',
                lengthMenu: '<span>Show:</span> _MENU_',
             paginate: { 'first': 'First', 'last': 'Last', 'next': $('html').attr('dir') == 'rtl' ? '&larr;' : '&rarr;', 'previous': $('html').attr('dir') == 'rtl' ? '&rarr;' : '&larr;' }
            },
        
        });
    </script>

<script type="text/javascript">
    function model(id,type) {

$.ajax({
    type: 'GET',
     url: '{{url("maintainModal")}}',
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

<script src="{{ url('assets/js/plugins/sweetalert/sweetalert.min.js') }}"></script>
<script type="text/javascript">
    $(document).ready(function() {
    
    
        var count = 0;
    
        $(document).on('click', '.addCF', function() {
    
            count++;
            var html = '';
            html += '<tr class="line_items">';
            html +=
                '<td><select name="item_name[]" class="form-control m-b item_name" required  data-sub_category_id="' +
                count +
                '"><option value="">Select Item</option>@foreach($name as $n) <option value="{{ $n->id}}">{{$n->name}}</option>@endforeach</select></td>';
            html +=
                '<td><button type="button" name="remove" class="btn btn-danger btn-xs remove_inv"><i class="icon-trash"></i></button></td>';
    console.log(html);
            $("#inventory > tbody ").append(html);
        
/*
             * Multiple drop down select
             */
            $('.m-b').select2({
                            });
        });
    
        $(document).on('click', '.remove_inv', function() {
            $(this).closest('tr').remove();
           
        });
    
    
       
    
    });
    </script>

<script type="text/javascript">
    $(document).ready(function() {
    
    
        var count = 0;
    
    
        $('.add').on("click", function(e) {
    
            count++;
            var html = '';
            html += '<tr class="line_items">';   
                  
            html += '<td><textarea name="minor[]" class="form-control item_price' + count +'" required  value="" style="margin-top:10px;"/></textarea></td>';
           
            html +='<td><button type="button" name="remove" class="btn btn-danger btn-xs remove"><i class="icon-trash"></i></button></td>';
    
            $("#cart > tbody ").append(html);
           
        });
    
        $(document).on('click', '.remove', function() {
            $(this).closest('tr').remove();
           
        });
    
    
        $(document).on('click', '.rem', function() {
            var btn_value = $(this).attr("value");
            $(this).closest('tr').remove();
           $("#cart > tbody ").append(
                '<input type="hidden" name="removed_id[]"  class="form-control name_list" value="' +
                btn_value + '"/>');
           
        });
    
    });
    </script>


<script type="text/javascript">
$(document).ready(function() {


    var count = 0;

    $(document).on('click', '.addReport', function() {

        count++;
        var html = '';
        html += '<tr class="line_items">';
        html +=
            '<td><select name="item_name[]" class="form-control m-b item_name" required  data-sub_category_id="' +
            count +
            '"><option value="">Select Item</option>@foreach($name as $n) <option value="{{ $n->id}}">{{$n->name}}</option>@endforeach</select></td>';
        html +=
            '<td><button type="button" name="remove" class="btn btn-danger btn-xs remove_inv"><i class="icon-trash"></i></button></td>';
console.log(html);
        $("#report > tbody ").append(html);
    
/*
             * Multiple drop down select
             */
            $('.m-b').select2({
                            });
    });

    $(document).on('click', '.remove_inv', function() {
        $(this).closest('tr').remove();
       
    });


      $(document).on('click', '.rem_inv', function() {
            var btn_value = $(this).attr("value");
            $(this).closest('tr').remove();
            $("#report > tbody ").append(
                '<input type="hidden" name="removed_inv_id[]"  class="form-control name_list" value="' +
                btn_value + '"/>');
           
        });

});
</script>
    
@endsection