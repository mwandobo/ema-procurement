@extends('layout.master')


@section('content')
<section class="section">
    <div class="section-body">
        <div class="row">
            <div class="col-12 col-sm-6 col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Payments</h4>
                    </div>
                    <div class="card-body">
                        <ul class="nav nav-tabs" id="myTab2" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link @if(empty($id)) active show @endif" id="home-tab2" data-toggle="tab"
                                    href="#home2" role="tab" aria-controls="home" aria-selected="true">Payments
                                    List</a>
                            </li>
                     @if(!empty($id))
                            <li class="nav-item">
                                <a class="nav-link @if(!empty($id)) active show @endif" id="profile-tab2"
                                    data-toggle="tab" href="#profile2" role="tab" aria-controls="profile"
                                    aria-selected="false">Edit Payment</a>
                            </li>
                           @endif
                            <li class="nav-item">
                                <a class="nav-link " id="multiple-tab2" data-toggle="tab"
                                    href="#multiple2" role="tab" aria-controls="home" aria-selected="true">Add Multiple Payments
                                   </a>
                            </li>
                        </ul>
                        <div class="tab-content tab-bordered" id="myTab3Content">
                            <div class="tab-pane fade @if(empty($id)) active show @endif" id="home2" role="tabpanel"
                                aria-labelledby="home-tab2">
                                <div class="table-responsive">
                                   	<table class="table datatable-basic table-striped">
                                        <thead>
                                            <tr role="row">

                                                <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0"
                                                rowspan="1" colspan="1"
                                                aria-label="Browser: activate to sort column ascending"
                                                style="width: 30.531px;">#</th>
                                            <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0"
                                                rowspan="1" colspan="1"
                                                aria-label="Platform(s): activate to sort column ascending"
                                                style="width: 100.484px;">Reference</th>
                                            <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0"
                                                rowspan="1" colspan="1"
                                                aria-label="Platform(s): activate to sort column ascending"
                                                style="width: 180.484px;">Name</th>
                                            <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0"
                                                rowspan="1" colspan="1"
                                                aria-label="Engine version: activate to sort column ascending"
                                                style="width: 200.484px;">Payment Account</th>
                                            <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0"
                                                rowspan="1" colspan="1"
                                                aria-label="Engine version: activate to sort column ascending"
                                                style="width: 120.219px;">Amount</th>
                                            <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0"
                                                rowspan="1" colspan="1"
                                                aria-label="CSS grade: activate to sort column ascending"
                                                style="width: 120.1094px;">Date</th>
                                       
                                            <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0"
                                                rowspan="1" colspan="1"
                                                aria-label="CSS grade: activate to sort column ascending"
                                                style="width: 185.1094px;">Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @if(!@empty($expense))
                                            @foreach ($expense as $row)
                                            <tr class="gradeA even" role="row">
                                                <th>{{ $loop->iteration }}</th>
                                                <td>{{$row->reference}}</td>                                                   
                                                <td>{{$row->name}}</td>                                                         
                                                <td>{{$row->bank->account_name}}</td>
                                                <td>{{number_format($row->amount,2)}} </td>
                                                <td>{{$row->date}}</td>
                                              
                                            @if($row->view == '1')
                                                   <td>

                                                                      <div class="dropdown">
							                		<a href="#" class="list-icons-item dropdown-toggle text-teal" data-toggle="dropdown"><i class="icon-cog6"></i></a>

													<div class="dropdown-menu">
                                         <a  class="nav-link" title="View" data-toggle="modal" class="discount"  href="" onclick="model({{ $row->id }},'view')" value="{{ $row->id}}" data-target="#appFormModal" >View Multiple Payment List</a>
                                <a  class="nav-link" title="View" data-toggle="modal" class="discount"  href="" onclick="model({{ $row->id }},'disapprove')" value="{{ $row->id}}" data-target="#appFormModal" >Disapprove Payments </a>
                                        <a class="nav-link" id="profile-tab2" href="{{ route('multiple_pdfview',['download'=>'pdf','id'=>$row->id]) }}"
                                            role="tab"  aria-selected="false">Download PDF</a>
													</div>
					                			</div>
                                                   
                                                </div>

                             </td>
                                           @else
                                                <td>                     
                                                    @if($row->status == 0)
                                                    <div class="form-inline">
                                                        @if($row->approval_1 == '')
                                                            <a  class="list-icons-item text-primary" title="Edit"
                                                                onclick="return confirm('Are you sure?')"
                                                                href="{{ route("expenses.edit", $row->id)}}"> <i class="icon-pencil7"></i></a>
                                                       &nbsp;


                                                            {!! Form::open(['route' => ['expenses.destroy',$row->id],
                                                            'method' => 'delete']) !!}
                                                            {{ Form::button('<i class="icon-trash"></i>', ['type' => 'submit', 'style' => 'border:none;background: none;', 'class' => 'list-icons-item text-danger',  'onclick' => "return confirm('Are you sure?')"]) }}
                                                            {{ Form::close() }}
                                                       &nbsp;
 @endif                                                      
                                                       <div class="dropdown">

                                                       <a href="#" class="list-icons-item dropdown-toggle text-teal" data-toggle="dropdown"><i class="icon-cog6"></i></a>
                                                       <div class="dropdown-menu">

                                                        @can('manage-first-approval')
                                                            @if($row->approval_1 == '' && $row->status == 0)
                         <a  class="nav-link"  title="Collect" onclick="return confirm('Are you sure? you want to approve')" href="{{ route('expenses.first_approval', $row->id)}}">First Approval</a>
                                                           @endif
                                                                @endcan

                                                     @can('manage-second-approval')
                           @if($row->approval_1 != '' && $row->approval_2 == '' && $row->status == 0)
                            <a  class="nav-link"  title="Collect" onclick="return confirm('Are you sure? you want to approve')" href="{{ route('expenses.second_approval', $row->id)}}">Second Approval</a>
                         <a  class="nav-link"  title="Collect" onclick="return confirm('Are you sure? you want to disapprove')" href="{{ route('expenses.second_disapproval', $row->id)}}">Disapprove</a>
                                         @endif
                                               @endcan

                                            @can('manage-third-approval')
                            @if($row->approval_1 != '' && $row->approval_2 != '' && $row->approval_3 == '')
                            <a  class="nav-link"  title="Confirm Payment" onclick="return confirm('Are you sure? you want to approve')"  href="{{ route('expenses.approve', $row->id)}}">Final Approval</a>
                         <a  class="nav-link"  title="Collect" onclick="return confirm('Are you sure? you want to disapprove')" href="{{ route('expenses.final_disapproval', $row->id)}}">Disapprove</a>
                          @endif
                                @endcan
                                                        
                                                         
                                                       </div>
                                                    </div>
                                                </div>

                                                    @endif

                                                </td>
                                   @endif
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
                                        <h5>Edit Payment</h5>
                                        @else
                                        <h5>Add New Payment</h5>
                                        @endif
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-sm-12 ">
                                                @if(isset($id))
                                                {{ Form::model($id, array('route' => array('expenses.update', $id), 'method' => 'PUT')) }}
                                                @else
                                                {{ Form::open(['route' => 'expenses.store']) }}
                                                @method('POST')
                                                @endif

                                             

                                                <div class="form-group row">
                                                    <label class="col-lg-2 col-form-label">Expenses Name/Title</label>
                                                    <div class="col-lg-8">
                                                        <input type="text" name="name"
                                                            value="{{ isset($data) ? $data->name : ''}}"
                                                            class="form-control">
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label class="col-lg-2 col-form-label">Amount <span class="required" style="color: red;"> * </span></label>
                                                    <div class="col-lg-8">
                                                        <input type="number" name="amount" required placeholder=""
                                                            value="{{ isset($data) ? $data->amount : ''}}"
                                                            class="form-control" required>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-lg-2 col-form-label">Date <span class="required" style="color: red;"> * </span></label>
                                                    <div class="col-lg-8">
                                                        <input type="date" name="date" required placeholder=""
                                                            value="{{ isset($data) ? $data->date: ''}}"
                                                            class="form-control" required>
                                                    </div>
                                                </div>

                                                <div class="form-group row"><label
                                                        class="col-lg-2 col-form-label">Expenses Account <span class="required" style="color: red;"> * </span></label>
                                                    <div class="col-lg-8">
                                                        <select class="form-control m-b" name="account_id" style="width:100%;" required>
                                                            <option value="">Select Expenses Account</option>
                                                            @foreach ($chart_of_accounts as $chart)
                                                            <option value="{{$chart->id}}" @if(isset($data))@if($data->
                                                                account_id == $chart->id) selected @endif @endif
                                                                >{{$chart->account_name}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="form-group row"><label
                                                        class="col-lg-2 col-form-label">Payment Account <span class="required" style="color: red;"> * </span></label>
                                                    <div class="col-lg-8">
                                                        <select class="form-control m-b" name="bank_id"  style="width:100%;" required>
                                                            <option value="">Select Payment Account</option>
                                                            @foreach ($bank_accounts as $bank)
                                                            <option value="{{$bank->id}}" @if(isset($data))@if($data->
                                                                bank_id == $bank->id) selected @endif @endif
                                                                >{{$bank->account_name}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="form-group row"><label
                                                        class="col-lg-2 col-form-label">Payment
                                                        Method</label>

                                                    <div class="col-lg-8">
                                                        <select class="form-control m-b"  style="width:100%;" name="payment_method" >
                                                            <option value="">Select
                                                            </option>
                                                            @if(!empty($payment_method))
                                                            @foreach($payment_method as $row)
                                                            <option value="{{$row->id}}" @if(isset($data))@if($data->
                                                                payment_method == $row->id) selected @endif @endif >From
                                                                {{$row->name}}
                                                            </option>

                                                            @endforeach
                                                            @endif
                                                        </select>

                                                    </div>
                                                </div>


                                                <div class="form-group row">
                                                    <label class="col-lg-2 col-form-label">Notes</label>
                                                    <div class="col-lg-8">
                                                        <textarea name="notes" placeholder="" class="form-control"
                                                            rows="2">{{ isset($data) ? $data->notes: ''}}</textarea>
                                                    </div>
                                                </div>

                                           


                                            
                                            <div class="form-group row">
                                                <div class="col-lg-offset-2 col-lg-12">
                                                    @if(!@empty($id))

                                                    <a class="btn btn-sm btn-danger float-right m-t-n-xs"
                                                        href="{{ route('expenses.index')}}">
                                                       Cancel
                                                    </a>
                                                    <button class="btn btn-sm btn-primary float-right m-t-n-xs"
                                                        data-toggle="modal" data-target="#myModal"
                                                        type="submit">Update</button>
                                                    @else
                                                    <button class="btn btn-sm btn-primary float-right m-t-n-xs"
                                                        type="submit" id="save" >Save</button>
                                                    @endif
                                                </div>
                                            </div>
                                            {!! Form::close() !!}
                                        </div>

                                           

                                        </div>
                                    </div>
                                </div>
                            </div>

                    <div class="tab-pane fade" id="multiple2" role="tabpanel"
                                aria-labelledby="profile-tab2">

                                <div class="card">
                                    <div class="card-header">
                                       
                                        <h5>Add Multiple Payments</h5>
                                        
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-sm-12 ">
                                              
                                                {{ Form::open(['route' => 'expenses.store']) }}
                                                @method('POST')
                                                

                                                    <input type="hidden" name="type" value="multiple"   class="form-control">
                                                            
                                                          

                                               
                                                
                                                 <div class="form-group row">
                           <label class="col-lg-2 col-form-label">Expenses Name/Title</label>
                                                    <div class="col-lg-8">
                                                         <input type="text" name="name"
                                                            value="{{ isset($data) ? $data->name : ''}}"
                                                            class="form-control">
                                                    </div>
                                                </div>

                                              
                                                  <div class="form-group row">
                                                    <label class="col-lg-2 col-form-label">Date <span class="required" style="color: red;"> * </span></label>
                                                    <div class="col-lg-8">
                                                        <input type="date" name="date" required
                                                            placeholder=""
                                                           value="{{ isset($data) ? $data->date : date('Y-m-d')}}" 
                                                            class="form-control">
                                                    </div>
                                                </div>
                                              

                                                   <div class="form-group row"><label
                                                        class="col-lg-2 col-form-label">Payment Account <span class="required" style="color: red;"> * </span></label>
                                                    <div class="col-lg-8">
                                                       <select class="form-control m-b " id="bank2_id" name="bank_id" required>
                                                    <option value="">Select Payment Account</option> 
                                                          @foreach ($bank_accounts as $bank)                                                             
                                                            <option value="{{$bank->id}}" @if(isset($data))@if($data->bank_id == $bank->id) selected @endif @endif >{{$bank->account_name}}</option>
                                                               @endforeach
                                                              </select>
                                                    </div>
                                                </div>
                                               
                                                
                                            <hr>
                                             <button type="button" name="add" class="btn btn-success btn-xs add"><i class="fas fa-plus"> Add item</i></button><br>
                        
                                              <br>
    <div class="table-responsive">
<table class="table table-bordered" id="cart">
            <thead>
              <tr>
                <th>Expense Account <span class="required" style="color: red;"> * </span></th>
                <th>Amount <span class="required" style="color: red;"> * </span></th>
                <th>Notes</th>                
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
                                    

</tbody>
</table>
</div>


<br>
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
<!-- discount Modal -->
<div class="modal fade" id="appFormModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
    </div>
</div>


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

<script type="text/javascript">
$(document).ready(function() {


    var count = 0;


    


    $('.add').on("click", function(e) {

        count++;
        var html = '';
        html += '<tr class="line_items">';
        html += '<td><br><select name="account_id[]" class="m-b form-control item_name" required  data-sub_category_id="' +count +'"><option value="">Select Expense Account</option>@foreach ($chart_of_accounts as $chart) <option value="{{$chart->id}}">{{$chart->account_name}}</option>@endforeach</select></td>';
        html +='<td><br><input type="number" name="amount[]" class="form-control item_quantity' + count +'"  id ="quantity" value="" required /></td>';
        html += '<td><br><textarea name="notes[]" class="form-control" rows="2"></textarea></td>';
        html +='<td><br><button type="button" name="remove" class="btn btn-danger btn-xs remove"><i class="icon-trash"></i></button></td>';

        $('#cart > tbody').append(html);
      

/*
             * Multiple drop down select
             */
            $(".m-b").select2({
                            });
          


      
    });

    $(document).on('click', '.remove', function() {
        $(this).closest('tr').remove();
        
    });


   

});
</script>
<script type="text/javascript">
function model(id, type) {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $.ajax({
        type: 'GET',
      url: '{{url("findList")}}',
        data: {
            'id': id,
            'type': type,
        },
        cache: false,
        async: true,
        success: function(data) {
            //alert(data);
            $('.modal-dialog').html(data);
        },
        error: function(error) {
            $('#appFormModal').modal('toggle');

        }
    });

}


</script>


@endsection