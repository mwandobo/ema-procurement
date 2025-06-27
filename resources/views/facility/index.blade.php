@extends('layout.master')

@section('title')
Section
@endsection


@section('content')


                <section class="section">
                    <div class="section-body">
                        <div class="row">
                            <div class="col-12 col-sm-6 col-lg-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h4>Section</h4>
                                    </div>
                                    <div class="card-body">
                                        <ul class="nav nav-tabs" id="myTab2" role="tablist">
                                            <li class="nav-item">
                                                <a class="nav-link @if(empty($id)) active show @endif" id="home-tab2"
                                                    data-toggle="tab" href="#home2" role="tab" aria-controls="home"
                                                    aria-selected="true">Section
                                                    List</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link @if(!empty($id)) active show @endif"
                                                    id="profile-tab2" data-toggle="tab" href="#profile2" role="tab"
                                                    aria-controls="profile" aria-selected="false">New Section</a>
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
                                                                    style="width: 186.484px;">Facility name</th>
                                                                <th class="sorting" tabindex="0"
                                                                    aria-controls="DataTables_Table_0" rowspan="1"
                                                                    colspan="1"
                                                                    aria-label="Platform(s): activate to sort column ascending"
                                                                    style="width: 186.484px;">Location</th>
                                                                <th class="sorting" tabindex="0"
                                                                    aria-controls="DataTables_Table_0" rowspan="1"
                                                                    colspan="1"
                                                                    aria-label="Engine version: activate to sort column ascending"
                                                                    style="width: 141.219px;">Responsible Pesron</th>
                                                                <th class="sorting" tabindex="0"
                                                                    aria-controls="DataTables_Table_0" rowspan="1"
                                                                    colspan="1"
                                                                    aria-label="CSS grade: activate to sort column ascending"
                                                                    style="width: 98.1094px;">Actions</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @if(!@empty($facility))
                                                            @foreach ($facility as $row)
                                                            <tr class="gradeA even" role="row">
                                                                <th>{{ $loop->iteration }}</th>
                                                                <td>{{$row->name}}</td>
                                                                <td>{{$row->location}}</td>
                                                                <td>{{$row->personel}}</td>
                                                                 <td>
                                                                   <div class="form-inline">

                                                                   
                                                                            <a class="list-icons-item text-primary"
                                                                                title="Edit"
                                                                                onclick="return confirm('Are you sure?')"
                                                                                href="{{ route("facility.edit", $row->id)}}"><i
                                                                                   class="icon-pencil7"></i></a>
                                                                    
                                                                            {!! Form::open(['route' =>
                                                                            ['facility.destroy',$row->id], 'method' =>
                                                                            'delete'])
                                                                            !!}
                                                                           {{ Form::button('<i class="icon-trash"></i>', ['type' => 'submit', 'style' => 'border:none;background: none;', 'class' => 'list-icons-item text-danger', 'title' => 'Delete', 'onclick' => "return confirm('Are you sure?')"]) }}
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
                                                        <h5>Create Facility</h5>
                                                        @else
                                                        <h5>Edit Facility</h5>
                                                        @endif
                                                    </div>
                                                    <div class="card-body">
                                                        <div class="row">
                                                            <div class="col-sm-12 ">
                                                                @if(isset($id))
                                                                {{ Form::model($id, array('route' => array('facility.update', $id), 'method' => 'PUT')) }}
                                                                @else
                                                                {{ Form::open(['route' => 'facility.store']) }}
                                                                @method('POST')
                                                                @endif



                                                                <div class="form-group row">
                                                                    <label class="col-lg-2 col-form-label">Facility
                                                                        Name</label>
                                                                    <div class="col-lg-8">
                                                                        <input type="text" name="name" required
                                                                            value="{{ isset($data) ? $data->name : ''}}"
                                                                            class="form-control">
                                                                    </div>
                                                                </div>

                                                                <div class="form-group row">
                                                                    <label
                                                                        class="col-lg-2 col-form-label">Location</label>
                                                                    <div class="col-lg-8">
                                                                        <input type="text" name="location" required
                                                                            placeholder=""
                                                                            value="{{ isset($data) ? $data->location : ''}}"
                                                                            class="form-control">
                                                                    </div>
                                                                </div>

                                                                <div class="form-group row">
                                                                    <label class="col-lg-2 col-form-label">Responsible
                                                                        Person</label>
                                                                    <div class="col-lg-8">
                                                                        <input type="text" name="personel" required
                                                                            placeholder=""
                                                                            value="{{ isset($data) ? $data->personel : ''}}"
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



@section('scripts')
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