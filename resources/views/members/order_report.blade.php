@extends('layout.master')


@section('content')
<section class="section">
    <div class="section-body">
        <div class="row">
            <div class="col-12 col-sm-6 col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Order Report</h4>
                    </div>
                    <div class="card-body">
                        <ul class="nav nav-tabs" id="myTab2" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link @if(empty($id)) active show @endif" id="home-tab2" data-toggle="tab"
                                    href="#home2" role="tab" aria-controls="home" aria-selected="true">Order Report
                                    List</a>
                            </li>
                       

                        </ul>
                        <div class="tab-content tab-bordered" id="myTab3Content">
                            <div class="tab-pane fade @if(empty($id)) active show @endif" id="home2" role="tabpanel"
                                aria-labelledby="home-tab2">


        <div class="panel panel-white">
            <div class="panel-body ">
                <div class="table-responsive">

                  <table class="table datatable-basic table-striped">
                        <thead>
                        <tr>
                              <th>#</th>
                            <th>Reference No</th>
                            <th>Date</th>
                              <th>Order Amount</th>
                               <th>Paid Amount</th>
                            <th>Total Balance</th>
                         
                        </tr>
                        </thead>
                        <tbody>

                          <?php
            $total_o=0; 
             $total_p=0;

?>

                        @foreach($data as $key)

                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                  <td><a  href="#viewp{{$key->id}}"  data-toggle="modal" >{{$key->reference_no}}</a></td>
                                  <td>{{$key->invoice_date}}</td>
                                
                           <td>{{number_format($key->invoice_amount + $key->invoice_tax,2)}}</td>
                            <td>{{number_format(($key->invoice_amount + $key->invoice_tax)-($key->due_amount),2)}}</td>  
                                 <td>{{number_format($key->due_amount,2)}}</td>     
                                                      
                            </tr>
                        
                        @php
                                       
                                        $total_o+=$key->invoice_amount + $key->invoice_tax;
                                        $total_p+=$key->due_amount;
                                        @endphp 

                        @endforeach
                        </tbody>
                        <tfoot>
                           <tr>
                                
                     <td></td><td></td>
                            <td>Total</td>
                           <td>{{number_format($total_o,2)}}</td>                               
                       <td>{{number_format($total_o- $total_p,2)}}</td>    
                         <td>{{number_format($total_p,2)}}</td>                           
                            </tr>
                        </tfoot>
                    </table>
                  
                </div>
            </div>
            <!-- /.panel-body -->
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

 <!-- Modal -->
@foreach($data as $key)
  <div class="modal fade " data-backdrop="false"  id="viewp{{$key->id}}"  tabindex="-1" role="dialog" aria-hidden="true">
                          <div class="modal-dialog modal-lg"><div class="modal-dialog  modal-lg" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title"  style="text-align:center;"> {{$key->reference_no}} Details<h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
        </div>


        <div class="modal-body">
  <div class="table-responsive">
                           <table class="table datatable-basic table-borderless">
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
                                                    style="width: 110.484px;">Item</th>
                                                    <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0"
                                                    rowspan="1" colspan="1"
                                                    aria-label="Platform(s): activate to sort column ascending"
                                                    style="width: 120.484px;">Quantity</th>                                               
                                              <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0"
                                                    rowspan="1" colspan="1"
                                                    aria-label="Platform(s): activate to sort column ascending"
                                                    style="width: 160.484px;">Price</th>
                                                  <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0"
                                                    rowspan="1" colspan="1"
                                                    aria-label="Platform(s): activate to sort column ascending"
                                                    style="width: 100.484px;">Tax</th>
                                                     <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0"
                                                    rowspan="1" colspan="1"
                                                    aria-label="Platform(s): activate to sort column ascending"
                                                    style="width: 100.484px;">Total</th>
                                             
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php                   
                                                $account =App\Models\restaurant\OrderItem::where('invoice_id', $key->id)->get();
                                                ?>  
                                         @foreach($account  as $a)
                                                         <tr>
                                              <td >{{$loop->iteration }}</td>
                                              <td >{{$a->type }}</td>
                                             <?php
                                             if($a->type == 'Bar'){
                                           $item_name=App\Models\Bar\POS\Items::find($a->item_name);
                                                }

                                           else if($a->type == 'Kitchen'){
                                             $item_name=App\Models\restaurant\Menu::find($a->item_name);
                                                                                }

                                        ?>
                                            <td>{{$item_name->name}}</td>
                                           <td>{{ $a->due_quantity }} </td>
                                        <td >{{number_format($a->price ,2)}}  </td>                                         
                                         <td>{{number_format($a->total_tax ,2)}} </td>
                                         <td >{{number_format($a->total_cost ,2)}} </td>
                                            </tr> 
                        
                          @endforeach
                            </tbody>
                         
                         <?php
                                           
                                                $sub_total = App\Models\restaurant\OrderItem::where('invoice_id', $key->id)->sum('total_cost');
                                                $tax = App\Models\restaurant\OrderItem::where('invoice_id', $key->id)->sum('total_tax');
                                            
                                                ?>  
                        <tfoot>
<tr>
<td colspan="5"></td>
<td></td>
<td>  </td>
</tr>

<tr>
<td colspan="5"></td>
<td><strong>Sub Total</td>
<td><strong>{{number_format($sub_total,2)}}  </strong></td>
</tr>

<tr>
<td colspan="5"></td>
<td><strong>Total Tax</strong> </td>
<td><strong>{{number_format($tax,2)}}  </strong></td>
</tr>

<tr>
<td colspan="5"></td>
<td><strong>Total Amount</strong></td>
<td><strong>{{number_format($sub_total + $tax,2)}}</strong> </td>
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