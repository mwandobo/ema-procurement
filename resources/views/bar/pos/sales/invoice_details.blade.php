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
                    @if($invoices->good_receive == 0 && $invoices->status != 4)
                    <a class="btn btn-xs btn-primary" onclick="return confirm('Are you sure?')"
                        href="{{ route('bar_invoice.edit', $invoices->id)}}" title=""> Edit </a>

                    @endif

                    @if($invoices->status != 0 && $invoices->status != 4 && $invoices->status != 3 &&
                    $invoices->good_receive == 1)
                    <a class="btn btn-xs btn-danger " data-placement="top"
                        href="{{ route('bar_invoice.pay',$invoices->id)}}" title="Add Payment"> Pay invoice </a>
                    @endif

                    @if($invoices->status == 0 && $invoices->status != 4 && $invoices->status != 3 &&
                    $invoices->good_receive == 0)
                    <a class="btn btn-xs btn-info" data-placement="top"
                        href="{{ route('bar_invoice.receive',$invoices->id)}}" title="Good Receive"> Approve Invoice
                    </a>
                    @endif

                    <a class="btn btn-xs btn-success"
                        href="{{ route('bar_invoice_pdfview',['download'=>'pdf','id'=>$invoices->id]) }}" title="">
                        Download PDF </a>

                </div>

                <br>

                <?php if (strtotime($invoices->due_date) < time() && $invoices->status == '0') {
                    $start = strtotime(date('Y-m-d H:i'));
                    $end = strtotime($invoices->due_date);

                    $days_between = ceil(abs($end - $start) / 86400);
                    ?>

                <div class="alert alert-danger alert-dismissible show fade">
                    <div class="alert-body">
                        <button class="close" data-dismiss="alert">
                            <span>×</span>
                        </button>
                        <i class="fa fa-exclamation-triangle"></i>
                        This invoice is overdue by {{ $days_between}} days
                    </div>
                </div>


                <?php
}
?>

                <br>

                <div class="card">
                    <div class="card-body">

                        <?php
                        $settings= App\Models\Setting::first();
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

                                        <h5 class=mb0">REF NO : {{$invoices->reference_no}}</h5>
                                        invoice Date :
                                        {{Carbon\Carbon::parse($invoices->invoice_date)->format('d/m/Y')}}
                                        <br>Due Date : {{Carbon\Carbon::parse($invoices->due_date)->format('d/m/Y')}}
                                        <br>Invoice Agent: {{ $invoices->client->name ?? '' }}


                                        <br>Status:
                                        @if($invoices->status == 0)
                                        <span class="badge badge-danger badge-shadow">Not Approved</span>
                                        @elseif($invoices->status == 1)
                                        <span class="badge badge-warning badge-shadow">Not Paid</span>
                                        @elseif($invoices->status == 2)
                                        <span class="badge badge-info badge-shadow">Partially Paid</span>
                                        @elseif($invoices->status == 3)
                                        <span class="badge badge-success badge-shadow">Fully Paid</span>
                                        @elseif($invoices->status == 4)
                                        <span class="badge badge-danger badge-shadow">Cancelled</span>
                                        @endif

                                        <br>Currency: {{$invoices->exchange_code }}
                                    </div>
                                </div>



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
                                        <h5 class="p-md bg-items ml-13"> Client Info: </h5>
                                        <h4 class="mb0"> {{$invoices->client->name ?? ''}}</h4>
                                        {{$invoices->client->address}}
                                        <br>Phone : {{$invoices->client->phone}}
                                        <br> Email : <a
                                            href="mailto:{{$invoices->client->email}}">{{$invoices->client->email}}</a>
                                        <br>TIN : {{!empty($invoices->client->TIN)? $invoices->client->TIN : ''}}


                                    </div>
                                </div>

                            </div>
                        </div>


                        <?php
                               
                                 $sub_total = 0;
                                 $gland_total = 0;
                                 $tax=0;
                                 $i =1;
       
                                 ?>

                        <div class="table-responsive mb-lg">
                            @php
                            $sub_total = 0;
                            $gland_total = 0;
                            $tax = 0;
                            $i = 1;
                        @endphp
                        
                        <table class="table items invoice-items-preview" style="page-break-inside:auto;">
                            <thead class="bg-items">
                                <tr>
                                    <th style="color:white;">#</th>
                                    <th style="color:white;">Items</th>
                                    <th style="color:white;">Qty</th>
                                    <th style="color:white;">Price</th>
                                    <th style="color:white;">Tax</th>
                                    <th style="color:white;">Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if(!empty($invoice_items))
                                    @foreach($invoice_items as $row)
                                        @php
                                            $item_name = App\Models\Bar\POS\Items::find($row->item_name);
                                            $row_price = (float) $row->price;
                                            $row_qty = (float) $row->due_quantity;
                                            $row_tax_rate = (float) $row->tax_rate;
                        
                                            $row_tax = $row->total_tax > 0 ? $row->total_tax : ($row_price * $row_qty * ($row_tax_rate / 100));
                                            $row_cost = $row->total_cost > 0 ? $row->total_cost : ($row_price * $row_qty);
                        
                                            $sub_total += $row_cost;
                                            $tax += $row_tax;
                                            $gland_total += $row_cost + $row_tax;
                                        @endphp
                                        <tr>
                                            <td>{{ $i++ }}</td>
                                            <td><strong>{{ $item_name->name ?? '' }}</strong></td>
                                            <td>{{ $row_qty }}</td>
                                            <td>{{ number_format($row_price, 2) }}</td>
                                            <td>{{ number_format($row_tax, 2) }}</td>
                                            <td>{{ number_format($row_cost, 2) }}</td>
                                        </tr>
                                    @endforeach
                                @endif
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td colspan="4"></td>
                                    <td>Sub Total</td>
                                    <td>{{ number_format($sub_total, 2) }} {{ $invoices->exchange_code }}</td>
                                </tr>
                                <tr>
                                    <td colspan="4"></td>
                                    <td>Total Tax <small>(VAT 18%)</small></td>
                                    <td>{{ number_format($tax, 2) }} {{ $invoices->exchange_code }}</td>
                                </tr>
                                <tr>
                                    <td colspan="4"></td>
                                    <td>Total Amount</td>
                                    <td>{{ number_format($gland_total - $invoices->discount, 2) }} {{ $invoices->exchange_code }}</td>
                                </tr>
                        
                                @if(($invoices->invoice_amount + $invoices->invoice_tax) > $invoices->due_amount)
                                <tr>
                                    <td colspan="4"></td>
                                    <td>Paid Amount</td>
                                    <td>{{ number_format(($invoices->invoice_amount + $invoices->invoice_tax) - $invoices->due_amount, 2) }} {{ $invoices->exchange_code }}</td>
                                </tr>
                                <tr>
                                    <td colspan="4"></td>
                                    <td class="text-danger">Total Due</td>
                                    <td>{{ number_format($invoices->due_amount, 2) }} {{ $invoices->exchange_code }}</td>
                                </tr>
                                @endif
                        
                                @if($invoices->exchange_code != 'TZS')
                                <tr>
                                    <td colspan="4"></td>
                                    <td><b>Exchange Rate</b></td>
                                    <td><b>1 {{ $invoices->exchange_code }} = {{ $invoices->exchange_rate }} TZS</b></td>
                                </tr>
                                <tr>
                                    <td colspan="4"></td>
                                    <td>Sub Total</td>
                                    <td>{{ number_format($sub_total * $invoices->exchange_rate, 2) }} TZS</td>
                                </tr>
                                <tr>
                                    <td colspan="4"></td>
                                    <td>Total Tax</td>
                                    <td>{{ number_format($tax * $invoices->exchange_rate, 2) }} TZS</td>
                                </tr>
                                <tr>
                                    <td colspan="4"></td>
                                    <td>Total Amount</td>
                                    <td>{{ number_format(($gland_total - $invoices->discount) * $invoices->exchange_rate, 2) }} TZS</td>
                                </tr>
                                @if(($invoices->invoice_amount + $invoices->invoice_tax) > $invoices->due_amount)
                                <tr>
                                    <td colspan="4"></td>
                                    <td>Paid Amount</td>
                                    <td>{{ number_format((($invoices->invoice_amount + $invoices->invoice_tax) - $invoices->due_amount) * $invoices->exchange_rate, 2) }} TZS</td>
                                </tr>
                                <tr>
                                    <td colspan="4"></td>
                                    <td class="text-danger">Total Due</td>
                                    <td>{{ number_format($invoices->due_amount * $invoices->exchange_rate, 2) }} TZS</td>
                                </tr>
                                @endif
                                @endif
                            </tfoot>
                        </table>
                        
                        

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
            { "orderable": false, "targets": [3] }
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
@endsection
