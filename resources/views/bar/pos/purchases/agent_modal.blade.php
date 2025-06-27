<div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="formModal">Clearing Tracking Details</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>

        <div class="modal-body">
        
              @php
                  $name_supplier = \App\Models\Bar\POS\Agent::find($check_supplier->agent_id);
            @endphp


              @if($check_supplier && $check_supplier->agent_id)
                <div class="alert alert-success">
                    Agent already assigned:
                    <strong>
                        {{ optional($check_supplier->supplier)->supplier_name ?? '' . $name_supplier ->name}}
                    </strong>
                </div>
            @endif


            <form action="{{ route('clearing_tracking.assign_supplier') }}" method="POST">
                @csrf
               
                  <div class="form-group"> 
                    <input type="hidden" name="id" value="{{ $id }}"/>
                  </div>
                
                <div class="form-group">
                    <label for="supplier_id">Select Supplier</label>
                    <select name="agent_id" id="agent_id" class="form-control" required>
                        <option value="">-- Choose Supplier --</option>
                        @foreach($list as $row)
                            <option value="{{ $row->id }}">{{ $row->supplier_name ?? $row->name }}</option>
                        @endforeach
                    </select>
                </div>

                {{-- Add more form fields here if needed --}}

                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <button class="btn btn-link" data-dismiss="modal">
                        <i class="icon-cross2 font-size-base mr-1"></i> Close
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

