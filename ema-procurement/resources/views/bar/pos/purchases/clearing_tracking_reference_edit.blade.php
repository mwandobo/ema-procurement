@extends('layout.master')

@section('content')
    <section class="section">
        <div class="section-body">
            <div class="row">
                <div class="col-12 col-sm-12 col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 style="margin: 0;">Edit Clearing Expense - {{ $reference_no }}</h4>
                        </div>
                        <div class="card-body">
                            <form id="clearingExpenseForm" action="{{ route('clearing.expense.update', ['reference_no' => $reference_no, 'id' => $invoice->id]) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="reference_no" class="form-label">Reference No</label>
                                            <input type="text" class="form-control" id="reference_no" name="reference_no" value="{{ $reference_no }}" readonly>
                                        </div>
                                        <div class="mb-3">
                                            <label for="clearing_cost" class="form-label">Clearing Cost</label>
                                            <input type="number" step="0.01" class="form-control" id="clearing_cost" name="clearing_cost" value="{{ $invoice->clearing_cost }}" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="shipping_cost" class="form-label">Shipping Cost</label>
                                            <input type="number" step="0.01" class="form-control" id="shipping_cost" name="shipping_cost" value="{{ $invoice->shipping_cost }}" required>
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
                                                                <input type="number" step="0.01" class="form-control" name="item_tax[{{ $item->id }}]" value="{{ $item->item_tax ?? '' }}">
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary">Save</button>
                                <a href="{{ route('clearing.tracking', ['reference_no' => $reference_no]) }}" class="btn btn-secondary">Cancel</a>
                            </form>
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
    </style>
@endsection

@section('scripts')
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js" integrity="sha384-fbbOQedDUMZZ5KreZpsbe1LCZPVmfTnH7ois6mU1QK+m14rQ1l2bGBq41eYeM/fS" crossorigin="anonymous"></script>
    <script src="{{ url('assets/js/plugins/sweetalert/sweetalert.min.js') }}"></script>
    <script>
        document.getElementById('clearingExpenseForm').addEventListener('submit', function(e) {
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
                    window.location.href = '{{ route("clearing.tracking", ["reference_no" => $reference_no]) }}';
                });
            })
            .catch(error => {
                swal({
                    title: "Error",
                    text: "Failed to update: " + error.message,
                    icon: "error",
                });
            });
        });
    </script>
@endsection