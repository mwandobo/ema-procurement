@extends('layout.master')

@push('plugin-styles')
<!-- add some inline style or css file if any -->
{!! Html::style('plugins/table/datatable/datatables.css') !!}
{!! Html::style('plugins/table/datatable/dt-global_style.css') !!}
/* inline css */
</style>
@endpush

@section('content')

<!-- Main Body Starts -->
<div class="layout-px-spacing">
    <div class="layout-top-spacing mb-2">
        <div class="col-md-12">

            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12 layout-spacing">
                    <div class="statbox widget box box-shadow">
                        <div class="widget-header">
                            <div class="row">
                                <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                    <h4>Charges List</h4>
                                </div>
                            </div>
                        </div>
                        <div class="widget-content widget-content-area tab-horizontal-line">
                            <ul class="nav nav-tabs  mb-3" id="animateLine" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link @if(empty($id)) active show @endif"
                                        id="animated-underline-home-tab" data-toggle="tab"
                                        href="#animated-underline-home" role="tab"
                                        aria-controls="animated-underline-home" aria-selected="true"> Charges List
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link @if(!empty($id)) active show @endif"
                                        id="animated-underline-about-tab" data-toggle="tab"
                                        href="#animated-underline-about" role="tab"
                                        aria-controls="animated-underline-about" aria-selected="false">New Charge
                                    </a>
                                </li>

                            </ul>
                            <div class="tab-content" id="animateLineContent-4">

                                <div class="tab-pane fade @if(empty($id)) active show @endif"
                                    id="animated-underline-home" role="tabpanel"
                                    aria-labelledby="animated-underline-home-tab">
                                    <div class="table-responsive">
                                        <table id="basic-dt" class="table table-hover" style="width:100%">


                                            <thead>
                                                <tr>

                                                    <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0"
                                                        rowspan="1" colspan="1"
                                                        aria-label="Platform(s): activate to sort column ascending"
                                                        style="width: 186.484px;">#</th>
                                                    <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0"
                                                        rowspan="1" colspan="1"
                                                        aria-label="Platform(s): activate to sort column ascending"
                                                        style="width: 186.484px;">Charge Type</th>
                                                    <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0"
                                                        rowspan="1" colspan="1"
                                                        aria-label="Platform(s): activate to sort column ascending"
                                                        style="width: 186.484px;">Membership TYpe</th>
                                                    <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0"
                                                        rowspan="1" colspan="1"
                                                        aria-label="Platform(s): activate to sort column ascending"
                                                        style="width: 186.484px;">Development Fee</th>
                                                    <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0"
                                                        rowspan="1" colspan="1"
                                                        aria-label="Platform(s): activate to sort column ascending"
                                                        style="width: 186.484px;">Subscription Fee</th>

                                                    <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0"
                                                        rowspan="1" colspan="1"
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
                                                    <td>{{$row->development_fee}}</td>
                                                    <td>{{$row->development_fee}}</td>




                                                    <td>

                                                        <a class="btn btn-xs btn-outline-info text-uppercase px-2 rounded"
                                                            title="Edit" onclick="return confirm('Are you sure?')"
                                                            href="{{ route('manage_charge.edit', $row->id)}}"><i
                                                                class="las la-edit"></i></a>


                                                        {!! Form::open(['route' => ['manage_charge.destroy',$row->id],
                                                        'method' => 'delete']) !!}
                                                        {{ Form::button('<i class="las la-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-xs btn-outline-danger text-uppercase px-2 rounded demo4', 'title' => 'Delete', 'onclick' => "return confirm('Are you sure?')"]) }}
                                                        {{ Form::close() }}



                                                    </td>
                                                </tr>
                                                @endforeach

                                                @endif

                                            </tbody>
                                        </table>
                                    </div>
                                </div>





                                <div class="tab-pane fade @if(!empty($id)) active show @endif"
                                    id="animated-underline-about" role="tabpanel"
                                    aria-labelledby="animated-underline-about-tab">
                                    <div class="card">
                                        <div class="card-header">

                                            @if(empty($id))
                                            <h5>Create Charge</h5>
                                            @else
                                            <h5>Edit Charge</h5>
                                            @endif
                                        </div>
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-sm-12 ">

                                                    @if(isset($id))
                                                    {{ Form::model($id, array('route' => array('manage_charge.update', $id), 'method' => 'PUT')) }}
                                                    @else
                                                    {{ Form::open(['route' => 'manage_charge.store']) }}
                                                    @method('POST')
                                                    @endif


                                                    <div class="form-group row">
                                                        <label class="col-lg-3 col-form-label"> Charge Type</label>
                                                        <div class="col-lg-4">
                                                            <select class="form-control" name="charge_type" required
                                                                id="supplier_id">
                                                                <option value="">Select</option>
                                                                @if(!empty($charge_type))
                                                                @foreach($charge_type as $row)

                                                                <option @if(isset($data))
                                                                    {{  $data->charge_type == $row->id  ? 'selected' : ''}}
                                                                    @endif value="{{ $row->id}}">{{$row->name}}</option>

                                                                @endforeach
                                                                @endif

                                                            </select>
                                                        </div>

                                                    </div>

                                                    <div class="form-group row">
                                                        <label class="col-lg-3 col-form-label"> Membership Type</label>
                                                        <div class="col-lg-4">

                                                            <select class="form-control" name="membership_type" required
                                                                id="supplier_id">
                                                                <option value="">Select</option>
                                                                @if(!empty($membership_type))
                                                                @foreach($membership_type as $row)

                                                                <option @if(isset($data))
                                                                    {{  $data->membership_type == $row->id  ? 'selected' : ''}}
                                                                    @endif value="{{ $row->id}}">{{$row->name}}</option>

                                                                @endforeach
                                                                @endif

                                                            </select>
                                                        </div>

                                                    </div>

                                                    <div class="form-group row">
                                                        <label class="col-lg-3 col-form-label">Development Fee</label>
                                                        <div class="col-lg-4">
                                                            <input type="text" name="development_fee"
                                                                value="{{ isset($data) ? $data->development_fee : ''}}"
                                                                class="form-control" required>
                                                        </div>

                                                    </div>

                                                    <div class="form-group row">
                                                        <label class="col-lg-3 col-form-label">Subscription Fee</label>
                                                        <div class="col-lg-4">
                                                            <input type="text" name="subscription_fee"
                                                                value="{{ isset($data) ? $data->subscription_fee : ''}}"
                                                                class="form-control" required>
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
            </div>









            <!-- Main Body Ends -->
            @endsection

            <!-- push external js if any -->
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
                $('#basic-dt').DataTable({
                    "language": {
                        "paginate": {
                            "previous": "<i class='las la-angle-left'></i>",
                            "next": "<i class='las la-angle-right'></i>"
                        }
                    },
                    "lengthMenu": [10, 25, 50, 100],
                    "pageLength": 10
                });
                $('#dropdown-dt').DataTable({
                    "language": {
                        "paginate": {
                            "previous": "<i class='las la-angle-left'></i>",
                            "next": "<i class='las la-angle-right'></i>"
                        }
                    },
                    "lengthMenu": [5, 10, 15, 20],
                    "pageLength": 5
                });
                $('#last-page-dt').DataTable({
                    "pagingType": "full_numbers",
                    "language": {
                        "paginate": {
                            "first": "<i class='las la-angle-double-left'></i>",
                            "previous": "<i class='las la-angle-left'></i>",
                            "next": "<i class='las la-angle-right'></i>",
                            "last": "<i class='las la-angle-double-right'></i>"
                        }
                    },
                    "lengthMenu": [3, 6, 9, 12],
                    "pageLength": 3
                });
                $.fn.dataTable.ext.search.push(
                    function(settings, data, dataIndex) {
                        var min = parseInt($('#min').val(), 10);
                        var max = parseInt($('#max').val(), 10);
                        var age = parseFloat(data[3]) || 0; // use data for the age column
                        if ((isNaN(min) && isNaN(max)) ||
                            (isNaN(min) && age <= max) ||
                            (min <= age && isNaN(max)) ||
                            (min <= age && age <= max)) {
                            return true;
                        }
                        return false;
                    }
                );
                var table = $('#range-dt').DataTable({
                    "language": {
                        "paginate": {
                            "previous": "<i class='las la-angle-left'></i>",
                            "next": "<i class='las la-angle-right'></i>"
                        }
                    },
                    "lengthMenu": [5, 10, 15, 20],
                    "pageLength": 5
                });
                $('#min, #max').keyup(function() {
                    table.draw();
                });
                $('#export-dt').DataTable({
                    dom: '<"row"<"col-md-6"B><"col-md-6"f> ><""rt> <"col-md-12"<"row"<"col-md-5"i><"col-md-7"p>>>',
                    buttons: {
                        buttons: [{
                                extend: 'copy',
                                className: 'btn btn-primary'
                            },
                            {
                                extend: 'csv',
                                className: 'btn btn-primary'
                            },
                            {
                                extend: 'excel',
                                className: 'btn btn-primary'
                            },
                            {
                                extend: 'pdf',
                                className: 'btn btn-primary'
                            },
                            {
                                extend: 'print',
                                className: 'btn btn-primary'
                            }
                        ]
                    },
                    "language": {
                        "paginate": {
                            "previous": "<i class='las la-angle-left'></i>",
                            "next": "<i class='las la-angle-right'></i>"
                        }
                    },
                    "lengthMenu": [7, 10, 20, 50],
                    "pageLength": 7
                });
                // Add text input to the footer
                $('#single-column-search tfoot th').each(function() {
                    var title = $(this).text();
                    $(this).html('<input type="text" class="form-control" placeholder="Search ' +
                        title + '" />');
                });
                // Generate Datatable
                var table = $('#single-column-search').DataTable({
                    "language": {
                        "paginate": {
                            "previous": "<i class='las la-angle-left'></i>",
                            "next": "<i class='las la-angle-right'></i>"
                        }
                    },
                    "lengthMenu": [5, 10, 15, 20],
                    "pageLength": 5
                });
                // Search
                table.columns().every(function() {
                    var that = this;
                    $('input', this.footer()).on('keyup change', function() {
                        if (that.search() !== this.value) {
                            that
                                .search(this.value)
                                .draw();
                        }
                    });
                });
                var table = $('#toggle-column').DataTable({
                    "language": {
                        "paginate": {
                            "previous": "<i class='las la-angle-left'></i>",
                            "next": "<i class='las la-angle-right'></i>"
                        }
                    },
                    "lengthMenu": [5, 10, 15, 20],
                    "pageLength": 5
                });
                $('a.toggle-btn').on('click', function(e) {
                    e.preventDefault();
                    // Get the column API object
                    var column = table.column($(this).attr('data-column'));
                    // Toggle the visibility
                    column.visible(!column.visible());
                    $(this).toggleClass("toggle-clicked");
                });
            });
            </script>

            @endpush