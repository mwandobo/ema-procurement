@extends('layout.master')



@section('content')
<section class="section">
    <div class="section-body">
        <div class="row">
            <div class="col-12 col-sm-12 col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Payments </h4>
                    </div>
                    <div class="card-body">
                        <ul class="nav nav-tabs" id="myTab2" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link @if(empty($id)) active show @endif" id="home-tab2" data-toggle="tab"
                                    href="#home2" role="tab" aria-controls="home" aria-selected="true">Payments
                                    List</a>
                            </li>


                        </ul>
                        <div class="tab-content tab-bordered" id="myTab3Content">
                            <div class="tab-pane fade @if(empty($id)) active show @endif" id="home2" role="tabpanel"
                                aria-labelledby="home-tab2">
                                <div class="table-responsive">
                                    <table class="table datatable-basic table-striped">
                                        <thead>
                                            <tr role="row">

                                                <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0"
                                                    rowspan="1" colspan="1"
                                                    aria-label="Browser: activate to sort column ascending"
                                                    style="width: 30.531px;">#</th>
                                                <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0"
                                                    rowspan="1" colspan="1"
                                                    aria-label="Platform(s): activate to sort column ascending"
                                                    style="width: 100.484px;">Reference</th>
                                                <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0"
                                                    rowspan="1" colspan="1"
                                                    aria-label="Platform(s): activate to sort column ascending"
                                                    style="width: 100.484px;">Fee Type</th>
                                                <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0"
                                                    rowspan="1" colspan="1"
                                                    aria-label="Platform(s): activate to sort column ascending"
                                                    style="width: 180.484px;">Depositor Name</th>
                                                <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0"
                                                    rowspan="1" colspan="1"
                                                    aria-label="Engine version: activate to sort column ascending"
                                                    style="width: 180.484px;">Amount</th>
                                                <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0"
                                                    rowspan="1" colspan="1"
                                                    aria-label="Engine version: activate to sort column ascending"
                                                    style="width: 120.219px;">Due Amount</th>
                                                <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0"
                                                    rowspan="1" colspan="1"
                                                    aria-label="CSS grade: activate to sort column ascending"
                                                    style="width: 120.1094px;">Date</th>
                                                <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0"
                                                    rowspan="1" colspan="1"
                                                    aria-label="Engine version: activate to sort column ascending"
                                                    style="width: 120.219px;">Attachment</th>
                                                <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0"
                                                    rowspan="1" colspan="1"
                                                    aria-label="CSS grade: activate to sort column ascending"
                                                    style="width: 185.1094px;">Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @if(!@empty($payment))
                                            @foreach ($payment as $row)
                                            <tr class="gradeA even" role="row">
                                                <th>{{ $loop->iteration }}</th>
                                                <td>{{$row->reference_no}}</td>
                                                <td>
                                                    @if($row->fee_type == 1)
                                                    <span>SUPSCRIPTION FEE</span>
                                                    @else
                                                    <span>DEVELOPMENT FEE</span>
                                                    @endif
                                                </td>
                                                <td>{{$row->member->fname}} {{$row->member->lname}}</td>
                                                <td>{{number_format($row->amount,2)}} </td>
                                                <td>{{number_format($row->due_amount,2)}} </td>
                                                <td>{{$row->date}}</td>
                                                <td> @if($row->attachment != "null")
                                                    <button type="button" class="btn btn-small btn-primary"
                                                        data-toggle="modal" data-target="#appFormModal"
                                                        data-id="{{ $row->id }}" data-type="edit"
                                                        onclick="model({{ $row->id }},'show')">
                                                        <i class="icon-eye"> </i>

                                                    </button>
                                                    @endif

                                                </td>

                                                <td>

                                                    <div class="form-inline">

                                                        <a class="list-icons-item text-primary" title="Edit"
                                                            onclick="return confirm('Are you sure you want to approve Payments?')"
                                                            href="{{ route('member_payments.edit', $row->id)}}"> <i
                                                                class="icon-pencil7"></i></a>
                                                        &nbsp;


                                                        {!! Form::open(['route' => ['deposit.destroy',$row->id],
                                                        'method' => 'delete']) !!}
                                                        {{ Form::button('<i class="icon-trash"></i>', ['type' => 'submit', 'style' => 'border:none;background: none;', 'class' => 'list-icons-item text-danger',  'onclick' => "return confirm('Are you sure?')"]) }}
                                                        {{ Form::close() }}
                                                        &nbsp;


                                                    </div>
                                </div>

                                </td>
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
<div id="appFormModal" class="modal fade" tabindex="-1">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">File Preview</h5>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <div class="modal-body">

                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-link" data-dismiss="modal">Close</button>
                   
                </div>
            </div>
        </div>
    </div>
<script>


</script>

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


function model(id, type) {

    let url = '{{ route("file.preview") }}';


    $.ajax({
        type: 'GET',
        url: url,
        data: {
            'type': type,
            'id': id,
        },
        cache: false,
        async: true,
        success: function(data) {
            //alert(data);
            $('.modal-body').html(data);
        },
        error: function(error) {
            $('#appFormModal').modal('toggle');

        }
    });

}
</script>




@endsection