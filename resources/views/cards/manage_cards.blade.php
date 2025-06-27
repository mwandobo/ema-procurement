@extends('layout.master')


@section('content')
<style>
.colour {
    color: #191970;
}


p {
    margin-bottom: -1em;
    margin-top: 1em;
}
</style>


                <section class="section">
                    <div class="section-body">
                        <div class="row">
                            <div class="col-12 col-sm-6 col-lg-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h4>Cards</h4>
                                    </div>
                                    <div class="card-body">
                                        <ul class="nav nav-tabs" id="myTab2" role="tablist">
                                            <li class="nav-item">
                                                <a class="nav-link @if(empty($id)) active show @endif" id="home-tab2"
                                                    data-toggle="tab" href="#home2" role="tab" aria-controls="home"
                                                    aria-selected="true">Card
                                                    List</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link @if(!empty($id)) active show @endif"
                                                    id="profile-tab2" data-toggle="tab" href="#profile2" role="tab"
                                                    aria-controls="profile" aria-selected="false">New Card</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" id="home-tab3" data-toggle="tab" href="#home3"
                                                    role="tab" aria-controls="profile" aria-selected="false">Membership
                                                    Card Template</a>
                                            </li>

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
                                                                    style="width: 186.484px;">Reference No/Card ID</th>
                                                                <th class="sorting" tabindex="0"
                                                                    aria-controls="DataTables_Table_0" rowspan="1"
                                                                    colspan="1"
                                                                    aria-label="Platform(s): activate to sort column ascending"
                                                                    style="width: 186.484px;">Card Type</th>
                                                                <th class="sorting" tabindex="0"
                                                                    aria-controls="DataTables_Table_0" rowspan="1"
                                                                    colspan="1"
                                                                    aria-label="Engine version: activate to sort column ascending"
                                                                    style="width: 141.219px;">Status</th>


                                                                <th class="sorting" tabindex="0"
                                                                    aria-controls="DataTables_Table_0" rowspan="1"
                                                                    colspan="1"
                                                                    aria-label="CSS grade: activate to sort column ascending"
                                                                    style="width: 98.1094px;">Actions</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @if(!@empty($cards))
                                                            @foreach ($cards as $row)
                                                            <tr class="gradeA even" role="row">
                                                                <th>{{ $loop->iteration }}</th>
                                                                <td>{{$row->reference_no}}</td>

                                                           

                                                                @if($row->status == 1)
                                                                <td>Available</td>
                                                                @elseif($row->status == 2)
                                                                <td>Taken</td>
                                                                @endif


                                                                <td>

                                                                    <div class="form-inline">

                                                                        
                                                                            <a class="list-icons-item text-primary"
                                                                                title="Edit" o
                                                                                href="{{ route("manage_cards.edit", $row->id)}}"><i
                                                                                    class="icon-pencil7"></i></a>
                                                                        </div>

                                                                        <div class="col-lg-6">
                                                                            {!! Form::open(['route' =>
                                                                            ['manage_cards.destroy',$row->id],
                                                                            'method' => 'delete']) !!}
                                                                            {{ Form::button('<i class="icon-trash"></i>', ['type' => 'submit', 'style' => 'border:none;background: none;', 'class' => 'list-icons-item text-danger', 'title' => 'Delete', 'onclick' => "return 
                                                confirm('Are you sure?')"]) }}
                                                    {{ Form::close() }}
                                                                        </div>

                                                                 
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
                                                        <h5>Add new Card</h5>
                                                        @else
                                                        <h5>Edit Cad</h5>
                                                        @endif
                                                    </div>
                                                    <div class="card-body">
                                                        <div class="row">
                                                            <div class="col-sm-12 ">
                                                                @if(isset($id))
                                                                {{ Form::model($id, array('route' => array('manage_cards.update', $id), 'method' => 'PUT')) }}
                                                                @else
                                                                {{ Form::open(['route' => 'manage_cards.store']) }}
                                                                @method('POST')
                                                                @endif



                                                                <div class="form-group row">
                                                                    <label class="col-lg-4 col-form-label">Enter Number
                                                                        Of Cards to be generated</label>
                                                                    <div class="col-lg-8">
                                                                        <input type="number" name="card_number"
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
                                            <div class="tab-pane" id="home3" role="tabpanel"
                                                aria-labelledby="home-tab3">
                                                <div class="row">
                                                <div class="card mb-3 offset-3"
                                                    style="max-width: 500px; max-height: 300px; border-radius: 7%;">
                                                    <div class="row g-0">
                                                        <div class="col-md-4">
                                                            <img src="{{ url('assets/img/logo.jpg') }}"
                                                                class="navbar-logo" alt="logo"
                                                                style="height: 120px; padding-left: 15px;" />
                                                            <img src="https://mdbcdn.b-cdn.net/wp-content/uploads/2020/06/vertical.webp"
                                                                alt="Trendy Pants and Shoes"
                                                                class="img-fluid rounded-start"
                                                                style="height: 120px; width:120px; padding-top: 5px; padding-left: 15px; padding-bottom: 5px;" />
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="row">
                                                                <h4 class="card-title" style="color:#191970;">
                                                                    <strong>DAR ES
                                                                        SALAAM <br> GYMKHANA CLUB </strong>
                                                                </h4>
                                                            </div>
                                                            <div class="col">
                                                                <h4 style="color:#191970;"><span
                                                                        style="font-size:20px;"><strong>ID
                                                                            No.</strong></span><small
                                                                        style="font-size:14px"><b>FMM</b></small>
                                                                    <h4 style="color:#191970;font-size:16px;"><b>NAME &
                                                                            SURNAME</b></h4>
                                                                </h4>
                                                            </div>

                                                            <div class="row">
                                                                <p class="card-text colour"
                                                                    style="color:#191970; font-size:12px;">
                                                                    <b> PROPERTY OF GYMKHANA CLUB</b>
                                                                </p>
                                                                <p class="card-text"
                                                                    style="color:#191970; font-size:10px">
                                                                    P.O.Box 286, Dar es Salaam Tanzania </p>
                                                                <p class="card-text colour" style="font-size:10px;">
                                                                    Tell:+255 222120519,Fax:+255 222138445 </p>
                                                                <p class="card-text colour" style="font-size:10px;">
                                                                    E-Mail:admin@gymkhana.com </p>

                                                            </div>

                                                        </div>
                                                        <div class="col-md-2 border-right-2"
                                                            style="background-color: #191970;">
                                                            <centre>
                                                                <h3
                                                                    style="writing-mode: vertical-lr; padding-top:18px;">
                                                                    <FONT COLOR="white">
                                                                        REGULAR MEMBERSHIP
                                                                    </FONT>
                                                                </h3>
                                                            </centre>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="card mb-3 offset-3"
                                                    style="max-width: 500px; max-height: 300px; border-radius: 5%;">
                                                    <div class="col">

                                                        <div class="col">
                                                            <div class="row "
                                                                style="background-color: #191970; max-width: 500px;max-height: 300px;">
                                                                <h4 class="card-title"
                                                                    style="color:white; font-size:15px; padding-left:20px;">
                                                                    <b>CLUBS PARTICIPATING IN RECIPLOCAL MEMBERSHIP
                                                                        SCHEME<b>
                                                                </h4>
                                                            </div>

                                                            <div class="row">

                                                                <div class="col-md-4">
                                                                    <br>
                                                                    <ol>
                                                                        <li style="font-size:10px"><strong>Arusha
                                                                                Gymkhana Club</strong></li>
                                                                        <li style="font-size:9px"><strong>Bombay
                                                                                presidency Golf</strong></li>
                                                                        <li style="font-size:9px"><strong>Kampala
                                                                                presidency Golf</strong></li>
                                                                        <li style="font-size:9px"><strong>Kibene
                                                                                Club</strong></li>
                                                                        <li style="font-size:9px"><strong>Kitwe Golf
                                                                                Club</strong></li>
                                                                        <li style="font-size:9px"><strong>Lolongwe Golf
                                                                                Club</strong></li>
                                                                        <li style="font-size:9px"><strong>Limuru Country
                                                                                Club</strong></li>
                                                                        <li style="font-size:9px"><strong>Lusaka Golf
                                                                                Club</strong></li>
                                                                        <li style="font-size:9px"><strong>Mombasa Golf
                                                                                Club</strong></li>
                                                                        <li style="font-size:9px"><strong>Mombasa Sports
                                                                                Club</strong></li>
                                                                        <li style="font-size:9px"><strong>Moshi
                                                                                Club</strong></li>
                                                                        <li style="font-size:9px"><strong>Mufindi
                                                                                Club</strong></li>
                                                                    </ol>

                                                                </div>

                                                                <div class="col-md-4">
                                                                    <br>
                                                                    <ol start="13">
                                                                        <li style="font-size:9px"><strong>Muthaiga Golf
                                                                                Club</strong></li>
                                                                        <li style="font-size:9px"><strong>Ndola Golf
                                                                                Club</strong></li>
                                                                        <li style="font-size:9px"><strong>Nyali Golf $
                                                                                Country Club</strong></li>
                                                                        <li style="font-size:9px"><strong>Parklands
                                                                                Sports Club</strong></li>
                                                                        <li style="font-size:9px"><strong>Roan Antelope
                                                                                Club</strong></li>
                                                                        <li style="font-size:9px"><strong>Royal Nairobi
                                                                                Golf</strong></li>
                                                                        <li style="font-size:9px"><strong>Sigona Golf
                                                                                Club</strong></li>
                                                                        <li style="font-size:7px"><strong>The Des Moines
                                                                                Embassy Club</strong></li>
                                                                        <li style="font-size:9px"><strong>The Lusaka
                                                                                Club</strong></li>
                                                                        <li style="font-size:9px"><strong>Uganda Golf
                                                                                Club</strong></li>
                                                                        <li style="font-size:10px"><strong>Vet LAb Golf
                                                                                Club</strong></li>

                                                                    </ol>

                                                                </div>

                                                                <div class="col-md-4">
                                                                    <div style="padding-top: 35px;">
                                                                        {!! QrCode::size(150)->generate('ubwabwa'); !!}
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