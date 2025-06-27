    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title"  style="text-align:center;"> {{$key->name}}  Moved Quantity<h5>
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
                                                    aria-label="Engine version: activate to sort column ascending"
                                                    style="width: 121.219px;">Source Location</th>
                                                <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0"
                                                    rowspan="1" colspan="1"
                                                    aria-label="Engine version: activate to sort column ascending"
                                                    style="width: 121.219px;">Destination Location</th>    
                                            <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0"
                                                    rowspan="1" colspan="1"
                                                    aria-label="Platform(s): activate to sort column ascending"
                                                    style="width: 100.484px;">Date</th>
                                                     <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0"
                                                    rowspan="1" colspan="1"
                                                    aria-label="Platform(s): activate to sort column ascending"
                                                    style="width: 100.484px;">Quantity</th>
                                             
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php                   
                                                $account =App\Models\Bar\POS\GoodIssueItem::where('item_id', $key->id)->where('status',1)->whereIn('location',$loc_id)->whereBetween('date',[$start_date,$end_date])->orderBy('date','desc')->get();
                                                ?>  
                                         @foreach($account  as $a)
                                         <?php                   
                                         $date=App\Models\Bar\POS\GoodIssue::find($a->issue_id);
                                         ?> 

                                                         <tr>
                                              <td >{{$loop->iteration }}</td>
                                                <td> {{$a->main->name}}</td>
                                                <td> {{$a->store->name}}</td>
                                                  <td >{{$date->date }}</td>
                                                   
                                                 <td >{{ number_format($a->quantity ,2) }}</td>
                                               
                                           
                                            </tr> 
                        
                          @endforeach
                            </tbody>
                         
                         <?php
                                           
                                                $q = App\Models\Bar\POS\GoodIssueItem::where('item_id', $key->id)->whereIn('location',$loc_id)->where('status',1)->whereBetween('date',[$start_date,$end_date])->sum('quantity');
                                                
                                                ?>  
                        <tfoot>
                                            <tr>     
                                                <td ></td> <td ></td><td ></td>
                                                  
                                                 <td><b> Total Balance</b></td>
                                                    <td><b>{{ number_format($q,2) }}</b></td>
                                                
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
             order: [[1, 'desc']],
             
             columnDefs: [
        { orderable: true, className: 'reorder', targets: 0 },
        { orderable: false, targets: '_all' }
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

