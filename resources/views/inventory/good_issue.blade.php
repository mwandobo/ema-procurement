@extends('layout.master')

@push('plugin-styles')
<!-- add some inline style or css file if any -->
{!! Html::style('plugins/table/datatable/datatables.css') !!}
{!! Html::style('plugins/table/datatable/dt-global_style.css') !!}

</style>
@endpush
@section('content')
<div class="layout-px-spacing">
    <div class="layout-top-spacing mb-2">
        <div class="col-md-12">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing">

                <section class="section">
                    <div class="section-body">
                        <div class="row">
                            <div class="col-12 col-sm-6 col-lg-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h4>Good Issue</h4>
                                    </div>
                                    <div class="card-body">
                                        <ul class="nav nav-tabs" id="myTab2" role="tablist">
                                            <li class="nav-item">
                                                <a class="nav-link @if(empty($id)) active show @endif" id="home-tab2"
                                                    data-toggle="tab" href="#home2" role="tab" aria-controls="home"
                                                    aria-selected="true">Good Issue
                                                    List</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link @if(!empty($id)) active show @endif"
                                                    id="profile-tab2" data-toggle="tab" href="#profile2" role="tab"
                                                    aria-controls="profile" aria-selected="false">New Good Issue</a>
                                            </li>

                                        </ul>
                                        <div class="tab-content tab-bordered" id="myTab3Content">
                                            <div class="tab-pane fade @if(empty($id)) active show @endif" id="home2"
                                                role="tabpanel" aria-labelledby="home-tab2">
                                                <div class="table-responsive">
                                                    <table class="table table-striped" id="table-1">
                                                        <thead>
                                                            <tr role="row">

                                                                <th class="sorting" tabindex="0"
                                                                    aria-controls="DataTables_Table_0" rowspan="1"
                                                                    colspan="1"
                                                                    aria-label="Browser: activate to sort column ascending"
                                                                    style="width: 208.531px;">#</th>
                                                                <th class="sorting" tabindex="0"
                                                                    aria-controls="DataTables_Table_0" rowspan="1"
                                                                    colspan="1"
                                                                    aria-label="Platform(s): activate to sort column ascending"
                                                                    style="width: 186.484px;">Date</th>
                                                                <th class="sorting" tabindex="0"
                                                                    aria-controls="DataTables_Table_0" rowspan="1"
                                                                    colspan="1"
                                                                    aria-label="Engine version: activate to sort column ascending"
                                                                    style="width: 141.219px;">Location</th>
                                                                <th class="sorting" tabindex="0"
                                                                    aria-controls="DataTables_Table_0" rowspan="1"
                                                                    colspan="1"
                                                                    aria-label="Engine version: activate to sort column ascending"
                                                                    style="width: 141.219px;">Type</th>
                                                                <th class="sorting" tabindex="0"
                                                                    aria-controls="DataTables_Table_0" rowspan="1"
                                                                    colspan="1"
                                                                    aria-label="CSS grade: activate to sort column ascending"
                                                                    style="width: 98.1094px;">Service/Maintainance</th>
                                                                <th class="sorting" tabindex="0"
                                                                    aria-controls="DataTables_Table_0" rowspan="1"
                                                                    colspan="1"
                                                                    aria-label="CSS grade: activate to sort column ascending"
                                                                    style="width: 98.1094px;">Mechanical</th>

                                                                <th class="sorting" tabindex="0"
                                                                    aria-controls="DataTables_Table_0" rowspan="1"
                                                                    colspan="1"
                                                                    aria-label="CSS grade: activate to sort column ascending"
                                                                    style="width: 98.1094px;">Action</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @if(!@empty($issue))
                                                            @foreach ($issue as $row)
                                                            <tr class="gradeA even" role="row">
                                                                <th>{{ $loop->iteration }}</th>
                                                                <td>{{Carbon\Carbon::parse($row->date)->format('M d, Y')}}
                                                                </td>
                                                                <td>
                                                                    @php
                                                                    $tr=App\Models\Inventory\Location::where('id',
                                                                    $row->location)->get();
                                                                    @endphp
                                                                    @foreach($tr as $t)
                                                                    {{$t->name}}
                                                                    @endforeach
                                                                </td>
                                                                <td>

                                                                    {{$row->type}}

                                                                </td>

                                                                <td>
                                                                    @if($row->type == 'Service')
                                                                    @php
                                                                    $service=
                                                                    App\Models\Logistic\Service::where('id',$row->type_id)->first();
                                                                    @endphp
                                                                    {{$service->truck_name}}
                                                                    @elseif($row->type == 'Maintenance')
                                                                    @php
                                                                    $maintain=App\Models\Logistic\Maintainance::where('id',$row->type_id)->first();
                                                                    @endphp
                                                                    {{$maintain->truck_name}}
                                                                    @endif
                                                                </td>

                                                                <td>
                                                                    @php
                                                                    $st=App\Models\Inventory\FieldStaff::where('id',
                                                                    $row->staff)->get();
                                                                    @endphp
                                                                    @foreach($st as $s)
                                                                    {{$s->name}}
                                                                    @endforeach
                                                                </td>

                                                                <td>

                                                                    <a class="btn btn-xs btn-outline-info text-uppercase px-2 rounded"
                                                                        href="{{ route("good_issue.edit", $row->id)}}">
                                                                        <i class="fa fa-edit"></i>
                                                                    </a>

                                                                    {!! Form::open(['route' =>
                                                                    ['good_issue.destroy',$row->id],
                                                                    'method' => 'delete']) !!}
                                                                    {{ Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-xs btn-outline-danger text-uppercase px-2 rounded demo4', 'title' => 'Delete', 'onclick' => "return confirm('Are you sure?')"]) }}
                                                                    {{ Form::close() }}

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
                                                        @if(!empty($id))
                                                        <h5>Edit Good Issue</h5>
                                                        @else
                                                        <h5>Add New Good Issue</h5>
                                                        @endif
                                                    </div>
                                                    <div class="card-body">
                                                        <div class="row">
                                                            <div class="col-sm-12 ">
                                                                @if(isset($id))
                                                                {{ Form::model($id, array('route' => array('good_issue.update', $id), 'method' => 'PUT')) }}
                                                                @else
                                                                {{ Form::open(['route' => 'good_issue.store']) }}
                                                                @method('POST')
                                                                @endif

                                                                <div class="form-group row">
                                                                    <label class="col-lg-2 col-form-label">Date</label>
                                                                    <div class="col-lg-4">
                                                                        <input type="date" name="date"
                                                                            placeholder="0 if does not exist"
                                                                            value="{{ isset($data) ? $data->date : ''}}"
                                                                            class="form-control" required>
                                                                    </div>

                                                                    <label
                                                                        class="col-lg-2 col-form-label">Location</label>
                                                                    <div class="col-lg-4">
                                                                        <select class="form-control" name="location"
                                                                            required id="supplier_id">
                                                                            <option value="">Select Location</option>
                                                                            @if(!empty($location))
                                                                            @foreach($location as $row)

                                                                            <option @if(isset($data))
                                                                                {{ $data->location == $row->id  ? 'selected' : ''}}
                                                                                @endif value="{{$row->id}}">
                                                                                {{$row->name}}</option>

                                                                            @endforeach
                                                                            @endif

                                                                        </select>
                                                                    </div>
                                                                </div>



                                                                <div class="form-group row">
                                                                    <label class="col-lg-2 col-form-label">Type</label>
                                                                    <div class="col-lg-4">
                                                                        <select class="form-control type" name="type"
                                                                            required id="type">
                                                                            <option value="">Select
                                                                            <option @if(isset($data))
                                                                                {{$data->type== 'Service'  ? 'selected' : ''}}
                                                                                @endif value="Service">Service</option>
                                                                            <option @if(isset($data))
                                                                                {{$data->type== 'Maintenance'  ? 'selected' : ''}}
                                                                                @endif value="Maintenance">Maintenance
                                                                            </option>


                                                                        </select>
                                                                    </div>

                                                                    <label
                                                                        class="col-lg-2 col-form-label">Service/Maintainance</label>

                                                                    <div class="col-lg-4">
                                                                        <select class="form-control type_id"
                                                                            name="type_id" required id="type_id">

                                                                            @if(!empty($data->type_id))

                                                                            <option value="">Select </option>
                                                                            @if($data->type == 'Service')
                                                                            @php
                                                                            $svc=
                                                                            App\Models\Logistic\Service::where('status','=','0')->get();
                                                                            @endphp
                                                                            @foreach($svc as $s)

                                                                            <option @if(isset($data))
                                                                                {{ $data->type_id == $s->id  ? 'selected' : ''}}
                                                                                @endif value="{{$s->id}}">
                                                                                {{$s->truck_name}}</option>
                                                                            @endforeach

                                                                            @elseif($data->type == 'Maintenance')
                                                                            @php
                                                                            $mn=
                                                                            App\Models\Maintainance::where('status','=','0')->get();
                                                                            @endphp
                                                                            @foreach( $mn as $m)

                                                                            <option @if(isset($data))
                                                                                {{ $data->type_id == $m->id  ? 'selected' : ''}}
                                                                                @endif value="{{$m->id}}">
                                                                                {{$m->truck_name}}</option>
                                                                            @endforeach

                                                                            @endif

                                                                            @else

                                                                            <option value="">Select </option>
                                                                            @endif
                                                                        </select>
                                                                    </div>
                                                                </div>



                                                                <br>
                                                                <h4 align="center">Enter Details</h4>
                                                                <hr>


                                                                <button type="button" name="add"
                                                                    class="btn btn-success btn-xs add"><i
                                                                        class="fas fa-plus"> Add item</i></button><br>
                                                                <br>
                                                                <div class="table-responsive">
                                                                    <table class="table table-bordered" id="cart">
                                                                        <thead>
                                                                            <tr>
                                                                                <th>Item Name</th>
                                                                                <th>Quantity</th>
                                                                                <th>Action</th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody>


                                                                        </tbody>
                                                                        <tfoot>
                                                                            @if(!empty($id))
                                                                            @if(!empty($items))
                                                                            @foreach ($items as $i)
                                                                            <tr class="line_items">

                                                                                <td><select name="item_id[]"
                                                                                        class="form-control item_name{{$i->order_no}}"
                                                                                        required>
                                                                                        <option value="">Select Item
                                                                                        </option>@foreach($inventory
                                                                                        as $n) <option
                                                                                            value="{{ $n->id}}"
                                                                                            @if(isset($i))@if($n->id ==
                                                                                            $i->item_id)
                                                                                            selected @endif @endif
                                                                                            >{{$n->name}}</option>
                                                                                        @endforeach
                                                                                    </select></td>
                                                                                <td><input type="number"
                                                                                        name="quantity[]"
                                                                                        class="form-control item_quantity{{$i->order_no}}"
                                                                                        placeholder="quantity"
                                                                                        id="quantity"
                                                                                        value="{{ isset($i) ? $i->quantity : ''}}"
                                                                                        required /></td>


                                                                                <input type="hidden" name="saved_id[]"
                                                                                    class="form-control item_saved{{$i->order_no}}"
                                                                                    value="{{ isset($i) ? $i->id : ''}}"
                                                                                    required />
                                                                                <td><button type="button" name="remove"
                                                                                        class="btn btn-danger btn-xs rem"
                                                                                        value="{{ isset($i) ? $i->id : ''}}"><i
                                                                                            class="fas fa-trash"></i></button>
                                                                                </td>
                                                                            </tr>

                                                                            @endforeach
                                                                            @endif
                                                                            @endif

                                                                        </tfoot>
                                                                    </table>
                                                                </div>


                                                                <br>


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

<script>
$(document).ready(function() {



    $(document).on('change', '.type', function() {
        var id = $(this).val();
        $.ajax({
            url: '{{url("findIssueService")}}',
            type: "GET",
            data: {
                id: id
            },
            dataType: "json",
            success: function(response) {
                console.log(response);
                $("#type_id").empty();
                $("#type_id").append('<option value="">Select</option>');
                $.each(response, function(key, value) {
                    if (id == "Service") {
                        $("#type_id").append('<option value=' + value.id + '>' +
                            value.truck_name + '</option>');
                    } else if (id == "Maintenance") {
                        $("#type_id").append('<option value=' + value.id + '>' +
                            value.truck_name + '</option>');
                    }

                });



            }

        });

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
        html +=
            '<td><select name="item_id[]" class="form-control item_name" required  data-sub_category_id="' +
            count +
            '"><option value="">Select Item</option>@foreach($inventory as $n) <option value="{{ $n->id}}">{{$n->name}}</option>@endforeach</select></td>';
        html +=
            '<td><input type="number" name="quantity[]" class="form-control item_quantity" data-category_id="' +
            count + '"placeholder ="quantity" id ="quantity" required /></td>';

        html +=
            '<td><button type="button" name="remove" class="btn btn-danger btn-xs remove"><i class="fas fa-trash"></i></button></td>';

        $('tbody').append(html);

    });

    $(document).on('click', '.remove', function() {
        $(this).closest('tr').remove();

    });


    $(document).on('click', '.rem', function() {
        var btn_value = $(this).attr("value");
        $(this).closest('tr').remove();
        $('tbody').append(
            '<input type="hidden" name="removed_id[]"  class="form-control name_list" value="' +
            btn_value + '"/>');

    });

});
</script>

<script src="{{ url('assets/js/plugins/sweetalert/sweetalert.min.js') }}"></script>
@endpush