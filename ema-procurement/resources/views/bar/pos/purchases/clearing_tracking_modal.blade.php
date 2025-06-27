<div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="formModal">Clearing Tracking Details</h5>
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
                                        <th>Supplier</th>
                                        <th>PADM</th>
                                        <th>Invoice Date</th>
                                        <th>BL No</th>
                                        <th>Description</th>
                                        <th>Containers</th>
                                        <th>Ship Name</th>
                                        <th>ETA</th>
                                        <th>Copies</th>
                                        <th>Hard Copies</th>
                                        <th>Print Received</th>
                                        <th>TRA Assessment</th>
                                        <th>Remark</th>
                                        <th>ETD</th>
                                        <th>ICD</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($list as $row)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $row->po }}</td>
                                        <td>{{ $row->supplier_name }}</td>
                                        <td>{{ $row->padm }}</td>
                                        <td>{{ $row->invoice_date }}</td>
                                        <td>{{ $row->bl_no }}</td>
                                        <td>{{ $row->product_description }}</td>
                                        <td>{{ $row->no_of_container }}</td>
                                        <td>{{ $row->ship_name }}</td>
                                        <td>{{ $row->eta }}</td>
                                        <td>{{ $row->copies }}</td>
                                        <td>{{ $row->hard_copies }}</td>
                                        <td>{{ $row->print_receive }}</td>
                                        <td>{{ $row->tra_assessment }}</td>
                                        <td>{{ $row->remark }}</td>
                                        <td>{{ $row->etd }}</td>
                                        <td>{{ $row->icd }}</td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td colspan="17" class="text-center">No purchase orders available.</td>
                                    </tr>
                                    @endforelse
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
