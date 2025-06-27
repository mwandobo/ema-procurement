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
    
@yield('scripts') 
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

