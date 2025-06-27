@extends('layout.master')


@section('content')

<section class="section">
    <div class="section-body">
        <div class="row">
            <div class="col-12 col-sm-6 col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Journal Entry</h4>
                    </div>
                    <div class="card-body">
                        <ul class="nav nav-tabs" id="myTab2" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link @if(empty($id)) active show @endif" id="home-tab2" data-toggle="tab"
                                    href="#home2" role="tab" aria-controls="home" aria-selected="true">Journal Entry
                                    List</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link @if(!empty($id)) active show @endif" id="profile-tab2"
                                    data-toggle="tab" href="#profile2" role="tab" aria-controls="profile"
                                    aria-selected="false">New Journal Entry</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link  " id="importExel-tab"
                                    data-toggle="tab" href="#importExel" role="tab" aria-controls="profile"
                                    aria-selected="false">Import</a>
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
                                                    style="width: 86.484px;">Account Codes</th>
                                                <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0"
                                                    rowspan="1" colspan="1"
                                                    aria-label="Platform(s): activate to sort column ascending"
                                                    style="width: 186.484px;">Account Name</th>
                                                <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0"
                                                    rowspan="1" colspan="1"
                                                    aria-label="Engine version: activate to sort column ascending"
                                                    style="width: 141.219px;">Debit</th>
                                                    <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0"
                                                    rowspan="1" colspan="1"
                                                    aria-label="Engine version: activate to sort column ascending"
                                                    style="width: 141.219px;">Credit</th>
                                                <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0"
                                                    rowspan="1" colspan="1"
                                                    aria-label="CSS grade: activate to sort column ascending"
                                                    style="width: 98.1094px;">Date</th>
                                            </tr>
                                        </thead>
                                         <tbody>
                                            @if(!@empty($journal))
                                            @foreach ($journal as $row)
                                            <tr class="gradeA even" role="row">
                                                <th>{{ $loop->iteration }}</th>
                                                  @if(!empty($row->chart))
                                                <td>{{$row->chart->gl_code}}</td>
                                                <td>{{$row->chart->name}}</td>
                                                     @endif
                                                <td>{{number_format($row->debit,2)}}</td>                                           
                                                  <td>{{number_format($row->credit,2)}}</td>
                                                    <td>{{$row->date}}</td>
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
                                        <h5>Create Journal Entry</h5>
                                     
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-sm-12 ">
                                            
                                                {{ Form::open(['url' => url('accounting/manual_entry/store')]) }}
                                                @method('POST')
                                            

                                                <div class="form-group row">
                                                    <label class="col-lg-2 col-form-label">Type</label>
                                                           <div class="col-lg-8">
                                                       <select class="form-control m-b type" id="type" name="type" required>
                                                           <option value="">Select </option>                                                    
                                                                 <option value="Client">Client </option> 
                                                                  <option value="Supplier">Supplier</option> 
                                                                       <option value="Other">Other </option> 
                                                                    </select>
                                                           </div>
                                                       </div>


                                                <div class="form-group row">
                           <label class="col-lg-2 col-form-label">Amount</label>
                                                    <div class="col-lg-8">
                                                        <input type="number" name="amount" required
                                                           
                                                            class="form-control">
                                                    </div>
                                                </div>

                                               <div class="form-group row">
                                                    <label class="col-lg-2 col-form-label">Date</label>
                                                    <div class="col-lg-8">
                                                        <input type="date" name="date" required
                                                            placeholder=""
                                                           
                                                            class="form-control date-picker">
                                                    </div>
                                                </div>
                                               
                                                <div class="form-group row"><label
                                                        class="col-lg-2 col-form-label">Debit</label>
                                                    <div class="col-lg-8">                                          
                    {!! Form::select('debit_account_id',$chart_of_accounts,null, array('class' => 'form-control m-b', 'placeholder'=>"Select",'required'=>'')) !!}                                                      
                                                    </div>
                                                </div>

                                                <div class="form-group row"><label
                                                        class="col-lg-2 col-form-label">Credit</label>
                                                    <div class="col-lg-8">                                          
                    {!! Form::select('credit_account_id',$chart_of_accounts,null, array('class' => 'form-control m-b', 'placeholder'=>"Select",'required'=>'')) !!}                                                      
                                                    </div>
                                                </div>
                                              
                                                <div class="form-group row" id="client" style="display:none;"><label
                                                    class="col-lg-2 col-form-label">Client</label>
                                                <div class="col-lg-8">
                                            <select class="m-b client_id" id="client_id" name="client_id" >
                                                <option value="">Select Client</option>                                                    
                                                                                                                     </select>
                                                </div>
                                            </div>

                                        <div class="form-group row" id="supplier" style="display:none;"><label
                                                    class="col-lg-2 col-form-label">Supplier</label>
                                                <div class="col-lg-8">
                                            <select class="m-b supplier_id" id="supplier_id" name="supplier_id" >
                                                <option value="">Select Supplier</option>                                                    
                                                                                                                     </select>
                                                </div>
                                            </div>

                                                   <div class="form-group row">
                                                    <label class="col-lg-2 col-form-label">Reference</label>
                                                    <div class="col-lg-8">
                                                        <input type="text" name="reference"
                                                            placeholder=""
                                                            class="form-control ">
                                                    </div>
                                                </div>

                                              <div class="form-group row">
                                                    <label class="col-lg-2 col-form-label">Description</label>
                                                    <div class="col-lg-8">
                                                        <textarea name="description"
                                                            placeholder=""
                                                            class="form-control" rows="2"></textarea>
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


                            <div class="tab-pane fade @if(!empty($id)) active show @endif" id="importExel" role="tabpanel"
                            aria-labelledby="importExel-tab">

                            <div class="card">
                                <div class="card-header">
                                     <form action="{{ route('journal.sample') }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <button class="btn btn-success">Download Sample</button>
                                        </form>
                                 
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-sm-12 ">
                                            <div class="container mt-5 text-center">
                                                <h4 class="mb-4">
                                                 Import Excel & CSV File   
                                                </h4>
                                                <form action="{{ route('journal.import') }}" method="POST" enctype="multipart/form-data">
                                            
                                                    @csrf
                                                    <div class="form-group mb-4">
                                                        <div class="custom-file text-left">
                                                            <input type="file" name="file" class="form-control" id="customFile" required>
                                                        </div>
                                                    </div>
                                                    <button class="btn btn-primary">Import Journal</button>
                                          
                                        </form>
                                       
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


<script>
$(document).ready(function() {

    $(document).on('change', '.type', function() {
        var id = $(this).val();
  console.log(id);


 if (id == 'Supplier'){
   $("#client").css("display", "none");   
     $("#supplier").css("display", "block");   

}

else if(id == 'Client'){
        $("#client").css("display", "block");   
     $("#supplier").css("display", "none");   
}

else{
  $("#client").css("display", "none");   
     $("#supplier").css("display", "none"); 

}


     

    });



});

</script>



@endsection