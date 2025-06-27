<div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="formModal">
                @if(!empty($id))
                                                                <h5>Edit Service</h5>
                                                                @else
                                                                <h5>Add New Service</h5>
                                                                @endif
                  
</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        @if(isset($id))
                                                                        {{ Form::model($id, array('route' => array('service.update', $id), 'method' => 'PUT')) }}
                                                                        @else
                                                                        {{ Form::open(['route' => 'service.store']) }}
                                                                        @method('POST')
                                                                        @endif

        <div class="modal-body">

              <input type="hidden" name="facility" value="{{ $name->facility}}">

              <div class="form-group row">
                <label class="col-lg-2 col-form-label">Date</label>
                <div class="col-lg-4">
                    <input type="date" name="date"
                        placeholder="0 if does not exist"
                        value="{{ isset($name) ? $name->date : ''}}"
                        class="form-control" required>
                </div>
            
                <label
                class="col-lg-2 col-form-label">Mechanical</label>

            <div class="col-lg-4">
                <select class="form-control" name="mechanical" required
                id="supplier_id">
        <option value="">Select Mechanical</option>
        @if(!empty($staff))
        @foreach($staff as $row)

        <option @if(isset($name))
            {{$name->mechanical == $row->id  ? 'selected' : ''}}
            @endif value="{{ $row->id}}">{{$row->name}}</option>

        @endforeach
        @endif

    </select>
                </div>
            </div>
           
            <div class="form-group row">
                <label
                class="col-lg-2 col-form-label">Service History</label>

            <div class="col-lg-4">
                <textarea name="history" 
        class="form-control" required>@if(isset($name)){{ $name->history }} @endif</textarea>
            </div>
            <label
            class="col-lg-2 col-form-label">Next Major Service</label>

        <div class="col-lg-4">
            <textarea name="major" 
    class="form-control" required>@if(isset($name)){{ $name->major }} @endif</textarea>
        </div>
        </div>

        <br>
         
        <h4 align="center">Enter Minor Service Details</h4>
        <hr>
        
        
        <button type="button" name="add" class="btn btn-success btn-xs add"><i
                class="fas fa-plus"> Add Minor Service</i></button><br>
        <br>
        <div class="table-responsive">
        <table class="table table-bordered" id="cart">
            <thead>
                <tr>
                    <th>Next Minor Service</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>


            </tbody>
            <tfoot>
                @if(!empty($id))
                @if(!empty($items))
                @foreach ($items as $i)
                <tr class="line_items">
                    
                   
    <td>
        <textarea name="minor[]" 
    class="form-control item_price{{$i->order_no}}" required style="margin-top:10px;">@if(isset($i)){{ $i->minor }} @endif</textarea>
     
        </td>

                            <input type="hidden" name="saved_id[]"
                            class="form-control item_saved{{$i->order_no}}"
                            value="{{ isset($i) ? $i->id : ''}}"
                            required />
                    <td><button type="button" name="remove"
                            class="btn btn-danger btn-xs rem"
                            value="{{ isset($i) ? $i->id : ''}}"><i
                                class="las la-trash"></i></button></td>
                </tr>

                @endforeach
                @endif
                @endif

            </tfoot>    
        </table>
        </table>
    </div>


        <br>

          <br>
        <h4 align="center">Enter Inventory</h4>
        <hr>
        
        
        <button type="button" name="add" class="btn btn-success btn-xs addReport"><i
                class="fas fa-plus"> Add Item</i></button><br>
        <br>
        <div class="table-responsive">
          <table class="table table-bordered" id="report">
            <thead>
                <tr>
                    <th>Inventory Item</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
               

            </tbody>
            <tfoot>
                @if(!empty($id))
                @if(!empty($inv))
                @foreach ($inv as $in)
                <tr class="line_items">
                    
                   
    <td>
<select name="item_name[]" class="form-control item_name" required><option value="">Select Item</option>@foreach($inv_name as $n) <option  @if(isset($in))
                {{$in->item_name== $n->id  ? 'selected' : ''}}
                @endif value="{{ $n->id}}">{{$n->name}}</option>@endforeach</select>        
        </td>

                            <input type="hidden" name="saved_inv_id[]"
                            class="form-control item_saved{{$i->order_no}}"
                            value="{{ isset($in) ? $in->id : ''}}"
                            required />
                    <td><button type="button" name="remove"
                            class="btn btn-danger btn-xs rem_inv"
                            value="{{ isset($in) ? $in->id : ''}}"><i
                                class="las la-trash"></i></button></td>
                </tr>

                @endforeach
                @endif
                @endif

            </tfoot>     
        </table>
    </div>



        </div>
        <div class="modal-footer bg-whitesmoke br">
            @if(!@empty($id))
            <button class="btn btn-sm btn-primary float-right m-t-n-xs"
                data-toggle="modal" data-target="#myModal"
                type="submit">Update</button>
            @else
            <button class="btn btn-sm btn-primary float-right m-t-n-xs"
                type="submit">Save</button>
            @endif
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
        </form>
    </div>
</div>