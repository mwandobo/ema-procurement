@extends('layout.master')
<style>
.p-md {
    padding: 12px !important;
}

.bg-items {
    background: #303252;
    color: #ffffff;
}
.ml-13 {
    margin-left: -13px !important;
}
 .body > .line_items{
     border:1px solid #ddd;
 }
</style>

@section('content')
<section class="section">
    <div class="section-body">


        <div class="row">


            <div class="col-12 col-md-12 col-lg-12">

               <div class="col-lg-10">
                  @if($invoices->good_receive == 0 && $invoices->status != 4)
                 <a class="btn btn-xs btn-primary"  onclick="return confirm('Are you sure?')"   href="{{ route('orders.edit', $invoices->id)}}"  title="" > Edit </a>          
            
                @endif


      @if( $invoices->good_receive == 0)                        
            <a class="btn btn-xs btn-info" data-placement="top"  href="{{ route('orders.receive',$invoices->id)}}"  title="Good Receive"> Approve Invoice </a>   
          
            <a class="btn btn-xs btn-primary" data-id="{{ $invoices->id }}" data-type="add" onclick="model({{ $invoices->id }},'add')" href="" data-toggle="modal"
            data-target="#appFormModal" role="tab" aria-selected="false">Add Menu Item</a>


                                        @endif


                  @if($invoices->good_receive == 1)
                          <a class="btn btn-xs btn-success"  href="{{ route('orders_receipt',['download'=>'pdf','id'=>$invoices->id]) }}">Download Receipt</a>  
                                                       @endif

             
             <a class="btn btn-xs btn-success"  href="{{ route('orders_pdfview',['download'=>'pdf','id'=>$invoices->id]) }}"  title="" > Download PDF </a>         
                                         
    </div>

<br>



<br>
 
                <div class="card">
                    <div class="card-body">
                       
                        <?php
$settings= App\Models\Setting::first();


?>
                        <div class="tab-content" id="myTab3Content">
                            <div class="tab-pane fade show active" id="about" role="tabpanel"
                                aria-labelledby="home-tab2">
                                <div class="row">
                                   <div class="col-lg-6 col-xs-6 ">
                 <img class="pl-lg" style="width: 133px;height: 120px;"src="{{url('images')}}/{{$settings->site_logo}}">
            </div>
                                  
 <div class="col-lg-3 col-xs-3">

                                    </div>

                                      <div class="col-lg-3 col-xs-3">
                                        
                                       <h5 class="mb0">REF NO : {{$invoices->reference_no}}</h5>
                                      Invoice Date : {{Carbon\Carbon::parse($invoices->invoice_date)->format('d/m/Y')}}                                                        
           
                                      
          <br>Status: 
                                   @if($invoices->status == 0)
                                            <span class="badge badge-danger badge-shadow">Not Approved</span>
                                            @elseif($invoices->status == 1)
                                            <span class="badge badge-warning badge-shadow">Not Paid</span>
                                            @elseif($invoices->status == 2)
                                            <span class="badge badge-info badge-shadow">Partially Paid</span>
                                            @elseif($invoices->status == 3)
                                            <span class="badge badge-success badge-shadow">Fully Paid</span>
                                            @elseif($invoices->status == 4)
                                            <span class="badge badge-danger badge-shadow">Cancelled</span>
                                            @endif
                                       
                                        <br>Currency: {{$invoices->exchange_code }}                                                
                    
                    
                
            </div>
                                </div>


                               
                               <div class="row mb-lg">
                                    <div class="col-lg-6 col-xs-6">
                                         <h5 class="p-md bg-items mr-15">Our Info:</h5>
                               <h4 class="mb0">{{$settings->site_name}}</h4>
                    {{ $settings->site_address }}  
                   <br>Phone : {{ $settings->site_phone_number}}     
                  <br> Email : <a href="mailto:{{$settings->site_email}}">{{$settings->site_email}}</a>                                                               
                   <br>TIN : {{$settings->tin}}
                                    </div>
                                   

                                    <div class="col-lg-6 col-xs-6">
                                       

                                   <?php

                                     if($invoices->user_type == 'Visitor'){
                                       $user=App\Models\Visitors\Visitor::find($invoices->user_id);
                                      $phone=$user->phone;
                                      $email=$user->email;
                                    $name=$user->first_name .'  '.$user->last_name ;
         }
         else if($invoices->user_type == 'Member'){
            $user=App\Models\Member\Member::find($invoices->user_id);    
             $phone=$user->phone1;
              $email=$user->email;
              $name=$user->full_name;   
                 }

?>

                                       <h5 class="p-md bg-items ml-13">  Client Info: </h5>
                                       <h4 class="mb0"> {{$name}} @if(!empty($invoices->user_type == 'Member')) , {{$user->member_id}} @endif </h4>    
                                     <br>Phone : {{$phone}}                  
                                    <br> Email : <a href="mailto:{{$email}}">{{$email}}</a>                                                               

                                        

                                        </div>
 </div>

                                    </div>
                                </div>

                                
                                <?php
                               
                                 $sub_total = 0;
                                 $gland_total = 0;
                                 $tax=0;
                                 $i =1;
       
                                 ?>

                               <div class="table-responsive mb-lg">
            <table class="table items invoice-items-preview" page-break-inside:="" auto;="">
                <thead class="bg-items">
                    <tr>
                       <th style="color:white;">#</th>
                        <th style="color:white;">Type</th>
                        <th style="color:white;">Item</th>
                        <th  style="color:white;">Qty</th>
                        <th  style="color:white;">Price</th>
                        <th  style="color:white;">Tax</th>
                        <th  style="color:white;">Total</th>
                    </tr>
                </thead>
                                    <tbody>
                                        @if(!empty($invoice_items))
                                        @foreach($invoice_items as $row)
                                        <?php
                                         $sub_total +=$row->total_cost;
                                         $gland_total +=$row->total_cost +$row->total_tax;
                                         $tax += $row->total_tax; 
                                         ?>
                                        <tr>
                                            <td class="">{{$i++}}</td>
                                              <td class="">{{ $row->type }} </td>
                                            <?php
                                             if($row->type == 'Bar'){
                                           $item_name=App\Models\Bar\POS\Items::find($row->item_name);
                                                }

                                           else if($row->type == 'Kitchen'){
                                             $item_name=App\Models\restaurant\Menu::find($row->item_name);
                                                                                }

                                        ?>
                                            <td class=""><strong class="block">{{$item_name->name}}</strong></td>
                                            <td class="">{{ $row->due_quantity }} </td>
                                        <td class="">{{number_format($row->price ,2)}}  </td>                                         
                                         <td class="">
                                  @if(!@empty($row->total_tax > 0))
                               {{number_format($row->total_tax ,2)}} 
@endif
</td>
                                            <td class="">{{number_format($row->total_cost ,2)}} </td>
                                            
                                        </tr>
                                        @endforeach
                                        @endif

                                       
                                    </tbody>
 <tfoot>
<tr>
<td colspan="5"></td>
<td>Sub Total</td>
<td>{{number_format($sub_total,2)}}  {{$invoices->exchange_code}}</td>
</tr>

<tr>
<td colspan="5"></td>
<td>Total Tax <small class="pr-sm">(VAT 18 %)</small></td>
<td>{{number_format($tax,2)}}  {{$invoices->exchange_code}}</td>
</tr>

<tr>
<td colspan="5"></td>
<td>Total Amount</td>
<td>{{number_format($gland_total - $invoices->discount ,2)}}  {{$invoices->exchange_code}}</td>
</tr>

 @if(!@empty($invoices->due_amount < $invoices->invoice_amount + $invoices->invoice_tax))
     <tr>
<td colspan="5"></td>
                    <td>Paid Amount</p>
                    <td>{{number_format(($invoices->invoice_amount + $invoices->invoice_tax) - $invoices->due_amount,2)}}  {{$invoices->exchange_code}}</p>
                </tr>

      <tr>
<td colspan="5"></td>
                    <td class="text-danger">Total Due</td>
                    <td>{{number_format($invoices->due_amount,2)}}  {{$invoices->exchange_code}}</td>
                </tr>
@endif

<br>
 @if($invoices->exchange_code != 'TZS')
 <tr>
<td colspan="4"></td>
 <td><b>Exchange Rate 1 {{$invoices->exchange_code}} </b></td>
 <td><b> {{$invoices->exchange_rate}} TZS</b></td>
</tr>
<p></p>
<br>
              <tr>
<td colspan="5"></td>
<td>Sub Total</td>
<td>{{number_format($sub_total * $invoices->exchange_rate,2)}}  TZS</td>
</tr>

<tr>
<td colspan="5"></td>
<td>Total Tax</td>
<td>{{number_format($tax * $invoices->exchange_rate,2)}}   TZS<</td>
</tr>

<tr>
<td colspan="5"></td>
<td>Total Amount</td>
<td>{{number_format($invoices->exchange_rate * ($gland_total-$invoices->discount) ,2)}}   TZS</td>
</tr>

 @if(!@empty($invoices->due_amount < $invoices->invoice_amount + $invoices->invoice_tax))
     <tr>
<td colspan="5"></td>
                    <td>Paid Amount</p>
                    <td>{{number_format($invoices->exchange_rate * (($invoices->invoice_amount + $invoices->invoice_tax) - $invoices->due_amount),2)}}  TZS</p>
                </tr>

      <tr>
<td colspan="5"></td>
                    <td class="text-danger">Total Due</td>
                    <td>{{number_format($invoices->due_amount * $invoices->exchange_rate,2)}}  TZS</td>
                </tr>
@endif
@endif
</tfoot>
</table>
                            </div>

                                    

                                
                             
                            </div>

                        </div>

                    </div>
                </div>
            </div>

         

  @if(!empty($payments[0]))
            <div class="col-12 col-md-12 col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <br><h5 class="mb0" style="text-align:center">PAYMENT DETAILS</h5>
                      <div class="tab-content" id="myTab3Content">
                            <div class="tab-pane fade show active" id="about" role="tabpanel"
                                aria-labelledby="home-tab2">
                                <div class="row">     
                            
                                
                                <?php
                               
                                
                                 $i =1;
       
                                 ?>
                                <div class="table-responsive">
        <table class="table datatable-basic table-striped">
                                    <thead>
                                        <tr>
                                            <th>Transaction ID</th>
                        <th>Payment Date</th>
                        <th>Amount</th>
                        
                   <!-- <th>Payment Account</th>
                        <th>Action</th>-->
                                        </tr>
                                    </thead>
                                    <tbody>
                                       
                                        @foreach($payments as $row)
                                       
                                        <tr>
                                            <?php
$method= App\Models\Payments\Payment_methodes::find($row->payment_method);


?>
                                            <td class=""> {{$row->trans_id}}</td>
                                               <td class="">{{Carbon\Carbon::parse($row->date)->format('d/m/Y')}}  </td>
                                            <td class="">{{ number_format($row->amount ,2)}} {{$invoices->currency_code}}</td>
                                           
                                     <!-- 
                                            <td class=""><a class="btn btn-xs btn-outline-info text-uppercase px-2 rounded"
                                            title="Edit" onclick="return confirm('Are you sure?')"
                                            href="{{ route('pos_invoice_payment.edit', $row->id)}}"><i
                                                class="fa fa-edit"></i></a></td>-->
                                        </tr>
                                        @endforeach
                                       


                                    </tbody>
                                   
                                </table>
                              </div>
                            </div>

                        </div>

                    </div>
                </div>
            </div>
            @endif
        
    </div>
</section>

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
    
      <script type="text/javascript">
          function model(id, type) {

            $.ajax({
                type: 'GET',
                url: '{{ url('restaurant/invModal') }}',
                data: {
                    'id': id,
                    'modal_type': type,
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