@extends('layout.master')

@section('content')

            <section class="section">
    <div class="section-body">
        <div class="row">
            <div class="col-12 col-sm-6 col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Inventory</h4>
                    </div>
                    <div class="card-body">
                        <ul class="nav nav-tabs" id="myTab2" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link @if(empty($id)) active show @endif" id="home-tab2" data-toggle="tab"
                                    href="#home2" role="tab" aria-controls="home" aria-selected="true">Inventory
                                    List</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link @if(!empty($id)) active show @endif" id="profile-tab2"
                                    data-toggle="tab" href="#profile2" role="tab" aria-controls="profile"
                                    aria-selected="false">New Inventory</a>
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
                                                    aria-label="Browser: activate to sort column ascending"
                                                    style="width: 38.531px;">#</th>
                                                <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0"
                                                    rowspan="1" colspan="1"
                                                    aria-label="Platform(s): activate to sort column ascending"
                                                    style="width: 106.484px;">Item Name</th>
                                                    <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0"
                                                    rowspan="1" colspan="1"
                                                    aria-label="Platform(s): activate to sort column ascending"
                                                    style="width: 106.484px;">Price</th>
                                                    <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0"
                                                    rowspan="1" colspan="1"
                                                    aria-label="Platform(s): activate to sort column ascending"
                                                    style="width: 106.484px;">Quantity</th>
                                                    <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0"
                                                    rowspan="1" colspan="1"
                                                    aria-label="Platform(s): activate to sort column ascending"
                                                    style="width: 106.484px;">Type</th>   
                                                    <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0"
                                                    rowspan="1" colspan="1"
                                                    aria-label="Platform(s): activate to sort column ascending"
                                                    style="width: 106.484px;">Unit</th>                                            
                                                <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0"
                                                    rowspan="1" colspan="1"
                                                    aria-label="CSS grade: activate to sort column ascending"
                                                    style="width: 108.1094px;">Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @if(!@empty($inventory))
                                            @foreach ($inventory as $row)
                                            <tr class="gradeA even" role="row">
                                                <th>{{ $loop->iteration }}</th>
                                                <td>{{$row->name }}</td>
                                                <td>{{number_format($row->price,2)}}</td>
                                                <td>{{number_format($row->quantity,2)}}</td>
                                                <td>{{$row->type}}</td>
                                                <td>{{$row->unit}}</td>
                                                <td>
                                                    <div class="form-inline">

                                                            <a class="list-icons-item text-primary" title="Edit"
                                                                onclick="return confirm('Are you sure?')"
                                                                href="{{ route("inventory.edit", $row->id)}}"><i class="icon-pencil7"></i>
                                                                    </a>
 
                                                            {!! Form::open(['route' =>
                                                            ['inventory.destroy',$row->id], 'method' => 'delete'])
                                                            !!}
                                                            {{ Form::button('<i class="icon-trash"></i>', ['type' => 'submit', 'style' => 'border:none;background: none;', 'class' => 'list-icons-item text-danger', 'onclick' => "return confirm('Are you sure?')"]) }}
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
                                        <h5>Create Inventory</h5>
                                        @else
                                        <h5>Edit Inventory</h5>
                                        @endif
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-sm-12 ">
                                                @if(isset($id))
                                                {{ Form::model($id, array('route' => array('inventory.update', $id), 'method' => 'PUT')) }}
                                                @else
                                                {{ Form::open(['route' => 'inventory.store']) }}
                                                @method('POST')
                                                @endif

                                                <div class="form-group row"><label
                                                    class="col-lg-2 col-form-label">Item
                                                    Name</label>
                                                <div class="col-lg-10">
                                                    <input type="text" name="name"
                                                        value="{{ isset($data) ? $data->name : ''}}"
                                                        class="form-control">
                                                </div>
                                            </div>

                                            <div class="form-group row"><label
                                                    class="col-lg-2 col-form-label">Price</label>

                                                <div class="col-lg-10">
                                                    <input type="number" name="price"
                                                        value="{{ isset($data) ? $data->price : ''}}"
                                                        class="form-control">
                                                </div>
                                            </div>
                                            <div class="form-group row" style="display:none;"><label
                                                    class="col-lg-2 col-form-label">Quantity</label>

                                                <div class="col-lg-10">
                                                    <input type="number" name="quantity"
                                                        value="{{ isset($data) ? $data->quantity : '0'}}"
                                                        class="form-control">
                                                </div>
                                            </div>
                                            <div class="form-group row"><label
                                                    class="col-lg-2 col-form-label">Unit</label>

                                                <div class="col-lg-10">
                                                    <input type="text" name="unit"
                                                        value="{{ isset($data) ? $data->unit : ''}}"
                                                        class="form-control">
                                                </div>
                                            </div>
                                            <div class="form-group row"><label
                                                class="col-lg-2 col-form-label">Type</label>

                                            <div class="col-lg-10">
                                                <select class="form-control m-b" name="type" id="" required>
                                                    <option value="">Select Type</option>
                                            <option value="Maintenance" @if(isset($data))@if($data->type == 'Maintenance') selected @endif @endif>Maintenance</option>
                                                    <option value="Kitchen" @if(isset($data))@if($data->type == 'Kitchen') selected @endif @endif>Kitchen</option>
                                                    <option value="Bar" @if(isset($data))@if($data->type == 'Bar') selected @endif @endif>Bar</option>
                                                </select>
                                                
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
                {"orderable": false, "targets": [2]}
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