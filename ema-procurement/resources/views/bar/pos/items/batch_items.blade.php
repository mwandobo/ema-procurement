@extends('layout.master')


@section('content')
<section class="section">
    <div class="section-body">
        <div class="row">
            <div class="col-12 col-sm-6 col-lg-12">
                <div class="card">
                <div class="card-header"
                        style="background-color: #f8f9fa; padding: 15px; border-bottom: 2px solid #dee2e6; margin-bottom: 20px;">
                        <h4 style="margin: 0; font-weight: bold; font-size: 1.5rem; color: #007bff;">
                            Batch Items</h4>
                    </div>
                   
                    <div class="card-body">
                        <ul class="nav nav-tabs" id="myTab2" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link @if(empty($id)) active show @endif" id="home-tab2" data-toggle="tab"
                                    href="#home2" role="tab" aria-controls="home" aria-selected="true">Items
                                    List</a>
                            </li>
                            
                            {{--<li class="nav-item">
                                <a class="nav-link @if(!empty($id)) active show @endif" id="profile-tab2"
                                    data-toggle="tab" href="#profile2" role="tab" aria-controls="profile"
                                    aria-selected="false">New Items</a>
                            </li>--}}

                            <li class="nav-item">
                                <a class="nav-link  " id="importExel-tab"
                                    data-toggle="tab" href="#importExel" role="tab" aria-controls="profile"
                                    aria-selected="false">Import Items</a>
                            </li>

                        </ul>
                        <div class="tab-content tab-bordered" id="myTab3Content">
                            <div class="tab-pane fade @if(empty($id)) active show @endif" id="home2" role="tabpanel"
                                aria-labelledby="home-tab2">
                                <div class="table-responsive">
                                    <table class="table datatable-basic table-bordered" >
                                        <thead>
                                            <tr role="row">

                                                <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0"
                                                    rowspan="1" colspan="1"
                                                    aria-label="Browser: activate to sort column ascending"
                                                    style="width: 28.531px;">#</th>
                                                <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0"
                                                    rowspan="1" colspan="1"
                                                    aria-label="Platform(s): activate to sort column ascending"
                                                    style="width: 156.484px;">Item Name</th>
                                                <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0"
                                                    rowspan="1" colspan="1"
                                                    aria-label="Engine version: activate to sort column ascending"
                                                    style="width: 141.219px;">Batch Code</th>
                                                <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0"
                                                    rowspan="1" colspan="1"
                                                    aria-label="CSS grade: activate to sort column ascending"
                                                    style="width: 98.1094px;">Selling Price</th>
                                                <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0"
                                                    rowspan="1" colspan="1"
                                                    aria-label="CSS grade: activate to sort column ascending"
                                                    style="width: 98.1094px;">Quantity</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @if(!@empty($items))
                                            @foreach ($items as $row)
                                                <tr class="gradeA even" role="row">
                                                    <td>{{$loop->iteration }}</td>
                                                    <td>{{$row->item_name}}</td>
                                                    <td>{{$row->batch_code}}</td>
                                                    <td>{{$row->selling_price}}</td>
                                                    <td>{{$row->quantity}}{{$row->unit}}</td>
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
                                        @if(!empty($id))
                                        <h5>Edit Items</h5>
                                        @else
                                        <h5>Add New Items</h5>
                                        @endif
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-sm-12 ">
                                                @if(isset($id))
                                                {{ Form::model($id, array('route' => array('bar_items.update', $id), 'method' => 'PUT')) }}
                                                @else
                                                {{ Form::open(['route' => 'bar_items.store']) }}
                                                @method('POST')
                                                @endif
                                                <div class="form-group row"><label class="col-lg-2 col-form-label">Item Name <span class="" style="color:red;">*</span></label>
                                                    <div class="col-lg-10">
                                                        <input type="text" name="name"
                                                            value="{{ isset($data) ? $data->name : ''}}"
                                                            class="form-control" required>
                                                    </div>
                                                </div>

                                                <div class="form-group row"><label
                                                        class="col-lg-2 col-form-label">Category <span class="" style="color:red;">*</span></label>
                                                    <div class="col-lg-10">
                                                        <select class="form-control m-b" name="category_id" required
                                                            id="category">
                                                            <option value="">Select</option>
                                                            @if(!empty($category))
                                                            @foreach($category as $br)
                                                            <option value="{{$br->id}}" @if(isset($data)){{  $data->category_id == $br->id  ? 'selected' : ''}} @endif>{{$br->name}}</option>
                                                            @endforeach

                                                            @endif
                                                        </select>
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
                                                <div class="form-group row">
                                                    <label class="col-form-label col-lg-2">Desription</label>
                                                    <div class="col-lg-10">
                                                        <textarea name="description"
                                                            class="form-control">{{isset($data)? $data->description : ''}}</textarea>
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

                            <div class="tab-pane fade " id="importExel" role="tabpanel"
                                aria-labelledby="importExel-tab">
                                <div class="card">
                                    <div class="card-header">
                                        <form action="{{ route('bar_item.sample') }}" method="POST" enctype="multipart/form-data">
                                            @csrf
                                            <button class="btn btn-success">Download Sample</button>
                                        </form>

                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-sm-12 ">
                                                <div class="container mt-5 text-center">
                                                    <h4 class="mb-4">
                                                        Import Excel & CSV File
                                                    </h4>
                                                    <form action="{{ route('bar_item.import') }}" method="POST" enctype="multipart/form-data">

                                                        @csrf
                                                        <div class="form-group mb-4">
                                                            <div class="custom-file text-left">
                                                                <input type="file" name="file" class="form-control" id="customFile" required>
                                                            </div>
                                                        </div>
                                                        <button class="btn btn-primary">Import Items</button>

                                                    </form>
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
@endsection

@section('scripts')

<script>
    $('.datatable-basic').DataTable({
        autoWidth: false,
        order: [
            [2, 'desc']
        ],
        "columnDefs": [{
            "orderable": false,
            "targets": [3]
        }],
        dom: '<"datatable-header"fl><"datatable-scroll"t><"datatable-footer"ip>',
        "language": {
            search: '<span>Filter:</span> _INPUT_',
            searchPlaceholder: 'Type to filter...',
            lengthMenu: '<span>Show:</span> _MENU_',
            paginate: {
                'first': 'First',
                'last': 'Last',
                'next': $('html').attr('dir') == 'rtl' ? '&larr;' : '&rarr;',
                'previous': $('html').attr('dir') == 'rtl' ? '&rarr;' : '&larr;'
            }
        },

    });
</script>
<script src="{{ url('assets/js/plugins/sweetalert/sweetalert.min.js') }}"></script>

@endsection