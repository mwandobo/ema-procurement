@extends('layout.master')
@section('title')Member Deposit @endsection

@section('content')


            <section class="section">
    <div class="section-body">
        <div class="row">
            <div class="col-12 col-sm-12 col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Deposit  For 
                               @if($type == 'member')
                                    {{$data->full_name}}
                                     @else
                                    {{$data->first_name}}   {{$data->last_name}}
                                   @endif
                                   </h4>
                    </div>
                    <div class="card-body">
<!--
                        <ul class="nav nav-tabs" id="myTab2" role="tablist">

                            <li class="nav-item">
                                <a class="nav-link @if(empty($id)) active show @endif" id="home-tab2" data-toggle="tab"
                                    href="#home2" role="tab" aria-controls="home" aria-selected="true">Deposit
                                    List</a>
                            </li>
    
                            <li class="nav-item">
                                <a class="nav-link active" id="profile-tab2"
                                    data-toggle="tab" href="#profile2" role="tab" aria-controls="profile"
                                    aria-selected="false">New Deposit</a>
                            </li>
                           

                        </ul>
-->   
                        <div class="tab-content tab-bordered" id="myTab3Content">
                            
                            <div class="tab-pane active" id="profile2" role="tabpanel"
                                aria-labelledby="profile-tab2">

                                <div class="card">
                                    
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-sm-12 ">
                                               
                                                {{ Form::open(['route' => 'member_card_deposit.store']) }}
                                                @method('POST')
                                              

                                                <input type="hidden" name="member_id"
                                                            value="{{ isset($id) ? $id : ''}}">
                                                          
                                               <input type="hidden" name="type"
                                                            value="{{ $type}}">

                                                <div class="form-group row">
                                                    <label class="col-lg-2 col-form-label">Enter Amount</label>
                                                    <div class="col-lg-8">
                                                    <input type="number" name="amount"
                                                            value="{{ isset($data) ? $data->amount : ''}}"
                                                            class="form-control">
                                                       
                                                    </div>
                                                </div>

                                

                                 <div class="form-group row">
                                                    <label class="col-lg-2 col-form-label"> Date</label>
                                                    <div class="col-lg-8">
                                                        <input type="date" name="date"
                                                            placeholder="0 if does not exist"
                                                            value="{{ isset($data) ? $data->date : date('Y-m-d')}}"
                                                            class="form-control">
                                                    </div>
                                                   
                                                </div>

                                                <div class="form-group row"><label  class="col-lg-2 col-form-label">Bank/Cash Account</label>

                                                    <div class="col-lg-8">
                                                       <select class="form-control m-b" name="account_id" required>
                                                    <option value="">Select Payment Account</option> 
                                                          @foreach ($bank_accounts as $bank)                                                             
                                                            <option value="{{$bank->id}}">{{$bank->account_name}}</option>
                                                               @endforeach
                                                              </select>
                                                    </div>
                                                </div>
                                                
                                                  @if($type == 'member')
                                                  <div class="form-group row"><label  class="col-lg-2 col-form-label">Payment Method</label>

                                                    <div class="col-lg-8">
                                                     <select class="form-control m-b method" name="method_id" required>
                                                    <option value="">Select Payment Method</option> 
                                                     @foreach ($method as $md)                                                             
                                                     <option value="{{$md->id}}" data-name= "{{$md->name}}">{{$md->name}}</option>
                                                               @endforeach
                                                              </select>
                                                    </div>
                                                </div>
                                                
                                                 <div class="form-group row no" style="display:none;" id="no">
                                                    <label class="col-lg-2 col-form-label">Cheque No</label>
                                                    <div class="col-lg-8">
                                                    <input type="text" name="cheque_no" id="cheque_no"
                                                            value="{{ isset($data) ? $data->cheque_no : ''}}"
                                                            class="form-control">
                                                       
                                                    </div>
                                                </div>
                                                
                                                <div class="form-group row issue" style="display:none;" id="issue">
                                                    <label class="col-lg-2 col-form-label">Cheque Issue</label>
                                                    <div class="col-lg-8">
                                                    <input type="text" name="cheque_issue" id="cheque_issue"
                                                            value="{{ isset($data) ? $data->cheque_issue : ''}}"
                                                            class="form-control">
                                                       
                                                    </div>
                                                </div>
                                                
                                                
                                                @endif
                                         

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
    
      <script>
        $(document).ready(function() {

            $(document).on('change', '.method', function() {
               
                var id =  $(this).find(':selected').attr('data-name')
                console.log(id);


                if (id == 'Cheque') {
                    $('.no').show();
                    $('.issue').show();
                    $("#cheque_no").prop('required',true);
                    $("#cheque_issue").prop('required',true);

                } else {
                    $('.no').hide();
                    $('.issue').hide();
                    $("#cheque_no").prop('required',false);
                    $("#cheque_issue").prop('required',false);

                }

            });



        });
    </script>
    
    
@endsection