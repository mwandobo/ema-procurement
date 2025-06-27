@extends('layout.master')



@section('content')
<section class="section">
    <div class="section-body">
        <div class="row">
            <div class="col-12 col-sm-12 col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Expired Members </h4>
                    </div>
                    <div class="card-body">
                        <ul class="nav nav-tabs" id="myTab2" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link @if(empty($id)) active show @endif" id="home-tab2" data-toggle="tab"
                                    href="#home" role="tab" aria-controls="home" aria-selected="true">Expired Member
                                    List</a>
                            </li>
                      


                        </ul>
                        <div class="tab-content tab-bordered" id="myTab3Content">
                            <div class="tab-pane fade @if(empty($id)) active show @endif" id="home" role="tabpanel"
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
                                                    style="width: 250.484px;">Membership Class</th>  <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0"
                                                    rowspan="1" colspan="1"
                                                    aria-label="Platform(s): activate to sort column ascending"
                                                    style="width: 120.484px;">Membership ID</th>

                                                <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0"
                                                    rowspan="1" colspan="1"
                                                    aria-label="Platform(s): activate to sort column ascending"
                                                    style="width: 110.484px;">Email</th>

                                                    <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0"
                                                    rowspan="1" colspan="1"
                                                    aria-label="Platform(s): activate to sort column ascending"
                                                    style="width: 100.484px;">Due Date</th>

                                               

                                            </tr>
                                        </thead>
                                        <tbody>
                                            @if(!@empty($list))
                                            @foreach ($list as $row)
                                            <tr class="gradeA even" role="row">
                                                <th>{{ $loop->iteration }}</th>
                                                <td>{{$row->full_name}}</td>


                                                <?php $result =  App\Models\Visitors\Visitor::find($row->owner_id); ?>

                                                <?php $balance =  App\Models\Cards\TemporaryDeposit::where('visitor_id',$row->owner_id)->where('card_id',$row->id)->get()->sum('debit'); ?>


                                                <td>{{!empty($row->membership_types)? $row->membership_types->name : '' }} {{ isset($row->membership_types->class) ?  '- '. $row->membership_types->class : ''}}
                                                </td>

                                                <td>{{$row->member_id}}</td>

                                                <td>{{$row->email}}</td>

                                                <td><?php echo date("d/m/Y", strtotime($row->due_date)); ?></td>

                                                
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
<div class="modal fade" id="appFormModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
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
</script>

<script>
    function model(id,type) {

$.ajax({
    type: 'GET',
    url: '{{url("memberModal")}}',
    data: {
        'id': id,
        'type':type,
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

<script>
  var loadBigFile=function(event){
    var output=document.getElementById('big_output');
    output.src=URL.createObjectURL(event.target.files[0]);
  };
</script>


<script>
    $(document).ready(function() {
    
      
    
        $(document).on('change', '.email', function() {
            var id = $(this).val();
            $.ajax({
                url: '{{url("members/findEmail")}}',
                type: "GET",
                data: {
                    id: id,
                },
                dataType: "json",
                success: function(data) {
                  console.log(data);
                $("#errors").empty();
                $("#next").attr("disabled", false);
                 if (data != '') {
               $("#errors").append(data);
               $("#next").attr("disabled", true);
    } else {
      
    }
                
           
                }
    
            });
    
        });

    });
    </script>



<script>
$(document).ready(function() {

    $(document).on('change', '.membership_class', function() {
        var id = $(this).val();
  console.log(id);

 var cor= $('.cor').val();

 if (id == cor){  
     $("#corporate").css("display", "block");   

}

else{
  $("#corporate").css("display", "none");   

}
    
    });



});

</script>


@endsection