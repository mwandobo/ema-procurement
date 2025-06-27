@extends('layout.master')
@push('plugin-styles')
 <style>
 .body > .line_items{
     border:1px solid #ddd;
 }
 
 </style>

@endpush
@section('title') Section Sales @endsection
@section('content')

            <section class="section">
    <div class="section-body">
        <div class="row">
            <div class="col-12 col-sm-12 col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4> Section Sales</h4>
                    </div>
                    <div class="card-body">
                        <ul class="nav nav-tabs" id="myTab2" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link @if(empty($id)) active show @endif" id="home-tab2" data-toggle="tab"
                                    href="#home2" role="tab" aria-controls="home" aria-selected="true">Section Sales</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link @if(!empty($id)) active show @endif" id="profile-tab2"
                                    data-toggle="tab" href="#profile2" role="tab" aria-controls="profile"
                                    aria-selected="false">New Section Sales</a>
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
                                                        style="width: 186.484px;">Reference</th>
                                                    <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0"
                                                        rowspan="1" colspan="1"
                                                        aria-label="Platform(s): activate to sort column ascending"
                                                        style="width: 186.484px;">Name</th>    
                                                    <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0"
                                                        rowspan="1" colspan="1"
                                                        aria-label="Platform(s): activate to sort column ascending"
                                                        style="width: 186.484px;">Date</th>
                                         
                                                    <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0"
                                                        rowspan="1" colspan="1"
                                                        aria-label="Platform(s): activate to sort column ascending"
                                                        style="width: 186.484px;">Total Amount</th>
                                                    <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0"
                                                        rowspan="1" colspan="1"
                                                        aria-label="Platform(s): activate to sort column ascending"
                                                        style="width: 108.484px;">Status</th>

                                                    <th class=" sorting text-center" tabindex="0"
                                                        aria-controls="DataTables_Table_0" rowspan="1" colspan="1"
                                                        aria-label="CSS grade: activate to sort column ascending"
                                                        style="width: 120.1094px;">Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @if(!@empty($index))
                                                @foreach ($index as $row)
                                                <tr class="gradeA even" role="row">

                                                    <td> <a class="list-icons-item text-primary"  title="Show Details" href="{{ route('facility_sales.show', $row->id)}}"> {{ $row->reference_no }}</a></td>
                                                    @if($row->user_type == "Visitor")
                                                    @php $detailD =  App\Models\Visitors\Visitor::find($row->client_id); @endphp
                                                    <td>{{$detailD->first_name}} {{$detailD->last_name}}</td>
                                                    @elseif($row->user_type == "Member")
                                                    @php $detailDt =  App\Models\Member\Member::find($row->client_id); @endphp
                                                    <td>{{$detailDt->full_name}} - {{ $detailDt->member_id }}</td>
                                                    @else
                                                    <td></td>
                                                    @endif
                                                    <td>{{Carbon\Carbon::parse($row->invoice_date)->format('d/m/Y')}}</td>
                                                  
                                                    <td>{{number_format($row->invoice_amount + $row->invoice_tax,2)}} {{$row->exchange_code}}</td>


                                                    <td>
                                                        @if($row->status == 0)
                                                    <div class="badge badge-danger badge-shadow">Not Approved</div>
                                                    @elseif($row->status == 1)
                                                    <div class="badge badge-warning badge-shadow">Not Paid</div>
                                                    @elseif($row->status == 2)
                                                    <div class="badge badge-info badge-shadow">Partially Paid</div>
                                                    @elseif($row->status == 3)
                                                    <span class="badge badge-success badge-shadow">Fully Paid</span>
                                                    @elseif($row->status == 4)
                                                    <span class="badge badge-danger badge-shadow">Cancelled</span>

                                                    @endif
                                                    </td>
                
                                                                <td>
                                                                  <div class="form-inline">
                                                    @if($row->good_receive == 0)
                                                    <a class="list-icons-item text-primary"
                                                        title="Edit" onclick="return confirm('Are you sure?')"
                                                        href="{{ route('facility_sales.edit', $row->id)}}"><i
                                                            class="icon-pencil7"></i></a>&nbsp
                                                           

                                                    {!! Form::open(['route' => ['facility_sales.destroy',$row->id],
                                                    'method' => 'delete']) !!}
                                 {{ Form::button('<i class="icon-trash"></i>', ['type' => 'submit','style' => 'border:none;background: none;', 'class' => 'list-icons-item text-danger', 'title' => 'Delete', 'onclick' => "return confirm('Are you sure?')"]) }}
                                                    {{ Form::close() }}
 @endif
                                 &nbsp

                                                <div class="dropdown">
                                                    <a href="#" class="list-icons-item dropdown-toggle text-teal" data-toggle="dropdown"><i class="icon-cog6"></i></a>

                                                    <div class="dropdown-menu">

                                                            @if($row->status == 0 && $row->status != 4 && $row->status != 3 && $row->good_receive == 0)
                                                            <li> <a class="nav-link" id="profile-tab2"
                                                                    href="{{ route('facility_sales.receive',$row->id)}}"
                                                                    role="tab"
                                                                    aria-selected="false">Confirm Service</a>
                                                            </li>
                                                            @endif
                                                          
                                                             @if($row->good_receive == 0)
                                                            <li class="nav-item"><a class="nav-link" title="Cancel"
                                                                    onclick="return confirm('Are you sure?')"
                                                                    href="{{ route('facility_sales.cancel', $row->id)}}">Cancel
                                                                 Service</a></li>
                                        @endif

                                          @if($row->good_receive == 1)
                                                       <a class="nav-link" id="profile-tab2" href="{{ route('facility_sales_receipt',['download'=>'pdf','id'=>$row->id]) }}"
                                            role="tab"  aria-selected="false">Download Receipt</a>
                                        @endif

                                        <a class="nav-link" id="profile-tab2" href="{{ route('facility_sales_pdfview',['download'=>'pdf','id'=>$row->id]) }}"
                                            role="tab"  aria-selected="false">Download PDF</a>
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
                                            <h5>Create Section Sales</h5>
                                            @else
                                            <h5>Edit Section Sales</h5>
                                            @endif
                                        </div>
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-sm-12 ">

                                                    @if(isset($id))
                                                    {{ Form::model($id, array('route' => array('facility_sales.update', $id), 'method' => 'PUT')) }}
                                                    @else
                                                    {{ Form::open(['route' => 'facility_sales.store']) }}
                                                    @method('POST')
                                                    @endif

                                                 <input type="hidden" name="edit_type"
                                                class="form-control name_type"
                                                value="{{$type}}" />

                                                    <div class="form-group row">
                                                        <label class="col-lg-2 col-form-label"> User type <span class=""
                                                                style="color:red;">*</span></label>
                                                        <div class="col-lg-4">
                                                            <select class="form-control m-b user_type" name="user_type"
                                                                required id="user_type">

                                                                <option value="">Select</option>
                                                                <option value="Member" @if(isset($data))@if('Member' == $data->user_type) selected @endif @endif>Member</option>
                                                                <option value="Visitor" @if(isset($data))@if('Visitor' == $data->user_type) selected @endif @endif>Visitor</option>
                                                                
                                                            </select>
                                                        </div>


                                                          
                                                        <label class="col-lg-2 col-form-label"> User ID <span class=""
                                                                style="color:red;">*</span></label>
                                                        <div class="col-lg-4">

                                                                   @if(!empty($data->client_id))
                                                                     <select class="form-control m-b user" name="user_id"
                                                                id="user_id" required>
                                                                <option value="">Select User</option>
                                                             @if(!empty($user))
                                                        @foreach($user as $row)

                                                            @if('Visitor' == $data->user_type)
                                                        <option @if(isset($data))
                                                            {{ $data->client_id== $row->id  ? 'selected' : ''}}
                                                            @endif value="{{$row->id}}">{{$row->first_name}} {{$row->last_name}} </option>

                                                                @elseif('Member' == $data->user_type)
                                                                   <option @if(isset($data))
                                                            {{ $data->client_id == $row->id  ? 'selected' : ''}}
                                                            @endif value="{{$row->id}}">{{$row->full_name}} - {{ $row->member_id }}</option>

                                                              @endif


                                                        @endforeach
                                                        @endif

                                                          
                                                        
                                                            </select>

                                                                @else
                                                            <select class="form-control m-b user" name="user_id"
                                                                id="user_id" required>
                                                                <option value="">Select User</option>

                                                            </select>
                                                               @endif
                                                        </div>

                                                    </div>





                                           <div class="form-group row">
                                           <label class="col-lg-2 col-form-label">Notes</label>
                                                    <div class="col-lg-4">
                                                        <textarea name="notes" placeholder="" class="form-control"
                                                            rows="2">{{ isset($data) ? $data->notes: ''}}</textarea>
                                                    </div>
                                                </div>
                                                
                                                 <input type="hidden" name="exchange_code" value="{{ isset($data) ? $data->exchange_code : 'TZS'}}" class="form-control" required>           
                                        <input type="hidden" name="exchange_rate" value="{{ isset($data) ? $data->exchange_rate : '1.00'}}" class="form-control" required>

                                     <div class=""> <p class="form-control-static errors_bal" id="errors" style="text-align:center;color:red;"></p></div>

                                                <h4 align="center">Enter  Items</h4>
                                                  <div class=""> <p class="form-control-static item_errors" id="errors" style="text-align:center;color:red;"></p>   </div>
                                                    <hr>
                                                    <button type="button" name="add" class="btn btn-success btn-xs add"><i class="fas fa-plus"> Add
                                                             Items</i></button><br>
                                                    <br>
                                                    
                                                   <div class="table-responsive">
                                        
                                        <div class="cart" id="cart">
                                        
                                        <div class="row body">
                                        
                                        
                                        </div>
                                        </div>
                                        
                                        
                                        
                                        <br>

<div class="cart1" id="cart1">
<div class="row body1">
 <div class="table-responsive">
   <br><table class="table" id="table1">
    <thead style="display: @if(!empty($items))  @else none @endif ;">
    <tr>
                                                    
                                                    <th scope="col">Name</th>
                                                    <th scope="col">Quantity</th>
                                                    <th scope="col">Fee</th>
                                                    <th scope="col">Total Cost</th>
                                                     <th scope="col">Action</th>
                                                    </tr>
                                                    </thead>
                                                     <tbody>
              @if (!empty($id))
                                                    @if (!empty($items))
                                                    @foreach ($items as $i)
                                                    
                                                    @php

                                                         $a = App\Models\Facility\Items::find($i->item_name);;  
                                                          
                                                      
                                                       
                                                      
                                                    @endphp
                                                    
                                                    <tr class="trlst{{$i->id}}_edit">
                                                       <td>{{$a->name}}</td>
                                                      <td>{{ isset($i) ? number_format($i->quantity,2) : '' }}
                                                      <div class=""> <span class="form-control-static errorslst{{$i->id}}_edit" id="errors" style="text-align:center;color:red;"></span></div></td>
                                                      <td>{{ isset($i) ? number_format($i->price,2) : '' }}</td>
                                                      <td>{{ isset($i) ? number_format($i->total_cost,2) : '' }}</td>
  <td>
<a class="list-icons-item text-info edit1" title="Check" href="javascript:void(0)" data-target="#appFormModal" data-toggle="modal" data-button_id="{{$i->id}}_edit"><i class="icon-pencil7" style="font-size:18px;"></i></a>&nbsp;&nbsp;
<a class="list-icons-item text-danger rem" title="Delete" href="javascript:void(0)" data-button_id="{{$i->id}}_edit" value="{{$i->id}}"><i class="icon-trash" style="font-size:18px;"></i></a>
</td>
                                                    </tr>
                                                     
                                                     
                                                     @endforeach
                                                    @endif
                                                    @endif
                                                                 
             </tbody>
            </table>

</div>

@if (!empty($id))
                                                    @if (!empty($items))
                                                    @foreach ($items as $i)
                                                    
                                                    <div class="line_items" id="lst{{$i->id}}_edit">
                                                
  <input type="hidden" name="item_name[]" class="form-control item_name" id="name lst{{$i->id}}_edit" value="{{ isset($i) ? $i->item_name : '' }}" required="">
  <input type="hidden" name="quantity[]" class="form-control item_quantity" id="qty lst{{$i->id}}_edit" data-category_id="lst{{$i->id}}_edit" value="{{ isset($i) ? $i->quantity : '' }}" required="">
  <input type="hidden" name="price[]" class="form-control item_price" id="price lst{{$i->id}}_edit" value="{{ isset($i) ? $i->price : '' }}" required="">
  <input type="hidden" name="tax_rate[]" class="form-control item_rate" id="rate lst{{$i->id}}_edit" value="{{ isset($i) ? $i->tax_rate : '' }}" required="">
  <input type="hidden" name="total_cost[]" class="form-control item_cost" id="cost lst{{$i->id}}_edit" value="{{ isset($i) ? $i->total_cost : '' }}" required="">
  <input type="hidden" name="total_tax[]" class="form-control item_tax" id="tax lst{{$i->id}}_edit" value="{{ isset($i) ? $i->total_tax : '' }}" required="">
  <input type="hidden" name="unit[]" class="form-control item_unit" id="unit lst{{$i->id}}_edit" value="{{ isset($i) ? $i->unit : '' }}">
  <input type="hidden" name="type" class="form-control item_type" id="type lst{{$i->id}}_edit" value="edit">
  <input type="hidden" name="no[]" class="form-control item_type" id="no lst{{$i->id}}_edit" value="{{$i->id}}_edit">
  <input type="hidden" name="saved_items_id[]" class="form-control item_savedlst{{$i->id}}_edit" value="{{$i->id}}">
  <input type="hidden" id="item_id" class="form-control item_idlst{{$i->id}}_edit" value="{{ isset($i) ? $i->item_name : '' }}">
   <input type="hidden"  class="form-control type_id lst{{$i->id}}_edit" id="type "  value="{{ isset($i) ? $i->type : '' }}" required />
</div>
                                                     @endforeach
                                                    @endif
                                                    @endif

                                                 

</div>
       
     <br> <br>
<div class="row">



<div class="col-lg-1"></div><label class="col-lg-2 col-form-label"> Sub Total (+):</label>
<div class="col-lg-6 line_items">
<input type="text" name="subtotal[]" class="form-control item_total" value="{{ isset($data) ? '' : '0.00' }}" required="" jautocalc="SUM({total_cost})" readonly=""> <br>
</div><div class="col-lg-3"></div>

<div class="col-lg-1"></div><label class="col-lg-2 col-form-label">Tax (+):</label>
<div class="col-lg-6 line_items">
<input type="text" name="tax[]" class="form-control item_total" value="{{ isset($data) ? '' : '0.00' }}" required="" jautocalc="SUM({total_tax})" readonly=""> <br>
</div><div class="col-lg-3"></div>



<div class="col-lg-1"></div><label class="col-lg-2 col-form-label"> Total:</label>
<div class="col-lg-6 line_items">
<input type="text" name="amount[]" class="form-control item_total_cost" value="{{ isset($data) ? '' : '0.00' }}" required="" jautocalc="{subtotal} + {tax} " readonly="readonly" ><br> 
</div><div class="col-lg-3"></div>

</div>


</div>





</div>



                                                    <br>

                                                    <div class="form-group row">
                                                        <div class="col-lg-offset-2 col-lg-12">
                                                            @if(!@empty($id))

                                                            <a class="btn btn-sm btn-danger float-right m-t-n-xs"
                                                                href="{{ route('facility_sales.index')}}">
                                                                Cancel
                                                            </a>
                                                            <button class="btn btn-sm btn-primary float-right m-t-n-xs"
                                                                data-toggle="modal" data-target="#myModal"
                                                                type="submit" id="save">Update</button>
                                                            @else
                                                            <button class="btn btn-sm btn-primary float-right m-t-n-xs"
                                                                type="submit" id="save" disabled>Save</button>
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

 <script>
            $(document).ready(function() {


                $(document).on('change', '.user_type', function() {
                    var id = $(this).val();
                    console.log(id);
                    $.ajax({
                        url: '{{url("restaurant/findUser")}}',
                        type: "GET",
                        data: {
                            id: id
                        },
                        dataType: "json",
                        success: function(data) {
                            console.log(data);
                            $("#errors").empty();
                            $("#save").attr("disabled", false);

                            if (data == '') {
                                    $("#user_id").empty();
                                  $("#user_id").append(
                                    '<option value="">Select User</option>');
                                $("#save").attr("disabled", true);

                            } else {
                                
                                $("#user_id").empty();
                                $("#user_id").append(
                                    '<option value="">Select User</option>');
                                $.each(data, function(key, value) {
                                    if (id == "Visitor") {
                                      
                                        $("#user_id").append('<option value=' +
                                            value.id + '>' + value.first_name +
                                            ' ' + value.last_name + '</option>');
                                    }
                                    else if(id == "Member") {
                                        $("#user_id").append('<option value=' +
                                            value.id + '>' + value.full_name + ' - ' + value.member_id +'</option>');
                                           
                                    }

                                });
                            }

                        }

                    });

                });


            });
            </script>


<script>
$(document).ready(function() {
    
 $(document).on('change', '.item_name', function() {
        var id = $(this).val();
        var sub_category_id = $(this).data('sub_category_id');
        $.ajax({
            url: '{{url("findFacilityPrice")}}',
            type: "GET",
            data: {
                id: id,

            },
            dataType: "json",
            success: function(data) {
                console.log(data);
                $('.item_price' + sub_category_id).val(numberWithCommas(data[0]["cost_price"]));
                $('.item_id' + sub_category_id).val(id);
               
            }

        });

    });


   
});
</script>

           
  <script type="text/javascript">
    $(document).ready(function() {



        var count = 0;


        function autoCalcSetup() {
            $('div#cart').jAutoCalc('destroy');
            $('div#cart div.line_items').jAutoCalc({
                keyEventsFire: true,
                decimalPlaces: 2,
                emptyAsZero: true
            });
            $('div#cart').jAutoCalc({
                decimalPlaces: 2
            });
        }
        autoCalcSetup();

        $('.add').on("click", function(e) {

            count++;
            var html = '';
            html +=
                '<div class="col-lg-3 line_items" id="td'+count + '"><br><select name="checked_item_name[]" class="form-control m-b item_name" id="item_name_' +count + '"  data-sub_category_id="' +count + '"  required><option value="">Select Item</option>@foreach($name as $n)<option value="{{ $n->id}}">{{$n->name}}</option>@endforeach</select><br></div><br>';
            html +='<div class="col-lg-6 line_items" id="td'+count + '"><br>Quantity <input type="number" name="checked_quantity[]" class="form-control item_quantity" min="1" data-category_id="' +count +'"placeholder ="quantity" id ="quantity" required /><div class=""> <p class="form-control-static errors' +count + '" id="errors" style="text-align:center;color:red;"></p> </div><br>Price <input type="text" name="checked_price[]" class="form-control item_price' + count +'" placeholder ="price" id="price td'+count + '" required  value=""/><br>Total Cost <input type="text" name="checked_total_cost[]" class="form-control item_total' +
                count + '" placeholder ="total" id="total td'+count + '" required readonly jAutoCalc="{checked_quantity} * {checked_price}" /><br><input type="hidden" name="checked_total_tax[]" class="form-control item_total_tax' +
                count +'" placeholder ="tax" id="tax_rate td'+count + '" required readonly jAutoCalc="{checked_quantity} * {checked_price} * {checked_tax_rate}"   readonly/><br>';
                 html += '<input type="hidden" name="checked_no[]" class="form-control item_no' + count +'" id="no td'+count + '" value="' + count +'" required />';
            html += '<input type="hidden" name="checked_unit[]" class="form-control item_unit' + count +'" id="unit td'+count + '" placeholder ="unit" required />';
            html += '<input type="hidden" name="checked_tax_rate[]" class="form-control item_tax' + count +'" placeholder ="total" id="tax td'+count + '" value="0" required />';
            html += '<input type="hidden" id="item_id"  class="form-control item_id' + count +'" value="" />';
            html +='<input type="hidden" id="type_id"  class="form-control type_id' +count+'" value="" /></div>';
            html +='<div class="col-lg-3 text-center line_items" id="td'+count + '"><br><a class="list-icons-item text-info add1" title="Check" href="javascript:void(0)" data-save_id="' +count + '"><i class="icon-check2" style="font-size:30px;font-weight:bold;"></i></a>&nbsp&nbsp<a class="list-icons-item text-danger remove" title="Delete" href="javascript:void(0)" data-button_id="' +count + '"><i class="icon-trash" style="font-size:18px;"></i></a><br><div class=""> <p class="form-control-static body_errors' +count + '" id="errors" style="text-align:center;color:red;"></p></div></div>';


          
            if ( $('#cart > .body div').length == 0 ) {
            $('#cart > .body').append(html);
            autoCalcSetup();
            
              }

           
            $('.m-b').select2({});


       
        
        
          $(document).on('change', '.item_price'+ count, function() {
                var id = $(this).val();
                $.ajax({
                url: '{{ url('format_number') }}',
                type: "GET",
                data: {
                    id: id
                },
                dataType: "json",
                success: function(data) {
                 console.log(data);
                $('.item_price' + count).val(data);
                   
                    }

                });

            });
                        
                        
        });
        
        
     $(document).on('change', '.item_name', function() {
        var id = $(this).val();
        var sub_category_id = $(this).data('sub_category_id');

            $.ajax({
            url: '{{url("findFacilityPrice")}}',
            type: "GET",
            data: {
                id: id,
                 type: type,
            },
            dataType: "json",
            success: function(data) {
                console.log(data);
                $('.item_price' + sub_category_id).val(numberWithCommas(data[0]["cost_price"]));
                $('.item_id' + sub_category_id).val(id);
                  autoCalcSetup();
            }

        });

    });
        

      


        $(document).on('click', '.remove', function() {
            var button_id = $(this).data('button_id');
            var contentToRemove = document.querySelectorAll('#td' + button_id);
            $(contentToRemove).remove(); 
            autoCalcSetup();
        });

    });
</script>


<script type="text/javascript">
    $(document).ready(function() {


     
        function autoCalcSetup1() {
            $('div#cart1').jAutoCalc('destroy');
            $('div#cart1.div.line_items').jAutoCalc({
                keyEventsFire: true,
                decimalPlaces: 2,
                emptyAsZero: true
            });
            $('div#cart1').jAutoCalc({
                decimalPlaces: 2
            });
        }
        autoCalcSetup1();
        
        

         $(document).on('click', '.add1', function() {
            console.log(1);
            
            
            
        var button_id = $(this).data('save_id');
        $('.body_errors'+ button_id).empty();
        //$('.body').find('select, textarea, input').serialize();
        
        var b=$('#td' + button_id).find('.item_name').val();
        var c=$('div#td' + button_id +'.col-lg-6.line_items').find('.item_quantity').val();
        var d=$('.item_price' + button_id).val();
        
         
        
        if( b == '' || c == '' || d == '' ){
           $('.body_errors'+ button_id).append('Please Fill Required Fields.');
        
     }
     
     else{
        
        
         $.ajax({
                type: 'GET',
                 url: '{{ url('add_facility_item') }}',
               data: $('#cart > .body').find('select, textarea, input').serialize(),
                cache: false,
                async: true,
                success: function(data) {
                    console.log(data);
                    
          $('#cart1 > .body1 table thead').show();
             $('#cart1 > .body1 table tbody').append(data['list']);
             $('#cart1 > .body1').append(data['list1']);
              autoCalcSetup1();
 
                },
              


            });
            
            
            var contentToRemove = document.querySelectorAll('#td' + button_id);
            $(contentToRemove).remove(); 
            
     }
     

        });



        $(document).on('click', '.remove1', function() {
            var button_id = $(this).data('button_id');
            var contentToRemove = document.querySelectorAll('#lst' + button_id);
            $(contentToRemove).remove(); 
             $(this).closest('tr').remove();
             $(".item_quantity").change();
            autoCalcSetup1();
        });
        
        
          $(document).on('click', '.rem', function() {
            var button_id = $(this).data('button_id');
            var btn_value = $(this).attr("value");
            var contentToRemove = document.querySelectorAll('#lst' + button_id);
            $(contentToRemove).remove(); 
             $(this).closest('tr').remove();
              $('#cart1 > .body1').append('<input type="hidden" name="removed_id[]"  class="form-control name_list" value="' +btn_value + '"/>');
              $(".item_quantity").change();
            autoCalcSetup1();
        });



  $(document).on('click', '.edit1', function() {
            var button_id = $(this).data('button_id');
            
            console.log(button_id);
            $.ajax({
                type: 'GET',
                 url: '{{ url('facilityModal') }}',
                 data: $('#cart1 > .body1 #lst'+button_id).find('select, textarea, input').serialize(),
                cache: false,
                async: true,
                success: function(data) {
                    //alert(data);

                    $('#appFormModal > .modal-dialog').html(data);
                },
                error: function(error) {
                    $('#appFormModal').modal('toggle');

                }


            });
           
            
        });
        
        
            $(document).on('click', '.add_edit_form', function(e) {
            e.preventDefault();
           
            var sub = $(this).data('button_id');
            console.log(sub);
            
            $.ajax({
                data: $('.addEditForm').serialize(),
                type: 'GET',
                 url: '{{ url('add_facility_item') }}',
                dataType: "json",
                success: function(data) {
                    console.log(data);
                  
                  $('#cart1 > .body1 table tbody').find('.trlst'+sub).html(data['list']);
                  $('#cart1 > .body1').find('#lst'+sub).html(data['list1']);
                    $(".item_quantity").change();
              autoCalcSetup1();
           

                }
            })
        });



    });
</script>


<script>
    $(document).ready(function() {
    
       $(document).on('change', '.item_total_cost', function() {
            var id = $(this).val();
             var user= $('.user').val();
          var type= $('.user_type').val();

           console.log(id);
            $.ajax({
                url: '{{url("restaurant/findAmount")}}',
                type: "GET",
                data: {
                    id: id,
                  user:user,
                  type:type,
                },
                dataType: "json",
                success: function(data) {
                  console.log(data);
                 $('.errors_bal').empty();
                $("#save").show();
                 if (data != '') {
                $('.errors_bal').append(data);
               $("#save").hide();
    } else {
      
    }
                
           
                }
    
            });
    
        });
    
    
    
    });
    </script>

            <script type="text/javascript">
            function model(id, type) {

            $.ajax({
                type: 'GET',
                url: '{{ url('facilityModal') }}',
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
            
             <script>
    $(document).ready(function() {
      $(".item_quantity").trigger('change');
      
         $(document).on('click', '.save', function(event) {
   
         $('.item_errors').empty();

          if ( $('#cart1 > .body1 .line_items').length == 0 ) {
               event.preventDefault(); 
    $('.item_errors').append('Please Add Items.');
}
         
         else{
            
         
          
         }
        
    });
    
    
    
    });
    </script>
    
    
 
    
    
    <script type="text/javascript">


function numberWithCommas(x) {
    var parts = x.toString().split(".");
    parts[0] = parts[0].replace(/\B(?=(\d{3})+(?!\d))/g, ",");
    return parts.join(".");
}

</script>
     




@endsection