@extends('layout.master')

@section('title') Traininge @endsection

@section('content')

              <section class="section">
    <div class="section-body">
        <div class="row">
            <div class="col-12 col-sm-6 col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Training </h4>
                    </div>
                    <div class="card-body">
                        <ul class="nav nav-tabs" id="myTab2" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link @if(empty($id)) active show @endif" id="home-tab2" data-toggle="tab"
                                    href="#home2" role="tab" aria-controls="home" aria-selected="true">Training
                                     List</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link @if(!empty($id)) active show @endif" id="profile-tab2"
                                    data-toggle="tab" href="#profile2" role="tab" aria-controls="profile"
                                    aria-selected="false">New Training</a>
                            </li>

                        </ul>

                                   <div class="tab-content tab-bordered" id="myTab3Content">
                                        <div class="tab-pane fade @if(empty($id)) active show @endif" id="home2" role="tabpanel"
                                aria-labelledby="home-tab2">
                                            <div class="table-responsive">
                                                <table class="table datatable-basic table-striped"  style="width:100%">
                                                 
                                                  
                                                        <thead>
                                                            <tr>
                
                                                                <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0"
                                                                    rowspan="1" colspan="1"
                                                                    aria-label="Platform(s): activate to sort column ascending"
                                                                    style="width: 28.484px;">#</th>
                                                                <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0"
                                                                    rowspan="1" colspan="1"
                                                                    aria-label="Platform(s): activate to sort column ascending"
                                                                    style="width: 156.484px;">Staff Name</th>
                                                                    <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0"
                                                                    rowspan="1" colspan="1"
                                                                    aria-label="Platform(s): activate to sort column ascending"
                                                                    style="width: 156.484px;">Course/Training</th>
                                                                     <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0"
                                                                    rowspan="1" colspan="1"
                                                                    aria-label="Platform(s): activate to sort column ascending"
                                                                    style="width: 156.484px;">Vendor</th>
                                                                <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0"
                                                                    rowspan="1" colspan="1"
                                                                    aria-label="Engine version: activate to sort column ascending"
                                                                    style="width: 141.219px;">Duration</th>
                                                                <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0"
                                                                    rowspan="1" colspan="1"
                                                                    aria-label="Engine version: activate to sort column ascending"
                                                                    style="width: 141.219px;">Status</th>
                
                
                                                                <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0"
                                                                    rowspan="1" colspan="1"
                                                                    aria-label="CSS grade: activate to sort column ascending"
                                                                    style="width: 98.1094px;">Actions</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @if(!@empty($training))
                                                            @foreach ($training as $row)
                                                            <tr class="gradeA even" role="row">
                
                                                                <td>
                                                                    {{ $loop->iteration }}
                                                                </td>
                                                                <td>{{$row->staff->name}}</td>
                                                                <td>{{$row->training_name}}</td>
                                                                 <td>{{$row->vendor_name}}</td>
                
                                                                 <td>
                                                                    
                                                                    {{Carbon\Carbon::parse($row->start_date)->format('d/m/Y')}} - {{Carbon\Carbon::parse($row->end_date)->format('d/m/Y')}} 
                                                        
                                                                </td>
                
                                                                 <td>
                                                                    @if($row->status== 0)
                                                                    <div class="badge badge-warning badge-shadow">Pending</div>
                                                                    @elseif($row->status == 1)
                                                                    <div class="badge badge-info badge-shadow">Started</div>
                                                                    @elseif($row->status == 2)
                                                                    <div class="badge badge-success badge-shadow">Completed</div>
                                                                     @elseif($row->status == 3)
                                                                    <div class="badge badge-danger badge-shadow">Terminated</div>
                
                                                                    @endif
                                                                </td>
                                                               
                                                               
                
                                                                <td>
                                                                   @if($row->status == 1 || $row->status == 0)
                                                                    <a class="list-icons-item text-primary"
                                                                        title="Edit" onclick="return confirm('Are you sure?')"
                                                                        href="{{ route('training.edit', $row->id)}}"><i
                                                                          class="icon-pencil7"></i></a>
                                                                           
                
                                                                    {!! Form::open(['route' => ['training.destroy',$row->id],
                                                                    'method' => 'delete']) !!}
                                                                {{ Form::button('<i class="icon-trash"></i>', ['type' => 'submit', 'style' => 'border:none;background: none;', 'class' => 'list-icons-item text-danger', 'title' => 'Delete', 'onclick' => "return confirm('Are you sure?')"]) }}
                                                    {{ Form::close() }}
                                                                      
                                                                <div class="dropdown">
							                		<a href="#" class="list-icons-item dropdown-toggle text-teal" data-toggle="dropdown"><i class="icon-cog6"></i></a>
                                                                <div class="dropdown-menu">
                                                                           <a class="nav-link"  onclick="return confirm('Are you sure?')"
                                                                              href="{{ route('training.start',$row->id)}}">Started
                                                                                    </a>  
                                                                                 
                                                                            <a class="nav-link"  onclick="return confirm('Are you sure?')"
                                                                              href="{{ route('training.approve',$row->id)}}">Completed
                                                                                    </a>                         
                                                                                 
                                                                                       <a class="nav-link" href="{{ route('training.reject',$row->id)}}"
                                                                                        role="tab"
                                                                                        aria-selected="false" onclick="return confirm('Are you sure?')">Terminated
                                                                                            </a>
                                                                                           
                                                                        </div></div>

                                                                    </div>
                                                                    @endif
                
                                                                </td>
                                                            </tr>
                                                            @endforeach
                
                                                            @endif
                
                                                        </tbody>
                                                    </table>
                                            </div>
                                        </div>





                                      <div class="tab-pane fade @if(!empty($id)) active show @endif" id="profile2" role="tabpanel"
                                aria-labelledby="profile-tab2">
                                            <div class="card">
                                                <div class="card-header">
                                             
                                                @if(empty($id))
                                                <h5>Create Training</h5>
                                                @else
                                                <h5>Edit Training</h5>
                                                @endif
                                            </div>
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-sm-12 ">
                                                       
                                                        @if(isset($id))
                                                        {{ Form::model($id, array('route' => array('training.update', $id), 'method' => 'PUT')) }}
                                                        @else
                                                        {{ Form::open(['route' => 'training.store']) }}
                                                        @method('POST')
                                                        @endif
        
        
        
        
                                                        <div class="form-group row">
                                                            <label class="col-lg-2 col-form-label">Staff</label>
                                                            <div class="col-lg-4">
                                                                <select class="form-control m-b" name="staff_id" required
                                                                id="supplier_id">
                                                                <option value="">Select</option>
                                                                @if(!empty($staff))
                                                                @foreach($staff as $row)
        
                                                                <option @if(isset($data))
                                                                    {{  $data->staff_id == $row->id  ? 'selected' : ''}}
                                                                    @endif value="{{ $row->id}}">{{$row->name}}</option>
        
                                                                @endforeach
                                                                @endif
        
                                                            </select>
                                                            </div>
                                                            <label class="col-lg-2 col-form-label">Course/Training</label>
                                                            <div class="col-lg-4">
                                                                
                                                                    <input type="text" name="training_name"  value="{{ isset($data) ? $data->training_name: ''}}"
                                                                    class="form-control" required>
                                                            </div>
                                                        </div>
        
                                                        <div class="form-group row">
                                                            <label class="col-lg-2 col-form-label">Vendor</label>
                                                            <div class="col-lg-4">
                                                                <input type="text" name="vendor_name"  value="{{ isset($data) ? $data->vendor_name: ''}}"
                                                                    class="form-control" required>
                                                            </div>
        
        
        
                                                        <label class="col-lg-2 col-form-label">Start Date</label>
                                                            <div class="col-lg-4">
                                                                <input type="date"  name="start_date"
                                                                    placeholder=""
                                                                    value="{{ isset($data) ? $data->start_date : ''}}"
                                                                    class="form-control" required>
                                                            </div>
        
                                                           
                                                        </div>
        
                                                
                                                 <div class="form-group row end">
                                                            <label class="col-lg-2 col-form-label">End Date</label>
                                                            <div class="col-lg-4">
                                                                <input type="date"  name="end_date"
                                                                    placeholder=""
                                                                    value="{{ isset($data) ? $data->end_date : ''}}"
                                                                    class="form-control" required>
                                                            </div>
                                                   <label class="col-lg-2 col-form-label">Performance</label>
                                                            <div class="col-lg-4">
                                                                
                                                                    <select class="form-control m-b" name="performance" 
                                                                        id="performance">
                                                                       <option value="0" @if(isset($data)){{  $data->performance == '0'  ? 'selected' : ''}}  @endif >Not Concluded</option>
                                                                                            <option value="1" @if(isset($data)){{  $data->performance == '1'  ? 'selected' : ''}}  @endif >Satisfactory</option>
                                                                                            <option value="2" @if(isset($data)){{  $data->performance == '2'  ? 'selected' : ''}}  @endif >Average</option> 
                                                                                            <option value="3" @if(isset($data)){{  $data->performance == '3'  ? 'selected' : ''}}  @endif >Poor</option>
                                                                                            <option value="4" @if(isset($data)){{  $data->performance  == '4'  ? 'selected' : ''}}  @endif >Excellent</option>
                                                                                           
        
                                                                    </select>
                                                                   
                                                            </div>
                                                    </div>
                                                 
        
                                                    
                                                 
        
                                                 
                                                         <div class="form-group row">
                                                            <label class="col-lg-2 col-form-label">Remarks</label>
                                                            <div class="col-lg-4">
                                                               <textarea id="present" name="remarks" class="form-control" rows="6" data-parsley-id="25">{{ isset($data) ? $data->reason : ''}}</textarea>
                                                            </div>
                                                            <label class="col-lg-2 col-form-label">Attachment</label>
                                                            <div class="col-lg-4">
                                                                
                                                                   <input type="file" name="attachment" class="form-control"
                                                                        id="attachment"
                                                                        value=" "
                                                                        placeholder="">
                                                                  
                                                            </div>
                                                        </div>
        
                                                      <div class="form-group row">
                                                            <label class="col-lg-2 col-form-label">Training Cost</label>
                                                            <div class="col-lg-4">
                                                                <input type="number"  steps="0.01" name="training_cost"  value="{{ isset($data) ? $data->training_cost: ''}}"
                                                                    class="form-control" required>
                                                            </div>
                                                              </div>
                                                        
                                                        <div class="form-group row">
                                                            <div class="col-lg-offset-2 col-lg-12">
                                                                @if(!@empty($id))
        
                                                                <a class="btn btn-sm btn-danger float-right m-t-n-xs"
                                                                    href="{{ route('training.index')}}">
                                                                   Cancel
                                                                </a>
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
                </div>
            
        
   



<!-- route Modal -->
<div class="modal fade" id="routeModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="formModal">Add Leave Category</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
  <form id="addRouteForm" method="post" action="javascript:void(0)">
            @csrf
                <div class="modal-body">
                    <p><strong>Make sure you enter valid information</strong> .</p>

                   

                    <div class="form-group row"><label class="col-lg-2 col-form-label">Leave Category</label>

                        <div class="col-lg-10">
                            <input type="text" name="leave_category" id="category" class="form-control category">
                        </div>
                    </div>

                </div>
                <div class="modal-footer bg-whitesmoke br">
                    <button type="submit" class="btn btn-primary route">Save</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>

                 </form>
            </div>
        </div>
    </div>

</div>
</div>
</div>
</div>


<!-- Main Body Ends -->
@endsection

@section('scripts')


<script>
    $(document).ready(function(){
   

 $(document).on('change', '.type', function(){
var id=$(this).val() ;
console.log(id);
         if($(this).val() == 'multiple_days') {
          $('.end').show(); 
            $('.hour').hide();
        } else if($(this).val() == 'hours') {
            $('.hour').show(); 
           $('.end').hide();
        } 
   else  {
            $('.hour').hide(); 
           $('.end').hide();
        } 
});


$('.route').click(function (event){
event.preventDefault();
       var leave_category= $('.category').val();
      $.ajax({
        type: "POST",
         url: '{{url("addCategory")}}',
             data: {
                 'leave_category':leave_category,
            _token: '{!! csrf_token() !!}',
        },
    dataType: "json",
        success: function(response) {
                console.log(response);
          // do whatever you want with a successful response
                        var id = response.id;
                             var arrival_point = response.leave_category;

                             var option = "<option value='"+id+"'  selected>"+arrival_point+"</option>"; 
                       //$('#routeModal').hide();
                             $('#route').append(option);
                             $('#routeModal').hide();
        }
      });
    });




    });
</script>

<script>
       $('.datatable-basic').DataTable({
            autoWidth: false,
           order: [[2, 'desc']],
            "columnDefs": [
                {"targets": [3]}
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

@endsection