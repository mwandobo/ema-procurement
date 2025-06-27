@extends('layout.master')

@section('content')
    <section class="section">
        <div class="section-body">
            <div class="row">
                <div class="col-12 mx-auto">
                    <div class="card">
                        <div class="card-header">
                            <h4>Clearing Agent Payment</h4>
                        </div>
                        <div class="card-body" style="padding: 1.5rem;">
                            <div class="row">
                                <!-- Left Column: Ref No and Clearing Expense -->
                                <div class="col-md-4">
                                    <div class="card mb-3">
                                        <div class="card-body">
                                            <h6>Invoice Details</h6>
                                            <div class="mb-3">
                                                <label class="form-label">Ref No</label>
                                                <input type="text" class="form-control" value="{{ $reference_no ?? 'INV-123' }}" readonly>
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">Clearing Expense</label>
                                                <input type="text" class="form-control" value="{{ number_format($clearing_expense ?? 1000, 2) }}" readonly>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Right Column: Payment Form -->
                                <div class="col-md-8">
                                    <h6>Payment Details</h6>
                                    <div style="overflow-y: auto; padding-right: 1rem;">
                                        <form id="clearingAgentPaymentForm" enctype="multipart/form-data">
                                            @csrf
                                            <input type="hidden" name="reference_no" value="{{ $reference_no ?? 'INV-123' }}">
                                            <div class="mb-3">
                                                <label for="paymentMethodAgent" class="form-label">Payment Method</label>
                                                <select class="form-select custom-select" id="paymentMethodAgent" name="payment_method" required>
                                                    <option value="" disabled selected>Select Payment Method</option>
                                                    <option value="bank_transfer">Bank Transfer</option>
                                                    <option value="cash">Cash</option>
                                                    <option value="mobile_money">Mobile Money</option>
                                                </select>
                                            </div>
                                            <div class="mb-3">
                                                <label for="accountTypeAgent" class="form-label">Account Type</label>
                                                <select class="form-select custom-select" id="accountTypeAgent" name="account_type" required>
                                                    <option value="" disabled selected>Select Account Type</option>
                                                    <option value="checking">NMB</option>
                                                    <option value="savings">CRDB</option>
                                                    <option value="mobile_wallet">Lipa Number</option>
                                                </select>
                                            </div>
                                            <div class="mb-3">
                                                <label for="accountNoAgent" class="form-label">Account No</label>
                                                <input type="text" class="form-control" id="accountNoAgent" name="account_no" required>
                                            </div>
                                            <div class="mb-3">
                                                <label for="amountAgent" class="form-label">Amount</label>
                                                <input type="number" class="form-control" id="amountAgent" name="amount" step="0.01" required>
                                            </div>
                                            <div class="mb-3">
                                                <label for="dateAgent" class="form-label">Date</label>
                                                <input type="date" class="form-control" id="dateAgent" name="payment_date" value="2025-06-02" required>
                                            </div>
                                            <div class="mb-3">
                                                <label for="attachmentAgent" class="form-label">Attachment</label>
                                                <input type="file" class="form-control" id="attachmentAgent" name="attachment">
                                            </div>
                                            <div class="mb-3">
                                                <label for="descriptionAgent" class="form-label">Description</label>
                                                <textarea class="form-control" id="descriptionAgent" name="description" rows="4"></textarea>
                                            </div>
                                            <button type="submit" class="btn btn-primary">Submit Payment</button>
                                            <a href="{{ route('payment.clearing_agent', ['reference_no' => $reference_no ?? 'INV-123']) }}" class="btn btn-secondary">Cancel</a>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Clearing Payments Section -->
            <div class="section-body">
                <div class="row">
                    <div class="col-12 col-sm-6 col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 style="margin: 0;">Clearing Payments</h4>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    @if ($payments->isEmpty())
                                        <p>No clearing payments found for reference number {{ $reference_no ?? 'N/A' }}.</p>
                                    @else
                                        <table class="table datatable-basic table-striped">
                                            <thead>
                                                <tr>
                                                    <th>Ref No</th>
                                                    <th>Payment Date</th>
                                                    <th>Supplier Name</th>
                                                    <th>Amount</th>
                                                    <th>Payment Method</th>
                                                    <th>Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($payments as $payment)
                                                    <tr>
                                                        <td>{{ $payment->reference_no }}</td>
                                                        <td>{{ $payment->payment_date ? $payment->payment_date->format('Y-m-d') : 'N/A' }}</td>
                                                        <td>{{ $payment->invoice->supplier->name ?? 'N/A' }}</td>
                                                        <td>{{ number_format($payment->amount, 2) }}</td>
                                                        <td>{{ ucfirst(str_replace('_', ' ', $payment->payment_method)) }}</td>
                                                        <td>
                                                            <a href="{{ route('download.clearing_payment_pdf', ['reference_no' => $payment->reference_no, 'id' => $payment->id]) }}" class="btn btn-sm btn-info">Download PDF</a>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
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
            transition: border-color 0.2s ease-in-out, box-shadow 0.2s ease-in-out;
        }
        .custom-select:focus {
            border-color: #007bff;
            box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, 0.25);
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
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js" integrity="sha384-fbbOQedDUMZZ5KreZpsbe1LCZPVmfTnH7ois6mU1QK+m14rQ1l2bGBq41eYeM/fS" crossorigin="anonymous"></script>
    <script src="{{ url('assets/js/plugins/sweetalert/sweetalert.min.js') }}"></script>
    <script>
        document.getElementById('clearingAgentPaymentForm').addEventListener('submit', function(e) {
            e.preventDefault();
            var formData = new FormData(this);
            fetch('{{ route("process.clearing_payment", ["reference_no" => $reference_no ?? "INV-123"]) }}', {
                method: 'POST',
                body: formData,
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                }
            })
            .then(response => response.json())
            .then(data => {
                swal({
                    title: "Success",
                    text: data.message,
                    icon: "success",
                }).then(() => {
                    window.location.href = data.redirect;
                });
                this.reset();
            })
            .catch(error => {
                swal({
                    title: "Error",
                    text: "Payment failed: " + error,
                    icon: "error",
                });
            });
        });

        $('.datatable-basic').DataTable({
            autoWidth: false,
            order: [[1, 'desc']],
            columnDefs: [{ targets: [5], orderable: false }],
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
    </script>
@endsection