@extends('layout.master')



@section('content')
<section class="section">
    <div class="section-body">
        <div class="row">
            <div class="col-12 col-sm-6 col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Cards </h4>
                    </div>
                    <div class="card-body">
                        <ul class="nav nav-tabs" id="myTab2" role="tablist">
                       <li class="nav-item">
                                <a class="nav-link active" id="home-tab2" data-toggle="tab"
                                    href="#home" role="tab" aria-controls="home" aria-selected="true">Non Approved Member List
                                    </a>
                            </li>
                          
                          <li class="nav-item">
                            <a class="nav-link" id="home-tab2" data-toggle="tab"
                                    href="#home3" role="tab" aria-controls="home" aria-selected="true">Non Issued Card List
                                   </a>
                            </li>
                            
                            
                            
                            <li class="nav-item">
                                <a class="nav-link" id="home-tab2" data-toggle="tab"
                                    href="#home2" role="tab" aria-controls="home" aria-selected="true">Cards
                                    List</a>
                            </li>


                        </ul>
                        <div class="tab-content tab-bordered" id="myTab3Content">


                   <div class="tab-pane active" id="home" role="tabpanel"
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
                                                    style="width: 160.484px;">Full Name</th>
                                                <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0"
                                                    rowspan="1" colspan="1"
                                                    aria-label="Platform(s): activate to sort column ascending"
                                                    style="width: 100.484px;">Membership Type</th>
                                                <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0"
                                                    rowspan="1" colspan="1"
                                                    aria-label="Platform(s): activate to sort column ascending"
                                                    style="width: 120.484px;">Membership Id</th>
                                                <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0"
                                                    rowspan="1" colspan="1"
                                                    aria-label="CSS grade: activate to sort column ascending"
                                                    style="width: 105.1094px;">Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @if(!@empty($list))
                                            @foreach ($list as $row)
                                            <tr class="gradeA even" role="row">
                                                <th>{{ $loop->iteration }}</th>
                                                <td>{{$row->full_name}} </td>
                                                <td>
                                                {{$row->membership_types->name}} {{ isset($row->membership_types->class) ?  '- '. $row->membership_types->class : ''}}
                                                </td>
                                                <td>{{$row->member_id}}</td>
                                                          <td>
                                                    <div class="form-inline">

                                                        @can('approve-member')
                                                        <a class="nav-link" title="Approve"  onclick="return confirm('Are you sure?')"   href="{{ route('manage_member.edit', $row->id)}}"> Approve</a>
                                                     @endcan
                                                    </div>

                                </td>
                                </tr>
                                @endforeach

                                @endif

                                </tbody>
                                </table>
                            </div>
                        </div>
                        


<div class="tab-pane" id="home3" role="tabpanel"
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
                                                    style="width: 160.484px;">Full Name</th>
                                                <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0"
                                                    rowspan="1" colspan="1"
                                                    aria-label="Platform(s): activate to sort column ascending"
                                                    style="width: 100.484px;">Membership Type</th>
                                                <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0"
                                                    rowspan="1" colspan="1"
                                                    aria-label="Platform(s): activate to sort column ascending"
                                                    style="width: 120.484px;">Membership Id</th>
                                                <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0"
                                                    rowspan="1" colspan="1"
                                                    aria-label="CSS grade: activate to sort column ascending"
                                                    style="width: 185.1094px;">Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @if(!@empty($cards))
                                            @foreach ($cards as $row)
                                            <tr class="gradeA even" role="row">
                                                <th>{{ $loop->iteration }}</th>
                                                <td>{{$row->full_name}} </td>
                                                <td>
                                                {{$row->membership_types->name}} {{ isset($row->membership_types->class) ?  '- '. $row->membership_types->class : ''}}
                                                </td>
                                                <td>{{$row->member_id}}</td>
                                                 <td>
                                                    <div class="form-inline">

                                                        <a class="list-icons-item text-primary" title="Edit"
                                                            onclick="return confirm('Are you sure?')"
                                                            href="{{ route("card_printing.show", $row->id)}}"> Preview</a>
                                                        &nbsp;
                                                         &nbsp;
                                                      &nbsp;
           <a  class="list-icons-item text-success" title="issue" data-toggle="modal" class="issue"  href="" onclick="model({{ $row->id }},'issue')" value="{{ $row->id}}" data-target="#appFormModal" >Card Issuing</a>
                                                        &nbsp;


                                                    </div>
                              

                                </td>
                                </tr>
                                @endforeach

                                @endif

                                </tbody>
                                </table>
</div>
</div>


                            <div class="tab-pane" id="home2" role="tabpanel"
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
                                                    style="width: 160.484px;">Full Name</th>
                                                <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0"
                                                    rowspan="1" colspan="1"
                                                    aria-label="Platform(s): activate to sort column ascending"
                                                    style="width: 100.484px;">Membership Type</th>
                                                <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0"
                                                    rowspan="1" colspan="1"
                                                    aria-label="Platform(s): activate to sort column ascending"
                                                    style="width: 120.484px;">Membership Id</th>
                                                    
                                                      <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0"
                                                    rowspan="1" colspan="1"
                                                    aria-label="Platform(s): activate to sort column ascending"
                                                    style="width: 110.484px;">Status</th>
                                                    
                                                    
                                        
                                           
                                                <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0"
                                                    rowspan="1" colspan="1"
                                                    aria-label="CSS grade: activate to sort column ascending"
                                                    style="width: 185.1094px;">Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @if(!@empty($member))
                                            @foreach ($member as $row)
                                            <tr class="gradeA even" role="row">
                                                <th>{{ $loop->iteration }}</th>
                                                <td>{{$row->full_name}} </td>
                                                <td>
                                                {{$row->membership_types->name}} {{ isset($row->membership_types->class) ?  '- '. $row->membership_types->class : ''}}
                                                </td>
                                                <td>{{$row->member_id}}</td>
                                            

                                                
                                                 @if($row->issued_status == 0)
                                                                <td>Not Issued</td>
                                                                @else
                                                                <td>Issued {{$row->issued_status}} Times</td>
                                                                @endif
<td>
                                                    <div class="form-inline">

                                                        <a class="list-icons-item text-primary" title="Edit"
                                                            onclick="return confirm('Are you sure?')"
                                                            href="{{ route("card_printing.show", $row->id)}}"> Preview</a>
                                                        &nbsp;
                                                         &nbsp;
                                                           &nbsp;

                                                       <!--
                                                        <a class="list-icons-item text-success" title="Edit"
                                                            onclick="return confirm('Are you sure?')"
                                                            href="{{ route("card_printing.edit", $row->id)}}"> </a>
                                                        -->

           <a  class="list-icons-item text-success" title="issue" data-toggle="modal" class="issue"  href="" onclick="model({{ $row->id }},'issue')" value="{{ $row->id}}" data-target="#appFormModal" >Card Issuing</a>
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