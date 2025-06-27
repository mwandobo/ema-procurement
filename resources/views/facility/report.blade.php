<div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="formModal">Mechanical Report </h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
      {{ Form::open(['route' => 'maintainance.report']) }}
             @method('POST')
        <div class="modal-body">
          
                     
                 <a href="javascript:void(0);" id="add_more" class="addCF" style="color: #057df5;font-weight:bold;"> &nbsp; Click to Add  Item</a><br>
                                            <br>
                                            <div class="table-responsive">

                                            <table class="table table-bordered" id="inventory">
                                                <thead>
                                                    <tr>
                                                        <th>Inventory Item</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody >


                                                </tbody>
                                               

                                            </table>
</div>
 <input type="hidden" name="maintainance_id" value="{{ $id }}"required />
                                                                
 <div class="form-group row">
    <label class="col-lg-2 col-form-label">Date</label>
    <div class="col-lg-4">
        <input type="date" name="date"
            placeholder="0 if does not exist"
            value=""
            class="form-control" required>
    </div>                                                          
 </div>                                                     

        </div>
        <div class="modal-footer bg-whitesmoke br">
            <button type="submit" class="btn btn-primary">Save</button>
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
        {!! Form::close() !!}
    </div>
</div>