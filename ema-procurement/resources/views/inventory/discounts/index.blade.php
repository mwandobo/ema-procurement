@extends('layout.master')

@section('content')
<section class="section">
    <div class="section-body">
        <div class="row">
            <div class="col-12 col-sm-6 col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Batch Discounts</h4>
                    </div>
                    <div class="card-body">
                        <ul class="nav nav-tabs" id="myTab2" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link {{ !isset($editDiscount) ? 'active show' : '' }}" id="home-tab2" data-toggle="tab"
                                    href="#home2" role="tab" aria-controls="home" aria-selected="{{ !isset($editDiscount) ? 'true' : 'false' }}">Discount
                                    List</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link {{ isset($editDiscount) ? 'active show' : '' }}" id="profile-tab2"
                                    data-toggle="tab" href="#profile2" role="tab" aria-controls="profile"
                                    aria-selected="{{ isset($editDiscount) ? 'true' : 'false' }}">{{ isset($editDiscount) ? 'Edit Discount' : 'New Discount' }}</a>
                            </li>
                        </ul>
                        <div class="tab-content tab-bordered" id="myTab3Content">
                            <div class="tab-pane fade {{ !isset($editDiscount) ? 'active show' : '' }}" id="home2" role="tabpanel"
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
                                                    style="width: 106.484px;">Name</th>
                                                <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0"
                                                    rowspan="1" colspan="1"
                                                    aria-label="Engine version: activate to sort column ascending"
                                                    style="width: 101.219px;">Product/Batch</th>
                                                <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0"
                                                    rowspan="1" colspan="1"
                                                    aria-label="Engine version: activate to sort column ascending"
                                                    style="width: 101.219px;">Type</th>
                                                <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0"
                                                    rowspan="1" colspan="1"
                                                    aria-label="Engine version: activate to sort column ascending"
                                                    style="width: 101.219px;">Value</th>
                                                <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0"
                                                    rowspan="1" colspan="1"
                                                    aria-label="CSS grade: activate to sort column ascending"
                                                    style="width: 98.1094px;">Min - Max Quantity</th>
                                                <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0"
                                                    rowspan="1" colspan="1"
                                                    aria-label="CSS grade: activate to sort column ascending"
                                                    style="width: 98.1094px;">Status</th>
                                                <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0"
                                                    rowspan="1" colspan="1"
                                                    aria-label="CSS grade: activate to sort column ascending"
                                                    style="width: 98.1094px;">Valid Period</th>
                                                <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0"
                                                    rowspan="1" colspan="1"
                                                    aria-label="CSS grade: activate to sort column ascending"
                                                    style="width: 98.1094px;">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @if(!@empty($discounts))
                                            @foreach ($discounts as $row)
                                            <tr class="gradeA even" role="row">
                                                <th>{{ $loop->iteration }}</th>
                                                <td>{{ $row->name }}</td>
                                                <td>{{ $row->batch->batch_code }}
                                                    <p class="mb-0 text-muted"> {{ $row->batch->item->name }}</p>
                                                </td>
                                                <td>
                                                    @if($row->discount_type == 'percentage')
                                                    <span>Percentage</span>
                                                    @else
                                                    <span>Fixed Amount</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    @if($row->discount_type == 'percentage')
                                                    {{ $row->value }}%
                                                    @else
                                                    {{ number_format($row->value, 2) }}
                                                    @endif
                                                </td>
                                                <td>{{ $row->min_quantity }} @if($row->max_quantity) - {{ $row->max_quantity }} @endif</td>
                                                <td>
                                                    @if($row->is_active && $row->isValid())
                                                    <span class="badge badge-success">Active</span>
                                                    @else
                                                    <span class="badge badge-danger">Inactive</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    {{ $row->start_date->format('M d, Y') }} 
                                                    @if($row->end_date)
                                                    - {{ $row->end_date->format('M d, Y') }}
                                                    @else
                                                    - No End Date
                                                    @endif
                                                </td>
                                                <td>
                                                    <div class="form-inline">
                                                        <a class="list-icons-item text-info" 
                                                            href="{{ route('inventory.discounts.edit', $row->id) }}" title="Edit">
                                                            <i class="icon-pencil7"></i>
                                                        </a>
                                                        <form action="{{ route('inventory.discounts.destroy', $row->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Are you sure you want to delete?')">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="list-icons-item text-danger ml-2" title="Delete" style="background:none; border:none; cursor:pointer;">
                                                                <i class="icon-trash"></i>
                                                            </button>
                                                        </form>
                                                        
                                                    </div>
                                                </td>
                                            </tr>
                                            @endforeach
                                            @endif
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="tab-pane fade {{ isset($editDiscount) ? 'active show' : '' }}" id="profile2" role="tabpanel"
                                aria-labelledby="profile-tab2">

                                <div class="card">
                                    <div class="card-header">
                                        <h5>{{ isset($editDiscount) ? 'Edit Discount' : 'Create New Discount' }}</h5>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-sm-12 ">
                                                @if(isset($editDiscount))
                                                    {{ Form::open(['route' => ['inventory.discounts.update', $editDiscount->id]]) }}
                                                    @method('PUT')
                                                @else
                                                    {{ Form::open(['route' => 'inventory.discounts.store']) }}
                                                    @method('POST')
                                                @endif

                                                <div class="form-group row">
                                                    <label class="col-lg-2 col-form-label">Discount Name</label>
                                                    <div class="col-lg-10">
                                                        <input type="text" name="name" class="form-control" required 
                                                        value="{{ isset($editDiscount) ? $editDiscount->name : old('name') }}"
                                                        placeholder="e.g. Summer Sale, Clearance, Volume Discount">
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label class="col-lg-2 col-form-label">Batch</label>
                                                    <div class="col-lg-10">
                                                        <select class="form-control m-b" name="batch_id" required id="batch_id" style="width: 100% !important">
                                                            <option value="">Select Batch</option>
                                                            @if(!empty($batches))
                                                            @foreach($batches as $batch)
                                                                <option value="{{ $batch->id }}" {{ isset($editDiscount) && $editDiscount->batch_id == $batch->id ? 'selected' : '' }}>
                                                                    {{ $batch->batch_code }} - {{ $batch->item->name }} 
                                                                    (Current Price: {{ number_format($batch->selling_price, 2) }})
                                                                </option>
                                                            @endforeach
                                                            @endif
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label class="col-lg-2 col-form-label">Discount Type</label>
                                                    <div class="col-lg-4">
                                                        <select class="form-control m-b" name="discount_type" required id="discount_type" style="width: 100% !important">
                                                            <option value="">Select Type</option>
                                                            <option value="percentage" {{ isset($editDiscount) && $editDiscount->discount_type == 'percentage' ? 'selected' : '' }}>Percentage (%)</option>
                                                            <option value="fixed" {{ isset($editDiscount) && $editDiscount->discount_type == 'fixed' ? 'selected' : '' }}>Fixed Amount</option>
                                                        </select>
                                                    </div>
                                                
                                                    <label class="col-lg-2 col-form-label">Value</label>
                                                    <div class="col-lg-4">
                                                        <div class="input-group">
                                                            <input type="number" name="value" class="form-control" 
                                                                value="{{ isset($editDiscount) ? $editDiscount->value : old('value') }}"
                                                                min="0" step="0.01" required>
                                                            <div class="input-group-append" id="value-addon">
                                                                <span class="input-group-text" id="discount-type-symbol"></span>
                                                            </div>
                                                        </div>
                                                        <small class="form-text text-muted" id="value-help"></small>
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label class="col-lg-2 col-form-label">Min Quantity</label>
                                                    <div class="col-lg-4">
                                                        <input type="number" name="min_quantity" class="form-control" min="1" step="0.01" 
                                                            value="{{ isset($editDiscount) ? $editDiscount->min_quantity : old('min_quantity', 1) }}" required>
                                                        <small class="form-text text-muted">Minimum quantity required for discount</small>
                                                    </div>
                                                
                                                    <label class="col-lg-2 col-form-label">Max Quantity</label>
                                                    <div class="col-lg-4">
                                                        <input type="number" name="max_quantity" class="form-control" min="0" step="0.01"
                                                            value="{{ isset($editDiscount) ? $editDiscount->max_quantity : old('max_quantity') }}">
                                                        <small class="form-text text-muted">Leave empty for no maximum limit</small>
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label class="col-lg-2 col-form-label">Start Date</label>
                                                    <div class="col-lg-4">
                                                        <input type="date" name="start_date" class="form-control" 
                                                            value="{{ isset($editDiscount) ? $editDiscount->start_date->format('Y-m-d') : old('start_date', date('Y-m-d')) }}" required>
                                                    </div>
                                                
                                                    <label class="col-lg-2 col-form-label">End Date</label>
                                                    <div class="col-lg-4">
                                                        <input type="date" name="end_date" class="form-control"
                                                            value="{{ isset($editDiscount) && $editDiscount->end_date ? $editDiscount->end_date->format('Y-m-d') : old('end_date') }}">
                                                        <small class="form-text text-muted">Leave empty for no end date</small>
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label class="col-lg-2 col-form-label">Status</label>
                                                    <div class="col-lg-10">
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" name="is_active" id="is_active" value="1" 
                                                                {{ isset($editDiscount) && $editDiscount->is_active ? 'checked' : (!isset($editDiscount) ? 'checked' : '') }}>
                                                            <label class="form-check-label" for="is_active">
                                                                Active
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <div class="col-lg-offset-2 col-lg-12">
                                                        <button class="btn btn-sm btn-primary float-right m-t-n-xs" type="submit" id="save">Save</button>
                                                        @if(isset($editDiscount))
                                                            <a href="{{ route('inventory.discounts.index') }}" class="btn btn-sm btn-danger float-right m-t-n-xs mr-2">Cancel</a>
                                                        @endif
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

        // Update discount type symbol
        $('#discount_type').change(function() {
            updateDiscountSymbol();
        });

        function updateDiscountSymbol() {
            const type = $('#discount_type').val();
            if (type === 'percentage') {
                $('#discount-type-symbol').text('%');
                $('#value-help').text('Enter percentage value (e.g. 10 for 10% off)');
            } else if (type === 'fixed') {
                $('#discount-type-symbol').text('$');
                $('#value-help').text('Enter fixed amount to discount');
            } else {
                $('#discount-type-symbol').text('');
                $('#value-help').text('');
            }
        }

        // Initialize on page load
        updateDiscountSymbol();
    });
</script>
@endsection
