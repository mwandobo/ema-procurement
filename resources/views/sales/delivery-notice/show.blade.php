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
                        <a class="btn btn-xs btn-success"
                           href="{{ route('bar_purchase_pdfview',['download'=>'pdf','id'=>$deliveryNotice->id]) }}"
                           title="">
                            Download PDF
                        </a>

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
                                    <div class="row mb-lg">
                                        <div class="col-lg-6 col-xs-6 ">
                                            <img class="pl-lg" style="width: 133px;height: 120px;"
                                                 src="{{url('images')}}/{{$settings->site_logo}}">
                                        </div>
                                        <div class="col-lg-3 col-xs-3">
                                        </div>
                                        <div class="col-lg-3 col-xs-3">
                                            <h5 class=mb0">REF NO : {{$deliveryNotice->reference_no}}</h5>
                                            Sale Date
                                            : {{Carbon\Carbon::parse($deliveryNotice->purchase_date)->format('d/m/Y')}}
                                            <br>Payment Method
                                            : {{ $deliveryNotice->payment_method}}
                                            <br>Amount
                                            : {{ $deliveryNotice->amount}}
                                        </div>
                                    </div>
                                    <br>
                                    <div class="row mb-lg">
                                        <div class="col-lg-6 col-xs-6">
                                            <h5 class="p-md bg-items mr-15">Our Info:</h5>
                                            <h4 class="mb0">{{$settings->site_name}}</h4>
                                            {{ $settings->site_address }}
                                            <br>Phone : {{ $settings->site_phone_number}}
                                            <br> Email : <a
                                                href="mailto:{{$settings->site_email}}">{{$settings->site_email}}</a>
                                            <br>TIN : {{$settings->tin}}
                                        </div>

                                        <div class="col-lg-6 col-xs-6">
                                            <h5 class="p-md bg-items ml-13"> CLient Info: </h5>
                                            <h4 class="mb0"> {{$saleQuotation->client->name}}</h4>
                                            {{$saleQuotation->client->address}}
                                            <br>Phone : {{$saleQuotation->client->phone}}
                                            <br> Email : <a
                                                href="mailto:{{$saleQuotation->client->email}}">{{$saleQuotation->client->email}}</a>
                                            <br>TIN
                                            : {{!empty($saleQuotation->client->TIN)? $saleQuotation->client->TIN : ''}}
                                        </div>
                                    </div>
                                    <?php

                                    $sub_total = 0;
                                    $gland_total = 0;
                                    $tax = 0;
                                    $i = 1;

                                    ?>
                                    <br>
                                    <div class="table-responsive mb-lg ">
                                        <table class="table items invoice-items-preview" page-break-inside:="" auto;="">
                                            <thead class="bg-items">
                                            <tr>
                                                <th style="color:white;">#</th>
                                                <th style="color:white;">Items</th>
                                                <th style="color:white;">Ordered Quantity</th>
                                                <th style="color:white;">Delivered Quantity</th>
                                                <th style="color:white;">Unit</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @if(!empty($deliveredItems))
                                                @foreach($deliveredItems as $row)
                                                        <?php
                                                        $item = App\Models\Bar\POS\Items::find($row->item_id);

                                                        ?>
                                                    <tr>
                                                        <td class="">{{$i++}}</td>
                                                        <td class=""><strong class="block">({{$item->item_code}})
                                                                - {{$item->name}}</strong></td>
                                                        <td class="">{{ $row->ordered_quantity }}</td>
                                                        <td class="">{{ $row->delivered_quantity  }}</td>
                                                        <td class="">{{ $item->unit }}</td>
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



    <div class="modal fade show" data-backdrop="" id="appFormModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="formModal">Add Payment Method</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form method="POST" action="{{ url('v2/sales/quotations/add-payment', $saleQuotation->id ) }}">
                        @csrf
                        <div class="modal-body">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-12 ">
                                        <div class="form-group row">
                                            <label class="col-lg-2 col-form-label">Payment Method</label>
                                            <div class="col-lg-10">
                                                <select class="form-control m-b" name="payment_method" required>
                                                    <option value="">Select Payment Method</option>
                                                    <option value="Credit">Credit</option>
                                                    <option value="Cash">Cash</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer bg-whitesmoke br">
                            <button type="submit" class="btn btn-primary">
                                Save
                            </button>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <div class="modal fade show" data-backdrop="" id="appForm1Modal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="formModal">Make Payment</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form method="POST" action="{{ url('v2/sales/quotations/make-payment', $saleQuotation->id ) }}">
                        @csrf
                        <div class="modal-body">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-12 ">
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label">Paid Amount</label>
                                            <div class="col-lg-8">
                                                <input type="text" class="form-control m-b" name="amount" required/>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer bg-whitesmoke br">
                            <button type="submit" class="btn btn-primary">
                                Save
                            </button>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        </div>
                    </form>
                </div>
            </div>
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

    <script type="text/javascript">
        function model(id, type) {

            $.ajax({
                type: 'GET',
                url: '/courier/public/discountModal/',
                data: {
                    'id': id,
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

@endsection
