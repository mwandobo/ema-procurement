@extends('layout.master')


@section('content')
<section class="section">
    <div class="section-body">
        <div class="row">
            <div class="col-12 col-sm-6 col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Account Sub Group</h4>
                    </div>
                    <div class="card-body">
                        <ul class="nav nav-tabs" id="myTab2" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link @if(empty($id)) active show @endif" id="home-tab2" data-toggle="tab"
                                    href="#home2" role="tab" aria-controls="home" aria-selected="true">Sub Group
                                     List</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link @if(!empty($id)) active show @endif" id="profile-tab2"
                                    data-toggle="tab" href="#profile2" role="tab" aria-controls="profile"
                                    aria-selected="false">New Sub Group</a>
                            </li>

                        </ul>
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
                                                    style="width: 26.484px;">#</th>
                                                <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0"
                                                    rowspan="1" colspan="1"
                                                    aria-label="Platform(s): activate to sort column ascending"
                                                    style="width: 186.484px;">Group Name</th>
                                                <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0"
                                                    rowspan="1" colspan="1"
                                                    aria-label="Platform(s): activate to sort column ascending"
                                                    style="width: 136.484px;">Sub Group</th>
                                                <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0"
                                                    rowspan="1" colspan="1"
                                                    aria-label="CSS grade: activate to sort column ascending"
                                                    style="width: 168.1094px;">Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @if(!@empty($group))
                                            @foreach ($group as $row)
                                            <tr class="gradeA even" role="row">

                                                <td>{{$loop->iteration}} </td>
                                                <td>  {{$row->name }}  </td>
                                                <td>{{$row->sub_group}}</td>

                                                <td>
                                            <div class="form-inline">
                                                   
                                                    <a class="list-icons-item text-primary"
                                                        title="Edit" onclick="return confirm('Are you sure?')"
                                                        href="{{ route('sub_group_account.edit', $row->id)}}"><i
                                                            class="icon-pencil7"></i></a>&nbsp
                                                           

                                                    {!! Form::open(['route' => ['sub_group_account.destroy',$row->id],
                                                    'method' => 'delete']) !!}
                                 {{ Form::button('<i class="icon-trash"></i>', ['type' => 'submit','style' => 'border:none;background: none;', 'class' => 'list-icons-item text-danger', 'title' => 'Delete', 'onclick' => "return confirm('Are you sure?')"]) }}
                                                    {{ Form::close() }}

                                
													</div>
					                			</div>
                                                   
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
                                        <h5>Create Sub Group</h5>
                                        @else
                                        <h5>Edit Sub Group</h5>
                                        @endif
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-sm-12 ">
                                                @if(isset($id))
                                                {{ Form::model($id, array('route' => array('sub_group_account.update', $id), 'method' => 'PUT')) }}
                                              
                                                @else
                                                {{ Form::open(['route' => 'sub_group_account.store']) }}
                                                @method('POST')
                                                @endif



                                                   @if(!empty($id))

                                                            <div class="form-group row"><label
                                                        class="col-lg-2 col-form-label">Account Group</label>

                                                    <div class="col-lg-8">
                                                        <select class="form-control m-b" name="name" required>
                                                            <option value="">Select Account Group</option>
                                                            @foreach ($group_account as $group)
                                                            <option value="{{$group->name}}"
                                                                @if(isset($data))@if($data->name ==
                                                                $group->name) selected @endif @endif >{{$group->name}}
                                                            </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="form-group row"><label
                                                        class="col-lg-2 col-form-label">Sub Group</label>

                                                    <div class="col-lg-8">
                                                       <input type="text" name="sub_group" required placeholder=""
                                                            value="{{ isset($data) ? $data->sub_group : ''}}"
                                                            class="form-control">
                                                    </div>
                                                </div>


                                                        @endif

                                                  

                                         
                                                    @if(empty($id))  
                                                <button type="button" name="add" class="btn btn-success btn-xs add"><i
                                                        class="fas fa-plus"> Add item</i></button><br>
                                                <br>
                                                <div class="table-responsive">
                                                <table class="table table-bordered" id="cart">
                                                    <thead>
                                                        <tr>
                                                            <th>Account Group</th>
                                                            <th>Sub Group</th>
                                                            <th>Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>


                                                    </tbody>
                                                   
                                                      
                                                </table>
                                            </div>
                                                  @endif

                                                <br>
                                                <div class="form-group row">
                                                    <div class="col-lg-offset-2 col-lg-12">
                                                        @if(!@empty($id))

                                                        <a class="btn btn-sm btn-danger float-right m-t-n-xs"
                                                            href="{{ route('sub_group_account.index')}}">
                                                            cancel
                                                        </a>
                                                        <button class="btn btn-sm btn-primary float-right m-t-n-xs"
                                                            data-toggle="modal" data-target="#myModal"
                                                            type="submit" id="save">Update</button>
                                                        @else
                                                        <button class="btn btn-sm btn-primary float-right m-t-n-xs"
                                                            type="submit" id="save">Save</button>
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
<script src="{{ url('assets/js/plugins/sweetalert/sweetalert.min.js') }}"></script>





<script type="text/javascript">
$(document).ready(function() {


    var count = 0;


    $('.add').on("click", function(e) {

        count++;
        var html = '';
        html += '<tr class="line_items">';
        html +=  '<td><select name="name[]" class="form-control  m-b " required  data-sub_category_id="' +count +'"><option value="">Select Account Group</option>@foreach ($group_account as $group) <option value="{{ $group->name}}">{{$group->name}}</option>@endforeach</select></td>';     
        html +=  '<td><input type="text" name="sub_group[]" required placeholder="" class="form-control"></td>';                                         
        html +=  '<td><button type="button" name="remove" class="btn btn-danger btn-xs remove"><i class="icon-trash"></i></button></td></tr>';

        $('tbody').append(html);

/*
             * Multiple drop down select
             */
            $('.m-b').select2({
                            });
          
 

    
    });

    $(document).on('click', '.remove', function() {
        $(this).closest('tr').remove();
        autoCalcSetup();
    });


    $(document).on('click', '.rem', function() {
        var btn_value = $(this).attr("value");
        $(this).closest('tr').remove();
        $('tfoot').append(
            '<input type="hidden" name="removed_id[]"  class="form-control name_list" value="' +
            btn_value + '"/>');
        autoCalcSetup();
    });

});
</script>





@endsection