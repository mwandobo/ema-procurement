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
            <div class="row">

                <div class="col-12 col-md-12 col-lg-12">

                    <div class="col-lg-10">
                            <a class="btn btn-xs btn-primary"
                               href="{{ url('/v2/sales/pre-quotations/'. $saleQuotation->id .'/edit' )}}" title=""> Edit </a>


                        <a class="btn btn-xs btn-success"
                           href="{{ route('bar_purchase_pdfview',['download'=>'pdf','id'=>$saleQuotation->id]) }}" title="">
                            Download PDF </a>

                    </div>
                    <br>

                    <div class="card">
                        <div class="card-body">

                                <?php
                                $settings = App\Models\Setting::first();


                                ?>
                            <div class="tab-content" id="myTab3Content">
                                <div class="tab-pane fade show active" id="about" role="tabpanel"
                                     aria-labelledby="home-tab2">
                                    <div class="row">
                                        <div class="col-lg-6 col-xs-6 ">
                                            <img class="pl-lg" style="width: 133px;height: 120px;"
                                                 src="{{url('images')}}/{{$settings->site_logo}}">
                                        </div>

                                        <div class="col-lg-3 col-xs-3">

                                        </div>

                                        <div class="col-lg-3 col-xs-3">

                                            <h5 class=mb0">REF NO : {{$saleQuotation->reference_no}}</h5>
                                            Sale Date
                                            : {{Carbon\Carbon::parse($saleQuotation->purchase_date)->format('d/m/Y')}}
                                            <br>Due Date
                                            : {{Carbon\Carbon::parse($saleQuotation->due_date)->format('d/m/Y')}}


                                        </div>
                                    </div>


                                        <?php

                                        $sub_total = 0;
                                        $gland_total = 0;
                                        $tax = 0;
                                        $i = 1;

                                        ?>

                                    <div class="table-responsive mb-lg">
                                        <table class="table items invoice-items-preview" page-break-inside:="" auto;="">
                                            <thead class="bg-items">
                                            <tr>
                                                <th style="color:white;">#</th>
                                                <th style="color:white;">Items</th>
                                                <th style="color:white;">Price</th>
                                                <th style="color:white;">Discounted Price</th>
                                                <th style="color:white;">Store</th>
                                                <th style="color:white;">Qty</th>
                                                <th style="color:white;">Unit</th>
                                                <th style="color:white;">Amount</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @if(!empty($saleQuotationItems))
                                                @foreach($saleQuotationItems as $row)
                                                        <?php
                                                        $item = App\Models\Bar\POS\Items::find($row->item_id);

                                                        $amount = $item->cost_price * $row->quantity ;
                                                        $cost_price = $row->cost_price;
                                                        $discount = 0;
                                                        $sub_total += $row->total_cost;
                                                        $gland_total += $row->total_cost + $row->total_tax;
                                                        $tax += $row->total_tax;

                                                        $discountRule = App\Models\Bar\POS\Discount::where('item_id', $row->item_id)
                                                            ->where('min_quantity', '<=', $row->quantity)
                                                            ->where('max_quantity', '>=', $row->quantity)
                                                            ->first();
                                                        if ($discountRule) {
                                                            $amount = ($amount *( 100 - $discountRule->value)) / 100;
                                                            $cost_price = ($item->cost_price * (100 -$discountRule->value)) / 100;
                                                        }

                                                        ?>
                                                    <tr>
                                                        <td class="">{{$i++}}</td>
                                                        <td class=""><strong class="block">({{$item->item_code}}) - {{$item->name}}</strong></td>
                                                        <td class="">{{ $item->cost_price }}</td>
                                                        <td class="">{{ $cost_price  }}</td>
                                                        <td class="">{{ $row->store?->name }}</td>
                                                        <td class="">{{ $row->quantity }}</td>
                                                        <td class="">{{ $row->unit }}</td>
                                                        <td class="">{{ $amount }} </td>
                                                    </tr>
                                                @endforeach
                                            @endif


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

    <!-- discount Modal -->
    <div class="modal fade" id="appFormModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog ">
        </div>
    </div>

@endsection

@section('scripts')
    <script>
        $('.datatable-basic').DataTable({
            autoWidth: false,
            "columnDefs": [{
                "orderable": false,
                "targets": [3]
            }],
            dom: '<"datatable-header"fl><"datatable-scroll"t><"datatable-footer"ip>',
            "language": {
                search: '<span>Filter:</span> _INPUT_',
                searchPlaceholder: 'Type to filter...',
                lengthMenu: '<span>Show:</span> _MENU_',
                paginate: {
                    'first': 'First',
                    'last': 'Last',
                    'next': $('html').attr('dir') == 'rtl' ? '&larr;' : '&rarr;',
                    'previous': $('html').attr('dir') == 'rtl' ? '&rarr;' : '&larr;'
                }
            },

        });
    </script>


    <script type="text/javascript">
        function model(id, type) {
            let url = '{{ route("bar_purchase.show", ":id") }}';
            url = url.replace(':id', id)
            $.ajax({
                type: 'GET',
                url: url,
                data: {
                    'type': type,
                },
                cache: false,
                async: true,
                success: function (data) {
                    //alert(data);
                    $('.modal-dialog').html(data);
                },
                error: function (error) {
                    $('#appFormModal').modal('toggle');

                }
            });
        }
    </script>


    <script>
        $('#paymentModeModal').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget)
            var purchaseId = button.data('id')
            var form = $('#paymentModeForm')
            form.attr('action', '/bar_purchase/confirm_order/' + purchaseId)
            $('#purchase_id').val(purchaseId)
        })
    </script>

@endsection
