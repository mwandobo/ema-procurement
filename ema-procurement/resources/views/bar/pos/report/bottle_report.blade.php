@extends('layout.master')


@section('content')
<section class="section">
    <div class="section-body">
        <div class="row">
            <div class="col-12 col-sm-6 col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Bottle Balance Report</h4>
                    </div>
                    <div class="card-body">
                       
                        <div class="tab-content tab-bordered" id="myTab3Content">
                            <div class="tab-pane fade @if(empty($id)) active show @endif" id="home2" role="tabpanel"
                                aria-labelledby="home-tab2">
                                
                                
                                <br>
        <div class="panel-heading">
            <h6 class="panel-title">
                
                @if(!empty($start_date))
                    For the period: <b>{{Carbon\Carbon::parse($start_date)->format('d/m/Y')}}  to {{Carbon\Carbon::parse($end_date)->format('d/m/Y')}}</b>
                @endif
            </h6>
        </div>

<br>
        <div class="panel-body hidden-print">
            {!! Form::open(array('url' => Request::url(), 'method' => 'post','class'=>'form-horizontal', 'name' => 'form')) !!}
            <div class="row">

               <div class="col-md-4">
                    <label class="">Start Date</label>
                   <input  name="start_date" type="date" class="form-control date-picker" required value="<?php
                if (!empty($start_date)) {
                    echo $start_date;
                } else {
                    echo date('Y-m-d', strtotime('first day of january this year'));
                }
                ?>">

                </div>
                <div class="col-md-4">
                    <label class="">End Date</label>
                     <input  name="end_date" type="date" class="form-control date-picker" required value="<?php
                if (!empty($end_date)) {
                    echo $end_date;
                } else {
                    echo date('Y-m-d');
                }
                ?>">
                </div>
                
                
               

               

   <div class="col-md-4">
                      <br><button type="submit" class="btn btn-success">Search</button>
                        <a href="{{Request::url()}}"class="btn btn-danger">Reset</a>

                </div>                  
                </div>
           
            {!! Form::close() !!}

        </div>

        <!-- /.panel-body -->


<br>
@if(!empty($start_date))

        <div class="panel panel-white">
            <div class="panel-body ">
                <div class="table-responsive">

                 <table class="table datatable-button-html5-basic">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                               <th>Sales Balance</th>
                        </tr>
                        </thead>
                        <tbody>

                          <?php
            $total_p=0; 
             $total_s=0;
             $total_pr=0; 
             $total_sr=0;
              $i=0;
?>

                        @foreach($data as $key)
                        
                         @php
                                      $pqty= App\Models\Bar\POS\InvoiceHistory::where('item_id', $key->id)->where('type', 'Sales')->whereBetween('invoice_date',[$start_date,$end_date])->sum('quantity');   
                                        
                                       $sqty= App\Models\Bar\POS\GoodIssueItem::where('item_id', $key->id)->where('status',1)->whereBetween('date',[$start_date,$end_date])->sum('quantity'); 
                                         
                                        @endphp 
                      
                        
                         @if($pqty > 0)
                         
                           @php
                                     
                                        $total_p+=$pqty;
                                       
                                          $total_s+=($sqty * $key->bottle);
                                         
                                        @endphp 
                             <?php   $i++;  ?>

                            <tr>
                                 <td>{{ $i }}</td>
                                 <td>{{$key->name}}</td>
                                 

                          
                                 <td><a  href="#views{{$key->id}}"  data-toggle="modal" >{{number_format($pqty,2)}}</a></td>     
                                                       
                            </tr>
                        
                         @endif
                        @endforeach
                        
                        </tbody>
                        <tfoot>
                           <tr>
                                <td>Total</td>
                     <td></td>
                                <td>{{number_format($total_p,2)}}</td>
                               
                            </tr>
                        </tfoot>
                    </table>
                  
                </div>
            </div>
            <!-- /.panel-body -->
             </div>
   @endif              

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

 <!-- Modal -->
@foreach($data as $key)
<div class="modal fade " data-backdrop=""  id="views{{$key->id}}"  tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg"><div class="modal-dialog  modal-lg" role="document">
<div class="modal-content">
<div class="modal-header">
<h5 class="modal-title"  style="text-align:center;"> {{$key->name}} Sales Balance<h5>
<button type="button" class="close" data-dismiss="modal" aria-label="Close">
<span aria-hidden="true">×</span>
</button>
</div>


<div class="modal-body">
<div class="table-responsive">
     <table class="table datatable-basic table-striped">
                 <thead>
                      <tr>
                          <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0"
                              rowspan="1" colspan="1"
                              aria-label="Browser: activate to sort column ascending"
                              style="width: 30.531px;">#</th>
                              <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0"
                              rowspan="1" colspan="1"
                              aria-label="Platform(s): activate to sort column ascending"
                              style="width: 50.484px;">Type</th>
                      <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0"
                              rowspan="1" colspan="1"
                              aria-label="Platform(s): activate to sort column ascending"
                              style="width: 110.484px;">Date</th>
                              <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0"
                              rowspan="1" colspan="1"
                              aria-label="Platform(s): activate to sort column ascending"
                              style="width: 120.484px;">Ref No</th>                                               
                        <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0"
                              rowspan="1" colspan="1"
                              aria-label="Platform(s): activate to sort column ascending"
                              style="width: 160.484px;">Client</th>
                         <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0"
                                                    rowspan="1" colspan="1"
                                                    aria-label="Platform(s): activate to sort column ascending"
                                                    style="width: 100.484px;">Location</th>
                               <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0"
                              rowspan="1" colspan="1"
                              aria-label="Platform(s): activate to sort column ascending"
                              style="width: 100.484px;">Quantity</th>
                       
                      </tr>
                  </thead>
                  <tbody>
                      <?php                   
                          $account =App\Models\Bar\POS\InvoiceHistory::where('item_id', $key->id)->whereBetween('invoice_date',[$start_date,$end_date])->orderBy('invoice_date','desc')->get();
                          ?>  
                   @foreach($account  as $a)
                                   <tr>
                        <td >{{$loop->iteration }}</td>
                         <td >{{$a->type }}</td>
                          @if($a->type == 'Sales')
                          <td >{{$a->invoice_date }}</td>
                           @else
                                <td >{{$a->return_date }}</td>
                               @endif
                            <td >{{$a->invoice->reference_no }}</td>

                             <?php

                                     if($a->invoice->user_type == 'Visitor'){
                                       $user=App\Models\Visitors\Visitor::find($a->client_id);
                                    $name=$user->first_name .'  '.$user->last_name ;
         }
         else if($a->invoice->user_type == 'Member'){
            $user=App\Models\Member\Member::find($a->client_id) ;   
              $name=$user->full_name;   
                 }

?>
                            <td >{{$name}} @if(!empty($a->invoice->user_type == 'Member')) , {{$user->member_id}} @endif</td>
                                 <td >{{$a->store->name }}</td>
                                 @if($a->type == 'Sales')
                           <td >{{ number_format($a->quantity ,2) }}</td>
                           @else
                                  <td >{{ number_format(0-$a->quantity ,2) }}</td>
                               @endif
                     
                      </tr> 
  
    @endforeach
      </tbody>
   
   <?php
                     
                          $q = App\Models\Bar\POS\InvoiceHistory::where('item_id', $key->id)->where('type', 'Sales')->whereBetween('invoice_date',[$start_date,$end_date])->sum('quantity');
                           $r = App\Models\Bar\POS\InvoiceHistory::where('item_id', $key->id)->where('type', 'Credit Note')->whereBetween('invoice_date',[$start_date,$end_date])->sum('quantity');
                          ?>  
  <tfoot>
                      <tr>     
                          <td ></td> <td ></td>
                               <td></td>   <td></td><td></td>
                           <td><b> Total Balance</b></td>
                              <td><b>{{ number_format($q-$r,2) }}</b></td>
                          
                      </tr> 
  
                        
   
                                </tfoot>
      </table>
     </div>

</div>
<div class="modal-footer bg-whitesmoke br">
<button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
</div>
</div>
</div></div>
</div>

@endforeach

@foreach($data as $key)
  <div class="modal fade " data-backdrop=""  id="viewp{{$key->id}}"  tabindex="-1" role="dialog" aria-hidden="true">
                          <div class="modal-dialog modal-lg"><div class="modal-dialog  modal-lg" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title"  style="text-align:center;"> {{$key->name}} Moved Balance<h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
        </div>


        <div class="modal-body">
  <div class="table-responsive">
                           <table class="table datatable-basic table-striped">
                                       <thead>
                                            <tr>
                                                <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0"
                                                    rowspan="1" colspan="1"
                                                    aria-label="Browser: activate to sort column ascending"
                                                    style="width: 30.531px;">#</th>
                                                    <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0"
                                                    rowspan="1" colspan="1"
                                                    aria-label="Platform(s): activate to sort column ascending"
                                                    style="width: 100.484px;">Location</th>
                                            <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0"
                                                    rowspan="1" colspan="1"
                                                    aria-label="Platform(s): activate to sort column ascending"
                                                    style="width: 110.484px;">Date</th>
                                                     <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0"
                                                    rowspan="1" colspan="1"
                                                    aria-label="Platform(s): activate to sort column ascending"
                                                    style="width: 100.484px;">Quantity</th>
                                             
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php                   
                                                $account =App\Models\Bar\POS\GoodIssueItem::where('item_id', $key->id)->whereBetween('date',[$start_date,$end_date])->where('status',1)->orderBy('created_at','desc')->get();
                                                ?>  
                                         @foreach($account  as $a)
                                         <?php                   
                                         $date=App\Models\Bar\POS\GoodIssue::find($a->issue_id);
                                         ?> 

                                                         <tr>
                                              <td >{{$loop->iteration }}</td>
                                               <td >{{$a->store->name }}</td>
                                                  <td >{{$date->date }}</td>
                                                   
                                                 <td >{{ number_format($a->quantity * $key->bottle ,2) }}</td>
                                               
                                           
                                            </tr> 
                        
                          @endforeach
                            </tbody>
                         
                         <?php
                                           
                                                $q = App\Models\Bar\POS\GoodIssueItem::where('item_id', $key->id)->whereBetween('date',[$start_date,$end_date])->where('status',1)->sum('quantity');
                                                
                                                ?>  
                        <tfoot>
                                            <tr>     
                                                <td ></td> <td ></td>
                                                  
                                                 <td><b> Total Balance</b></td>
                                                    <td><b>{{ number_format($q * $key->bottle,2) }}</b></td>
                                                
                                            </tr> 
                        
                                              
                         
                                                      </tfoot>
                            </table>
                           </div>

        </div>
        <div class="modal-footer bg-whitesmoke br">
            <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
        </div>
    </div>
</div></div>
  </div>

@endforeach


@endsection

@section('scripts')

<link rel="stylesheet" href="{{ asset('assets/datatables/css/jquery.dataTables.css') }}">
<link rel="stylesheet" href="{{ asset('assets/datatables/css/buttons.dataTables.min.css') }}">

<script src="{{asset('assets/datatables/js/jquery.dataTables.js')}}"></script>
<script src="{{asset('assets/datatables/js/dataTables.buttons.min.js')}}"></script>
<script src="{{asset('assets/datatables/js/jszip.min.js')}}"></script>
<script src="{{asset('assets/datatables/js/pdfmake.min.js')}}"></script>
<script src="{{asset('assets/datatables/js/vfs_fonts.js')}}"></script>
<script src="{{asset('assets/datatables/js/buttons.html5.min.js')}}"></script>
<script src="{{asset('assets/datatables/js/buttons.print.min.js')}}"></script>
<script>

      $('.datatable-button-html5-basic').DataTable(
        {
        dom: 'Bfrtip',

        buttons: [
          {extend: 'copyHtml5',title: 'BOTTLE BALANCE REPORT FOR THE PERIOD {{Carbon\Carbon::parse($start_date)->format('d-m-Y')}} TO {{Carbon\Carbon::parse($end_date)->format('d-m-Y')}} ', footer: true},
           {extend: 'excelHtml5',title: 'BOTTLE BALANCE REPORT FOR THE PERIOD {{Carbon\Carbon::parse($start_date)->format('d-m-Y')}} TO {{Carbon\Carbon::parse($end_date)->format('d-m-Y')}}' , footer: true},
           {extend: 'csvHtml5',title: 'BOTTLE BALANCE REPORT FOR THE PERIOD {{Carbon\Carbon::parse($start_date)->format('d-m-Y')}} TO {{Carbon\Carbon::parse($end_date)->format('d-m-Y')}}' , footer: true},
            {extend: 'pdfHtml5',title: 'BOTTLE BALANCE REPORT FOR THE PERIOD {{Carbon\Carbon::parse($start_date)->format('d-m-Y')}} TO {{Carbon\Carbon::parse($end_date)->format('d-m-Y')}}', footer: true,customize: function(doc) {
doc.content[1].table.widths = [ '10%', '50%', '20%'];
}
},
            {extend: 'print',title: 'BOTTLE BALANCEREPORT FOR THE PERIOD {{Carbon\Carbon::parse($start_date)->format('d-m-Y')}} TO {{Carbon\Carbon::parse($end_date)->format('d-m-Y')}}' , footer: true}

                ],
        }
      );
     
    </script>
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
<script src="{{ url('assets/js/plugins/sweetalert/sweetalert.min.js') }}"></script>

@endsection