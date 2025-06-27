@extends('layout.master')


  
@section('content')
<section class="section">
    <div class="section-body">
        <div class="row">
            <div class="col-12 col-sm-6 col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Deposit</h4>
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
                                                style="width: 180.484px;">Deposit Account</th>
                                            <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0"
                                                rowspan="1" colspan="1"
                                                aria-label="Engine version: activate to sort column ascending"
                                                style="width: 180.484px;">Payment Account</th>
                                            <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0"
                                                rowspan="1" colspan="1"
                                                aria-label="Engine version: activate to sort column ascending"
                                                style="width: 120.219px;">Amount</th>
                                            <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0"
                                                rowspan="1" colspan="1"
                                                aria-label="CSS grade: activate to sort column ascending"
                                                style="width: 120.1094px;">Date</th>
                                            <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0"
                                                rowspan="1" colspan="1"
                                                aria-label="CSS grade: activate to sort column ascending"
                                                style="width: 185.1094px;">Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @if(!@empty($deposit))
                                            @foreach ($deposit as $row)
                                            <tr class="gradeA even" role="row">
                                                <th>{{ $loop->iteration }}</th>
                                                <td>{{$row->reference}}</td>                                                   
                                                <td>{{$row->account->account_name}}</td>                                                         
                                                <td>{{$row->bank->account_name}}</td>
                                                <td>{{number_format($row->amount,2)}} </td>
                                                <td>{{$row->date}}</td>

                                                <td>                     
                                                    @if($row->status == 0)
                                                    <div class="form-inline">

                                                            <a  class="list-icons-item text-primary" title="Edit"
                                                                onclick="return confirm('Are you sure?')"
                                                                href="{{ route("deposit.edit", $row->id)}}"> <i class="icon-pencil7"></i></a>
                                                       &nbsp;


                                                            {!! Form::open(['route' => ['deposit.destroy',$row->id],
                                                            'method' => 'delete']) !!}
                                                            {{ Form::button('<i class="icon-trash"></i>', ['type' => 'submit', 'style' => 'border:none;background: none;', 'class' => 'list-icons-item text-danger',  'onclick' => "return confirm('Are you sure?')"]) }}
                                                            {{ Form::close() }}
                                                       &nbsp;
                                                      
                                                       <div class="dropdown">

                                                       <a href="#" class="list-icons-item dropdown-toggle text-teal" data-toggle="dropdown"><i class="icon-cog6"></i></a>
                                                       <div class="dropdown-menu">
                                                        
                                                            <a class="dropdown-item"  title="Confirm Payment"
                                                                onclick="return confirm('Are you sure? you want to confirm')"
                                                                href="{{ route('deposit.approve', $row->id)}}">Confirm
                                                                Payment</a>
                                                       </div>
                                                    </div>
                                                </div>

                                                    @endif

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
                                        @if(!empty($id))
                                        <h5>Edit Deposit</h5>
                                        @else
                                        <h5>Add New Deposit</h5>
                                        @endif
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-sm-12 ">
                                                @if(isset($id))
                                                {{ Form::model($id, array('route' => array('deposit.update', $id), 'method' => 'PUT')) }}
                                                @else
                                                {{ Form::open(['route' => 'deposit.store']) }}
                                                @method('POST')
                                                @endif

                                                <div class="form-group row">
                                                    <label class="col-lg-2 col-form-label">Reference <span class="required" style="color: red;"> * </span></label>
                                                    <div class="col-lg-8">
                                                        <input type="text" name="reference"
                                                            value="{{ isset($data) ? $data->reference : ''}}"
                                                            class="form-control" required>
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label class="col-lg-2 col-form-label">Deposit Name/Title</label>
                                                    <div class="col-lg-8">
                                                        <input type="text" name="name"
                                                            value="{{ isset($data) ? $data->name : ''}}"
                                                            class="form-control">
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label class="col-lg-2 col-form-label">Amount <span class="required" style="color: red;"> * </span></label>
                                                    <div class="col-lg-8">
                                                        <input type="number" name="amount" required placeholder=""
                                                            value="{{ isset($data) ? $data->amount : ''}}"
                                                            class="form-control" required>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-lg-2 col-form-label">Date <span class="required" style="color: red;"> * </span></label>
                                                    <div class="col-lg-8">
                                                        <input type="date" name="date" required placeholder=""
                                                            value="{{ isset($data) ? $data->date: ''}}"
                                                            class="form-control" required>
                                                    </div>
                                                </div>

                                                <div class="form-group row"><label
                                                        class="col-lg-2 col-form-label">Deposit Account <span class="required" style="color: red;"> * </span></label>
                                                    <div class="col-lg-8">
                                                        <select class="form-control m-b" name="account_id" required>
                                                            <option value="">Select Deposit Account</option>
                                                            @foreach ($chart_of_accounts as $chart)
                                                            <option value="{{$chart->id}}" @if(isset($data))@if($data->
                                                                account_id == $chart->id) selected @endif @endif
                                                                >{{$chart->account_name}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="form-group row"><label
                                                        class="col-lg-2 col-form-label">Payment Account <span class="required" style="color: red;"> * </span></label>
                                                    <div class="col-lg-8">
                                                        <select class="form-control m-b" name="bank_id" required>
                                                            <option value="">Select Payment Account</option>
                                                            @foreach ($bank_accounts as $bank)
                                                            <option value="{{$bank->id}}" @if(isset($data))@if($data->
                                                                bank_id == $bank->id) selected @endif @endif
                                                                >{{$bank->account_name}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="form-group row"><label
                                                        class="col-lg-2 col-form-label">Payment
                                                        Method</label>

                                                    <div class="col-lg-8">
                                                        <select class="form-control m-b" name="payment_method" >
                                                            <option value="">Select
                                                            </option>
                                                            @if(!empty($payment_method))
                                                            @foreach($payment_method as $row)
                                                            <option value="{{$row->id}}" @if(isset($data))@if($data->
                                                                payment_method == $row->id) selected @endif @endif >From
                                                                {{$row->name}}
                                                            </option>

                                                            @endforeach
                                                            @endif
                                                        </select>

                                                    </div>
                                                </div>


                                                <div class="form-group row">
                                                    <label class="col-lg-2 col-form-label">Notes</label>
                                                    <div class="col-lg-8">
                                                        <textarea name="notes" placeholder="" class="form-control"
                                                            rows="2">{{ isset($data) ? $data->notes: ''}}</textarea>
                                                    </div>
                                                </div>

                                           


                                            
                                            <div class="form-group row">
                                                <div class="col-lg-offset-2 col-lg-12">
                                                    @if(!@empty($id))

                                                    <a class="btn btn-sm btn-danger float-right m-t-n-xs"
                                                        href="{{ route('deposit.index')}}">
                                                       Cancel
                                                    </a>
                                                    <button class="btn btn-sm btn-primary float-right m-t-n-xs"
                                                        data-toggle="modal" data-target="#myModal"
                                                        type="submit">Update</button>
                                                    @else
                                                    <button class="btn btn-sm btn-primary float-right m-t-n-xs"
                                                        type="submit" id="save" >Save</button>
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

    </div>
</section>


@endsection



@section('scripts')

 <script>
       $('.datatable-basic').DataTable({
            autoWidth: false,
            "columnDefs": [
                {"orderable": false, "targets": [3]}
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