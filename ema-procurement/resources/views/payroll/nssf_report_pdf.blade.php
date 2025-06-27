<!DOCTYPE html>
<html>
<head>
    <title>Larave Generate Invoice PDF - Nicesnippest.com</title>
</head>
<style type="text/css">
    body{
        font-family: 'Roboto Condensed', sans-serif;
    }
    .m-0{
        margin: 0px;
    }
    .p-0{
        padding: 0px;
    }
    .pt-5{
        padding-top:5px;
    }
    .mt-10{
        margin-top:10px;
    }
    .text-center{
        text-align:center !important;
    }
    .w-100{
        width: 100%;
    }
   
    .w-85{
        width:85%;   
    }
    .w-15{
        width:15%;   
    }
    .logo img{
        width:45px;
        height:45px;
        padding-top:30px;
    }
    .logo span{
        margin-left:8px;
        top:19px;
        position: absolute;
        font-weight: bold;
        font-size:25px;
    }
    .gray-color{
        color:#5D5D5D;
    }
    .text-bold{
        font-weight: bold;
    }
    .border{
        border:1px solid black;
    }
    table tbody tr, table thead th, table tbody td{
        border: 1px solid #d2d2d2;
        border-collapse:collapse;
        padding:7px 8px;
    }
    table tr th{
       background-color: #2F75B5;
        font-size:14px;
      color:white;
    }
    table tr td{
        font-size:12px;
    }
    table{
        border-collapse:collapse;
    }
table tbody tr:nth-of-type(odd) {
    background-color: rgba(0,0,0,.07);
}
table tbody tr {
    background-color: #ffffff;
}
    .box-text p{
        line-height:10px;
    }
    .float-left{
        float:left;
    }
    .total-part{
        font-size:16px;
        line-height:12px;
    }
    .total-right p{
        padding-right:30px;
    }
footer {
            color: #777777;
            width: 100%;
            height: 30px;
            position: fixed;
            bottom: 0;
              margin-top:30px;
            border-top: 1px solid #aaaaaa;
            padding: 8px 0;
            text-align: center;
        }

        table tfoot tr:first-child td {
            border-top: none;
        }
 table tfoot tr td {
  padding:7px 8px;
        }


        table tfoot tr td:first-child {
            border: none;
        }

</style>
<body>
  <!-- Define header and footer blocks before your content -->


  <!-- Wrap the content of your PDF inside a main tag -->
 <?php
$settings= App\Models\Setting::first();

?>

<div class="add-detail ">
   <table class="table w-100 ">
<tfoot>
       
        <tr>
            <td class="w-50">
                <div class="box-text">
                    <center><img class="pl-lg" style="width: 133px;height:120px;" src="{{url('images')}}/{{$settings->site_logo}}">  </center>
                </div>
            </td>
  
                  
        </tr>
</tfoot>
    </table>


    <div style="clear: both;"></div>
</div>
<div class="table-section bill-tbl w-100 mt-10">
    <table class="table w-100 mt-10">
<tfoot>
 <td class="w-50">
                <div class="box-text">
                    <center><b>  NSSF Report
                    for the Month  {{Carbon\Carbon::parse($month)->format('F Y')}}</b> </center>
                </div>
        <td>
         
        </tr>

</tfoot>
    </table>
</div>


                         <?php 
                                     
                                     $nssf_amount = 0;;
                                     $total_nssf = 0;;                                 

                                       ?>

<div class="table-section bill-tbl w-100 mt-10">
    <table class="table  w-100 mt-10">
<thead>

        <tr>
      
                               <th>#</th>                        
                                 <th>Name</th>
                                <th>NSSF Number</th>
                             <th>Employer Contribution</th>
                            <th>Employee Contribution</th>
               
        </tr>
</thead>
                               <tbody>


                        @foreach ($check_existing_payment as $row)
                                <?php 
                                       $a = App\Models\User::where('id', $row->user_id)->first();
                            $nssf = App\Models\Accounting\JournalEntry::where('payment_id', $row->id)->where('name', 'NSSF Payment')->whereNotNull('debit')->first();; 
                        $details = App\Models\UserDetails\SalaryDetails::where('user_id',$row->user_id)->first(); 
                           
                                 if(!empty($nssf)){
                               $nssf_amount=$nssf->debit;
                             }
                               else{
                                 $nssf_amount=0;
                           }
                                       ?>
                            <tr>
                                     <td> <?php echo $loop->iteration; ?></td>
                                 <td><?php echo $a->name; ?></td>                                
                                 <td>{{ !empty($details) ? $details->NSSF : ''}}</td>
                              <td>{{number_format( $nssf_amount,2)}} </td>
                              <td>{{number_format( $nssf_amount,2)}} </td>        
                            </tr>


                           <?php 
                                     
                                                                   
                                           $total_nssf += $nssf_amount;;
                                       ?>
                        
                        @endforeach
                        </tbody>
<tfoot>
<tr>
                                     <td></td><td></td>                           
                                 <td><b>Total</b></td>
                                 <td>{{number_format( $total_nssf,2)}} </td>
                                   <td>{{number_format( $total_nssf,2)}} </td>


</tr>
</tfoot>
    </table>



</div>

<script>

</body>
</html>



