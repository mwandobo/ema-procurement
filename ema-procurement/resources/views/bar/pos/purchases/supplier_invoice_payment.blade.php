@extends('layout.master')

@section('head')
    <meta name="csrf-token" content="{{ csrf_token() }}">
@endsection

@section('content')
    <section class="section">
        <div class="section-body">
            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            @if ($errors->any())
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            @if ($reference_no && $invoice_main)
                <!-- Payment Form Section -->
                <div class="row">
                    <div class="col-12 mx-auto">
                        <div class="card">
                            <div class="card-header">
                                <h4>Supplier Payment</h4>
                            </div>
                            <div class="card-body" style="padding: 1.5rem;">
                                <div class="row">
                                    <!-- Left Column: Invoice Details -->
                                    <div class="col-md-4">
                                        <div class="card mb-3">
                                            <div class="card-body">
                                                <h6>Supplier Invoice</h6>
                                                <div class="mb-3">
                                                    <label class="form-label">Ref No</label>
                                                    <input type="text" class="form-control" value="{{ $invoice_main->reference_no }}" readonly>
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label">Supplier</label>
                                                    <input type="text" class="form-control" value="{{ $supplier_name }}" readonly>
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label">Supplier Date</label>
                                                    <input type="text" class="form-control" value="{{ $invoice_main->supplier_date }}" readonly>
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label">Purchase Date</label>
                                                    <input type="text" class="form-control" value="{{ $invoice_main->purchase_date }}" readonly>
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label">Amount</label>
                                                    <input type="text" class="form-control" value="{{ number_format($invoice_main->purchase_amount, 2) }} {{ $invoice_main->currency }}" readonly>
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label">Items</label>
                                                    <ol>
                                                        @foreach ($invoice_items as $item)
                                                            <li>{{ ucfirst($item->item_name) }}</li>
                                                        @endforeach
                                                    </ol>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Right Column: Payment Form -->
                                    <div class="col-md-8">
                                        <h6>Payment Details</h6>
                                        <div>
                                            <form id="paymentForm" action="{{ route('supplier_payment_process', ['reference_no' => $invoice_main->reference_no]) }}" method="POST" enctype="multipart/form-data">
                                                @csrf
                                                <input type="hidden" name="reference_no" value="{{ $invoice_main->reference_no }}">
                                                <div class="mb-3">
                                                    <label for="paymentMethodSupplier" class="form-label">Payment Method</label>
                                                    <select class="form-control custom-select" id="paymentMethodSupplier" name="payment_method" required>
                                                        <option value="" disabled selected>Select Payment Method</option>
                                                        <option value="bank_transfer">Bank Transfer</option>
                                                        <option value="cash">Cash</option>
                                                        <option value="mobile_money">Mobile Money</option>
                                                    </select>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="accountTypeSupplier" class="form-label">Account Type</label>
                                                    <select class="form-control custom-select" id="accountTypeSupplier" name="account_type" required>
                                                        <option value="" disabled selected>Select Account Type</option>
                                                        <option value="checking">Checking</option>
                                                        <option value="savings">Savings</option>
                                                        <option value="mobile_wallet">Mobile</option>
                                                    </select>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="accountNoSupplier" class="form-label">Account No</label>
                                                    <input type="text" class="form-control" id="accountNoSupplier" name="account_no" required>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="amountSupplier" class="form-label">Amount</label>
                                                    <input type="number" class="form-control" id="amountSupplier" name="amount" step="0.01" value="{{ number_format($invoice_main->purchase_amount, 2) }}" required>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="dateSupplier" class="form-label">Date</label>
                                                    <input type="date" class="form-control" id="dateSupplier" name="payment_date" value="{{ date('Y-m-d') }}" required>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="attachmentSupplier" class="form-label">Attachment</label>
                                                    <input type="file" class="form-control" id="attachmentSupplier" name="attachment">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="descriptionSupplier" class="form-label">Description</label>
                                                    <textarea class="form-control" id="descriptionSupplier" name="description" rows="4"></textarea>
                                                </div>
                                                <button type="submit" class="btn btn-primary">Submit Payment</button>
                                                <a href="{{ route('supplier.payment', ['reference_no' => $invoice_main->reference_no]) }}" class="btn btn-secondary">Cancel</a>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endif

            <!-- Payments Table Section -->
            <div class="row">
                <div class="col-12 col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Supplier Payments</h4>
                        </div>
                        <div class="card-body">
                            <div class="tab-content" id="myTab3Content">
                                <div class="tab-pane fade show active" id="home2" role="tabpanel" aria-labelledby="payment-tab">
                                    <div class="table-responsive">
                                        <table class="table table-striped datatable">
                                            <thead>
                                                <tr>
                                                    <th>Ref No</th>
                                                    <th>Payment Date</th>
                                                    {{-- <th>Supplier Name</th> --}}
                                                    <th>Payment Method</th>
                                                    <th>Account Type</th>
                                                    <th>Amount</th>
                                                    <th>Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($payments as $payment)
                                                    <tr>
                                                        <td>{{ $payment->reference_no }}</td>
                                                        <td>{{ $payment->created_at->format('Y-m-d') }}</td>
                                                        {{-- <td>{{ $payment->invoice && $payment->invoice->supplier ? $payment->invoice->supplier->name : 'Unknown Supplier' }}</td> --}}
                                                        <td><span class="badge bg-primary text-white">{{ ucfirst(str_replace('_', ' ', $payment->payment_method)) }}</span></td>                                                        <td>{{ ucfirst(str_replace('_', ' ', $payment->account_type)) }}</td>
                                                        <td>{{ number_format($payment->amount, 2) }} {{ $payment->invoice ? $payment->invoice->currency : 'TZS' }}</td>
                                                       <td>
    <a href="{{ route('payment.supplier_invoice.pdf', ['reference_no' => $payment->reference_no, 'id' => $payment->id]) }}"
       class="btn btn-sm btn-primary d-flex justify-content-center align-items-center p-1"
       style="width: 30px; height: 30px; border-radius: 0.3rem;">
        <i class="icon-download4" style="font-size: 16px;"></i>
    </a>
</td>




                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
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

@section('styles')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <style>
        .custom-select {
            padding: 0.5rem 1rem;
            font-size: 1rem;
            border-radius: 0.25rem;
            border: 1px solid #ced4da;
            background-color: #fff;
            transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
        }
        .custom-select:focus {
            border-color: #007bff;
            box-shadow: 0 0 0 0.25rem rgba(0, 123, 255, 0.25);
            outline: none;
        }
        .custom-select option {
            padding: 0.5rem;
        }
        .card-body {
            padding: 1.5rem;
        }
    </style>
@endsection

@section('scripts')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js" integrity="sha384-fbbOQedDUMZZ5KreZpsbe1LCZPVmfTnH7ois6mU1QK+m14rQ1l2bGBq41eYeM/fS" crossorigin="anonymous"></script>
    <script src="{{ url('assets/js/plugins/sweetalert/sweetalert.min.js') }}"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
    <script>
        @if ($reference_no && $invoice_main)
            document.getElementById('paymentForm')?.addEventListener('submit', function(e) {
                e.preventDefault();
                const formData = new FormData(this);
                const actionUrl = "{{ route('supplier_payment_process', ['reference_no' => $invoice_main->reference_no]) }}";

                fetch(actionUrl, {
                    method: 'POST',
                    body: formData,
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                        'Accept': 'application/json'
                    }
                })
                .then(response => {
                    if (!response.ok) {
                        return response.json().then(data => {
                            throw new Error(data.message || `HTTP ${response.status}: ${response.statusText}`);
                        }).catch(() => response.text().then(text => {
                            console.error('Response:', text);
                            throw new Error(`HTTP ${response.status}: ${text}`);
                        }));
                    }
                    return response.json();
                })
                .then(data => {
                    swal({
                        title: "Success",
                        text: data.message || "Payment recorded successfully!",
                        icon: "success",
                    }).then(() => {
                        window.location.href = data.redirect || '{{ route("supplier.payment", ["reference_no" => $invoice_main->reference_no]) }}';
                    });
                })
                .catch(error => {
                    console.error('Error:', error);
                    swal({
                        title: "Error",
                        text: `Payment failed: ${error.message}`,
                        icon: "error",
                    });
                });
            });
        @endif

        $(document).ready(function() {
            $('.datatable').DataTable({
                autoWidth: false,
                order: [[1, 'desc']],
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
        });
    </script>
@endsection