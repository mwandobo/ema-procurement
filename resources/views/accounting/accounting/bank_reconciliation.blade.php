@extends('layout.master')


@section('content')
<section class="section">
    <div class="section-body">
        <div class="row">
            <div class="col-12 col-sm-6 col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Bank Reconciliation</h4>
                    </div>
                    <div class="card-body">
                        <ul class="nav nav-tabs" id="myTab2" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link @if(empty($id)) active show @endif" id="home-tab2" data-toggle="tab"
                                    href="#home2" role="tab" aria-controls="home" aria-selected="true">Bank Reconciliation
                                    List</a>
                            </li>
                       

                        </ul>
                        <div class="tab-content tab-bordered" id="myTab3Content">
                            <div class="tab-pane fade @if(empty($id)) active show @endif" id="home2" role="tabpanel"
                                aria-labelledby="home-tab2">

<br>
@php
$bank=App\Models\Accounting\AccountCodes::where('id',$account_id)->first();
@endphp

        <div class="panel-heading">
            <h6 class="panel-title">
                Unreconciled Entries
                @if(!empty($start_date))
                    for the period: <b>{{$start_date}} to {{$end_date}} for {{$bank->account_name}}</b>
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
                    <label class="">Bank</label>
                    {!! Form::select('account_id',$chart_of_accounts,$account_id, array('class' => 'form-control m-b','id'=>'account_id', 'placeholder'=>'Select','required'=>'required')) !!}
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

                    
                    {!! Form::open(array('route' => 'reconcile.save','method'=>'POST', 'id' => 'frm-example' , 'name' => 'frm-example')) !!}
                    <table  class="table datatable-basic table-striped" id="table-1">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th> Type</th>
                            <th>Date</th>
                            <th>Balance</th>
                            <th>Notes</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>

                          

                        @foreach($data as $key)
                        @php
                        
                        $balance=$key->debit -$key->credit;
                         
                   @endphp
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                @if ($balance < 0)
                                <td>Withdraw</td>
                                @else
                                <td>Deposit</td>
                                @endif
                                <td>{{ $key->date }}</td>
                                <td>{{ number_format(abs($key->debit -$key->credit),2) }}</td>
                                <td>{{$key->notes }}</td>
                                <td><input name="trans_id[]" type="checkbox"  class="checks" value="{{$key->id}}"></td>
                                
                            </tr>
                        @endforeach
                        </tbody>
                       
                    </table>
 <div class="form-group row">
                                                    <div class="col-lg-offset-2 col-lg-12">
                                                                                                                <input type="submit" value="Save" name="update" class="btn btn-success pull-right">
                                                                                                            </div>
                                                </div>
                 
                    {!! Form::close() !!}
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



@endsection

@section('scripts')

<script>
 $('.datatable-basic').DataTable({
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
   var table = $('.datatable-basic').DataTable();
   
   // Handle form submission event 
   $('#frm-example').on('submit', function(e){
      var form = this;

      var rowCount = $('#table-1 >tbody >tr').length;
console.log(rowCount);


if(rowCount == '1'){
var c= $('#table-1 >tbody >tr').find('input[type=checkbox]');

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
@endsection