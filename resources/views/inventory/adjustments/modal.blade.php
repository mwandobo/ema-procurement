<div class="modal-content">
    <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Inventory Adjustment Details</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <div class="modal-body">
        <div class="table-responsive">
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>Item Name:</th>
                        <td> {{ $adjustment->batch->batch_code }} -  {{ $adjustment->batch->item->name }}</td>
                    </tr>
                    <tr>
                        <th>Adjustment Type:</th>
                        <td>
                            @if($adjustment->adjustment_type == 'add')
                            <span class="badge badge-success">Add Stock</span>
                            @else
                            <span class="badge badge-danger">Remove Stock</span>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>Quantity:</th>
                        <td>{{ abs($adjustment->quantity) }}</td>
                    </tr>
                    <tr>
                        <th>Previous Quantity:</th>
                        <td>{{ $adjustment->previous_quantity }}</td>
                    </tr>
                    <tr>
                        <th>New Quantity:</th>
                        <td>{{ $adjustment->new_quantity }}</td>
                    </tr>
                    <tr>
                        <th>Location:</th>
                        <td>{{ $adjustment->location->name }}</td>
                    </tr>
                    <tr>
                        <th>Adjusted By:</th>
                        <td>{{ $adjustment->user->name }}</td>
                    </tr>
                    <tr>
                        <th>Date:</th>
                        <td>{{ Carbon\Carbon::parse($adjustment->created_at)->format('M d, Y H:i') }}</td>
                    </tr>
                    <tr>
                        <th>Reason:</th>
                        <td>{{ $adjustment->reason ?? 'No reason provided' }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
    </div>
</div>