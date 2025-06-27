@extends('layout.master')
@section('title') Manage Bar @endsection


@section('content')

 <section class="section">
    <div class="section-body">
        <div class="row">
            <div class="col-12 col-sm-6 col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4> Manage Bar</h4>
                    </div>
                    <div class="card-body">
                        <ul class="nav nav-tabs" id="myTab2" role="tablist">
                            <li class="nav-item">
                                            <a class="nav-link @if(empty($id)) active show @endif" id="animated-underline-home-tab" data-toggle="tab" href="#animated-underline-home" role="tab" aria-controls="animated-underline-home" aria-selected="true"> Bar List
                                                 </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link @if(!empty($id)) active show @endif" id="animated-underline-about-tab" data-toggle="tab" href="#animated-underline-about" role="tab" aria-controls="animated-underline-about" aria-selected="false">New Bar
                                                </a>
                                        </li>`

                        </ul>
                        <br>
                                    

                                    <div class="tab-content" id="animateLineContent-4">

                                        <div class="tab-pane fade @if(empty($id)) active show @endif" id="animated-underline-home" role="tabpanel" aria-labelledby="animated-underline-home-tab">
                                            <div class="table-responsive">
                                                <table  class="table datatable-basic table-striped" style="width:100%">
                                                 
                                                  
                                                        <thead>
                                                            <tr>
                
                                                                <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0"
                                                                    rowspan="1" colspan="1"
                                                                    aria-label="Platform(s): activate to sort column ascending"
                                                                    style="width: 28.484px;">#</th>
                                                                <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0"
                                                                    rowspan="1" colspan="1"
                                                                    aria-label="Platform(s): activate to sort column ascending"
                                                                    style="width: 156.484px;">Bar Name</th>
                                                                    <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0"
                                                                    rowspan="1" colspan="1"
                                                                    aria-label="Platform(s): activate to sort column ascending"
                                                                    style="width: 156.484px;">Manager Name</th>
                                                                     <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0"
                                                                    rowspan="1" colspan="1"
                                                                    aria-label="Platform(s): activate to sort column ascending"
                                                                    style="width: 156.484px;">Location</th>
                                                               
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
                                                                <td>{{$row->name}}</td>
                                                                <td>{{$row->manager}}</td>
                                                                 <td>{{$row->place->name}}</td>

                                                               
                                                               
                
                                                                <td>
                                                                  <div class="form-inline">
                                                                    <a class="list-icons-item text-primary"
                                                                        title="Edit" onclick="return confirm('Are you sure?')"
                                                                        href="{{ route('manage_bar.edit', $row->id)}}"><i
                                                                             class="icon-pencil7"></i></a>
                                                                           
                
                                                                    {!! Form::open(['route' => ['manage_bar.destroy',$row->id],
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





                                        <div class="tab-pane fade @if(!empty($id)) active show @endif" id="animated-underline-about" role="tabpanel" aria-labelledby="animated-underline-about-tab">
                                            <div class="card">
                                                <div class="card-header">
                                             
                                                @if(empty($id))
                                                <h5>Create Bar</h5>
                                                @else
                                                <h5>Edit Bar</h5>
                                                @endif
                                            </div>
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-sm-12 ">
                                                       
                                                        @if(isset($id))
                                                        {{ Form::model($id, array('route' => array('manage_bar.update', $id), 'method' => 'PUT')) }}
                                                        @else
                                                        {{ Form::open(['route' => 'manage_bar.store']) }}
                                                        @method('POST')
                                                        @endif
        
        
                                                        <div class="form-group row">
                                                            <label class="col-lg-3 col-form-label"> Bar Name</label>
                                                            <div class="col-lg-4">
                                                                <input type="text" name="name"  value="{{ isset($data) ? $data->name: ''}}"
                                                                class="form-control" required>
                                                            </div>
                                                            
                                                        </div>

                                                        <div class="form-group row">
                                                            <label class="col-lg-3 col-form-label"> Manager Name</label>
                                                            <div class="col-lg-4">
                                                                <input type="text" name="manager"  value="{{ isset($data) ? $data->manager : ''}}"
                                                                class="form-control" required>
                                                            </div>
                                                            
                                                        </div>

                                                        <div class="form-group row">
                                                            <label class="col-lg-3 col-form-label">Location</label>
                                                            <div class="col-lg-4">
                                                                <select class="form-control m-b" name="location" required
                                                                id="supplier_id">
                                                                <option value="">Select</option>
                                                                @if(!empty($location))
                                                                @foreach($location as $row)
        
                                                                <option @if(isset($data))
                                                                    {{  $data->location == $row->id  ? 'selected' : ''}}
                                                                    @endif value="{{ $row->id}}">{{$row->name}}</option>
        
                                                                @endforeach
                                                                @endif
        
                                                            </select>
                                                            </div>
                                                            
                                                        </div>
        
                                                       
                                                        
                                                        <div class="form-group row">
                                                            <div class="col-lg-offset-2 col-lg-12">
                                                                @if(!@empty($id))
        
                                                                <a class="btn btn-sm btn-danger float-right m-t-n-xs"
                                                                    href="{{ route('manage_bar.index')}}">
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
    $('.datatable-basic').DataTable({
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

@endpush