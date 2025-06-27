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
                            src="../../../../assets/img/logo/367100722034201.jpeg" width="170" height="170"
                            alt="">
                        <div class="card-img-actions-overlay rounded-circle">
                            <a href="#" class="btn btn-outline-white border-2 btn-icon rounded-pill">
                                <i class="icon-plus3"></i>
                            </a>
                            <a href="user_pages_profile.html"
                                class="btn btn-outline-white border-2 btn-icon rounded-pill ml-2">
                                <i class="icon-link"></i>
                            </a>
                        </div>
                    </div>

                    <h6 class="font-weight-semibold mb-0">{{$dataCooperate->cname}}</h6>
                    <span class="d-block opacity-75">{{$dataCooperate->email}}</span>
                </div>

                <ul class="nav nav-sidebar">
                    <li class="nav-item">
                        <a href="#profile" class="nav-link active" data-toggle="tab">
                            <i class="icon-key"></i>
                            Actions
                        </a>
                    </li>
                    <li class="nav-item">
                   
                        <a href="#" class="nav-link table-success">
                            <i class="icon-calendar3"></i>
                            
                            Approve 
                            
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#inbox" class="nav-link table-danger" data-toggle="tab">
                            <i class="icon-trash"></i>
                            Reject
                            
                        </a>
                    </li>
                  
                    <li class="nav-item-divider"></li>
                   
                </ul>
            </div>


        </div>
        <!-- /sidebar content -->

    </div>
    <!-- /left sidebar component -->


    <!-- Right content -->
    <div class="tab-content flex-1">
        <div class="tab-pane fade active show" id="profile">

            <!-- Sales stats -->
            <div class="card">
                <div class="card-header header-elements-sm-inline">
                    <h6 class="card-title">Cooperate Basic Information</h6>
                    <div class="header-elements">
                        

                        <div class="list-icons ml-3">
                            <a class="list-icons-item" data-action="reload"></a>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>

                                    <th>Company Name</th>
                                    <th>Organization</th>
                                    <th>Certificate of incorporation / Registration No</th>
                                    <th>Number of Employees*</th>
                                    <th>Current Head Office</th>
                                    <th>Address</th>
                                    <th>Phone No.</th>
                                    <th>TIN No. *</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="table-success">

                                    <td>{{$dataCooperate->cname}}</td>
                                    <td>{{$dataCooperate->organization}}</td>
                                    <td>{{$dataCooperate->regNo}}</td>
                                    <td>{{$dataCooperate->employeeNo}}</td>
                                    <td>{{$dataCooperate->regHead}}</td>
                                    <td>{{$dataCooperate->employeeBox}}</td>
                                    <td>{{$dataCooperate->phone}}</td>
                                    <td>{{$dataCooperate->tinNo}}</td>
                                </tr>


                            </tbody>
                            <thead>
                                <tr>

                                    <th>Contact Person's Details Name</th>
                                    <th>Contact Person's Details Email</th>
                                    <th>Contact Person's Details Personal Phone </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="table-success">

                                    <td> {{$dataCooperate->contactName}}</td>
                                    <td> {{$dataCooperate->email}}</td>
                                    <td> {{$dataCooperate->personalPhone}}</td>
                                </tr>


                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header header-elements-sm-inline">
                    <h6 class="card-title">Mandatory Attachments of Cooperate</h6>
                    <div class="header-elements">
                        

                        <div class="list-icons ml-3">
                            <a class="list-icons-item" data-action="reload"></a>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <div class="row">
                            <div class="col-lg-12">
                                <table class="table">
                                    <thead>
                                        <tr>

                                            <th>Certificate of incorporation</th>
                                            <th>TIN Certificate</th>
                                            <th>Business License</th>
                                            <th>Brief Organization's Profile</th>
                                            <th>Membership forms for each employee including their spouse and children if they have any</th>
                                            <th>Other relevant information</th>
                                            <th>Reason for additional slots</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr class="table-success">

                                            <td> @if($dataAttachement->incorporationCertificate != "null")
                                                    <button type="button" class="btn btn-small btn-primary"
                                                        data-toggle="modal" data-target="#appFormModal"
                                                        data-id="{{ $dataAttachement->id }}" data-type="edit"
                                                        onclick="model({{ $dataAttachement->id }},'incorporationCertificate')">
                                                        <i class="icon-eye"> </i>

                                                    </button>
                                                    @endif

                                            </td>
                                            <td> @if($dataAttachement->tinCertificate != "null")
                                                    <button type="button" class="btn btn-small btn-primary"
                                                        data-toggle="modal" data-target="#appFormModal"
                                                        data-id="{{ $dataAttachement->id }}" data-type="edit"
                                                        onclick="model({{ $dataAttachement->id }},'tinCertificate')">
                                                        <i class="icon-eye"> </i>

                                                    </button>
                                                    @endif

                                            </td>
                                            <td> @if($dataAttachement->businessLicense != "null")
                                                    <button type="button" class="btn btn-small btn-primary"
                                                        data-toggle="modal" data-target="#appFormModal"
                                                        data-id="{{ $dataAttachement->id }}" data-type="edit"
                                                        onclick="model({{ $dataAttachement->id }},'businessLicense')">
                                                        <i class="icon-eye"> </i>

                                                    </button>
                                                    @endif

                                            </td>
                                            <td> @if($dataAttachement->organizationProfile != "null")
                                                    <button type="button" class="btn btn-small btn-primary"
                                                        data-toggle="modal" data-target="#appFormModal"
                                                        data-id="{{ $dataAttachement->id }}" data-type="edit"
                                                        onclick="model({{ $dataAttachement->id }},'organizationProfile')">
                                                        <i class="icon-eye"> </i>

                                                    </button>
                                                    @endif

                                            </td>
                                            <td> @if($dataAttachement->membership != "null")
                                                    <button type="button" class="btn btn-small btn-primary"
                                                        data-toggle="modal" data-target="#appFormModal"
                                                        data-id="{{ $dataAttachement->id }}" data-type="edit"
                                                        onclick="model({{ $dataAttachement->id }},'membership')">
                                                        <i class="icon-eye"> </i>

                                                    </button>
                                                    @endif

                                            </td>
                                            <td>{{$dataAttachement->infoRelevant}}</td>
                                            <td>{{$dataAttachement->reasons}}</td>

                                        </tr>
                                        


                                    </tbody>

                                </table>
                            </div>

                        </div>
                    </div>
                </div>
            </div>


            <div class="card">
                <div class="card-header header-elements-sm-inline">
                    <h6 class="card-title">Employee Details</h6>
                    <div class="header-elements">
                        

                        <div class="list-icons ml-3">
                            <a class="list-icons-item" data-action="reload"></a>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <div class="row">
                            <div class="col-lg-12">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>First Name</th>
                                            <th>Last Name</th>
                                            <th>Email</th>
                                            <th>Phone Number</th>
                                            <th>Picture</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                   
                                    @foreach($members as $row)
                                    
                                        <tr class="table-success">

                                            <td>{{$loop->iteration}}</td>
                                            <td>{{$row->fname}}</td>
                                            <td>{{$row->lname}}</td>
                                            <td>{{$row->email}}</td>
                                            <td>{{$row->phone1}}</td>
                                            <td>{{$row->picture}}</td>

                                        </tr>
                                        
                                    @endforeach

                                    </tbody>

                                </table>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

            
            <!-- /sales stats -->


            <!-- Profile info -->
           
            <!-- /profile info -->


            <!-- Account settings -->
           
            <!-- /account settings -->

        </div>

    </div>
    <!-- /right content -->

</div>

<div id="appFormModal" class="modal fade" tabindex="-1">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">File Preview</h5>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <div class="modal-body">

                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-link" data-dismiss="modal">Close</button>
                   
                </div>
            </div>
        </div>
    </div>


<!-- Main Body Ends -->
@endsection

@section('scripts')

<script>

function model(id, type) {

let url = '{{ route("mandatory.preview") }}';


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
        $('.modal-body').html(data);
    },
    error: function(error) {
        $('#appFormModal').modal('toggle');

    }
});

}
</script>
@endsection

@push('plugin-scripts')
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
@endpush
@push('custom-scripts')
<Script>
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



</Script>

@endpush