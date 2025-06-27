<!-- resources/views/cf/tracking/create.blade.php -->
@extends('layout.master')
@section('content')
<section class="section">
    <div class="section-body">
        <div class="row">
            <div class="col-12 col-sm-12 col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Update Purchase Order Tracking Status</h4>
                    </div>
                    <div class="card-body">
                        {{ Form::open(['route' => 'bar_purchase.store_purchase_order_tracking', 'method' => 'POST']) }}
                        @csrf
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group row">
                                    <label class="col-lg-2 col-form-label">Purchase Order</label>
                                    <div class="col-lg-10">
                                        <input type="text" name="purchase_ref" value="{{ $purchase->reference_no }}" readonly>
                                    </div>
                                </div>

                                <input type="hidden" name="purchase_order_id" value="{{ $purchase->id }}">

                                <div class="form-group row">
                                    <label class="col-lg-2 col-form-label">Status</label>
                                    <div class="col-lg-10">
                                        <select name="status" class="form-control" required>
                                            <option value="Ready at Supplier" {{ old('status') == 'Ready at Supplier' ? 'selected' : '' }}>Ready at Supplier</option>
                                            <option value="Shipped" {{ old('status') == 'Shipped' ? 'selected' : '' }}>Shipped</option>
                                            <option value="In Transit" {{ old('status') == 'In Transit' ? 'selected' : '' }}>In Transit</option>
                                            <option value="Arrived at Port" {{ old('status') == 'Arrived at Port' ? 'selected' : '' }}>Arrived at Port</option>
                                            <option value="Custom Clearance Started" {{ old('status') == 'Custom Clearance Started' ? 'selected' : '' }}>Custom Clearance Started</option>
                                            <option value="Cleared" {{ old('status') == 'Cleared' ? 'selected' : '' }}>Cleared</option>
                                            <option value="Delivered to Warehouse" {{ old('status') == 'Delivered to Warehouse' ? 'selected' : '' }}>Delivered to Warehouse</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-lg-2 col-form-label">Description</label>
                                    <div class="col-lg-8">
                                        <textarea name="description"
                                            placeholder=""
                                            class="form-control" rows="2"></textarea>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-lg-offset-2 col-lg-12">
                                        <button class="btn btn-sm btn-primary float-right m-t-n-xs" type="submit">Update Status</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection