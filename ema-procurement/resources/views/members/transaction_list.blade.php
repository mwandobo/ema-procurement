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
                     <div class="card-header header-elements-sm-inline"
                        <h4 class="card-title"><strong>Member Transaction List - {{$member->full_name}} , {{$member->member_id}}</strong></h4>
                    <div class="header-elements">  
                         @can('view-staff-menu')                         
                        <a  href="{{ route('manage_member.show', $member->id)}}" class="btn btn-outline-info btn-xs edit_user_btn">
                        <i class="fa fa-eye"></i> View Member Details
                    </a>&nbsp
                     
                     <a href="{{route('member_list')}}" class="btn btn-secondary btn-xs px-4"><i class="fa fa-arrow-alt-circle-left"></i> Back </a>
                         @endcan     
   
   </div></div>
                    <div class="card-body">
                        
                        <div class="tab-content tab-bordered" id="myTab3Content">
                            <div class="tab-pane fade @if(empty($id)) active show @endif" id="home2" role="tabpanel"
                                aria-labelledby="home-tab2">

                                <br>
                                
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

