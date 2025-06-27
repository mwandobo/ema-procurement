@extends('layout.master')


@section('content')
<section class="section">
    <div class="section-body">
        <div class="row">
            <div class="col-12 col-sm-6 col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Items</h4>
                    </div>
                    <div class="card-body">
                        <ul class="nav nav-tabs" id="myTab2" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link @if(empty($id)) active show @endif" id="home-tab2" data-toggle="tab"
                                    href="#home2" role="tab" aria-controls="home" aria-selected="true">Items
                                    List</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link @if(!empty($id)) active show @endif" id="profile-tab2"
                                    data-toggle="tab" href="#profile2" role="tab" aria-controls="profile"
                                    aria-selected="false">New Items</a>
                            </li>
<!--
                      <li class="nav-item">
                                <a class="nav-link  " id="importExel-tab"
                                    data-toggle="tab" href="#importExel" role="tab" aria-controls="profile"
                                    aria-selected="false">Import Items</a>
                            </li>
-->
                        </ul>
                        <div class="tab-content tab-bordered" id="myTab3Content">
                            <div class="tab-pane fade @if(empty($id)) active show @endif" id="home2" role="tabpanel"
                                aria-labelledby="home-tab2">
                                <div class="table-responsive">
                                       <table class="table table-bordered" id="itemsDatatable">
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
                                                    style="width: 141.219px;">Fee</th>
                                                 <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0"
                                                    rowspan="1" colspan="1"
                                                    aria-label="Engine version: activate to sort column ascending"
                                                    style="width: 141.219px;">Facility</th>
                                         
                                                <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0"
                                                    rowspan="1" colspan="1"
                                                    aria-label="CSS grade: activate to sort column ascending"
                                                    style="width: 98.1094px;">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @if(!@empty($items))
                                            @foreach ($items as $row)
                                            <tr class="gradeA even" role="row">

                                                <td>{{$loop->iteration}}</td>
                                                   <td>{{$row->name}}</td>
                                                <td>{{number_format($row->cost_price,2)}} </td>
                                                 <td>{{ $row->facility ? $row->facility->name : 'Not Assigned' }}</td>
                                                
                                                <td>
                                            <div class="form-inline">

                                                    <a class="list-icons-item text-primary"
                                                        title="Edit" onclick="return confirm('Are you sure?')"
                                                        href="{{ route('facility_items.edit', $row->id)}}"><i
                                                            class="icon-pencil7"></i></a>&nbsp
                                                           

                                               {!! Form::open(['route' => ['facility_items.destroy',$row->id],
                                                    'method' => 'delete']) !!}
                                 {{ Form::button('<i class="icon-trash"></i>', ['type' => 'submit','style' => 'border:none;background: none;', 'class' => 'list-icons-item text-danger', 'title' => 'Delete', 'onclick' => "return confirm('Are you sure?')"]) }}
                                                    {{ Form::close() }}
                                               

                                 &nbsp

                                             
                                                   
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
                                                {{ Form::model($id, array('route' => array('facility_items.update', $id), 'method' => 'PUT')) }}
                                                @else
                                                {{ Form::open(['route' => 'facility_items.store']) }}
                                                @method('POST')
                                                @endif
                                                <div class="form-group row"><label class="col-lg-2 col-form-label">Item Name</label>
                                                   <div class="col-lg-10">
                                                           <input type="text" name="name"
                                                            value="{{ isset($data) ? $data->name : ''}}"
                                                            class="form-control">
                                                    </div>
                                                </div>
                                               
                                                <div class="form-group row"><label
                                                        class="col-lg-2 col-form-label"> Fee</label>

                                                    <div class="col-lg-10">
                                                        <input type="number" name="cost_price"
                                                            value="{{ isset($data) ? $data->cost_price : ''}}"
                                                            class="form-control">
                                                    </div>
                                                </div>
                                    <div class="form-group row"><label
                                                        class="col-lg-2 col-form-label"> Accounts Charged to</label>

                                                    <div class="col-lg-10">
                                                       <select class="form-control m-b" name="code_id" required>
                                                <option value="">Select</option>
                                                @if(!empty($accounts))
                                                   @foreach($accounts as $row)
                                                <option @if(isset($data))
                                                {{  $data->code_id == $row->id ? 'selected' : ''}}
                                                @endif value="{{$row->id}}">{{$row->account_name}}</option>
                                                  @endforeach
                                              @endif
                                                  </select>
                                                    </div>
                                                </div>
                                                    <div class="form-group row"><label
                                                        class="col-lg-2 col-form-label">Facility</label>

                                                    <div class="col-lg-10">
                                                         <select class="form-control m-b" name="facility_id" required>
                                                <option value="">Select</option>
                                               @if(!empty($type))
                                                   @foreach($type as $row)
                                                <option @if(isset($data))
                                                {{  $data->facility_id == $row->id ? 'selected' : ''}}
                                                @endif value="{{$row->id}}">{{$row->name}}</option>
                                                  @endforeach
                                              @endif
                                                  </select>
                                                    </div>
                                                </div>

                                                   <div class="form-group row"><label
                                                        class="col-lg-2 col-form-label">Type</label>

                                                    <div class="col-lg-10">
                                                       <select class="form-control m-b type" name="type" id="type" onchange = "ShowHideDiv()" required>
                                                <option value="">Select</option>
                                                <option @if(isset($data))
                                                {{  $data->type == 'once' ? 'selected' : ''}}
                                                @endif value="once">One-Time Fee </option>
                                                <option @if(isset($data))
                                                {{  $data->type == 'subscription' ? 'selected' : ''}}
                                                @endif value="subscription">Subscription</option>
                                                  </select>
                                                </div></div>

<script type="text/javascript">
                function ShowHideDiv() {
                    
                    
                 var ddpPassport = document.getElementById("type").value;
                 if(ddpPassport == "subscription"){
                     $("#duration").show();
                     
                 }
                 
                 else{
                     $("#duration").hide();
                     
                 }
               

    }
             </script>


@if(!empty($data->duration))
<div class="form-group row" id="duration"><label
                                                        class="col-lg-2 col-form-label">Subscription Time</label>

                                                    <div class="col-lg-10" id="dur">
                                                        <input type="text" name="duration" placeholder="1 year"
                                                            value="{{ isset($data) ? $data->duration : ''}}"
                                                            class="form-control">
                                                    </div>
                                                </div>


@else 

                               <div class="form-group row"  id="duration" style="display:none;"><label
                                                        class="col-lg-2 col-form-label">Subscription Time</label>

                                                    <div class="col-lg-10"  id="dur">
                                                        <input type="text" name="duration" placeholder="1 year"
                                                            value="{{ isset($data) ? $data->duration : ''}}"
                                                            class="form-control">
                                                    </div>
                                                </div>

@endif

                                                   <div class="form-group row">
                                        <label class="col-form-label col-lg-2">Description</label>
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

function deleteItem(id) {
 var url = '{{ route("facility_items.destroy", ":id") }}';
        url = url.replace(':id', id);
    $.ajaxSetup({
    headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
    });
      Swal.fire({
          title             : "Delete",
          text              : "Do you really want to delete!",
          showCancelButton: !0,
            confirmButtonText: "Yes, delete it!",
           confirmButtonColor: "#3085d6",
            cancelButtonText: "No, cancel!",
            cancelButtonColor : "#aaa",
       
            reverseButtons: !0,
       
      }).then((result) => {
          if (result.value) {
              $.ajax({
                  url    : url,
                  type   : "delete",
                  success: function(data) {
                    $('#itemsDatatable').DataTable().ajax.reload();
             Swal.fire({
          title             : "Deleted",
          text              : "Your data has been deleted",
          confirmButtonColor: "#3085d6",
      })
                  }
              })
          }
      })
          } 
</script>



<script>
       $('#itemsDatatable').DataTable({
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
<script src="{{ url('assets/js/plugins/sweetalert/sweetalert.min.js') }}"></script>
@endsection