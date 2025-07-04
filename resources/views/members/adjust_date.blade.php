<div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="formModal">Due Date Adjustment For {{$member->full_name}}</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>

      {{ Form::open(['route' => 'member.save_date','role'=>'form','enctype'=>'multipart/form-data']) }}
                                                @method('POST')

        <div class="modal-body">
            <p><strong>Make sure you enter valid information</strong> .</p>
                     
                 <div class="form-group">
                <label class="col-lg-6 col-form-label">Date</label>

                <div class="col-lg-12">
                    <input type="date" name="adjusted_date"    value="{{ isset($member) ? $member->adjusted_date : date('Y-m-d')}}"  required class="form-control">

                    <input type="hidden" name="id" value="{{$id}}" required class="form-control">
                </div>
            </div>

              <div class="form-group">
                <label class="col-lg-6 col-form-label">Reason</label>

                <div class="col-lg-12">
                     <textarea type="text"   name="adjusted_reason" class="form-control mb-3">{{ !empty($member) ? $member->adjusted_reason : ''}}</textarea>

                  
                </div>
            </div>
           
           
   

        </div>
        <div class="modal-footer bg-whitesmoke br">
            <button class="btn btn-primary"  type="submit" id="save"><i class="icon-checkmark3 font-size-base mr-1"></i>Save</button>
            <button class="btn btn-link" data-dismiss="modal"><i class="icon-cross2 font-size-base mr-1"></i> Close</button>
        </div>
        {!! Form::close() !!}
    </div>
</div>