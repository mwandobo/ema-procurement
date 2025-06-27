@extends('layout.master')
@section('title')
Member Charges Deposit
@endsection

@section('content')


                <section class="section">
                    <div class="section-body">
                        <div class="row">
                            <div class="col-12 col-sm-6 col-lg-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h4>Member Charges Deposit</h4>
                                    </div>
                                    <div class="card-body">
                                       <ul class="nav nav-tabs" id="myTab2" role="tablist">
                                       <li class="nav-item">
                              <a class="nav-link @if(empty($id)) active show @endif" id="home-tab2"
                                                    data-toggle="tab" href="#home2" role="tab" aria-controls="home"
                                                    aria-selected="true">Member Charges Deposit</a>
                            </li>
                            <li class="nav-item">
                                 <a class="nav-link @if(!empty($id)) active show @endif"
                                                    id="profile-tab2" data-toggle="tab" href="#profile2" role="tab"
                                                    aria-controls="profile" aria-selected="false">New Member Charge</a>
                            </li>

                        </ul>
                                        
                                        <div class="tab-content tab-bordered" id="myTab3Content">
                                            <div class="tab-pane fade @if(empty($id)) active show @endif" id="home2"
                                                role="tabpanel" aria-labelledby="home-tab2">
                                                <div class="table-responsive">
                                                    <table id="basic-dt" class="table datatable-basic table-striped"" style="width:100%">


                                                        <thead>
                                                            <tr>

                                                                <th class="sorting" tabindex="0"
                                                                    aria-controls="DataTables_Table_0" rowspan="1"
                                                                    colspan="1"
                                                                    aria-label="Platform(s): activate to sort column ascending"
                                                                    style="width: 28.484px;">#</th>
                                                                <th class="sorting" tabindex="0"
                                                                    aria-controls="DataTables_Table_0" rowspan="1"
                                                                    colspan="1"
                                                                    aria-label="Platform(s): activate to sort column ascending"
                                                                    style="width: 156.484px;">Charge Type</th>
                                                                <th class="sorting" tabindex="0"
                                                                    aria-controls="DataTables_Table_0" rowspan="1"
                                                                    colspan="1"
                                                                    aria-label="Platform(s): activate to sort column ascending"
                                                                    style="width: 186.484px;">Membership TYpe</th>
                                                                <th class="sorting" tabindex="0"
                                                                    aria-controls="DataTables_Table_0" rowspan="1"
                                                                    colspan="1"
                                                                    aria-label="Platform(s): activate to sort column ascending"
                                                                    style="width: 156.484px;">Development Fee</th>
                                                                <th class="sorting" tabindex="0"
                                                                    aria-controls="DataTables_Table_0" rowspan="1"
                                                                    colspan="1"
                                                                    aria-label="Platform(s): activate to sort column ascending"
                                                                    style="width: 156.484px;">Subscription Fee</th>

                                                                <th class="sorting" tabindex="0"
                                                                    aria-controls="DataTables_Table_0" rowspan="1"
                                                                    colspan="1"
                                                                    aria-label="CSS grade: activate to sort column ascending"
                                                                    style="width: 98.1094px;">Actions</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @if(!@empty($charge))
                                                            @foreach ($charge as $row)
                                                            <tr class="gradeA even" role="row">

                                                                <td>
                                                                    {{ $loop->iteration }}
                                                                </td>
                                                                <td>{{$row->charge_types->name}}</td>
                                                                <td>{{$row->membership_types->name}}</td>
                                                                <td>{{number_format($row->development_fee,2)}}</td>
                                                                <td>{{number_format($row->development_fee,2)}}</td>




                                                                <td>
                                                            
                                                      

                                                                </td>
                                                            </tr>
                                                            @endforeach

                                                            @endif

                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                            <div class="tab-pane fade @if(!empty($id)) active show @endif" id="profile2"
                                                role="tabpanel" aria-labelledby="profile-tab2">

                                                <div class="card">
                                                    <div class="card-header">

                                                        @if(empty($id))
                                                        <h5>Create Member Charge Deposit</h5>
                                                        @else
                                                        <h5>Edit Member Charge Deposit</h5>
                                                        @endif
                                                    </div>
                                                    <div class="card-body">
                                                        <div class="row">
                                                            <div class="col-sm-12 ">

                                                                {{ Form::open(['route' => 'member_deposit_index.store']) }}
                                                                @method('POST')


                                                                <div class="form-group row">
                                                                    <label class="col-lg-3 col-form-label"> Charge
                                                                        Type</label>
                                                                    <div class="col-lg-4">
                                                                        <select class="form-control m-b" name="charge_type"
                                                                            required id="charge_type">
                                                                            <option value="">Select</option>
                                                                            @if(!empty($charge_type))
                                                                            @foreach($charge_type as $row)

                                                                            <option value="{{ $row->id}}">
                                                                                {{$row->name}}</option>

                                                                            @endforeach
                                                                            @endif

                                                                        </select>
                                                                    </div>

                                                                </div>

                                                                <div class="form-group row">
                                                                    <label class="col-lg-3 col-form-label"> Membership
                                                                        Type</label>
                                                                    <div class="col-lg-4">

                                                                        <select class="form-control m-b"
                                                                            name="membership_type" required
                                                                            id="membership_type">
                                                                            <option value="">Select</option>
                                                                            @if(!empty($membership_type))
                                                                            @foreach($membership_type as $row)

                                                                            <option value="{{ $row->id}}">
                                                                                {{$row->name}}</option>

                                                                            @endforeach
                                                                            @endif

                                                                        </select>
                                                                    </div>

                                                                </div>

                                                                <div class="form-group row">
                                                                    <label class="col-lg-3 col-form-label">Development
                                                                        Fee</label>
                                                                    <div class="col-lg-4">
                                                                        <input type="text" name="development_fee"
                                                                            class="form-control" required>
                                                                    </div>

                                                                </div>

                                                                <div class="form-group row">
                                                                    <label class="col-lg-3 col-form-label">Subscription
                                                                        Fee</label>
                                                                    <div class="col-lg-4">
                                                                        <input type="text" name="subscription_fee"
                                                                            class="form-control" required>
                                                                    </div>

                                                                </div>



                                                                <div class="form-group row">
                                                                    <div class="col-lg-offset-2 col-lg-12">
                                                                       
                                                                        <button
                                                                            class="btn btn-sm btn-primary float-right m-t-n-xs"
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
            </div>
        </div>
    </div>
</div>


@endsection
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


@push('custom-scripts')
<script>
$(document).ready(function() {
    $('.dataTables-example').DataTable({
        pageLength: 25,
        responsive: true,
        dom: '<"html5buttons"B>lTfgitp',
        buttons: [{
                extend: 'copy'
            },
            {
                extend: 'csv'
            },
            {
                extend: 'excel',
                title: 'ExampleFile'
            },
            {
                extend: 'pdf',
                title: 'ExampleFile'
            },

            {
                extend: 'print',
                customize: function(win) {
                    $(win.document.body).addClass('white-bg');
                    $(win.document.body).css('font-size', '10px');

                    $(win.document.body).find('table')
                        .addClass('compact')
                        .css('font-size', 'inherit');
                }
            }
        ]

    });

});


$('.demo4').click(function() {
    swal({
        title: "Are you sure?",
        text: "You will not be able to recover this imaginary file!",
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "#DD6B55",
        confirmButtonText: "Yes, delete it!",
        closeOnConfirm: false
    }, function() {
        swal("Deleted!", "Your imaginary file has been deleted.", "success");
    });
});
</script>
<script src="{{ url('assets/js/plugins/sweetalert/sweetalert.min.js') }}"></script>
@endpush