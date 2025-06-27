@extends('layout.master')
@section('title')Member Deposit @endsection

@section('content')


            <section class="section">
    <div class="section-body">
        <div class="row">
            <div class="col-12 col-sm-6 col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Deposits</h4>
                    </div>
                    <div class="card-body">
                        <ul class="nav nav-tabs" id="myTab2" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link @if(empty($id)) active show @endif" id="home-tab2" data-toggle="tab"
                                    href="#home2" role="tab" aria-controls="home" aria-selected="true">Deposit
                                    List</a>
                            </li>
       
                            <li class="nav-item">
                                <a class="nav-link @if(!empty($id)) active show @endif" id="profile-tab2"
                                    data-toggle="tab" href="#profile2" role="tab" aria-controls="profile"
                                    aria-selected="false">New Deposit</a>
                            </li>
                           

                        </ul>
                        <div class="tab-content tab-bordered" id="myTab3Content">
                            <div class="tab-pane fade @if(empty($id)) active show @endif" id="home2" role="tabpanel"
                                aria-labelledby="home-tab2">
                                <div class="table-responsive">
                                    <table class="table datatable-basic table-striped" id="table-1">
                                        <thead>
                                            <tr>
                                                <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0"
                                                    rowspan="1" colspan="1"
                                                    aria-label="Browser: activate to sort column ascending"
                                                    style="width: 28.531px;">#</th>
                                                <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0"
                                                    rowspan="1" colspan="1"
                                                    aria-label="Platform(s): activate to sort column ascending"
                                                    style="width: 120.484px;">Date</th>
                                                <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0"
                                                    rowspan="1" colspan="1"
                                                    aria-label="Platform(s): activate to sort column ascending"
                                                    style="width: 150.484px;">Deposited Amount</th>
                                                    <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0"
                                                    rowspan="1" colspan="1"
                                                    aria-label="Platform(s): activate to sort column ascending"
                                                    style="width: 150.484px;">Card No</th>

                                           
                                          <!--
                                                <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0"
                                                    rowspan="1" colspan="1"
                                                    aria-label="CSS grade: activate to sort column ascending"
                                                    style="width: 98.1094px;">Actions</th>
-->
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @if(!@empty($deposits))
                                            @foreach ($deposits as $row)
                                            <tr class="gradeA even" role="row">
                                                <th>{{ $loop->iteration }}</th>
                                                <td>{{ $row->created_at ? \Carbon\Carbon::parse($mother->$row->created_at)->format('M d, Y') : null}}</td>
                                               
                                              
                                                <?php $result =  App\Models\Visitors\Visitor::find($row->owner_id); ?>
                                                
                                                <?php $balance =  App\Models\Cards\TemporaryDeposit::where('visitor_id',$row->owner_id)->where('card_id',$row->id)->get()->sum('debit'); ?>  
                                                
                                              
                                                <td>{{number_format($row->debit,2)}}</td>
                                               
                                                

                                                <td>{{$row->ref_no}}</td>

                                               
                                                <td>
                                                    <!--

                                                    <div class="btn-group">
                                                        <button class="btn btn-xs btn-success dropdown-toggle"
                                                            data-toggle="dropdown">Change<span
                                                                class="caret"></span></button>
                                                        <ul class="dropdown-menu animated zoomIn">
                                                            <a class="nav-link" title="Convert to Invoice"
                                                             
                                                                href="{{ route('card_deposit.edit', $row->id)}}">Deposit
                                                                </a></li>
                                                        </ul>
                                                    </div>
-->

                                                    

                                                </td>
                                            </tr>
                                            @endforeach

                                            @endif

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="tab-pane fade @if(!empty($id)) active show @endif" id="profile2" role="tabpanel"
                                aria-labelledby="profile-tab2">

                                <div class="card">
                                    <div class="card-header">
                                        @if(empty($id))
                                        <h5>Deposit</h5>
                                        @else
                                        <h5>Deposit</h5>
                                        @endif
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-sm-12 ">
                                                @if(isset($id))
                                                {{ Form::model($id, array('route' => array('member_card_deposit.update', $id), 'method' => 'PUT')) }}
                                                @else
                                                {{ Form::open(['route' => 'member_card_deposit.store']) }}
                                                @method('POST')
                                                @endif



                                                <input type="hidden" name="card_id"
                                                            value="{{ isset($id) ? $id : ''}}"
                                                           >

                                                <div class="form-group row">
                                                    <label class="col-lg-2 col-form-label">Enter Amount</label>
                                                    <div class="col-lg-8">
                                                    <input type="text" name="amount"
                                                            value="{{ isset($data) ? $data->amount : ''}}"
                                                            class="form-control">
                                                       
                                                    </div>
                                                </div>
                                         

                                                <div class="form-group row">
                                                    <div class="col-lg-offset-2 col-lg-12">
                                                        @if(!@empty($id))
                                                        <button class="btn btn-sm btn-primary float-right m-t-n-xs"
                                                            data-toggle="modal" data-target="#myModal"
                                                            type="submit">Update</button>
                                                        @else
                                                        <button class="btn btn-sm btn-primary float-right m-t-n-xs"
                                                            type="submit">Save</button>
                                                        @endif
                                                    </div>
                                                </div>
                                                {!! Form::close() !!}
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

    </div>
</section>
            </div>
        </div>
    </div>
</div>


@endsection



@section('scripts')
<script>
       $('.datatable-basic').DataTable({
            autoWidth: false,
            "columnDefs": [
                {"targets": [1]}
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
@endsection