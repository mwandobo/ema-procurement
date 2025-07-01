@php use App\Models\Setting; @endphp
@php use Carbon\Carbon; @endphp
@php use App\Models\Bar\POS\Items; @endphp
@php use App\Models\Bar\POS\Discount; @endphp
@extends('layout.master')

<style>
    .bg-items {
        background: #303252;
        color: #ffffff;
    }
</style>

@section('content')
    <section class="section">
        <div class="section-body">

            <form method="POST" action="{{ route('quotations.store', $saleQuotation->id) }}">
                @csrf
                <div class="row">
                    <div class="col-12 col-md-12 col-lg-12">
                        <div class="col-lg-10 mb-2">
                            <a class="btn btn-xs btn-success"
                               href="{{ route('bar_purchase_pdfview',['download'=>'pdf','id'=>$saleQuotation->id]) }}">
                                Download PDF
                            </a>
                            <button type="submit" id="submitBtn" class="btn btn-xs btn-primary" disabled>
                                Submit
                            </button>
                        </div>

                        <div class="card">
                            <div class="card-body">
                                <?php $settings = Setting::first(); ?>
                                <div class="tab-content" id="myTab3Content">
                                    <div class="tab-pane fade show active" id="about" role="tabpanel">
                                        <div class="row mb-4">
                                            <div class="col-lg-6">
                                                <img class="pl-lg" style="width: 133px;height: 120px;"
                                                     src="{{ url('images') }}/{{ $settings->site_logo }}">
                                            </div>
                                            <div class="col-lg-6 text-right">
                                                <h5>REF NO : {{ $saleQuotation->reference_no }}</h5>
                                                Sale
                                                Date: {{ Carbon::parse($saleQuotation->purchase_date)->format('d/m/Y') }}
                                                <br>
                                                Due
                                                Date: {{ Carbon::parse($saleQuotation->due_date)->format('d/m/Y') }}
                                            </div>
                                        </div>

                                        <?php
                                        $sub_total = 0;
                                        $gland_total = 0;
                                        $tax = 0;
                                        $i = 1;
                                        ?>


                                        <div class="table-responsive mb-lg">
                                            <table class="table items invoice-items-preview">
                                                <thead class="bg-items">
                                                <tr>
                                                    <th>#</th>
                                                    <th>Items</th>
                                                    <th>Price</th>
                                                    <th>Discounted Price</th>
                                                    <th>Store</th>
                                                    <th>Qty</th>
                                                    <th>Unit</th>
                                                    <th>Amount</th>
                                                    <th>Action</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @if(!empty($saleQuotationItems))
                                                    @foreach($saleQuotationItems as $row)
                                                            <?php
                                                            $item = Items::find($row->item_id);
                                                            $amount = $item->cost_price * $row->quantity;
                                                            $cost_price = $row->cost_price;
                                                            $discount = 0;
                                                            $sub_total += $row->total_cost;
                                                            $gland_total += $row->total_cost + $row->total_tax;
                                                            $tax += $row->total_tax;

                                                            $discountRule = Discount::where('item_id',
                                                                $row->item_id)
                                                                ->where('min_quantity', '<=', $row->quantity)
                                                                ->where('max_quantity', '>=', $row->quantity)
                                                                ->first();
                                                            if ($discountRule) {
                                                                $amount = ($amount * (100 - $discountRule->value)) / 100;
                                                                $cost_price = ($item->cost_price * (100 - $discountRule->value)) / 100;
                                                            }
                                                            ?>
                                                        <tr>
                                                            <td>{{ $i++ }}</td>
                                                            <td><strong>({{ $item->item_code }})
                                                                    - {{ $item->name }}</strong></td>
                                                            <td>{{ number_format($item->cost_price, 2) }}</td>
                                                            <td>{{ number_format($cost_price, 2) }}</td>
                                                            <td>{{ $row->store?->name }}</td>
                                                            <td>{{ $row->quantity }}</td>
                                                            <td>{{ $row->unit }}</td>
                                                            <td>{{ number_format($amount, 2) }}</td>
                                                            <td>
                                                                <button type="button"
                                                                        class="btn btn-success btn-sm approve-btn"
                                                                        data-id="{{ $row->id }}">
                                                                    <i class="icon-check"></i>
                                                                </button>
                                                                <button type="button"
                                                                        class="btn btn-danger btn-sm decline-btn"
                                                                        data-id="{{ $row->id }}">
                                                                    <i class="icon-x"></i>
                                                                </button>
                                                                <input type="hidden" name="sale_pre_quotation_id"
                                                                       value="{{ $saleQuotation->id }}">
                                                                <input type="hidden"
                                                                       name="item_decisions[{{ $row->id }}]"
                                                                       class="decision-input" value="">
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                @endif
                                                </tbody>
                                            </table>
                                        </div>

                                    </div> <!-- tab-pane -->
                                </div> <!-- tab-content -->
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>
@endsection

@section('scripts')
    <script>
        $(document).ready(function () {
            function checkAllDecided() {
                let allDecided = true;
                $('.decision-input').each(function () {
                    if (!$(this).val()) {
                        allDecided = false;
                    }
                });
                $('#submitBtn').prop('disabled', !allDecided);
            }

            $(document).on('click', '.approve-btn', function (e) {
                e.preventDefault();
                let rowId = $(this).data('id');
                let $td = $(this).closest('td');
                $td.find('input[name="item_decisions[' + rowId + ']"]').val('approved');
                $td.find('.approve-btn, .decline-btn').hide();
                $td.append('<span class="badge badge-success">Approved</span>');
                checkAllDecided();
            });

            $(document).on('click', '.decline-btn', function (e) {
                e.preventDefault();
                let rowId = $(this).data('id');
                let $td = $(this).closest('td');
                $td.find('input[name="item_decisions[' + rowId + ']"]').val('declined');
                $td.find('.approve-btn, .decline-btn').hide();
                $td.append('<span class="badge badge-danger">Declined</span>');
                checkAllDecided();
            });
        });
    </script>
@endsection
