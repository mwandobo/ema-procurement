@extends('layout.master')

@section('content')

<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.css">

    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/buttons/1.7.1/js/dataTables.buttons.min.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/buttons/1.7.1/js/buttons.html5.min.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/buttons/1.7.1/js/buttons.print.min.js"></script>
  <script>
    jQuery(document).ready(function($) {
      $('#example').DataTable(
        {
        dom: 'Bfrtip',
        buttons: [
                   { extend: 'copy', footer: true, messageTop: '    Member Card List.' },
                    
                    { extend: 'excel', footer: true, messageTop: '   Member Card List.' },
                    
                    { extend: 'csv', footer: true, messageTop: '     Member Card List.' },

                    { extend: 'pdf', footer: true, messageTop: '     Member Card List.' },
                                       
                    { extend: 'print', footer: true, messageTop: '<center><b>Member Card List.</b></center>' }
                ],
        }
      );
     
    } );
    </script>
<section class="section">
    <div class="section-body">
        <div class="row">
            <div class="col-12 col-sm-6 col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Cards List</h4>
                    </div>
                    <div class="card-body">
                      
                        <div class="tab-content tab-bordered" id="myTab3Content">


                            <div class="tab-pane active show " id="home2" role="tabpanel"
                                aria-labelledby="home-tab2">
                                <div class="table-responsive">
                                  <table class="table table-striped table-condensed table-hover"  style="width:100%;" id="example">
                                        <thead>
                                            <tr role="row">

                                                <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0"
                                                    rowspan="1" colspan="1"
                                                    aria-label="Browser: activate to sort column ascending"
                                                    style="width: 30.531px;">#</th>
                                                <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0"
                                                    rowspan="1" colspan="1"
                                                    aria-label="Platform(s): activate to sort column ascending"
                                                    style="width: 100.484px;">Card  ID </th>
                                               <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0"
                                                    rowspan="1" colspan="1"
                                                    aria-label="Platform(s): activate to sort column ascending"
                                                    style="width: 100.484px;">Card Reference No</th>
                                                <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0"
                                                    rowspan="1" colspan="1"
                                                    aria-label="Platform(s): activate to sort column ascending"
                                                    style="width: 180.484px;">Member</th>
                                                <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0"
                                                    rowspan="1" colspan="1"
                                                    aria-label="Platform(s): activate to sort column ascending"
                                                    style="width: 120.484px;">Member Due Date</th>
                                                    
                                                      <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0"
                                                    rowspan="1" colspan="1"
                                                    aria-label="Platform(s): activate to sort column ascending"
                                                    style="width: 110.484px;">Status</th>
                                                    
                                                    
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @if(!@empty($member))
                                            @foreach ($member as $row)
                                            <tr class="gradeA even" role="row">
                                                <th>{{ $loop->iteration }}</th> 
                                                     <td>{{$row->card_no}} </td>                                             
                                                <td>{{$row->card->reference_no}} </td>   
                                                                                                  
                                                 <td>{{$row->full_name}} - {{$row->member_id}}</td>
                                                <td>{{Carbon\Carbon::parse($row->due_date)->format('d/m/Y')}}</td>                                                
                                                
                                            
                                                 @if($row->issued_status == 0)
                                                                <td>Not Issued</td>
                                                                @else
                                                                <td>Issued {{$row->issued_status}} Times</td>
                                                                @endif

                                </tr>
                                @endforeach

                                @endif

                                </tbody>
                                </table>
                            </div>
                        </div>


                    </div>
                </div>
            </div>
        </div>
    </div>

    </div>
</section>

<!-- discount Modal -->
<div class="modal fade" id="appFormModal" data-backdrop="false" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog ">
    </div>
</div>


@endsection



@section('scripts')

<script>
$('.datatable-basic').DataTable({
    autoWidth: false,
    "columnDefs": [{
        "orderable": false,
        "targets": [3]
    }],
    dom: '<"datatable-header"fl><"datatable-scroll"t><"datatable-footer"ip>',
    "language": {
        search: '<span>Filter:</span> _INPUT_',
        searchPlaceholder: 'Type to filter...',
        lengthMenu: '<span>Show:</span> _MENU_',
        paginate: {
            'first': 'First',
            'last': 'Last',
            'next': $('html').attr('dir') == 'rtl' ? '&larr;' : '&rarr;',
            'previous': $('html').attr('dir') == 'rtl' ? '&rarr;' : '&larr;'
        }
    },

});
</script>

<script type="text/javascript">
function model(id, type) {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $.ajax({
        type: 'GET',
      url: '{{url("findCard")}}',
        data: {
            'id': id,
            'type': type,
        },
        cache: false,
        async: true,
        success: function(data) {
            //alert(data);
            $('.modal-dialog').html(data);
        },
        error: function(error) {
            $('#appFormModal').modal('toggle');

        }
    });

}


</script>


@endsection