@extends('layout.master')

@section('content')


                <section class="section">
                    <div class="section-body">
                        <div class="row">
                            <div class="col-12 col-sm-6 col-lg-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h4>New Cooperate</h4>
                                    </div>
                                    <div class="card-body">
                                        <ul class="nav nav-tabs" id="myTab2" role="tablist">
                                            <li class="nav-item">
                                                <a class="nav-link @if(empty($id)) active show @endif" id="home-tab2"
                                                    data-toggle="tab" href="#home2" role="tab" aria-controls="home"
                                                    aria-selected="true">Cooperate
                                                    List</a>
                                            </li>
                                            <!--
    <li class="nav-item">
                        <a class="nav-link @if(!empty($id)) active show @endif" id="profile-tab2"
    data-toggle="tab" href="#profile2" role="tab" aria-controls="profile"
    aria-selected="false">New Deposit</a>
                                       </li> -->


                                        </ul>
                                        <div class="tab-content tab-bordered" id="myTab3Content">
                                            <div class="tab-pane fade @if(empty($id)) active show @endif" id="home2"
                                                role="tabpanel" aria-labelledby="home-tab2">
                                                <div class="table-responsive">
                                                    <table class="table datatable-basic table-striped" id="table-1">
                                                        <thead>
                                                            <tr>
                                                                <th class="sorting" tabindex="0"
                                                                    aria-controls="DataTables_Table_0" rowspan="1"
                                                                    colspan="1"
                                                                    aria-label="Browser: activate to sort column ascending"
                                                                    style="width: 28.531px;">#</th>
                                                                <th class="sorting" tabindex="0"
                                                                    aria-controls="DataTables_Table_0" rowspan="1"
                                                                    colspan="1"
                                                                    aria-label="Platform(s): activate to sort column ascending"
                                                                    style="width: 300.484px;">Company Name</th>
                                                                <th class="sorting" tabindex="0"
                                                                    aria-controls="DataTables_Table_0" rowspan="1"
                                                                    colspan="1"
                                                                    aria-label="Platform(s): activate to sort column ascending"
                                                                    style="width: 250.484px;">Type Of Organization</th>
                                                                <th class="sorting" tabindex="0"
                                                                    aria-controls="DataTables_Table_0" rowspan="1"
                                                                    colspan="1"
                                                                    aria-label="Platform(s): activate to sort column ascending"
                                                                    style="width: 250.484px;">Email</th>



                                                                <th class="sorting" tabindex="0"
                                                                    aria-controls="DataTables_Table_0" rowspan="1"
                                                                    colspan="1"
                                                                    aria-label="CSS grade: activate to sort column ascending"
                                                                    style="width: 98.1094px;">Actions</th>

                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @if(!@empty($members))
                                                            @foreach ($members as $row)
                                                            <tr class="gradeA even" role="row">
                                                                <th>{{ $loop->iteration }}</th>
                                                                <td>{{$row->cname}}</td>


                                                                <td>{{$row->organization}} 
                                                                </td>



                                                                <td>{{$row->email}}</td>






                                                                <td>

                                                                    <a class="nav-link" title="Convert to Invoice"
                                                                        href="{{ route('manage_cooperate.show', $row->id)}}">View
                                                                        More
                                                                    </a>
                                                                    <a class="nav-link" title="View More"
                                                                        href="{{ route('manage_cooperate.edit', $row->id)}}">Approve
                                                                    </a>


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
                                                        <h5>Deposit</h5>
                                                        @else
                                                        <h5>Deposit</h5>
                                                        @endif
                                                    </div>
                                                    <div class="card-body">
                                                        <div class="row">
                                                            <div class="col-sm-12 ">
                                                                @if(isset($id))
                                                                {{ Form::model($id, array('route' => array('card_deposit.update', $id), 'method' => 'PUT')) }}
                                                                @else
                                                                {{ Form::open(['route' => 'card_deposit.store']) }}
                                                                @method('POST')
                                                                @endif



                                                                <input type="hidden" name="card_id"
                                                                    value="{{ isset($id) ? $id : ''}}">

                                                                <div class="form-group row">
                                                                    <label class="col-lg-2 col-form-label">Enter
                                                                        Ammount</label>
                                                                    <div class="col-lg-8">
                                                                        <input type="text" name="amount"
                                                                            value="{{ isset($data) ? $data->amount : ''}}"
                                                                            class="form-control">

                                                                    </div>
                                                                </div>


                                                                <div class="form-group row">
                                                                    <div class="col-lg-offset-2 col-lg-12">
                                                                        @if(!@empty($id))
                                                                        <button
                                                                            class="btn btn-sm btn-primary float-right m-t-n-xs"
                                                                            data-toggle="modal" data-target="#myModal"
                                                                            type="submit">Update</button>
                                                                        @else
                                                                        <button
                                                                            class="btn btn-sm btn-primary float-right m-t-n-xs"
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