@extends('layout.master')

@section('content')
<section class="section">
    <div class="section-body">
        <div class="row">
            <div class="col-12 col-sm-6 col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Inventory Adjustments</h4>
                    </div>
                    <div class="card-body">
                        <ul class="nav nav-tabs" id="myTab2" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active show" id="home-tab2" data-toggle="tab"
                                    href="#home2" role="tab" aria-controls="home" aria-selected="true">Inventory Adjustment
                                    List</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="profile-tab2"
                                    data-toggle="tab" href="#profile2" role="tab" aria-controls="profile"
                                    aria-selected="false">New Inventory Adjustment</a>
                            </li>
                        </ul>
                        <div class="tab-content tab-bordered" id="myTab3Content">
                            <div class="tab-pane fade active show" id="home2" role="tabpanel"
                                aria-labelledby="home-tab2">
                                <div class="table-responsive">
                                    <table class="table datatable-basic table-striped">
                                        <thead>
                                            <tr role="row">
                                                <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0"
                                                    rowspan="1" colspan="1"
                                                    aria-label="Browser: activate to sort column ascending"
                                                    style="width: 28.531px;">#</th>
                                                <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0"
                                                    rowspan="1" colspan="1"
                                                    aria-label="Platform(s): activate to sort column ascending"
                                                    style="width: 106.484px;">Date</th>
                                                <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0"
                                                    rowspan="1" colspan="1"
                                                    aria-label="Engine version: activate to sort column ascending"
                                                    style="width: 101.219px;">Item</th>
                                                <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0"
                                                    rowspan="1" colspan="1"
                                                    aria-label="Engine version: activate to sort column ascending"
                                                    style="width: 101.219px;">Type</th>
                                                <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0"
                                                    rowspan="1" colspan="1"
                                                    aria-label="Engine version: activate to sort column ascending"
                                                    style="width: 101.219px;">Quantity</th>
                                                <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0"
                                                    rowspan="1" colspan="1"
                                                    aria-label="CSS grade: activate to sort column ascending"
                                                    style="width: 98.1094px;">Location</th>
                                                <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0"
                                                    rowspan="1" colspan="1"
                                                    aria-label="CSS grade: activate to sort column ascending"
                                                    style="width: 98.1094px;">Staff</th>
                                                <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0"
                                                    rowspan="1" colspan="1"
                                                    aria-label="CSS grade: activate to sort column ascending"
                                                    style="width: 98.1094px;">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @if(!@empty($adjustments))
                                            @foreach ($adjustments as $row)
                                            <tr class="gradeA even" role="row">
                                                <th>{{ $loop->iteration }}</th>
                                                <td>{{Carbon\Carbon::parse($row->created_at)->format('M d, Y')}}</td>
                                                <td class="text-nowrap"> {{$row->batch->batch_code}} -{{$row->batch->item->name}}</td>
                                                <td>
                                                    @if($row->adjustment_type == 'add')
                                                    <span class="badge badge-success">Add Stock</span>
                                                    @else
                                                    <span class="badge badge-danger">Remove Stock</span>
                                                    @endif
                                                </td>
                                                <td>{{ abs($row->quantity) }}</td>
                                                <td>{{$row->location->name}}</td>
                                                <td>{{$row->user->name}}</td>
                                                <td>
                                                    <div class="form-inline">
                                                        <a class="list-icons-item text-primary" 
                                                            href="{{ route('inventory.adjustments.show', $row->id) }}" 
                                                            data-toggle="modal" data-target="#viewModal" 
                                                            onclick="model({{ $row->id }}, 'adjustment')">
                                                            <i class="icon-eye"></i> View
                                                        </a>
                                                    </div>
                                                </td>
                                            </tr>
                                            @endforeach
                                            @endif
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="profile2" role="tabpanel"
                                aria-labelledby="profile-tab2">

                                <div class="card">
                                    <div class="card-header">
                                        <h5>Add New Inventory Adjustment</h5>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-sm-12 ">
                                                {{ Form::open(['route' => 'inventory.adjustments.store']) }}
                                                @method('POST')

                                                <div class="form-group row">
                                                    <label class="col-lg-2 col-form-label">Item</label>
                                                    <div class="col-lg-4">
                                                        <select class="form-control m-b" name="batch_id" required id="batch_id" style="width: 100% !important">
                                                            <option value="">Select Item</option>
                                                            @if(!empty($items))
                                                            @foreach($items as $item)
                                                                @foreach($item->batches as $batch)
                                                                    <option value="{{ $batch->id }}">
                                                                        {{ $batch->batch_code }} - {{ $item->name }}
                                                                    </option>
                                                                @endforeach
                                                            @endforeach
                                                            @endif
                                                        </select>
                                                    </div>
                                                
                                                    <label class="col-lg-2 col-form-label">Location</label>
                                                    <div class="col-lg-4">
                                                        <select class="form-control m-b" name="location_id" required id="location_id" style="width: 100% !important">
                                                            <option value="">Select Location</option>

                                                            @php
                                                                $mainLocations = $locations->where('main', 1);
                                                                $otherLocations = $locations->where('main', 0);
                                                            @endphp

                                                            @if($mainLocations->count())
                                                                <optgroup  label="Main Stores">
                                                                    @foreach($mainLocations as $row)
                                                                        <option value="{{ $row->id }}">
                                                                            {{ $row->name }}
                                                                        </option>
                                                                    @endforeach
                                                                </optgroup>
                                                            @endif

                                                            @if($otherLocations->count())
                                                                <optgroup label="Other Stores">
                                                                    @foreach($otherLocations as $row)
                                                                        <option value="{{ $row->id }}">
                                                                            {{ $row->name }}
                                                                        </option>
                                                                    @endforeach
                                                                </optgroup>
                                                            @endif
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label class="col-lg-2 col-form-label">Adjustment Type</label>
                                                    <div class="col-lg-4">
                                                        <select class="form-control m-b" name="adjustment_type" required id="adjustment_type" style="width: 100% !important">
                                                            <option value="">Select Type</option>
                                                            <option value="add">Add Stock</option>
                                                            <option value="remove">Remove Stock</option>
                                                        </select>
                                                    </div>
                                                
                                                    <label class="col-lg-2 col-form-label">Quantity</label>
                                                    <div class="col-lg-4">
                                                        <input type="number" name="quantity" class="form-control" min="1" required>
                                                        <div class="errors" id="quantity_error" style="text-align:center;color:red;"></div>
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label class="col-lg-2 col-form-label">Reason</label>
                                                    <div class="col-lg-10">
                                                        <textarea name="reason" class="form-control" rows="3" required 
                                                        placeholder="Expiry, transfer, damage, restock, inventory correction, etc."></textarea>
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <div class="col-lg-offset-2 col-lg-12">
                                                        <button class="btn btn-sm btn-primary float-right m-t-n-xs" type="submit" id="save">Save</button>
                                                    </div>
                                                </div>
                                                {!! Form::close() !!}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- View Modal -->
<div class="modal fade" id="viewModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
    </div>
</div>

@endsection

@section('scripts')
<script>
    $('.datatable-basic').DataTable({
        autoWidth: false,
        "columnDefs": [
            {"targets": [3]}
        ],
        dom: '<"datatable-header"fl><"datatable-scroll"t><"datatable-footer"ip>',
        "language": {
            search: '<span>Filter:</span> _INPUT_',
            searchPlaceholder: 'Type to filter...',
            lengthMenu: '<span>Show:</span> _MENU_',
            paginate: { 'first': 'First', 'last': 'Last', 'next': $('html').attr('dir') == 'rtl' ? '&larr;' : '&rarr;', 'previous': $('html').attr('dir') == 'rtl' ? '&rarr;' : '&larr;' }
        },
    });
</script>

<script>
    $(document).ready(function() {
        // Initialize select2
        $('.m-b').select2({
            // Options
        });
    });
</script>

<script type="text/javascript">
    function model(id, type) {
        $.ajax({
            type: 'GET',
            url: '{{ route("inventory.adjustments.modal") }}',
            data: {
                'id': id,
                'type': type,
            },
            cache: false,
            async: true,
            success: function(data) {
                $('.modal-dialog').html(data);
            },
            error: function(error) {
                $('#viewModal').modal('toggle');
            }
        });
    }
</script>
@endsection