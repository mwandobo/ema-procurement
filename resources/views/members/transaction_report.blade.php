@extends('layout.master')

@section('content')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
 
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
                    'copy',
                    'excel',
                    'csv',
                    'pdf',
                    'print'
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
                        <h4>Member Transaction Report</h4>
                    </div>
                    <div class="card-body">
                        <ul class="nav nav-tabs" id="myTab2" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link @if(empty($id)) active show @endif" id="home-tab2" data-toggle="tab"
                                    href="#home2" role="tab" aria-controls="home" aria-selected="true">Member Transaction
                                    List</a>
                            </li>


                        </ul>
                        <div class="tab-content tab-bordered" id="myTab3Content">
                            <div class="tab-pane fade @if(empty($id)) active show @endif" id="home2" role="tabpanel"
                                aria-labelledby="home-tab2">

                                <br>
                                <div class="panel-heading">
                                    <h6 class="panel-title">
                                       Member Transaction List
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

                                                    @can('view-staff-menu')
                                            <label class="">Member</label>
                                            {!! Form::select('account_id',$chart_of_accounts,$account_id, array('class'
                                            => 'form-control m-b', 'placeholder'=>'Select','required'=>'required'))
                                            !!}
                                             @endcan


                                            @can('view-member-menu')
                                           <input  name="account_id" type="hidden" class="form-control" required  value="{{ isset($account_id) ? $account_id : auth()->user()->member_id}}">
                                             @endcan

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
<?php
$total_dr=0;
$total_cr=0;
?>

                                            <table class="table table-striped" id="example">
                                                <thead>
                                                    <tr>
                                                        <th>#</th>
                                                        <th>Name</th>
                                                          <th>Reference</th>
                                                        <th>Date</th>                                                        
                                                        <th>Debit</th>
                                                        <th>Credit</th>
                                                      <th>Balance</th>
                                                     <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach($data as $key)
                                                    <tr>
                                                        <td>{{ $loop->iteration }}</td>
                                                        <td>{{$key->module}}</td>
                                                            <td>{{$key->transaction_prefix}}</td>
                                                        <td>{{ $key->date }}</td>
                                                        <td>{{ number_format($key->debit,2) }}</td>
                                                        <td>{{ number_format($key->credit,2) }}</td>
                                                         <td>{{ number_format($key->total_balance,2) }}</td>
                                                          <td> <a class="nav-link" id="profile-tab2" href="{{$key->link }}">Download Receipt</a></td>
                                                    </tr>

                                                    <?php
$total_dr+=$key->debit;
$total_cr+=$key->credit;
?>

                                                    @endforeach
                                                </tbody>


      <tfoot>
                                                    <tr>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td><td></td>
                                                        <td>{{ number_format($total_dr,2) }}</td>
                                                        <td>{{ number_format($total_cr,2) }}</td>
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
            </div>
        </div>
    </div>
</div>


@endsection

