@extends('frontend.layouts.app')

@section('content')

<div class="container-fluid">

    {{-- PAGE HEADER --}}
    <div class="page-header">
        <h3>
            <i class="fas fa-box"></i>
            Order
        </h3>
        <div class="header-actions">
            <a href="{{ route('admin.orders.index') }}" class="btn-outline-primary-custom">
                <i class="fas fa-arrow-left me-1"></i> Back to Orders
            </a>
        </div>
    </div>

    {{-- MAIN CARD --}}
    <div class="card-order">

        <div class="card-body" style="padding: 1.75rem;">

            {{-- STATUS UPDATE ROW --}}
            <div class="d-flex flex-wrap align-items-center justify-content-between gap-3 mb-4 pb-3 border-bottom" style="border-color: #f1f5f9 !important;">

                <div class="d-flex align-items-center gap-3">
                    <span style="font-weight: 600; font-size: 0.9rem; color: #475569;">
                        <i class="fas fa-tag me-1"></i> Status
                    </span>
                    <span class="badge-status
                        {{ $order->status == 'Pending' ? 'bg-warning-soft' : '' }}
                        {{ $order->status == 'Processing' ? 'bg-info-soft' : '' }}
                        {{ $order->status == 'Shipped' ? 'bg-primary-soft' : '' }}
                        {{ $order->status == 'Delivered' ? 'bg-success-soft' : '' }}
                        {{ $order->status == 'Return Requested' ? 'bg-danger-soft' : '' }}
                        {{ $order->status == 'Returned' ? 'bg-secondary-soft' : '' }}
                        {{ $order->status == 'Cancelled' ? 'bg-danger-soft' : '' }}
                    ">
                        <span class="dot
                            {{ $order->status == 'Pending' ? 'amber' : '' }}
                            {{ $order->status == 'Processing' ? 'blue' : '' }}
                            {{ $order->status == 'Shipped' ? 'blue' : '' }}
                            {{ $order->status == 'Delivered' ? 'green' : '' }}
                            {{ $order->status == 'Return Requested' ? 'red' : '' }}
                            {{ $order->status == 'Returned' ? 'gray' : '' }}
                            {{ $order->status == 'Cancelled' ? 'red' : '' }}
                        "></span>
                        {{ $order->status }}
                    </span>
                </div>

                <form action="{{ route('admin.orders.updateStatus', $order->id) }}" method="POST" class="d-flex gap-2 align-items-center">
                    @csrf
                    @method('PUT')

                    <label for="statusSelect" class="visually-hidden">Update Status</label>
                    <select name="status" id="statusSelect" class="form-select-sm-custom">
                        <option value="Pending" {{ $order->status == 'Pending' ? 'selected' : '' }}>Pending</option>
                        <option value="Processing" {{ $order->status == 'Processing' ? 'selected' : '' }}>Processing</option>
                        <option value="Shipped" {{ $order->status == 'Shipped' ? 'selected' : '' }}>Shipped</option>
                        <option value="Delivered" {{ $order->status == 'Delivered' ? 'selected' : '' }}>Delivered</option>
                        <option value="Return Requested" {{ $order->status == 'Return Requested' ? 'selected' : '' }}>Return Requested</option>
                        <option value="Returned" {{ $order->status == 'Returned' ? 'selected' : '' }}>Returned</option>
                        <option value="Cancelled" {{ $order->status == 'Cancelled' ? 'selected' : '' }}>Cancelled</option>
                    </select>

                    <button type="submit" class="btn-submit-modern" style="padding: 0.4rem 1.4rem; font-size: 0.8rem;">
                        <i class="fas fa-sync-alt"></i> Update
                    </button>
                </form>
            </div>

            {{-- TWO COLUMN: CUSTOMER + ORDER INFO --}}
            <div class="row g-4 mb-4">

                {{-- CUSTOMER DETAILS --}}
                <div class="col-md-6">
                    <div style="background: #f8fafc; border-radius: 16px; padding: 1.25rem 1.5rem; border: 1px solid #f1f5f9;">
                        <h6 style="font-weight: 700; font-size: 0.8rem; text-transform: uppercase; letter-spacing: 0.04em; color: #94a3b8; margin-bottom: 0.75rem;">
                            <i class="fas fa-user me-2"></i> Customer Details
                        </h6>
                        <p style="font-weight: 600; font-size: 1.05rem; color: #0f172a; margin-bottom: 0.15rem;">
                            {{ $order->name }}
                        </p>
                        <p style="font-size: 0.875rem; color: #475569; margin-bottom: 0.15rem;">
                            <i class="fas fa-envelope me-2" style="color: #94a3b8; width: 16px;"></i> {{ $order->email }}
                        </p>
                        <p style="font-size: 0.875rem; color: #475569; margin-bottom: 0.15rem;">
                            <i class="fas fa-phone me-2" style="color: #94a3b8; width: 16px;"></i> {{ $order->phone }}
                        </p>
                        <p style="font-size: 0.875rem; color: #475569; margin-bottom: 0;">
                            <i class="fas fa-map-pin me-2" style="color: #94a3b8; width: 16px;"></i> {{ $order->address }}
                        </p>
                    </div>
                </div>

                {{-- ORDER SUMMARY --}}
                <div class="col-md-6">
                    <div style="background: #f8fafc; border-radius: 16px; padding: 1.25rem 1.5rem; border: 1px solid #f1f5f9;">
                        <h6 style="font-weight: 700; font-size: 0.8rem; text-transform: uppercase; letter-spacing: 0.04em; color: #94a3b8; margin-bottom: 0.75rem;">
                            <i class="fas fa-receipt me-2"></i> Order Summary
                        </h6>
                        <div class="d-flex justify-content-between" style="font-size: 0.9rem; padding: 0.2rem 0;">
                            <span style="color: #64748b;">Order Date</span>
                            <span style="font-weight: 500; color: #0f172a;">{{ $order->created_at->format('d M Y, h:i A') }}</span>
                        </div>
                        <div class="d-flex justify-content-between" style="font-size: 0.9rem; padding: 0.2rem 0;">
                            <span style="color: #64748b;">Total Items</span>
                            <span style="font-weight: 500; color: #0f172a;">{{ $order->items->sum('quantity') }}</span>
                        </div>
                        <div class="d-flex justify-content-between" style="font-size: 0.9rem; padding: 0.2rem 0;">
                            <span style="color: #64748b;">Total Amount</span>
                            <span style="font-weight: 700; color: #0f172a; font-size: 1.1rem;">₹ {{ number_format($order->total_amount, 2) }}</span>
                        </div>
                    </div>
                </div>
            </div>

            {{-- PRODUCTS TABLE --}}
            <h5 class="fw-bold mb-3" style="color: #0f172a; font-size: 1.1rem;">
                <i class="fas fa-cubes me-2" style="color: #3b82f6;"></i> Ordered Products
            </h5>

            <div class="table-responsive-custom">
                <table class="table-order">
                    <thead>
                        <tr>
                            <th style="width: 80px;"><i class="fas fa-image"></i> Image</th>
                            <th><i class="fas fa-tag"></i> Product</th>
                            <th style="width: 120px;"><i class="fas fa-rupee-sign"></i> Price</th>
                            <th style="width: 80px;"><i class="fas fa-hashtag"></i> Qty</th>
                            <th style="width: 140px; text-align: right;"><i class="fas fa-calculator"></i> Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($order->items as $item)
                        <tr>
                            <td>
                                <img src="{{ asset('uploads/products/'.$item->product->image) }}"
                                alt="{{ $item->product->name }}"
                                class="product-img"
                                style="width: 64px; height: 64px; object-fit: cover; border-radius: 12px; background: #f1f5f9; border: 2px solid #f1f5f9;">
                            </td>
                            <td>
                                <span class="product-name">{{ $item->product->name }}</span>
                            </td>
                            <td style="font-weight: 500; color: #1e293b;">
                                ₹ {{ number_format($item->price, 2) }}
                            </td>
                            <td style="font-weight: 600; color: #0f172a;">
                                {{ $item->quantity }}
                            </td>
                            <td style="font-weight: 700; color: #0f172a; text-align: right;">
                                ₹ {{ number_format($item->price * $item->quantity, 2) }}
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            {{-- TOTAL ROW --}}
            <div class="d-flex justify-content-end mt-4 pt-3 border-top" style="border-color: #f1f5f9 !important;">
                <div style="text-align: right;">
                    <div style="font-size: 0.85rem; color: #94a3b8; font-weight: 500; letter-spacing: 0.02em; text-transform: uppercase;">
                        Grand Total
                    </div>
                    <div style="font-size: 2rem; font-weight: 800; color: #0f172a; letter-spacing: -0.02em;">
                        ₹ {{ number_format($order->total_amount, 2) }}
                    </div>
                </div>
            </div>

        </div>{{-- /card-body --}}
    </div>{{-- /card-order --}}

</div>{{-- /container-fluid --}}

@endsection