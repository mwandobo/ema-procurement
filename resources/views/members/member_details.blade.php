@extends('layout.master')

@push('plugin-styles')
{!! Html::style('assets/css/forms/form-widgets.css') !!}
{!! Html::style('assets/css/forms/multiple-step.css') !!}
{!! Html::style('assets/css/forms/radio-theme.css') !!}
{!! Html::style('assets/css/tables/tables.css') !!}


@endpush


@section('content')

<!-- Main Body Starts -->
<div class="d-lg-flex align-items-lg-start">

    <!-- Left sidebar component -->
    <div
        class="sidebar sidebar-light bg-transparent sidebar-component sidebar-component-left wmin-300 border-0 shadow-none sidebar-expand-lg">

        <!-- Sidebar content -->
        <div class="sidebar-content">

            <!-- Navigation -->
            <div class="card">
                <div class="card-body text-center">
                    <div class="card-img-actions d-inline-block mb-3">
                        <img class="img-fluid rounded-circle"
                            src="{{url('assets/img/member_pasport_size')}}/{{!empty($data->picture)? $data->picture : '' }}" width="170" height="170"
                            alt="">
                            {{-- @can('view-member-menu')--}}
                        <div class="card-img-actions-overlay rounded-circle">
                            <a href="#" class="btn btn-outline-white border-2 btn-icon rounded-pill" data-toggle="modal" data-target="#appFormModal"  data-id="{{ $data->id }}" data-type="edit"    onclick="model({{ $data->id }},'show')">
                                                       
                                <i class="icon-plus3"></i>
                            </a>                           
                        </div>
                        {{--@endcan--}}

                    </div>

                    <h6 class="font-weight-semibold mb-0">{{$data->full_name}}, {{$data->member_id}}</h6>
                    <span class="d-block opacity-75">{{$data->email}}</span>

                </div>
{{--
<hr>
                <ul class="nav nav-sidebar">
                     @can('view-staff-menu')
                    <li class="nav-item">
                        <a href="#profile" class="nav-link " data-toggle="tab">
                            <i class="icon-key"></i>
                            Actions
                        </a>
                    </li>
                    <li class="nav-item">
                   
                        <a href="{{ route('manage_member.edit', $data->id)}}" class="nav-link">
                            <i class="icon-calendar3"></i>
                            
                            Approve 
                            
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#inbox" class="nav-link " data-toggle="tab">
                            <i class="icon-trash"></i>
                            Reject
                            
                        </a>
                    </li>
                     @endcan

                   @can('view-member-menu')
                      <li class="nav-item">
                        <a href="#profile" class="nav-link " >
                            <i class="icon-pencil7"></i>
                            Edit Details
                        </a>
                    </li>
                    @endcan
                   
                </ul>
--}}
            </div>


        </div>
        <!-- /sidebar content -->

    </div>
    <!-- /left sidebar component -->


    <!-- Right content -->
    <div class="tab-content flex-1">
        <div class="tab-pane fade active show" id="profile">
           <div class="row">
                                        <div class="col-12 col-sm-12 col-md-12">

            <!-- Sales stats -->
            <div class="card">
                <div class="card-header header-elements-sm-inline">
                    <h6 class="card-title">Basic Information</h6>
                    <div class="header-elements">
                        

                        <div class="list-icons ml-3">
                            <a class="btn btn-info" href="{{ route("member_reg_admin_edit", $data->id)}}" role="button">Edit</a>
                            <a class="list-icons-item" data-action="reload"></a>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                       <table class="table datatable-basic table-striped">

                            <tbody>
                                <tr >
                                   <th>Full Name</th> <td>{{$data->full_name}}</td>
                                   <th>Nationality</th><td>{{$data->nationality}}</td>
                             </tr>
                                <tr>
                                   <th>Gender</th>  <td>{{$data->gender}}</td>
                                    <th>Phone Number</th>  <td>{{$data->phone1}}</td>
                                   
                                    </tr>
                                       <tr>
                                    
                                    <th>Email</th><td>{{$data->email}}</td>
                                <th>Address</th><td>{{$data->address}}</td>
                                    </tr>

                                    <tr>
                                   <th>Membership Type</th>  <td> {{$data->membership_types->name}} {{ isset($data->membership_types->class) ?  '- '. $data->membership_types->class : ''}}</td>
                                   <th>Reason of being Member</th><td> {{$data->membership_reason}}</td>
                             </tr>
                                <tr>
                                    <th>First Proposer</th>  <td> {{$data->first_proposer}}</td>
                                    <th>Second Proposer</th><td> {{$data->second_proposer}}</td>
                                    </tr>
                                       <tr>
                                    <th>Spouse name</th>   <td> {{$data->spouse_name}} </td>
                                    <th>Other Contacts</th>  <td>{{$data->phone2}}</td>
                                    </tr>
                                  
                            </tbody>
                            

                        </table>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header header-elements-sm-inline">
                    <h6 class="card-title">Sports Information</h6>
                    <div class="header-elements">
                        

                        <div class="list-icons ml-3">
                        @if(!empty($data->sports))  
                        <a class="btn btn-info" href="#" role="button">Edit</a>
                        @else
                        <a class="btn btn-primary" href="#" role="button">Add</a>
                        @endif
                            <a class="list-icons-item" data-action="reload"></a>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        
                                <table class="table datatable-basic table-striped">
                                    <thead>
                                        <tr>

                                            <th>Sport Name</th>
                                            <th>Years Played</th>
                                            <th>Level</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($data->sports as $row)
                                        <tr >

                                            <td>{{$row->sport_name}}</td>
                                            <td>{{$row->years_played}}</td>
                                            <td>{{$row->level}}</td>

                                        </tr>
                                        @endforeach


                                    </tbody>

                                </table>
                           
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-header header-elements-sm-inline">
                    <h6 class="card-title">Business Information</h6>
                    <div class="header-elements">


                        <div class="list-icons ml-3">
                        @if(!empty($data->business))  
                        <a class="btn btn-info" href="{{ route("member_business_edit", [$data->id, $data->business] )}}" role="button">Edit</a>
                        @else
                        <a class="btn btn-primary" href="{{ route("member_business_index", $data->id)}}" role="button">Add</a>
                        @endif
                            
                            <a class="list-icons-item" data-action="reload"></a>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        
                                 <table class="table datatable-basic table-striped">

                                    <tbody>

                                        <tr>
                                        <th>Business Name</th><td>{{!empty($data->business)? $data->business->business_name : ''}}</td>
                                             <th>Business Address</th><td>{{!empty($data->business)? $data->business->business_address : ''}}</td>
                                                             </tr>
                                                   <tr>
                                              <th>Employer</th>  <td>{{!empty($data->business)?  $data->business->employer : ''}}</td>
                                            <th>Designation</th>  <td>{{!empty($data->business)?  $data->business->designation : ''}}</td>
                                        </tr>



                                    </tbody>

                                </table>
                            
                    </div>
                </div>

            </div>
              @if($data->is_dependant == '0' &&  $data->status == '1' )
               
             @if(strpos($data->member_id, 'FMM') || $data->membership_types->name == 'CORPORATE MEMBER')
            <div class="card">
                <div class="card-header header-elements-sm-inline">
                    <h6 class="card-title">Dependant  Information</h6>
                    <div class="header-elements">


                        <div class="list-icons ml-3">
                        
                       {{-- <a class="btn btn-info" href="#" role="button">Edit</a>--}}
                       
                      @if($dep < 5 )
                        <a class="btn btn-primary" href="{{ route("member_dependent_index", $data->id)}}" role="button">Add</a>
                        @endif

                            <a class="list-icons-item" data-action="reload"></a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                       
                                  <table class="table datatable-basic table-striped">
                                    <thead>
                                        <tr>

                                            <th>Name</th>
                                          <th>Member ID</th>
                                            <th>Birth Date</th>
                                            <th>Action</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($data->dependant as $row)
                                        <tr >

                                            <td>{{$row->name}}</td>
                                              <td>{{$row->member}}</td>
                                            <td>{{Carbon\Carbon::parse($row->birth_date)->format('d F , Y')}} </td>
                                                <td><a class="btn btn-info" href="{{ route("member_dependent_edit", $row->id)}}" role="button">Edit</a></td>

                                        </tr>
                                        @endforeach


                                    </tbody>

                                </table>
                            
                    </div>
                </div>

            </div>
            <!-- /sales stats -->
           @endif
           @endif

   {{--         
            <div class="card">
                <div class="card-header header-elements-sm-inline">
                    <h6 class="card-title">Deposit List</h6>
                    
                </div>
               
                
                    <div class="table-responsive">
                       
                                   <table class="table datatable-modal table-striped">
                                        <thead>
                                            <tr role="row">

                                                <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0"
                                                    rowspan="1" colspan="1"
                                                    aria-label="Browser: activate to sort column ascending"
                                                    style="width: 30.531px;">#</th>
                                                <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0"
                                                    rowspan="1" colspan="1"
                                                    aria-label="Platform(s): activate to sort column ascending"
                                                    style="width: 100.484px;">Reference</th>
                                                <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0"
                                                    rowspan="1" colspan="1"
                                                    aria-label="Engine version: activate to sort column ascending"
                                                    style="width: 180.484px;">Amount</th>
                                                <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0"
                                                    rowspan="1" colspan="1"
                                                    aria-label="CSS grade: activate to sort column ascending"
                                                    style="width: 120.1094px;">Date</th>
                                                <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0"
                                                    rowspan="1" colspan="1"
                                                    aria-label="Engine version: activate to sort column ascending"
                                                    style="width: 120.219px;">Bank Account</th>
                                                <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0"
                                                    rowspan="1" colspan="1"
                                                    aria-label="CSS grade: activate to sort column ascending"
                                                    style="width: 125.1094px;">Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @if(!@empty($deposit))
                                            @foreach ($deposit as $row)
                                            <tr class="gradeA even" role="row">
                                                <th>{{ $loop->iteration }}</th>
                                                <td>{{$row->trans_id}}</td>
                                                <td>{{number_format($row->debit,2)}} </td>
                                                <td>{{$row->date}}</td>
                                            <td>{{$row->payment->account_name}}</td>
                                               

                                                <td>

                                                    <div class="form-inline">

                                                        <a class="list-icons-item text-primary" title="Edit"
                                                            
                                                            href=""> Download Receipt</a>
                                                        &nbsp;

                                                    </div> 
                               

                                </td>
                                </tr>
                                @endforeach

                                @endif

                                </tbody>
                                </table>
                            
                    </div>
              

            </div>
 </div>
              




<div class="card">
                <div class="card-header header-elements-sm-inline">
                    <h6 class="card-title">Fee Payment List</h6>
                    
                </div>
               
                
                    <div class="table-responsive">
                       
                                   <table class="table datatable-modal2 table-striped">
                                        <thead>
                                            <tr role="row">

                                                <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0"
                                                    rowspan="1" colspan="1"
                                                    aria-label="Browser: activate to sort column ascending"
                                                    style="width: 30.531px;">#</th>
                                                <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0"
                                                    rowspan="1" colspan="1"
                                                    aria-label="Platform(s): activate to sort column ascending"
                                                    style="width: 180.484px;">Reference</th>
                                                <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0"
                                                    rowspan="1" colspan="1"
                                                    aria-label="Engine version: activate to sort column ascending"
                                                    style="width: 180.484px;">Amount</th>
                                                <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0"
                                                    rowspan="1" colspan="1"
                                                    aria-label="CSS grade: activate to sort column ascending"
                                                    style="width: 120.1094px;">Date</th>
       
                                                <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0"
                                                    rowspan="1" colspan="1"
                                                    aria-label="CSS grade: activate to sort column ascending"
                                                    style="width: 225.1094px;">Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @if(!@empty($payment))
                                            @foreach ($payment as $row)
                                            <tr class="gradeA even" role="row">
                                                <th>{{ $loop->iteration }}</th>
                                                <td>{{$row->reference_no}}</td>
                                                <td>{{number_format($row->amount,2)}} </td>
                                                <td>{{$row->date}}</td>

                                                <td>

                                                    <div class="form-inline">

                                                        <a class="list-icons-item text-primary" title="Edit"
                                                            
                                                            href=""> Download Receipt</a>
                                                        &nbsp;

                                                    </div> 
                               

                                </td>
                                </tr>
                                @endforeach

                                @endif

                                </tbody>
                                </table>
                            
                    </div>
              

            </div>

--}}
 </div>

           

        </div>









       


  

        

        </div>
    </div>
    <!-- /right content -->




<!-- Main Body Ends -->

<div id="appFormModal" class="modal fade"  data-backdrop="false" tabindex="-1">
        <div class="modal-dialog">

              
        </div>
    </div>
@endsection

@section('scripts')
<script>
       $('.datatable-modal').DataTable({
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
       $('.datatable-modal2').DataTable({
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

<script src="{{asset('global_assets/js/plugins/extensions/rowlink.js') }}"></script>
<script src="{{asset('global_assets/js/plugins/visualization/echarts/echarts.min.js') }}"></script>
<script src="{{asset('global_assets/js/plugins/ui/fullcalendar/core/main.min.js') }}"></script>
<script src="{{asset('global_assets/js/plugins/ui/fullcalendar/daygrid/main.min.js') }}"></script>
<script src="{{asset('global_assets/js/plugins/ui/fullcalendar/timegrid/main.min.js') }}"></script>
<script src="{{asset('global_assets/js/plugins/ui/fullcalendar/interaction/main.min.js') }}"></script>

<script src="{{asset('assets/js/app.js') }}"></script>
<script src="{{asset('global_assets/js/demo_pages/user_pages_profile_tabbed.js') }}"></script>
<script src="{{asset('global_assets/js/demo_charts/echarts/light/bars/tornado_negative_stack.js') }}"></script>
<script src="{{asset('global_assets/js/demo_charts/pages/profile/light/balance_stats.js') }}"></script>
<script src="{{asset('global_assets/js/demo_charts/pages/profile/light/available_hours.js') }}"></script>

<script>
var count = 1;
//function of get data when order button clickes
$(document).on("click", '.makeorder', function(e) {
    const taget_order = $(this).val();
    const json_order_details = JSON.parse(taget_order);
    $('#requred_quantiy_id').val(json_order_details.quantity);
    $('#hidden_order_id').val(json_order_details.id);
    temp_account_dropdawn = account_dropdawn.filter(data => data.crops_type.crop_name ==
        json_order_details.crop_types.crop_name);
});
$('.add').on("click", function(e) {

    alert("hello");
    var html = '';
    html += '<tr>';
    html +=
        '<td><input type="text" name="children_name" placeholder="Children Name" class="form-control mb-3"/></td>';
    html +=
        '<td> <input type="date" name="designation"  class="form-control mb-3"/></td>';
    html +=
        '<td><a href="javascript:void(0);" name="remove" class="bs-tooltip font-20 text-danger ml-2 remove" title="" data-original-title="{{__('
    Delete ')}}"><i class="las la-trash"></i></a></td>';
    html += ' </tr>';
    // if (count < 4) {
    //     count++
    //     $('#children_table_id').append(html);
    // }

});
$(document).on('click', '.remove', function() {
    count--
    $(this).closest('tr').remove();
});
</script>

<script>
function model(id, type) {

let url = '{{ route("image.update") }}';


$.ajax({
    type: 'GET',
    url: url,
    data: {
        'type': type,
        'id': id,
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
@endsection