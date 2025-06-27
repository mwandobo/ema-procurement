@extends('layout.master')

@section('content')
    <section class="section">
        <div class="section-body">
            <div class="row">
                <div class="col-12 col-sm-12 col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 style="margin: 0;">Clearing Expenses {{ $reference_no ? '- ' . $reference_no : '' }}</h4>
                        </div>
                        <div class="card-body">
                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="show-tab" data-bs-toggle="tab" href="#show" role="tab" aria-controls="show" aria-selected="true">Show</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="add-edit-tab" data-bs-toggle="tab" href="#add-edit" role="tab" aria-controls="add-edit" aria-selected="false">Add/Edit</a>
                                </li>
                            </ul>
                            <div class="tab-content tab-bordered">
                                <!-- Show Tab -->
                                <div class="tab-pane fade show active" id="show" role="tabpanel" aria-labelledby="show-tab">
                                    <div class="table-responsive">
                                        <table class="table datatable-basic table-striped">
                                            <thead>
                                                <tr>
                                                    <th>Reference No</th>
                                                    <th>Clearing Cost</th>
                                                    <th>Shipping Cost</th>
                                                    <th>Items & Taxes</th>
                                                    <th>Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($invoices as $invoice)
                                                    <tr>
                                                        <td>{{ $invoice->reference_no }}</td>
                                                        <td>{{ number_format($invoice->clearing_cost ?? 0, 2) }}</td>
                                                        <td>{{ number_format($invoice->shipping_cost ?? 0, 2) }}</td>
                                                        <td>
                                                            @php
                                                                $clearingItems = \App\Models\Bar\POS\SupplierClearingItem::where('expense_id', $invoice->id)
                                                                    ->select('item_name', 'item_tax')
                                                                    ->get();
                                                            @endphp
                                                            @if ($clearingItems->isNotEmpty())
                                                                <ul class="list-unstyled mb-0">
                                                                    @foreach ($clearingItems as $item)
                                                                        <li>{{ $item->item_name }} - {{ number_format($item->item_tax ?? 0, 2) }}</li>
                                                                    @endforeach
                                                                </ul>
                                                            @else
                                                                No items
                                                            @endif
                                                        </td>
                                                        <td>
                                                            {{-- <a href="{{ route('clearing.expense.edit', ['id' => $invoice->id]) }}" class="btn btn-sm btn-primary">Edit</a> --}}
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <!-- Add/Edit Tab -->
                                <div class="tab-pane fade" id="add-edit" role="tabpanel" aria-labelledby="add-edit-tab">
                                    <form id="clearingExpenseForm" action="{{ $invoice && !empty($reference_no) ? route('clearing.expense.update', ['id' => $invoice->id]) : route('clearing.expense.save') }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label for="reference_no" class="form-label">Reference No</label>
                                                    <input type="text" class="form-control" id="reference_no" name="reference_no" value="{{ $invoice && !empty($reference_no) ? $reference_no : '' }}" {{ $invoice && !empty($reference_no) ? 'readonly' : '' }} required>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="clearing_cost" class="form-label">Clearing Cost</label>
                                                    <input type="number" step="0.01" class="form-control" id="clearing_cost" name="clearing_cost" value="{{ $invoice && !empty($reference_no) ? $invoice->clearing_cost : '' }}" required>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="shipping_cost" class="form-label">Shipping Cost</label>
                                                    <input type="number" step="0.01" class="form-control" id="shipping_cost" name="shipping_cost" value="{{ $invoice && !empty($reference_no) ? $invoice->shipping_cost : '' }}" required>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <h6>Items</h6>
                                                <div class="table-responsive">
                                                    <table class="table table-bordered">
                                                        <thead>
                                                            <tr>
                                                                <th>Item Name</th>
                                                                <th>Tax</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @foreach ($items as $item)
                                                                <tr>
                                                                    <td>{{ $item->item_name }}</td>
                                                                    <td>
                                                                        <input type="number" step="0.01" class="form-control" name="item_tax[{{ $item->id }}]" value="{{ $invoice && !empty($reference_no) && $item->item_tax ? $item->item_tax : '' }}">
                                                                    </td>
                                                                </tr>
                                                            @endforeach
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                        <button type="submit" class="btn btn-primary">Save</button>
                                        <a href="{{ route('clearing.tracking') }}" class="btn btn-secondary">Cancel</a>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

@section('styles')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <style>
        .custom-select, .form-control {
            padding: 0.5rem 1rem;
            font-size: 1rem;
            border-radius: 0.25rem;
            border: 1px solid #ced4da;
            transition: border-color 0.2s ease-in-out, box-shadow 0.2s ease-in-out;
        }
        .custom-select:focus, .form-control:focus {
            border-color: #007bff;
            box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, 0.25);
            outline: none;
        }
        .card-body {
            padding: 1.5rem;
        }
        .list-unstyled li {
            margin-bottom: 0.5rem;
        }
    </style>
@endsection

@section('scripts')
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js" integrity="sha384-fbbOQedDUMZZ5KreZpsbe1LCZPVmfTnH7ois6mU1QK+m14rQ1l2bGBq41eYeM/fS" crossorigin="anonymous"></script>
    <script src="{{ url('assets/js/plugins/sweetalert/sweetalert.min.js') }}"></script>
    <script>
        document.getElementById('clearingExpenseForm')?.addEventListener('submit', function(e) {
            e.preventDefault();
            const formData = new FormData(this);
            fetch(this.action, {
                method: 'POST',
                body: formData,
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    'Accept': 'application/json'
                }
            })
            .then(response => {
                if (!response.ok) {
                    return response.json().then(data => { throw new Error(data.message || 'Network response was not ok'); });
                }
                return response.json();
            })
            .then(data => {
                swal({
                    title: "Success",
                    text: data.message,
                    icon: "success",
                }).then(() => {
                    window.location.href = '{{ route("clearing.tracking") }}';
                });
                this.reset();
            })
            .catch(error => {
                swal({
                    title: "Error",
                    text: "Failed to save: " + error.message,
                    icon: "error",
                });
            });
        });

        $('.datatable-basic').DataTable({
            autoWidth: false,
            order: [[0, 'desc']],
            dom: '<"datatable-header"fl><"datatable-scroll"t><"datatable-footer"ip>',
            language: {
                search: '<span>Filter:</span> _INPUT_',
                searchPlaceholder: 'Type to filter...',
                lengthMenu: '<span>Show:</span> _MENU_',
                paginate: {
                    'first': 'First',
                    'last': 'Last',
                    'next': $('html').attr('dir') == 'rtl' ? '←' : '→',
                    'previous': $('html').attr('dir') == 'rtl' ? '→' : '←'
                }
            }
        });

        // Clear form when clicking Add/Edit tab unless editing
        document.getElementById('add-edit-tab').addEventListener('click', function() {
            @if (!$invoice || empty($reference_no))
                document.getElementById('clearingExpenseForm').reset();
                document.getElementById('reference_no').removeAttribute('readonly');
            @endif
        });
    </script>
@endsection