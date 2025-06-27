<!DOCTYPE html>
<html>

<head>
    <title>FACILITY SALES RECEIPT</title>
    <link href='https://fonts.googleapis.com/css?family=Open Sans' rel='stylesheet'>

    <style>
     body, html { 
            
            margin: 0px 5px 10px 5px !important;
            padding: 1px 1px px 0px !important;
             font-family: 'Open Sans';
        }
    table {
       
        width: 100%;
    }

    td,
    th {
        
    }
    .space{
        margin-top: -1em;
    }
   .fontL{
        font-size:10px;
    }
    
    .fontS{
        font-size:15px;
    }
    .fontN{
        font-size:23px;
    }
    
    .page-break {
            page-break-inside: avoid;
        }
    </style>

</head>

<body>
 <?php
$settings= App\Models\Setting::first();

if($invoices->user_type == 'Visitor'){
  $user=App\Models\Visitors\Visitor::find($invoices->client_id);
  $name=$user->first_name .'  '.$user->last_name ;
   $balance=$user->balance;
         }
 else if($invoices->user_type == 'Member'){
   $user=App\Models\Member\Member::find($invoices->client_id);    
     $name=$user->full_name;  
     $balance=$member->total_balance;
                 }


?>
    <div>
    
    <h4 align="center" style="margin-top: 0%;" class="fontS">DAR ES SALAAM GYMKHANA CLUB<h4>
         <p align="center" style=" font-size:10px;">P.O.BOX 286. 
         <br>TEL 2120519. FAX 2138445 
         <br>info@dargymkhana.com,  www.gymkhana.co.tz
          <br>TIN 100-148-951, VRN 10-005690-C
         
         </p>
  

                        <hr style="border: 1px solid;">  
                <p align="center" style="font-weight: normal;" class="fontL"><b>RECEIPT NO: {{$invoices->reference_no}}</b>
                <br><b>Date: {{Carbon\Carbon::parse($invoices->invoice_date)->format('d/m/Y')}}</b>
                <br><b>Name: {{$name}} @if(!empty($invoices->user_type == 'Member')) , {{$user->member_id}} @endif</b>
                
                
                </p>
     

   <?php
                               
                                 $gland_total = 0;
                                 $i =1;
       
                                 ?>


                    <table  style=" border: none !important; family:source_sans_proregular; font-size:10px;">
                            <tbody>
                                <tr>
                                    <td align="">Item</td>
                                    <td align="">Qty</td>
                                    <td align="">Amount</td>
                                </tr>

                                @if(!empty($invoice_items))
                                        @foreach($invoice_items as $row)
                                        <?php
                                         $gland_total +=$row->total_cost +$row->total_tax;

                                            $item_name =  App\Models\Facility\Items::find($row->item_name);
                                         ?>

                                <tr>
                                    <td align="">{{$item_name->name}}</td>
                                    <td align="">{{$row->quantity}}</td>
                                    <td align="">{{number_format($row->total_cost + $row->total_tax ,2)}} {{$invoices->exchange_code}}</td>
                                </tr>

                                         @endforeach
                                        @endif
                                        
                                 </tbody>
                               
                               
                                <tfoot>

                                <tr>
                                   <td align="" colspan="2" style="font-weight:bold;">Total Paid :</td>
                                    <td align="" style="font-weight:bold;">{{number_format($gland_total,2)}}  {{$invoices->exchange_code}}</td>
                                </tr>

                                <tr>
                                   <td align="" colspan="2" style="font-weight:bold;">Service Charge :</td>
                                    <td align="" style="font-weight:bold;">{{number_format(0,2)}} </td>
                                </tr>
                                <tr>
                                   <td align="" colspan="2" style="font-weight:bold;">Current  Balance :</td>
                                    <td align="" style="font-weight:bold;">{{number_format($balance,2)}} </td>
                                </tr>
         
                               
                              
                            </tfoot>        
                                
                                <tr>
                               
                    </table>
                                        
<hr style="border: solid;">
                <div class="space fontS">
                    <div class="col-md-12">                 
<p class="fontL" ><b>Created by:&nbsp;&nbsp;&nbsp;{{$invoices->user->name}}</b></p>
<p class="fontL" ><b>Signature:&nbsp;&nbsp;&nbsp;______________</b></p>
               

<hr style="border: solid;">
<p align="center">Powered by UjuziNet Systems</p>

</div></div></div>



