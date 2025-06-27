@extends('layout.master')



@section('content')
<section class="section">
    <div class="section-body">
        <div class="row">
            <div class="col-12 col-sm-12 col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Member Fee Payments </h4>
                    </div>
                    <div class="card-body">
                        <ul class="nav nav-tabs" id="myTab2" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link @if(empty($id)) active show @endif" id="home-tab2" data-toggle="tab"
                                    href="#home" role="tab" aria-controls="home" aria-selected="true">Payments
                                    List</a>
                            </li>
                         <li class="nav-item">
                                <a class="nav-link @if(!empty($id)) active show @endif" id="home-tab2" data-toggle="tab"
                                    href="#home2" role="tab" aria-controls="home" aria-selected="true">Create Payment
                                   </a>
                            </li>

                        </ul>
                        <div class="tab-content tab-bordered" id="myTab3Content">
                            <div class="tab-pane fade @if(empty($id)) active show @endif" id="home" role="tabpanel"
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
                                                    style="width: 180.484px;">Member</th>
                                                <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0"
                                                    rowspan="1" colspan="1"
                                                    aria-label="Engine version: activate to sort column ascending"
                                                    style="width: 180.484px;">Amount</th>
                                                <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0"
                                                    rowspan="1" colspan="1"
                                                    aria-label="CSS grade: activate to sort column ascending"
                                                    style="width: 120.1094px;">Date</th>
                                                <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0"
                                                    rowspan="1" colspan="1"
                                                    aria-label="Engine version: activate to sort column ascending"
                                                    style="width: 120.219px;">Attachment</th>
                                                <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0"
                                                    rowspan="1" colspan="1"
                                                    aria-label="CSS grade: activate to sort column ascending"
                                                    style="width: 185.1094px;">Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @if(!@empty($payment))
                                            @foreach ($payment as $row)
                                            <tr class="gradeA even" role="row">
                                                <th>{{ $loop->iteration }}</th>
                                                <td>{{$row->reference_no}}</td>
                                                <td>{{$row->owner->full_name}} - {{$row->owner->member_id}}</td>
                                                <td>{{number_format($row->amount,2)}} </td>
                                                <td>{{$row->date}}</td>
                                                <td> @if($row->attachment != '')
                                                    <button type="button" class="btn btn-small btn-primary"
                                                        data-toggle="modal" data-target="#appFormModal"
                                                        data-id="{{ $row->id }}" data-type="edit"
                                                        onclick="model({{ $row->id }},'show')">
                                                        <i class="icon-eye"> </i>

                                                    </button>
                                                    @endif

                                                </td>

                                                <td>

                                                    <div class="form-inline">
                                                   @if($row->status == '0')
                                                        <a class="list-icons-item text-primary" title="Edit"
                                                            href="{{ route('member_payments.edit', $row->id)}}"> <i
                                                                class="icon-pencil7"></i></a>
                                                        &nbsp;


                                                        {!! Form::open(['route' => ['member_payments.destroy',$row->id],
                                                        'method' => 'delete']) !!}
                                                        {{ Form::button('<i class="icon-trash"></i>', ['type' => 'submit', 'style' => 'border:none;background: none;', 'class' => 'list-icons-item text-danger',  'onclick' => "return confirm('Are you sure?')"]) }}
                                                        {{ Form::close() }}
                                                        &nbsp;

                                                      <div class="dropdown">
                                                    <a href="#" class="list-icons-item dropdown-toggle text-teal" data-toggle="dropdown"><i class="icon-cog6"></i></a>

                                                    <div class="dropdown-menu">

                                                           @can('approve-member-payment')
                                                            <a class="nav-link" title="Approve"
                                                                    onclick="return confirm('Are you sure?')"
                                                                    href="{{ route('member_payments.approve', $row->id)}}">Approve
                                                                  </a>
                                                              @endcan
                                                          
                                                             
                                                       <a class="nav-link" id="profile-tab2" href="{{ route('member_payments_receipt',['download'=>'pdf','id'=>$row->id]) }}"
                                            role="tab"  aria-selected="false">Download Receipt</a>

                                        
                                                    </div>
                                                </div>
                                                   
                                                </div>

                                                     
                                        @endif

                                                    </div>
                               

                                </td>
                                </tr>
                                @endforeach

                                @endif

                                </tbody>
                                </table>
                            </div>
                        </div>


                     <div class="tab-pane fade @if(!empty($id)) active show @endif" id="home2" role="tabpanel"
                                aria-labelledby="home-tab2">
                                <div class="card">
                                <div class="card-header">
                                    @if(!empty($id))
                                            <h5>Edit Member Payments</h5>
                                            @else
                                            <h5>Add Member Payments</h5>
                                            @endif
                                </div>

                               

                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-sm-12 ">
                                            
                                               @if(isset($id))
                                                {{ Form::model($id, array('route' => array('member_payments.update', $id), 'method' => 'PUT',"enctype"=>"multipart/form-data")) }}
                                              
                                                @else
                                                   {!! Form::open(array('route' => 'member_payments.store',"enctype"=>"multipart/form-data")) !!}
                                                @method('POST')
                                                @endif
                                                


                                                         <div class="form-group row">
                                                 
                                                    <label class="col-lg-2 col-form-label">Reference</label>
                                                    <div class="col-lg-4">
                                                       <input type="text" name="reference_no"
                                                            placeholder=""
                                                            value="{{ isset($data) ? $data->reference_no : ''}}"
                                                            class="form-control" required>
                                                    </div>
                                                 <label class="col-lg-2 col-form-label">Member</label>
                                                    <div class="col-lg-4">
                                                          <select class="form-control m-b member" name="member_id"   id="member" required >
                                                              
                                                        <option value="">Select Member</option>
                                                        @if(!empty($members))
                                                        @foreach($members as $mem)

                                                        <option @if(isset($data))
                                                            {{  $data->member_id == $mem->id  ? 'selected' : ''}}
                                                            @endif value="{{ $mem->id}}">{{$mem->full_name}} - {{$mem->member_id}}</option>

                                                        @endforeach
                                                        @endif

                                                    </select>
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label class="col-lg-2 col-form-label"> Date</label>
                                                    <div class="col-lg-4">
                                                        <input type="date" name="date"
                                                            placeholder="0 if does not exist"
                                                            value="{{ isset($data) ? $data->date : date('Y-m-d')}}"
                                                            class="form-control">
                                                    </div>
                                                 <label class="col-lg-2 col-form-label"> Income Account</label>
                                                    <div class="col-lg-4">
                                                      <select class="form-control m-b income" name="income_id"   id="income" required >
                                                              
                                                        <option value="">Select Income Account</option>
                                                        @if(!empty($accounts))
                                                        @foreach($accounts as $acc)

                                                        <option @if(isset($data))
                                                            {{  $data->income_id == $acc->id  ? 'selected' : ''}}
                                                            @endif value="{{ $acc->id}}">{{$acc->account_name}}</option>

                                                        @endforeach
                                                        @endif

                                                    </select>
                                                    </div>
                                                </div>


                                       <div class="form-group row">
                         
                             <label class="col-lg-2 col-form-label"> Attachment</label>
                                                    <div class="col-lg-4">
                                                        <input type="file" name="attachment"
                                                            
                                                            value="{{ isset($data) ? $data->attachment : ''}}"
                                                            class="form-control">
                                                    </div>
                                  <label class="col-lg-2 col-form-label">Notes</label>
                                                    <div class="col-lg-4">
                   <textarea class="form-control" name="notes">{{isset($data)? $data->notes : ''}}</textarea>
                    
                  </div>
                </div>
                               

                               
        <input type="hidden"   value="{{ isset($data) ? $data->member_id : ''}}"   class="form-control item_id" >


                               <div class=""> <p class="form-control-static errors" id="errors" style="text-align:center;color:red;"></p></div>

                                                <h4 align="center">Enter Payments</h4>
                                                    <hr>
                                                   
                                                    <div class="table-responsive">
                                                        <table class="table table-bordered" id="cart">
                                                            <thead>
                                                                <tr>

                                                                    <th>Fee Type<span class=""
                                                                style="color:red;">*</span></th>
                                                                    <th>Amount <span class=""
                                                                style="color:red;">*</span></th>
                                                                  <th>Action</th> 
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                               <tr class="line_items">
                                                                  
                                                                    <td><input type="text" name="fee_type[]" class="form-control item_fee"  value="Subscription Fee"  required readonly></td>
                                                                     <td><input type="number" name="fee_amount[]" class="form-control item_sub"   value="{{ isset($sub) ? $sub->amount : number_format(0,2)}}" /> </td>    
                                                                         <input type="hidden" name="saved_items_id[]"  class="form-control name_list"  value="{{ isset($sub) ? $sub->id : ''}}" />

                                                                        @if(!empty($sub))
                                                                         <td><button type="button" name="remove"  class="btn btn-danger btn-xs rem"  value="{{ isset($sub) ? $sub->id : ''}}"> <i   class="icon-trash"></i></button></td>
                                                                     
                                                                          @else
                                                                               <td><button type="button" name="remove"  class="btn btn-danger btn-xs remove"> <i   class="icon-trash"></i></button></td>       
                                                                           @endif                                                            
                                                                    
                                                                </tr>
                                                          <tr class="line_items">
                                                                  
                                                                    <td><input type="text" name="fee_type[]" class="form-control item_fee"  value="Development Fee"  required readonly ></td>
                                                                     <td><input type="number" name="fee_amount[]" class="form-control item_dev"   value="{{ isset($dev) ? $dev->amount : number_format(0,2)}}" /> </td>     
                                                                        <input type="hidden" name="saved_items_id[]"  class="form-control name_list"  value="{{ isset($dev) ? $dev->id : ''}}" />      
                                                                                                                 
                                                                      @if(!empty($dev))
                                                                         <td><button type="button" name="remove"  class="btn btn-danger btn-xs rem"  value="{{ isset($dev) ? $dev->id : ''}}"> <i   class="icon-trash"></i></button></td>                                                                     
                                                                          @else
                                                                               <td><button type="button" name="remove"  class="btn btn-danger btn-xs remove"> <i   class="icon-trash"></i></button></td>       
                                                                           @endif
                                                                </tr>
                                                  <tr class="line_items">
                                                                  
                                                                    <td><input type="text" name="fee_type[]" class="form-control item_fee"  value="Reinstatement Fee"  required readonly ></td>
                                                                     <td><input type="number" name="fee_amount[]" class="form-control item_rein"   value="{{ isset($rein) ? $rein->amount : number_format(0,2)}}" /> </td>     
                                                                        <input type="hidden" name="saved_items_id[]"  class="form-control name_list"  value="{{ isset($rein) ? $rein->id : ''}}" />      
                                                                                                                 
                                                                      @if(!empty($rein))
                                                                         <td><button type="button" name="remove"  class="btn btn-danger btn-xs rem"  value="{{ isset($rein) ? $rein->id : ''}}"> <i   class="icon-trash"></i></button></td>                                                                     
                                                                          @else
                                                                               <td><button type="button" name="remove"  class="btn btn-danger btn-xs remove"> <i   class="icon-trash"></i></button></td>       
                                                                           @endif
                                                                </tr>
                                                                
                                                                 <tr class="line_items">
                                                                  
                                                                    <td><input type="text" name="fee_type[]" class="form-control item_fee"  value="Joining Fee"  required readonly ></td>
                                                                     <td><input type="number" name="fee_amount[]" class="form-control item_join"   value="{{ isset($join) ? $join>amount : number_format(0,2)}}" /> </td>     
                                                                        <input type="hidden" name="saved_items_id[]"  class="form-control name_list"  value="{{ isset($join) ? $join->id : ''}}" />      
                                                                                                                 
                                                                      @if(!empty($join))
                                                                         <td><button type="button" name="remove"  class="btn btn-danger btn-xs rem"  value="{{ isset($join) ? $join->id : ''}}"> <i  class="icon-trash"></i></button></td>                                                                     
                                                                          @else
                                                                               <td><button type="button" name="remove"  class="btn btn-danger btn-xs remove"> <i   class="icon-trash"></i></button></td>       
                                                                           @endif
                                                                </tr>

                                                            </tbody>
                                                            <tfoot>
                                                              
                                                                <tr class="line_items">

                                                                    <td><span class="bold">Total</span>: </td>
                                                                    <td><input type="text" name="amount[]"  class="form-control amount" placeholder="total"  required  jAutoCalc="SUM({fee_amount})" readonly min="1"></td>
                                                                </tr>
                                                            </tfoot>
                                                        </table>
                                                    </div>
                 
                                                                                 

                                                                              <br>
                                                <div class="form-group row">
                                                    <div class="col-lg-offset-2 col-lg-12">
                                                        @if(!@empty($id))

                                                        <a class="btn btn-sm btn-danger float-right m-t-n-xs"
                                                            href="{{ route('member_payments.index')}}">
                                                            Cancel
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

<div id="appFormModal" class="modal fade" tabindex="-1">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">File Preview</h5>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <div class="modal-body">

                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-link" data-dismiss="modal">Close</button>
                   
                </div>

            </div>
        </div>
    </div>


@endsection



@section('scripts')

<script>
$('.datatable-basic').DataTable({
    autoWidth: false,
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


function model(id, type) {

    let url = '{{ route("file.preview") }}';


    $.ajax({
        type: 'GET',
        url: url,
        data: {
            'type': type,
            'id': id,
        },
        cache: false,
        async: true,
        success: function(data) {
            //alert(data);
            $('.modal-body').html(data);
        },
        error: function(error) {
            $('#appFormModal').modal('toggle');

        }
    });

}
</script>

<script>
$(document).ready(function() {

    $(document).on('change', '.member', function() {
        var id = $(this).val();
       
      $('.item_id').val(id);
               
         

    });


});
</script>

<script type="text/javascript">
            $(document).ready(function() {

                function autoCalcSetup() {
                    $('table#cart').jAutoCalc('destroy');
                    $('table#cart tr.line_items').jAutoCalc({
                        keyEventsFire: true,
                        decimalPlaces: 2,
                        emptyAsZero: true
                    });
                    $('table#cart').jAutoCalc({
                        decimalPlaces: 2
                    });
                }
                autoCalcSetup();

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



<script>
    $(document).ready(function() {
    
       $(document).on('change', '.amount', function() {
            var id = $(this).val();
             var member= $('.item_id').val();

            $.ajax({
                url: '{{url("findMemberAmount")}}',
                type: "GET",
                data: {
                    id: id,
                  member:member,
                },
                dataType: "json",
                success: function(data) {
                  console.log(data);
                 $('.errors').empty();
                $("#save").attr("disabled", false);
                 if (data != '') {
                $('.errors').append(data);
               $("#save").attr("disabled", true);
    } else {
      
    }
                
           
                }
    
            });
    
        });
    
    
    
    });
    </script>


@endsection