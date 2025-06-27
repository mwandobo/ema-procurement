@extends('layout.master')

@section('title')
   Visitor
@endsection

@section('content')
<?php

$data = App\Models\Setting::all()->last();

?>

<section class="section">
    <div class="section-body">
        
        <div class="row">
            <div class="col-12 col-sm-6 col-lg-12">
                <div class="card">
                   <div class="card-header header-elements-sm-inline">
                        <h4 class="card-title">Visitors</h4>
                 
                  <div class="header-elements">                           
                          <a href="{{ route('visitors.create') }}" class="btn btn-outline-info btn-xs edit_user_btn">
                        <i class="fa fa-plus-circle"></i>
                                {{ __('Add Visitor') }}</a>

   </div></div>

<!-- Main Body Starts -->


                   <div class="card-body">
                        <div class="tab-content tab-bordered" id="myTab3Content">
                            <div class="tab-pane fade @if(empty($id)) active show @endif" id="home2" role="tabpanel"
                                aria-labelledby="home-tab2">
                                <div class="table-responsive">
                                    <table class="table table-striped" id="visitortable">
                                        <thead>
                                            <tr>
                                                <th  style="width: 26.484px;">{{ __('#') }}</th>

                                                <th style="width: 116.484px;">{{ __('Id') }}</th>
                                                <th  style="width: 146.484px;">{{ __('Name') }}</th>
                                                <th  style="width: 126.484px;">{{ __('Check In') }}</th>
                                                
                                                
                                                <th  style="width: 126.484px;">{{ __('Check out') }}</th>
                                                <th style="width: 166.484px;">{{ __('Status') }}</th> 
                                                <th  style="width: 106.484px;">{{ __('Action') }}</th>
                                            </tr>
                                        </thead>
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


<!-- Main Body Ends -->
@endsection


@section('scripts')
<script>
$(function() {
    let urlcontract = "{{ route('visitors.get-visitors') }}";
    $('#visitortable').DataTable({
        processing: false,
        serverSide: true,
        lengthChange: true,
        searching: true,
        type: 'GET',
        ajax: {
            url: urlcontract,
        },
        columns: [{
                data: 'DT_RowIndex',
                name: 'DT_RowIndex',
                orderable: false,
                searchable: false
            },
          
            {
                data: 'reg_no',
                name: 'reg_no'
            },
            {
                data: 'name',
                name: 'name'
            },
             {
                data: 'date',
                name: 'date',
                orderable: true,
                searchable: true
            },

            {
                data: 'checkout',
                name: 'checkout'
            },
           
            {
                data: 'status',
                name: 'status',
                orderable: true,
                searchable: true
            },
            {
                data: 'action',
                name: 'action',
                orderable: true,
                searchable: true
            },

        ]
    })
});


$(document).on('click', '.edit_role_btn', function() {
    let id = $(this).data('id');
    let name = $(this).data('name');
    let slug = $(this).data('slug');
    console.log("here");
    $('#r-id_').val(id);
    $('#r-slug_').val(slug);
    $('#r-name_').val(name);
    $('#editRoleModal').modal('show');
});
</script>



@endsection