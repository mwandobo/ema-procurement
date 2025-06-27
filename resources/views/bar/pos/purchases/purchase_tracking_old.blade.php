@extends('layout.master')

@section('content')
<section class="section">
    <div class="section-body">
        <div class="row">
            <div class="col-12 col-sm-12 col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Purchase Shipment Tracking12</h4>
                    </div>
                    <div class="card-body">
                        <ul class="nav nav-tabs" id="myTab2" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active show" id="home-tab2" data-toggle="tab"
                                    href="#home2" role="tab" aria-controls="home" aria-selected="true">Tracking List</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('bar_purchase.create_purchase_order_tracking', $purchase->id) }}"
                                    role="tab" aria-selected="false">Update Tracking Status</a>
                            </li>
                        </ul>
                        <div class="tab-content tab-bordered" id="myTab3Content">
                            <div class="tab-pane fade active show" id="home2" role="tabpanel"
                                aria-labelledby="home-tab2">
                                <div class="table-responsive">
                                    <table class="table datatable-basic table-striped">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Purchase Order Ref No</th>
                                                <th>Last Status</th>
                                                <th>Last Description</th>
                                                <th>Last Updated By</th>
                                                <th>Last Updated Time</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            @if($trackings->isNotEmpty())
                                            @foreach ($trackings as $track)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>
                                                    
                                                        {{ $track->purchase_reference }}
                                                    
                                                </td>
                                                <td>
                                                    <span class="badge badge-{{ $track->status == 'Delivered to Warehouse' ? 'success' : 
                                                                              ($track->status == 'Cleared' ? 'primary' : 
                                                                              ($track->status == 'Custom Clearance Started' ? 'info' : 
                                                                              ($track->status == 'Arrived at Port' ? 'secondary' : 
                                                                              ($track->status == 'In Transit' ? 'warning' : 
                                                                              ($track->status == 'Shipped' ? 'dark' : 
                                                                              ($track->status == 'Ready at Supplier' ? 'info' : 'light')))))) }}">
                                                        {{ ucfirst($track->status) }}
                                                    </span>
                                                </td>
                                                <td>{{ $track->description ?? '-' }}</td>

                                                @php $user_kk = App\Models\User::find($track->user_id); @endphp

                                                @if(!empty($user_kk))

                                                <td>{{ $user_kk->name }}</td>

                                                @else
                                                <td> Unknown </td>
                                                @endif
                                                <td>{{ optional($track->updated_at)->format('Y-m-d H:i:s') ?? '-' }}</td>
                                            </tr>
                                            @endforeach

                                            @else
                                            <tr>
                                                <td colspan="5">No tracking records found</td>
                                            </tr>
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


@endsection

@section('scripts')
<script>
    $('.datatable-basic').DataTable({
        autoWidth: false,
        columnDefs: [],
        dom: '<"datatable-header"fl><"datatable-scroll"t><"datatable-footer"ip>',
        language: {
            search: '<span>Filter:</span> _INPUT_',
            searchPlaceholder: 'Type to filter...',
            lengthMenu: '<span>Show:</span> _MENU_',
            paginate: { 'first': 'First', 'last': 'Last', 'next': '→', 'previous': '←' }
        },
    });

</script>
@endsection