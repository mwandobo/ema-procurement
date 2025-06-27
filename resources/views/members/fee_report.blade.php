@extends('layout.master')
 

@section('content')
<section class="section">
    <div class="section-body">
        <div class="row">
            <div class="col-12 col-sm-12 col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Member Fee Report</h4>
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
            {!! Form::open(array('url' => '#', 'method' => 'post','class'=>'form-horizontal', 'name' => 'form')) !!}
            <div class="row">

               <div class="col-md-4">
                    <label class="">Start Date</label>
                   <input name="start_date" id="start_date" type="date" class="form-control date-picker" required value="<?php
                if (!empty($start_date)) {
                    echo $start_date;
                } else {
                    echo date('Y-m-d', strtotime('first day of january this year'));
                }
                ?>">

                </div>
                <div class="col-md-4">
                    <label class="">End Date</label>
                     <input name="end_date" id="end_date" type="date" class="form-control date-picker" required value="<?php
                if (!empty($end_date)) {
                    echo $end_date;
                } else {
                    echo date('Y-m-d');
                }
                ?>">
                </div>
                
              


   <div class="col-md-4">
                      <br><button type="submit" class="btn btn-success"  id="btnFiterSubmitSearch">Search</button>
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
                           <th>Member</th>
                            <th>Member Class</th>
                             <th>Date</th>
                              <th>Fee Type</th>
                               <th>Amount</th>
                                
                        </tr>
                        </thead>
                        <tbody>

                         
                        </tbody>
                         <tfoot>
                           <tr>
                            <td>Total</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                             
                                                            
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
 @if(!empty($start_date))
  <div class="modal fade" data-backdrop="" id="viewModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg">

        </div>
    </div>
 
 
@endif

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

 $(function() {
    let urlcontract = "{{ route('fee_report') }}";

      $('.datatable-button-html5-basic').DataTable({
                    
        "footerCallback": function ( tfoot, data, start, end, display ) {
            var api = this.api(), data;
 
            // converting to interger to find total
            
            var intVal = function ( i ) {
                return typeof i === 'string' ?
                   i.replace(/<\/?a[^>\,]*>/g, '').replace(/[\$,]/g, '') *1 :
                    typeof i === 'number' ?
                        i : 0;
            };
 
            // computing column Total of the complete result 
             var openTotal = api
                .column(5)
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );
           
				
	    
	    
	    
				
            // Update footer by showing the total with the reference of the column index 
             $( api.column( 5 ).footer() ).html(numberWithCommas(openTotal.toFixed(2)));
             
        }, 
          processing: true,
          serverSide: false,
          searching: true,
          ordering:false,
          
        dom: 'lBfrtip',
          "columnDefs": [{
                "ordering": false,
                "targets": [0]
            }],

        buttons: [
          {extend: 'copyHtml5',title: 'MEMBER FEE REPORT  FOR THE PERIOD {{Carbon\Carbon::parse($start_date)->format('d-m-Y')}} TO {{Carbon\Carbon::parse($end_date)->format('d-m-Y')}} ', footer: true},
           {extend: 'excelHtml5',title: 'MEMBER FEE REPORT  FOR THE PERIOD {{Carbon\Carbon::parse($start_date)->format('d-m-Y')}} TO {{Carbon\Carbon::parse($end_date)->format('d-m-Y')}}' , footer: true},
           {extend: 'csvHtml5',title: 'MEMBER FEE REPORT  FOR THE PERIOD {{Carbon\Carbon::parse($start_date)->format('d-m-Y')}} TO {{Carbon\Carbon::parse($end_date)->format('d-m-Y')}}' , footer: true},
            {extend: 'pdfHtml5',title: 'MEMBER FEE REPORT  FOR THE PERIOD {{Carbon\Carbon::parse($start_date)->format('d-m-Y')}} TO {{Carbon\Carbon::parse($end_date)->format('d-m-Y')}}', footer: true},
            {extend: 'print',title: 'MEMBER FEE REPORT  FOR THE PERIOD {{Carbon\Carbon::parse($start_date)->format('d-m-Y')}} TO {{Carbon\Carbon::parse($end_date)->format('d-m-Y')}}' , footer: true}

                ],
       type: 'GET',
                ajax: {
                    url: urlcontract,
                    data: function(d) {
                        d.start_date = $('#start_date').val();
                        d.end_date = $('#end_date').val();
                        d.location_id = $('.location').val();

                    }
                },
                columns: [
                     {
                data: 'DT_RowIndex',
                name: 'DT_RowIndex',
                orderable: false,
                searchable: false
            },
                    
               
                   
                    {
                        data: 'name',
                        name: 'name'
                    },
                    {
                        data: 'class',
                        name: 'class'
                    },
                    
                    {
                        data: 'date',
                        name: 'date'
                    },
                   
                   {
                        data: 'type',
                        name: 'type'
                    },
                     {
                        data: 'amount',
                        name: 'amount'
                    },
              

                ],
            })
        });


      
     
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
    
     <script type="text/javascript">


function numberWithCommas(x) {
    var parts = x.toString().split(".");
    parts[0] = parts[0].replace(/\B(?=(\d{3})+(?!\d))/g, ",");
    return parts.join(".");
}

</script>
    
   
@endsection