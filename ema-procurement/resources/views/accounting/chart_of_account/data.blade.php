@extends('layout.master')


@section('content')


            <section class="section">
    <div class="section-body">
        <div class="row">
            <div class="col-12 col-sm-6 col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Chart of Accounts</h4>
                    </div>
                    <div class="card-body">
                        <ul class="nav nav-tabs" id="myTab2" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link @if(empty($id)) active show @endif" id="home-tab2" data-toggle="tab"
                                    href="#home2" role="tab" aria-controls="home" aria-selected="true">Chart of Accounts
                                    List</a>
                            </li>


                        </ul>
                        <div class="tab-content tab-bordered" id="myTab3Content">
                            <div class="tab-pane fade @if(empty($id)) active show @endif" id="home2" role="tabpanel"
                                aria-labelledby="home-tab2">
                                <div class="table-responsive">
                                    <table id="range-dt" class="table table-striped table-condensed table-hover">
                                        <thead>
                                            <tr>
                                                <th>Account Type</th>
                                                <th>Account Class</th>
                                                <th>Account Group</th>
                                               <th>Sub Group Account</th>
                                                <th>Code Name</th>
                                                <th>Account Code</th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            @if(!@empty($data))
                                            @foreach ($data as $account_type)
                                            <?php  $e=0;   ?>
                                            <tr class="gradeA even" role="row">
                                                <td colspan="5" style="text-align:"><b>{{ $loop->iteration }} .
                                                        {{ $account_type->type  }} </b></td>

                                            </tr>
                                            @foreach($account_type->classAccount as $account_class)
                                            <?php    $e++ ;  ?>
                                            <tr>
                                                <td></td>
                                                <td style="text-align: "><b>{{ $e }} .
                                                        {{ $account_class->class_name  }}</b></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                 <td></td>
                                            </tr>

                                            <?php     
$d=0;
?>

                                            @foreach($account_class->groupAccount as $group)
                                            <?php $d++ ; 
                      //  $values = explode(",",  $account_group->holidays);


?>


                                            <tr>
                                                <td></td>
                                                <td></td>

                                                <td style="text-align:r"><b>{{ $d }} . {{ $group->name   }}</b></td>
                                                <td></td>
                                                <td></td>
                                                    <td></td>



                                            </tr>

                         
                                                  @if(!empty($group->subAccount[0]))
                                                      
                                                           
                                             <?php
                                              $codes=App\Models\Accounting\AccountCodes::where('account_group',$group->name)->groupBy('sub_group')->get();
                                                ?>
                                     
                                      
                                            @foreach($codes as $account_code)


                                                  <tr>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                               <td style="text-align:center" ><b>{{$account_code->sub_group }}</b></td>
                                                <td></td>
                                                <td ></td>
                                            </tr>

                                              <?php
                                              $codes2=App\Models\Accounting\AccountCodes::where('account_group',$group->name)->where('sub_group',$account_code->sub_group)->get();
                                                ?>

                                               @foreach($codes2 as $c)
                                                  <tr>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                   <td></td>
                                                <td>{{$c->account_name }}</td>
                                                <td style="text-align:center">{{$c->account_codes  }}</td>
                                            </tr>
                                                
                                             @endforeach  
                                               @endforeach


                                           @else

                                                                <tr>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                               <td style="text-align:center" ><b></b></td>
                                                <td></td>
                                                <td ></td>
                                            </tr>
                                                  
                                                           
                                           
                                     
                                           @foreach($group->accountCodes as $account_code)
                                                  <tr>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                   <td></td>
                                                <td>{{$account_code->account_name }}</td>
                                                <td style="text-align:center">{{$account_code->account_codes  }}</td>
                                            </tr>
                                                
                                             @endforeach  
                                                

                                                @endif


                                            
                                            @endforeach
                                            @endforeach
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
@push('plugin-scripts')
{!! Html::script('assets/js/loader.js') !!}
{!! Html::script('plugins/table/datatable/datatables.js') !!}
<!--  The following JS library files are loaded to use Copy CSV Excel Print Options-->
{!! Html::script('plugins/table/datatable/button-ext/dataTables.buttons.min.js') !!}
{!! Html::script('plugins/table/datatable/button-ext/jszip.min.js') !!}
{!! Html::script('plugins/table/datatable/button-ext/buttons.html5.min.js') !!}
{!! Html::script('plugins/table/datatable/button-ext/buttons.print.min.js') !!}
<!-- The following JS library files are loaded to use PDF Options-->
{!! Html::script('plugins/table/datatable/button-ext/pdfmake.min.js') !!}
{!! Html::script('plugins/table/datatable/button-ext/vfs_fonts.js') !!}
@endpush


@push('custom-scripts')
<script>
$(document).ready(function() {
    $('.dataTables-example').DataTable({
        pageLength: 25,
        responsive: true,
        dom: '<"html5buttons"B>lTfgitp',
        buttons: [{
                extend: 'copy'
            },
            {
                extend: 'csv'
            },
            {
                extend: 'excel',
                title: 'ExampleFile'
            },
            {
                extend: 'pdf',
                title: 'ExampleFile'
            },

            {
                extend: 'print',
                customize: function(win) {
                    $(win.document.body).addClass('white-bg');
                    $(win.document.body).css('font-size', '10px');

                    $(win.document.body).find('table')
                        .addClass('compact')
                        .css('font-size', 'inherit');
                }
            }
        ]

    });

});


$('.demo4').click(function() {
    swal({
        title: "Are you sure?",
        text: "You will not be able to recover this imaginary file!",
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "#DD6B55",
        confirmButtonText: "Yes, delete it!",
        closeOnConfirm: false
    }, function() {
        swal("Deleted!", "Your imaginary file has been deleted.", "success");
    });
});
</script>

<script>
$(document).ready(function() {
    $('#basic-dt').DataTable({
        "language": {
            "paginate": {
                "previous": "<i class='las la-angle-left'></i>",
                "next": "<i class='las la-angle-right'></i>"
            }
        },
        "lengthMenu": [5, 10, 15, 20],
        "pageLength": 5
    });
    $('#dropdown-dt').DataTable({
        "language": {
            "paginate": {
                "previous": "<i class='las la-angle-left'></i>",
                "next": "<i class='las la-angle-right'></i>"
            }
        },
        "lengthMenu": [5, 10, 15, 20],
        "pageLength": 5
    });
    $('#last-page-dt').DataTable({
        "pagingType": "full_numbers",
        "language": {
            "paginate": {
                "first": "<i class='las la-angle-double-left'></i>",
                "previous": "<i class='las la-angle-left'></i>",
                "next": "<i class='las la-angle-right'></i>",
                "last": "<i class='las la-angle-double-right'></i>"
            }
        },
        "lengthMenu": [3, 6, 9, 12],
        "pageLength": 3
    });
    $.fn.dataTable.ext.search.push(
        function(settings, data, dataIndex) {
            var min = parseInt($('#min').val(), 10);
            var max = parseInt($('#max').val(), 10);
            var age = parseFloat(data[3]) || 0; // use data for the age column
            if ((isNaN(min) && isNaN(max)) ||
                (isNaN(min) && age <= max) ||
                (min <= age && isNaN(max)) ||
                (min <= age && age <= max)) {
                return true;
            }
            return false;
        }
    );
    var table = $('#range-dt').DataTable({
        "language": {
            "paginate": {
                "previous": "<i class='las la-angle-left'></i>",
                "next": "<i class='las la-angle-right'></i>"
            }
        },
        "lengthMenu": [5, 10, 15, 20],
        "pageLength": 5
    });
    $('#min, #max').keyup(function() {
        table.draw();
    });
    $('#export-dt').DataTable({
        dom: '<"row"<"col-md-6"B><"col-md-6"f> ><""rt> <"col-md-12"<"row"<"col-md-5"i><"col-md-7"p>>>',
        buttons: {
            buttons: [{
                    extend: 'copy',
                    className: 'btn btn-primary'
                },
                {
                    extend: 'csv',
                    className: 'btn btn-primary'
                },
                {
                    extend: 'excel',
                    className: 'btn btn-primary'
                },
                {
                    extend: 'pdf',
                    className: 'btn btn-primary'
                },
                {
                    extend: 'print',
                    className: 'btn btn-primary'
                }
            ]
        },
        "language": {
            "paginate": {
                "previous": "<i class='las la-angle-left'></i>",
                "next": "<i class='las la-angle-right'></i>"
            }
        },
        "lengthMenu": [7, 10, 20, 50],
        "pageLength": 7
    });
    // Add text input to the footer
    $('#single-column-search tfoot th').each(function() {
        var title = $(this).text();
        $(this).html('<input type="text" class="form-control" placeholder="Search ' + title + '" />');
    });
    // Generate Datatable
    var table = $('#single-column-search').DataTable({
        "language": {
            "paginate": {
                "previous": "<i class='las la-angle-left'></i>",
                "next": "<i class='las la-angle-right'></i>"
            }
        },
        "lengthMenu": [5, 10, 15, 20],
        "pageLength": 5
    });
    // Search
    table.columns().every(function() {
        var that = this;
        $('input', this.footer()).on('keyup change', function() {
            if (that.search() !== this.value) {
                that
                    .search(this.value)
                    .draw();
            }
        });
    });
    var table = $('#toggle-column').DataTable({
        "language": {
            "paginate": {
                "previous": "<i class='las la-angle-left'></i>",
                "next": "<i class='las la-angle-right'></i>"
            }
        },
        "lengthMenu": [5, 10, 15, 20],
        "pageLength": 5
    });
    $('a.toggle-btn').on('click', function(e) {
        e.preventDefault();
        // Get the column API object
        var column = table.column($(this).attr('data-column'));
        // Toggle the visibility
        column.visible(!column.visible());
        $(this).toggleClass("toggle-clicked");
    });
});
</script>
<script src="{{ url('assets/js/plugins/sweetalert/sweetalert.min.js') }}"></script>
@endpush