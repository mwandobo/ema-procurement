   <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Update Profile </h5>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>


{{ Form::model($id, array('route' => array('image.save', $id), 'method' => 'PUT','enctype'=>'multipart/form-data')) }}


   <div class="modal-body">
 <div class="form-group">
                <label class="col-lg-6 col-form-label">Upload
        Profile Picture <span class="required">*</span></label>

                <div class="col-lg-10">
                     @if(!@empty($data->picture))
        <img src="{{url('public/assets/img/logo')}}/{{$data->picture}}" alt="{{$data->name}}" width="100">
        <input type="file" name="picture" value="{{$data->picture }}" class="form-control"
            onchange="loadBigFile(event)">
        @else
        <input type="file" name="picture" class="form-control" onchange="loadBigFile(event)">
        @endif

        <br>
        <img id="big_output" width="100">
                </div>

  </div>

                <div class="modal-footer">
                   <button class="btn btn-primary"  type="submit" id="save"><i class="icon-checkmark3 font-size-base mr-1"></i>Update</button>
            <button class="btn btn-link" data-dismiss="modal"><i class="icon-cross2 font-size-base mr-1"></i> Close</button>               
                </div>
                {!! Form::close() !!}
            </div>