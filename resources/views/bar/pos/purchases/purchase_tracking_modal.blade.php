<div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="formModal">Purchase Order Details</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-12 ">
                        <div class="table-responsive">
                            <table class="table datatable-basic2 table-striped">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>PO</th>
                                        <th>Date</th>
                                        <th>Remark</th>
                                        <th>Description</th>
                                        <th>Qty</th>
                                        <th>UOM</th>
                                        <th>Containers</th>
                                        <th>Status</th>
                                        <th>ETD</th>
                                        <th>BL</th>
                                        <th>ETA</th>
                                        <th>P Value</th>
                                        <th>Remark 2</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if (!empty($list))
                                        @foreach ($list as $row)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $row->po }}</td>
                                                <td>{{ $row->date }}</td>
                                                <td>{{ $row->remark }}</td>
                                                <td>{{ $row->description }}</td>
                                                <td>{{ $row->qty }}</td>
                                                <td>{{ $row->uom }}</td>
                                                <td>{{ $row->containers }}</td>
                                                <td>{{ $row->status }}</td>
                                                <td>{{ $row->ETD }}</td>
                                                <td>{{ $row->BL }}</td>
                                                <td>{{ $row->ETA }}</td>
                                                <td>{{ $row->p_value }}</td>
                                                <td>{{ $row->remark_2 }}</td>
                                            </tr>
                                        @endforeach
                                    @else
                                        <tr>
                                            <td colspan="14" class="text-center">No purchase orders available.</td>
                                        </tr>
                                    @endif
                                </tbody>
                            </table>
                            <div class="modal-footer">
                                <button class="btn btn-link" data-dismiss="modal">
                                    <i class="icon-cross2 font-size-base mr-1"></i> Close
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

