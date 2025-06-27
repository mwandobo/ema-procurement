    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="formModal">Disapprove Payment @if(!empty($data->name)) - {{$data->name}} @endif </h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>

 {!! Form::open(array('route' => 'multiple_expenses.disapproval','method'=>'POST', 'id' => 'frm-example' , 'name' => 'frm-example')) !!}
 <div class="modal-body">


            <div class="table-responsive">
                                                            <table class="table datatable-modal table-striped"  id="table-list">
                                       <thead>
                                            <tr>
                                                <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0"
                                                    rowspan="1" colspan="1"
                                                    aria-label="Browser: activate to sort column ascending"
                                                    style="width: 98.531px;">#</th>

                                               
                                               
                                                <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0"
                                                    rowspan="1" colspan="1"
                                                    aria-label="Platform(s): activate to sort column ascending"
                                                    style="width: 106.484px;">Expense Account</th>
                                                <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0"
                                                    rowspan="1" colspan="1"
                                                    aria-label="Engine version: activate to sort column ascending"
                                                    style="width: 141.219px;">Payment Account</th>
                                                    <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0"
                                                    rowspan="1" colspan="1"
                                                    aria-label="Engine version: activate to sort column ascending"
                                                    style="width: 141.219px;">Amount</th>
                                                      <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0"
                                                    rowspan="1" colspan="1"
                                                    aria-label="Platform(s): activate to sort column ascending"
                                                    style="width: 106.484px;">Status</th>

 
                                     <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0"
                                                    rowspan="1" colspan="1"
                                                    aria-label="CSS grade: activate to sort column ascending"
                                                    style="width: 58.1094px;">Disapprove</th>
                                            </tr>
                                        </thead>
                                         <tbody>
                                            @if(!@empty($expense))
                                            @foreach ($expense as $row)
                                            <tr class="gradeA even" role="row">
                                                <th>{{ $loop->iteration }}</th>
                                                  
                                              <td>@if(!empty($row->account)){{$row->account->account_name}} @endif</td>                                                         
                                                <td>{{$row->bank->account_name}}</td>                                  
                                                  <td>{{number_format($row->amount,2)}} {{$row->exchange_code}}</td>
                                                   <td>
                                                    @if($row->approval_1 == '' && $row->status == 0)
                                                    <div class="badge badge-danger badge-shadow">Waiting For First Approval</div>
                                                         @elseif($row->approval_1 != '' && $row->approval_2 == '' && $row->status == 0)
                                                    <div class="badge badge-danger badge-shadow">Waiting For Second Approval</div>
                                                   @elseif($row->approval_1 != '' && $row->approval_2 != '' && $row->status == 0)
                                                    <div class="badge badge-danger badge-shadow">Waiting For Final Approval</div>
                                                    @elseif($row->status == 1)
                                                    <div class="badge badge-success badge-shadow">Approved</div>                                                   
                                                    @endif
                                                   </td>
                               
                                               

                                                       <td>                                
                                                      @canany(['manage-first-approval', 'manage-second-approval','manage-third-approval'])
                                                    @if($row->status == 0)
                                                    <input name="trans_id[]" type="checkbox"  class="checks" value="{{$row->id}}">  

                                                          @endif 
                                                     @endcanany
                                                              </td>

                              
                                            </tr>

                                            @endforeach

                                            @endif

                                        </tbody>

                                    </table>
                                </div>
                                                    </div>


        
        <div class="modal-footer">
           <button class="btn btn-primary"  type="submit" id="save"><i class="icon-checkmark3 font-size-base mr-1"></i>Save</button>
            <button class="btn btn-link" data-dismiss="modal"><i class="icon-cross2 font-size-base mr-1"></i> Close</button>
        </div>
  {!! Form::close() !!}
    </div>

@yield('scripts')
<script>
       $('.datatable-modal').DataTable({
            autoWidth: false,
            "columnDefs": [
                {"targets": [3]}
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
$(document).ready(function (){
   var table = $('.datatable-modal').DataTable();
   
   // Handle form submission event 
   $('#frm-example').on('submit', function(e){
      var form = this;

      var rowCount = $('#table-list >tbody >tr').length;
console.log(rowCount);


if(rowCount == '1'){
var c= $('#table-list >tbody >tr').find('input[type=checkbox]');

  if(c.is(':checked')){ 
var tick=c.val();
console.log(tick);

$(form).append(
               $('<input>')
                  .attr('type', 'hidden')
                  .attr('name', 'checked_trans_id[]')
                  .val(tick)  );

}

}


else if(rowCount > '1'){
      // Encode a set of form elements from all pages as an array of names and values
      var params = table.$('input').serializeArray();

      // Iterate over all form elements
      $.each(params, function(){     
         // If element doesn't exist in DOM
         if(!$.contains(document, form[this.name])){
            // Create a hidden element 
            $(form).append(
               $('<input>')
                  .attr('type', 'hidden')
                  .attr('name', 'checked_trans_id[]')
                  .val(this.value)
            );
         } 
      });      

}
   
   });  
    
});


</script>


