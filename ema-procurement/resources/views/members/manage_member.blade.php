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
                                            <tr>
                                                <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0"
                                                    rowspan="1" colspan="1"
                                                    aria-label="Browser: activate to sort column ascending"
                                                    style="width: 28.531px;">#</th>
                                                <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0"
                                                    rowspan="1" colspan="1"
                                                    aria-label="Platform(s): activate to sort column ascending"
                                                    style="width: 200.484px;">Full Name</th>
                                                <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0"
                                                    rowspan="1" colspan="1"
                                                    aria-label="Platform(s): activate to sort column ascending"
                                                    style="width: 150.484px;">Membership Class</th>
                                                <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0"
                                                    rowspan="1" colspan="1"
                                                    aria-label="Platform(s): activate to sort column ascending"
                                                    style="width: 150.484px;">Email</th>



                                                <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0"
                                                    rowspan="1" colspan="1"
                                                    aria-label="CSS grade: activate to sort column ascending"
                                                    style="width: 98.1094px;">Actions</th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                                            @if(!@empty($members))
                                                            @foreach ($members as $row)
                                                            <tr class="gradeA even" role="row">
                                                                <th>{{ $loop->iteration }}</th>
                                                                <td>{{$row->full_name}} </td>


                                                                <?php $result =  App\Models\Visitors\Visitor::find($row->owner_id); ?>

                                                                <?php $balance =  App\Models\Cards\TemporaryDeposit::where('visitor_id',$row->owner_id)->where('card_id',$row->id)->get()->sum('debit'); ?>


                                                                <td>{{!empty($row->membership_types)? $row->membership_types->name : '' }}
                                                                </td>



                                                                <td>{{$row->email}}</td>






                                                                <td>
                                                                  <div class="form-inline">
                                                         <div class="dropdown">
							                		<a href="#" class="list-icons-item dropdown-toggle text-teal" data-toggle="dropdown"><i class="icon-cog6"></i></a>

													<div class="dropdown-menu">
                                                                    <a class="nav-link" title="Convert to Invoice"
                                                                        href="{{ route('manage_member.show', $row->id)}}">View
                                                                        More
                                                                    </a>
                                                                    <a class="nav-link" title="View More"
                                                                        href="{{ route('manage_member.edit', $row->id)}}">Approve
                                                                    </a>

                                                                 </div></div></div>
                                                                </td>
                                                            </tr>
                                                            @endforeach

                                                            @endif

                                                        </tbody>                                </table>
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