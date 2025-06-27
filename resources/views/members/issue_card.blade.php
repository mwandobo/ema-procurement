   <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Card Issue to {{$data->full_name}} </h5>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>


{{ Form::model($id, array('route' => array('card_printing.update', $id), 'method' => 'PUT','enctype'=>'multipart/form-data')) }}


   <div class="modal-body">
 <div class="form-group">
                <label class="col-lg-6 col-form-label">Card ID
       <span class="required" style="color:red;">*</span></label>

                <div class="col-lg-10">

        <input type="number" name="card" class="form-control" required>
        
                </div>

  </div>
 </div>

                <div class="modal-footer">
                   <button class="btn btn-primary"  type="submit" id="save"><i class="icon-checkmark3 font-size-base mr-1"></i>Update</button>
            <button class="btn btn-link" data-dismiss="modal"><i class="icon-cross2 font-size-base mr-1"></i> Close</button>               
                </div>
                {!! Form::close() !!}
            </div>