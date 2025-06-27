    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title"  style="text-align:center;"> {{$key->name}}  In Quantity<h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
        </div>


        <div class="modal-body">
  <div class="table-responsive">
  <?php $in=0; ?>
                           <table class="table datatable-basic table-striped">
                                       <thead>
                                            <tr>
                                                
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
                                                    style="width: 160.484px;">Supplier</th>
                                                  <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0"
                                                    rowspan="1" colspan="1"
                                                    aria-label="Platform(s): activate to sort column ascending"
                                                    style="width: 100.484px;">Location</th>
                                                     <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0"
                                                    rowspan="1" colspan="1"
                                                    aria-label="Platform(s): activate to sort column ascending"
                                                    style="width: 100.484px;">Balance</th>
                                             
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php                   
                                               $account =App\Models\Bar\POS\PurchaseHistory::where('item_id', $key->id)->where('type', 'Purchases')->whereIn('location',$loc_id)->whereBetween('purchase_date',[$start_date,$end_date])->orderBy('purchase_date','desc')->get();
                                                $iaccount =App\Models\Bar\POS\GoodIssueItem::where('item_id', $key->id)->where('status',1)->whereIn('location',$loc_id)->whereBetween('date',[$start_date,$end_date])->orderBy('date','desc')->get();
                                                
                                                ?>  
                                                
                                               
                                         @foreach($account  as $a)
                                                         <tr>
                                             
                                              <td >{{$a->type }}</td>
                                              @if($a->type == 'Purchases')
                                              <td >{{Carbon\Carbon::parse($a->purchase_date)->format('d/m/Y') }}</td>
                                               @else
                                                    <td >{{Carbon\Carbon::parse($a->return_date)->format('d/m/Y') }}</td>
                                                   @endif
                                                  <td >@if(!empty($a->purchase_id)) {{$a->purchase->reference_no }} @endif</td>
                                                    <td >@if(!empty($a->supplier_id)){{$a->supplier->name }}@endif</td>
                                                    <td >@if(!empty($a->location)){{$a->store->name }}@endif</td>
                   
                                          @if($a->type == 'Purchases')
                                           <td >{{ number_format ($a->quantity ,2) }}</td>
                                           @else
                                                  <td >{{ number_format(0-$a->quantity ,2) }}</td>
                                               @endif
                                            </tr> 
                        
                          @endforeach
                          
                          
                          @foreach($iaccount  as $i)
                                         <?php                   
                                         $date=App\Models\Bar\POS\GoodIssue::find($i->issue_id);
                                         ?> 

                                                         <tr>
                                              <td >Stock Movement</td>
                                              <td >{{$date->date }}</td>
                                              <td ></td>
                                              <td ></td>
                                               <td >{{$i->main->name}} - {{$i->store->name }}</td>
                                            <td >{{ number_format($i->quantity ,2) }}</td>
                                               
                                           
                                            </tr> 
                        <?php $in+=$i->quantity; ?>
                          @endforeach
                          
                          
                            </tbody>
                         
                         <?php
                                           
                              $q = App\Models\Bar\POS\PurchaseHistory::where('item_id', $key->id)->where('type', 'Purchases')->whereIn('location',$loc_id)->whereBetween('purchase_date',[$start_date,$end_date])->sum(\DB::raw('quantity'));
                         
                                            
                                                ?>  
                        <tfoot>
                                            <tr>     
                                                 <td ></td>
                                                     <td></td> <td></td>
                                                   <td></td>  <td><b> Total Balance</b></td>
                                                    <td><b>{{ number_format($q + $in  ,2) }}</b></td>
                                                
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

