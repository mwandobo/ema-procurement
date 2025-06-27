<div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="formModal">
                @if(!empty($id))
                <h5>Edit Maintainance</h5>
                @else
                <h5>Add New Maintainance</h5>
                @endif
                  
</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        @if(isset($id))
        {{ Form::model($id, array('route' => array('maintainance.update', $id), 'method' => 'PUT')) }}
        @else
        {{ Form::open(['route' => 'maintainance.store']) }}
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
                                                                        

                                                                            <label class="col-lg-2 col-form-label">Type</label>
                                                                           <div class="col-lg-4">
                                                                            <select class="form-control" name="maintainance_type" required
                                                                            id="supplier_id">
                                                                            <option value="">Select Type</option>
                                                                            <option @if(isset($name))
                                                                                {{$name->maintainance_type == 'Minor'  ? 'selected' : ''}}
                                                                                @endif value="Minor">Minor</option>
                                                                                <option @if(isset($name))
                                                                                {{$name->maintainance_type == 'Major'  ? 'selected' : ''}}
                                                                                @endif value="Major">Major</option>
                                                                              
                                                                        </select>
                                                                            </div>
                                                                        </div>
                                                                       
                                                                        <div class="form-group row">
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
                                                                       
                        
                                                                        <label
                                                                            class="col-lg-2 col-form-label">Reason</label>
                        
                                                                        <div class="col-lg-4">
                                                                            <textarea name="reason" 
                                                                    class="form-control" required>@if(isset($name)){{ $name->reason }} @endif</textarea>
                                                                        </div>
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