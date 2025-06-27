<!DOCTYPE html>
<html>

<head>
    <title>FEE PAYMENT RECEIPT</title>
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
    <div>
       <h4 align="center" style="margin-top: 0%;" class="fontS">DAR ES SALAAM GYMKHANA CLUB<h4>
         <p align="center" style=" font-size:10px;">P.O.BOX 286. 
         <br>TEL 2120519. FAX 2138445 
         <br>info@dargymkhana.com,  www.gymkhana.co.tz
          <br>TIN 100-148-951, VRN 10-005690-C
         
         </p>
  

                        <hr style="border: 1px solid;">  
                <p align="center" style="font-weight: normal;" class="fontL"><b>RECEIPT NO: {{$invoices->reference_no}}</b>
                <br><b>Date: {{Carbon\Carbon::parse($invoices->date)->format('d/m/Y')}}</b>
                <br><b>Name: {{$invoices->owner->full_name}} ,  {{$invoices->owner->member_id}}</b>
                
                
                </p>

                            <?php
                               
                                 $i =1;
       
                                 ?>

                    <table  style=" border: none !important; family:source_sans_proregular; font-size:10px;">
                            <tbody>
                                <tr>
                                    <td align="">#</td>
                                    <td align="">Item</td>
                                    <td align="">Amount</td>
                                </tr>
                              @if(!empty($items))
                                  @foreach($items as $row)
                                <tr>
                                    <td align="">{{$i++}}</td>
                                    <td align="">{{$row->fee_type}}</td>
                                    <td align="">{{number_format($row->amount ,2)}}</td>
                                </tr>
                                    @endforeach
                                        @endif
                                        
                                </tbody>
                               
                               
                                <tfoot>
 

                                <tr style="font-weight:bold;">
                                    <td align=""></td>
                                    <td align="">Total Paid:</td>
                                    <td align="">{{number_format($invoices->amount ,2)}}</td>
                                </tr>
                                <tr style="font-weight:bold;">
                                    <td align=""></td>
                                    <td align="">Service Charge:</td>
                                    <td align="">0.00</td>
                                </tr>
                                <tr style="font-weight:bold;">
                                    <td align=""></td>
                                    <td align="">Current Balance:</td>
                                    <td align="">{{number_format($balance,2)}}</td>
                                </tr>
                                
                           </tfoot>
                    </table>
                                        
<hr style="border: solid;">
                <div class="space fontS">
                    <div class="col-md-12">                 

<p class="fontL" ><b>Receiving Officer:&nbsp;&nbsp;&nbsp;{{$invoices->user->name}}</b></p>
<p class="fontL" ><b>Signature:&nbsp;&nbsp;&nbsp;__________</b></p>
                

<p align="center"><hr style="border: solid;"></p>
<p align="center">Powered by UjuziNet Systems</p>

</div></div></div>



