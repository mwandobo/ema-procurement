@extends('layout.master')
@section('title')
Membership Type
@endsection

@section('content')


                <section class="section">
                    <div class="section-body">
                        <div class="row">
                            <div class="col-12 col-sm-6 col-lg-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h4>Membership Type</h4>
                                    </div>
                                    <div class="card-body">
                                       <ul class="nav nav-tabs" id="myTab2" role="tablist">
                                       <li class="nav-item">
                              <a class="nav-link @if(empty($id)) active show @endif" id="home-tab2"
                                                    data-toggle="tab" href="#home2" role="tab" aria-controls="home"
                                                    aria-selected="true">Membership Type List</a>
                            </li>
                            <li class="nav-item">
                                 <a class="nav-link @if(!empty($id)) active show @endif"
                                                    id="profile-tab2" data-toggle="tab" href="#profile2" role="tab"
                                                    aria-controls="profile" aria-selected="false">New Membership Type</a>
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
                                                                    style="width: 186.484px;">Name</th>
                                                                <th class="sorting" tabindex="0"
                                                                    aria-controls="DataTables_Table_0" rowspan="1"
                                                                    colspan="1"
                                                                    aria-label="Platform(s): activate to sort column ascending"
                                                                    style="width: 156.484px;">Class</th>
                                                               
                                                                <th class="sorting" tabindex="0"
                                                                    aria-controls="DataTables_Table_0" rowspan="1"
                                                                    colspan="1"
                                                                    aria-label="CSS grade: activate to sort column ascending"
                                                                    style="width: 98.1094px;">Actions</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @if(!@empty($type))
                                                            @foreach ($type as $row)
                                                            <tr class="gradeA even" role="row">

                                                                <td>
                                                                    {{ $loop->iteration }}
                                                                </td>
    
                                                                <td>{{$row->name}}</td>
                                                                <td>{{$row->class}}</td>
                                                                <td>
                                                            
                                                        <div class="form-inline">
                                                                    <a class="list-icons-item text-primary""
                                                                        title="Edit"
                                                                        onclick="return confirm('Are you sure?')"
                                                                        href="{{ route('membership_type.edit', $row->id)}}"><i
                                                                          class="icon-pencil7"></i></a>


                                                                    {!! Form::open(['route' =>
                                                                    ['membership_type.destroy',$row->id],
                                                                    'method' => 'delete']) !!}
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
                                                        <h5>Create Membership Type</h5>
                                                        @else
                                                        <h5>Edit Membership Type</h5>
                                                        @endif
                                                    </div>
                                                    <div class="card-body">
                                                        <div class="row">
                                                            <div class="col-sm-12 ">

                                                                @if(isset($id))
                                                                {{ Form::model($id, array('route' => array('membership_type.update', $id), 'method' => 'PUT')) }}
                                                                @else
                                                                {{ Form::open(['route' => 'membership_type.store']) }}
                                                                @method('POST')
                                                                @endif


                                                                <div class="form-group row">
                                                                    <label class="col-lg-3 col-form-label">Name</label>
                                                                    <div class="col-lg-4">
                                                                        <input type="text" name="name"
                                                                            value="{{ isset($data) ? $data->name : ''}}"
                                                                            class="form-control" required>
                                                                    </div>

                                                                </div>

                                                                <div class="form-group row">
                                                                    <label class="col-lg-3 col-form-label">Class</label>
                                                                    <div class="col-lg-4">
                                                                        <input type="text" name="class"
                                                                            value="{{ isset($data) ? $data->class : ''}}"
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
            "columnDefs": [
                {"targets": [1]}
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