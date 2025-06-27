@extends('layout.master')
<style>
    .p-md {
        padding: 12px !important;
    }

    .bg-items {
        background: #303252;
        color: #ffffff;
    }

    .ml-13 {
        margin-left: -13px !important;
    }
</style>

@section('content')
    <section class="section">
        <div class="section-body">
            <div class="row">
                <div class="col-12 col-md-12 col-lg-12">

                    <div class="col-lg-10">


                        <a class="btn btn-xs btn-primary" href="#" data-bs-toggle="modal"
                            data-bs-target="#paymentModal" title="">Pay Purchase</a>
                            
                        <!-- 
                        <a class="btn btn-xs btn-primary" href="#" data-bs-toggle="modal"
                            data-bs-target="#goodreceiveModal" title="">Good Receive</a> -->

                         {{-- <a class="btn btn-xs btn-info" id="profile-tab2" data-id="{{ $invoice_main->id  }}" data-type="receive"
                        onclick="model({{ $invoice_main->id  }},'receive')" href="" data-toggle="modal"
                        data-target="#appFormModal" role="tab" aria-selected="false">
                        Good Receive</a> --}}

                        @if ($invoice_main->receive_status != "Complete")
                            <a class="btn btn-xs btn-info" id="profile-tab2" data-id="{{ $invoice_main->id }}" data-type="receive"
                            onclick="model({{ $invoice_main->id }},'receive')" href="" data-toggle="modal"
                            data-target="#appFormModal" role="tab" aria-selected="false">
                                Good Receive
                            </a>
                        @endif
                        
                         <a class="btn btn-xs btn-info " data-placement="top3"
                          href="{{ route('purchase_order_tracking.show',$invoice_main->reference_no)}}"
                          title="Purchase Shipment Tracking">Shipment Tracking </a>
                         
                         {{--<a class="btn btn-xs btn-info " data-placement="top3"
                          href="{{ route('clearing_tracking.show',$invoice_main->reference_no)}}"
                           title="Purchase Shipment Tracking"> Clearing Tracking </a>--}}
                           
                           
                          <div class="btn-group">
                              <button type="button" class="btn btn-xs btn-info dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Clearing Tracking
                              </button>
                              <div class="dropdown-menu">
                                   <a class="nav-link" data-toggle="modal"
                                    onclick="model2({{$invoice_main->id}},'agent_modal')"
                                    data-target="#app2FormModal" data-id="{{$invoice_main->id}}"
                                    href="app2FormModal">
                                    Agent</a>
                                   
                                  <a class="dropdown-item" 
                                  href="{{ route('clearing_tracking.show', $invoice_main->reference_no) }}">
                                  Tracking Activities</a>
                                  
                                  <a class="dropdown-item"
                                   href="{{ route('clearing.tracking', $invoice_main->reference_no) }}">
                                   Clearing Expenses</a>
                              </div>
                          </div>



                          <a class="btn btn-xs btn-primary" href="{{ route('supplier_invoice_show_pdf', $invoice_main->reference_no) }}" title="Download PDF">Download PDF</a>

                         
                         
 
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
                                                src="{{ url('images') }}/{{ $settings->site_logo }}">
                                        </div>

                                        <div class="col-lg-3 col-xs-3">

                                        </div>

                                        <div class="col-lg-3 col-xs-3">

                                            <h5 class="mb0">REF NO : {{ $invoice_main->reference_no }}</h5>
                                            Purchase Date :
                                            {{ Carbon\Carbon::parse($invoice_main->purchase_date)->format('d/m/Y') }}
                                            <br>Supplier Date :
                                            {{ Carbon\Carbon::parse($invoice_main->supplier_date)->format('d/m/Y') }}
                                            <br>Supplier Name : {{ $invoice_main->supplier->name }}


                                            <br>Currency: {{ $invoice_main->currency }}

                                        </div>
                                    </div>



                                    <div class="row mb-lg">
                                        <div class="col-lg-6 col-xs-6">
                                            <h5 class="p-md bg-items mr-15">Our Info:</h5>
                                            <h4 class="mb0">{{ $settings->site_name }}</h4>
                                            {{ $settings->site_address }}
                                            <br>Phone : {{ $settings->site_phone_number }}
                                            <br> Email : <a
                                                href="mailto:{{ $settings->site_email }}">{{ $settings->site_email }}</a>
                                            <br>TIN : {{ $settings->tin }}
                                        </div>


                                        <div class="col-lg-6 col-xs-6">

                                            <h5 class="p-md bg-items ml-13"> Supplier Info: </h5>
                                            <h4 class="mb0"> {{ $invoice_main->supplier->name }}</h4>
                                            {{ $invoice_main->supplier->address }}
                                            <br>Phone : {{ $invoice_main->supplier->phone }}
                                            <br> Email : <a
                                                href="mailto:{{ $invoice_main->supplier->email }}">{{ $invoice_main->supplier->email }}</a>
                                            <br>TIN :
                                            {{ !empty($invoice_main->supplier->TIN) ? $invoice_main->supplier->TIN : '' }}


                                        </div>
                                    </div>
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
                                            <th style="color:white;">Qty</th>
                                            <th style="color:white;">Received Qty</th>
                                            <th style="color:white;">Price</th>
                                            <th style="color:white;">Tax</th>
                                            <th  style="color:white;">Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if (!empty($invoice_items))
                                            @foreach ($invoice_items as $row)
                                                <?php
                                                $sub_total += $row->total_cost;
                                                $gland_total += $row->total_cost + $row->total_tax;
                                                $tax += $row->total_tax;
                                                
                                                $due = App\Models\Bar\POS\PurchaseHistory::where('purchase_id', $row->purchase_id)->where('item_id', $row->item_name)->where('type', 'Purchase Supplier Invoice')->sum('quantity');
                                                
                                                $qty = $due;
                                                
                                                ?>
                                                <tr>
                                                    <td class="">{{ $i++ }}</td>
                                                    <?php
                                                    $item_name = App\Models\Bar\POS\Items::find($row->item_id);
                                                    $item_code = App\Models\Bar\POS\Items::find($row->item_id);
                                                    ?>
                                                    <td class=""><strong
                                                            class="block">({{ $item_code->item_code }}) - {{ $row->item_name }}</strong></td>

                                                    <td class="">{{ number_format($row->quantity ?? 0, 2) }}</td>


                                                   <td class="">{{ number_format($row->received_qty ?? 0, 2) }}</td>


                                                    <td class="">{{ number_format($row->price, 2) }} </td>
                                                    <td class="">

                                                        {{ number_format($row->total_tax, 2) }}

                                                    </td>
                                                    <td >{{ number_format($row->total_cost, 2) }} </td>

                                                </tr>
                                            @endforeach
                                        @endif


                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <td colspan="5"></td>
                                            <td>Sub Total</td>
                                            <td>{{ number_format($sub_total, 2) }} TZS</td>
                                        </tr>

                                        <tr>
                                            <td colspan="5"></td>
                                            <td>Total Tax <small class="pr-sm">(VAT 18 %)</small></td>
                                            <td>{{ number_format($tax, 2) }} TZS</td>
                                        </tr>

                                        <tr>
                                            <td colspan="5"></td>
                                            <td>Total Amount</td>
                                            <td>{{ number_format($gland_total, 2) }} TZS</td>
                                        </tr>

                                         <tr>
                                                <td colspan="5"></td>
                                                <td><b>Exchange Rate 1 {{ $invoice_main->currency }} </b></td>
                                                <td><b> {{ $invoice_main->exchange_rate }} TZS</b></td>
                                            </tr>


                                        <br>
                                        {{-- @if ($invoice_main->currency != 'TZS')
                                            <tr>
                                                <td colspan="5"></td>
                                                <td><b>Exchange Rate 1 {{ $invoice_main->currency }} </b></td>
                                                <td><b> {{ $invoice_main->exchange_rate }} TZS</b></td>
                                            </tr>
                                            <p></p>
                                            <br>
                                            <tr>
                                                <td colspan="5"></td>
                                                <td>Sub Total</td>
                                                <td>{{ number_format($sub_total * $invoice_main->exchange_rate, 2) }} TZS
                                                </td>
                                            </tr>

                                            <tr>
                                                <td colspan="5"></td>
                                                <td>Total Tax</td>
                                                <td>{{ number_format($tax * $invoice_main->exchange_rate, 2) }} TZS</td>
                                            </tr>

                                            <tr>
                                                <td colspan="5"></td>
                                                <td>Total Amount</td>
                                                <td>{{ number_format($invoice_main->exchange_rate * $gland_total, 2) }}
                                                    TZS</td>
                                            </tr>
                                        @endif --}}
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        </div>

        <!-- Initial Payment Selection Modal -->
        <div class="modal fade" id="paymentModal" tabindex="-1" aria-labelledby="paymentModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="paymentModalLabel">Select Payment Option</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <a href="{{ route('payment.supplier', ['reference_no' => $reference_no]) }}" class="btn btn-success me-2">Pay Supplier</a>
                        <a href="{{ route('payment.clearing_agent', ['reference_no' => $reference_no]) }}" class="btn btn-info">Pay Clearing Agent</a>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>



        {{-- <!-- Good Receive Modal -->
        <div class="modal fade" id="goodReceiveModal" tabindex="-1" aria-labelledby="goodReceiveModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="goodReceiveModalLabel">Good Receive Details</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Product Name</th>
                                    <th>Quantity Received</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- Example row, replace with dynamic data as needed -->
                                <tr>
                                    <td>Sample Product</td>
                                    <td>100</td>
                                    <td>
                                        <a href="{{ route('payment.supplier') }}" class="btn btn-success btn-sm me-2">Pay Supplier</a>
                                        <a href="{{ route('payment.clearing_agent') }}" class="btn btn-info btn-sm">Pay Clearing Agent</a>
                                    </td>
                                </tr>
                                <!-- Add more rows dynamically as needed -->
                            </tbody>
                        </table>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div> --}}


    </section>

    <!-- discount Modal -->
    <div class="modal fade" id="appFormModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg">
        </div>
    </div>
    
     <!-- discount Modal -->
    <div class="modal fade" id="app2FormModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg">
        </div>
    </div>

@endsection

@section('styles')
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <!-- DataTables Bootstrap 5 CSS -->
    <link href="https://cdn.datatables.net/1.13.7/css/dataTables.bootstrap5.min.css" rel="stylesheet">
@endsection

@section('scripts')

  <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <!-- Bootstrap JS and Popper.js -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js" integrity="sha384-fbbOQedDUMZZ5KreZpsbe1LCZPVmfTnH7ois6mU1QK+m14rQ1l2bGBq41eYeM/fS" crossorigin="anonymous"></script>
    <!-- DataTables JS -->
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/dataTables.bootstrap5.min.js"></script>


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
            console.log(23);

            let url = '{{ route('bar_purchase.supplier_invoice_modal', ':id') }}';
            url = url.replace(':id', id)
            $.ajax({
                type: 'GET',
                url: url,
                data: {
                    'type': type,
                },
                cache: false,
                async: true,
                success: function(data) {
                    //alert(data);
                    $('.modal-dialog').html(data);
                },
                error: function(error) {
                    $('#appFormModal').modal('toggle');

                }
            });
        }
    </script>
<script type="text/javascript">
    function model2(id, type) {
        $.ajax({
            type: 'GET',
url: '{{ url('display_modal') }}',
            data: {
                'id': id,
                'type': type,
            },
            cache: false,
            async: true,
            success: function(data) {
                //alert(data);
                $('#app2FormModal > .modal-dialog').html(data);


            },
            error: function(error) {
                $('#app2FormModal').modal('toggle');

            }
        });

    }
</script>

@endsection

