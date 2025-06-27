@extends('layout.master')

@section('content')

            <section class="section">
    <div class="section-body">
        <div class="row">
            <div class="col-12 col-sm-6 col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Journal Entry Report</h4>
                    </div>
                    <div class="card-body">
                        <ul class="nav nav-tabs" id="myTab2" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link @if(empty($id)) active show @endif" id="home-tab2" data-toggle="tab"
                                    href="#home2" role="tab" aria-controls="home" aria-selected="true">Journal Entry
                                    Report
                                    List</a>
                            </li>


                        </ul>
                        <div class="tab-content tab-bordered" id="myTab3Content">
                            <div class="tab-pane fade @if(empty($id)) active show @endif" id="home2" role="tabpanel"
                                aria-labelledby="home-tab2">

                                <br>
                                <div class="panel-heading">
                                    <h6 class="panel-title">
                                        Journal Entries
                                        @if(!empty($start_date))
                                        for the period: <b>{{$start_date}} to {{$end_date}}</b>
                                        @endif
                                    </h6>
                                </div>

                                <br>
                                <div class="panel-body hidden-print">
                                    {!! Form::open(array('url' => Request::url(), 'method' =>
                                    'post','class'=>'form-horizontal', 'name' => 'form')) !!}
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
                                            <label class="">Chart of Accounts</label>
                                            {!! Form::select('account_id',$chart_of_accounts,$account_id, array('class'
                                            => 'form-control m-b', 'placeholder'=>'Select','required'=>'required'))
                                            !!}
                                        </div>

                                        <div class="col-md-4">
                                            <br><button type="submit" class="btn btn-success">Search</button>
                                            <a href="{{Request::url()}}" class="btn btn-danger">Reset</a>

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
                                            <table class="table datatable-basic table-striped">
                                                <thead>
                                                    <tr>
                                                        <th>#</th>
                                                        <th>Transaction Type</th>
                                                        <th>Date</th>
                                                        <th>Account Name</th>
                                                        <th>Debit</th>
                                                        <th>Credit</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach($data as $key)
                                                    <tr>
                                                        <td>{{ $loop->iteration }}</td>
                                                        <td>{{$key->transaction_type}}</td>
                                                        <td>{{ $key->date }}</td>
                                                        <td>
                                                            @if(!empty($key->chart))
                                                            {{ $key->chart->name }}
                                                            @endif
                                                        </td>

                                                        <td>{{ number_format($key->debit,2) }}</td>
                                                        <td>{{ number_format($key->credit,2) }}</td>
                                                    </tr>
                                                    @endforeach
                                                </tbody>
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