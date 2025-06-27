@extends('layout.master')

@section('content')
    <section class="section">
        <div class="section-body">
            <div class="row">
                <div class="col-12 col-sm-12 col-lg-12">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <h4 style="margin: 0;">Clearing Expenses - {{ $reference_no }}</h4>
                            <div class="d-flex" style="gap: 1rem;">
                                <a href="{{ route('clearing.tracking.download', ['reference_no' => $reference_no]) }}" class="btn btn-primary">Download PDF</a>
                                <a href="{{ route('clearing.expense.add', ['reference_no' => $reference_no]) }}" class="btn btn-primary">Add New Expense</a>
                            </div>
                        </div>
                        <div class="card-body">
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
                                                            ->where('reference_no', $reference_no)
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
                                                    <a href="{{ route('clearing.expense.edit', ['reference_no' => $reference_no, 'id' => $invoice->id]) }}" class="btn btn-sm btn-primary">Edit</a>
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
    </script>
@endsection