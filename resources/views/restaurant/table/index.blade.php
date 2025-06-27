@extends('layout.master')
@section('title') {{ __('table.table')}} @endsection
@section('content')

            <section class="section">
    <div class="section-body">
        <div class="row">
            <div class="col-12 col-sm-6 col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4>{{ __('table.table')}}</h4>
                    </div>
                    <div class="card-body">
                        <ul class="nav nav-tabs" id="myTab2" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link @if(empty($id)) active show @endif" id="home-tab2" data-toggle="tab"
                                    href="#home2" role="tab" aria-controls="home" aria-selected="true">Table List</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link @if(!empty($id)) active show @endif" id="profile-tab2"
                                    data-toggle="tab" href="#profile2" role="tab" aria-controls="profile"
                                    aria-selected="false">New Table</a>
                            </li>

                        </ul>
                        <br>
                        <div class="tab-content tab-bordered" id="myTab3Content">
                            <div class="tab-pane fade @if(empty($id)) active show @endif" id="home2" role="tabpanel"
                                aria-labelledby="home-tab2">
                                <div class="table-responsive">
                                    <table class="table datatable-basic table-striped">
                                          <thead>
                                                            <tr>
                
                                                                <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0"
                                                                    rowspan="1" colspan="1"
                                                                    aria-label="Platform(s): activate to sort column ascending"
                                                                    style="width: 28.484px;">#</th>
                                                                <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0"
                                                                    rowspan="1" colspan="1"
                                                                    aria-label="Platform(s): activate to sort column ascending"
                                                                    style="width: 156.484px;">Table Number</th>
                                                                    <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0"
                                                                    rowspan="1" colspan="1"
                                                                    aria-label="Platform(s): activate to sort column ascending"
                                                                    style="width: 156.484px;">Restaurant</th>
                                                                     <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0"
                                                                    rowspan="1" colspan="1"
                                                                    aria-label="Platform(s): activate to sort column ascending"
                                                                    style="width: 156.484px;">Capacity</th>
                                                                    <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0"
                                                                    rowspan="1" colspan="1"
                                                                    aria-label="Platform(s): activate to sort column ascending"
                                                                    style="width: 156.484px;">Colour</th>
                                                                <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0"
                                                                    rowspan="1" colspan="1"
                                                                    aria-label="CSS grade: activate to sort column ascending"
                                                                    style="width: 98.1094px;">Actions</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @if(!@empty($index))
                                                            @foreach ($index as $row)
                                                            <tr class="gradeA even" role="row">
                
                                                                <td>
                                                                    {{ $loop->iteration }}
                                                                </td>
                                                                <td>{{$row->number}}</td>
                                                                <td>{{$row->restaurant->name}}</td>
                                                                 <td>{{$row->capacity}}</td>
                                                                 <td>{{$row->color}}</td>
                
                                                                <td>
                                                                  <div class="form-inline">
                                                                    <a class="list-icons-item text-primary"
                                                                        title="Edit" onclick="return confirm('Are you sure?')"
                                                                        href="{{ route('tables.edit', $row->id)}}"><i
                                                                           class="icon-pencil7"></i></a>
                                                                           
                
                                                                    {!! Form::open(['route' => ['tables.destroy',$row->id],
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
                           
                       <div class="tab-pane fade @if(!empty($id)) active show @endif" id="profile2" role="tabpanel"
                                aria-labelledby="profile-tab2">

                                <div class="card">
                                    <div class="card-header">
                                         @if(empty($id))
                                               <h5>Create Table</h5>
                                                @else
                                                <h5>Edit Table</h5>
                                                @endif
                                    </div>

                                    <div class="card-body">
                                                                                       <div class="row">
                                                    <div class="col-sm-12 ">
                                                      @if(isset($id))
                                                        {{ Form::model($id, array('route' => array('tables.update', $id), 'method' => 'PUT')) }}
                                                        @else
                                                        {{ Form::open(['route' => 'tables.store']) }}
                                                        @method('POST')
                                                        @endif
        
        
                                                        <div class="form-group row">
                                                            <label class="col-lg-3 col-form-label"> Table Name </label>
                                                            <div class="col-lg-4">
                                                                <input type="text" name="name"  value="{{ isset($data) ? $data->name: ''}}"
                                                                class="form-control">
                                                            </div>
                                                            
                                                        </div>

                                                        <div class="form-group row">
                                                            <label class="col-lg-3 col-form-label"> Table Number <span class="" style="color:red;">*</span></label>
                                                            <div class="col-lg-4">
                                                                <input type="text" name="number"  value="{{ isset($data) ? $data->number : ''}}"
                                                                class="form-control" required>
                                                            </div>
                                                            
                                                        </div>

                                                        <div class="form-group row">
                                                            <label class="col-lg-3 col-form-label">Restaurant <span class="" style="color:red;">*</span> </label>
                                                            <div class="col-lg-4">
                                                                <select class="form-control m-b" name="restaurant_id" required
                                                                id="supplier_id">
                                                                <option value="">Select</option>
                                                                @if(!empty($location))
                                                                @foreach($location as $row)
        
                                                                <option @if(isset($data))
                                                                    {{  $data->restaurant_id == $row->id  ? 'selected' : ''}}
                                                                    @endif value="{{ $row->id}}">{{$row->name}}</option>
        
                                                                @endforeach
                                                                @endif
        
                                                            </select>
                                                            </div>
                                                            
                                                        </div>
        
                                                       
                                                        <div class="form-group row">
                                                            <label class="col-lg-3 col-form-label"> Capacity <span class="" style="color:red;">*</span></label>
                                                            <div class="col-lg-4">
                                                                <input type="text" name="capacity"  value="{{ isset($data) ? $data->capacity : ''}}"
                                                                class="form-control" required>
                                                            </div>
                                                            
                                                        </div>
                                                        
                                                        <div class="form-group row">
                                                            <label class="col-lg-3 col-form-label"> Colour <span class="" style="color:red;">*</span></label>
                                                            <div class="col-lg-4">
                                                                <input type="text" name="color"  value="{{ isset($data) ? $data->color : ''}}"
                                                                class="form-control" required>
                                                            </div>
                                                            
                                                        </div>
                                                        
        
                                                       
                                                        
                                                        <div class="form-group row">
                                                            <div class="col-lg-offset-2 col-lg-12">
                                                                @if(!@empty($id))
        
                                                                <a class="btn btn-sm btn-danger float-right m-t-n-xs"
                                                                    href="{{ route('tables.index')}}">
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
                {"orderable": false, "targets": [1]}
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