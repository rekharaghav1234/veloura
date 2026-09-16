@extends('frontend.layouts.app')
@if (session('order_success'))
    <script>
        document.addEventListener("DOMContentLoaded", function() {

            Swal.fire({
                icon: 'success',
                title: 'Order Placed Successfully!',
                text: 'Thank you for shopping with Veloura.',
                confirmButtonText: 'Track Order',
                confirmButtonColor: '#198754',
                timer: 3000,
                timerProgressBar: true
            });

        });
    </script>
@endif
@section('content')
    <div class="container py-5">

        {{-- Success Alert --}}
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show rounded-3 border-0 shadow-sm" role="alert">
                <i class="bi bi-check-circle-fill me-2"></i>
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        {{-- Page Header --}}
        <div class="d-flex align-items-center justify-content-between mb-4">

            <a href="/" class="btn btn-outline-dark btn-sm rounded-pill px-4">
                <i class="bi bi-arrow-left me-1"></i> Continue Shopping
            </a>
        </div>

        @forelse($orders as $order)
            {{-- Order Card --}}
            <div class="card border-0 shadow-sm rounded-4 mb-4 overflow-hidden">

                {{-- Order Header --}}
                <div class="card-header bg-white border-bottom px-4 py-3">
                    <div class="row align-items-center g-2">
                        <div class="col-md-4 col-6">
                            <div class="d-flex align-items-center gap-3">

                                <small class="text-muted">
                                    <i class="bi bi-calendar3 me-1"></i>
                                    Ordered:
                                    {{ $order->created_at->format('d M Y, h:i A') }}
                                </small>

                                @if ($order->delivered_at)
                                    <small class="text-success">
                                        <i class="bi bi-check-circle-fill me-1"></i>
                                        Delivered:
                                        {{ \Carbon\Carbon::parse($order->delivered_at)->format('d M Y, h:i A') }}
                                    </small>
                                @endif

                            </div>
                        </div>
                        {{-- Return / Refund Status --}}
                       {{-- Return / Refund Status --}}
{{-- Order Status + Return / Refund Status --}}
<div class="col-md-4 col-12 text-center mt-2 mt-md-0">

    {{-- NORMAL ORDER STATUS --}}
    @php
        $statusColors = [
            'Pending' => 'bg-warning text-dark',
            'Processing' => 'bg-info text-dark',
            'Shipped' => 'bg-primary',
            'Delivered' => 'bg-success',
            'Cancelled' => 'bg-danger',
            'Return Requested' => 'bg-warning text-dark',
        ];

        $statusColor = $statusColors[$order->status] ?? 'bg-secondary';
    @endphp

    <div class="mb-2">

        <span class="badge {{ $statusColor }} px-3 py-2 rounded-pill fw-semibold">

            <i class="bi bi-circle-fill me-1"
               style="font-size: 0.5rem;"></i>

            {{ $order->status ?? 'Placed' }}

        </span>

    </div>


    {{-- RETURN / REFUND STATUS --}}
    @if(
        $order->return_request_status ||
        $order->return_approval_status ||
        $order->return_process_status ||
        $order->refund_status
    )

        <div class="return-status-section">

            <div class="return-status-title">
                <i class="bi bi-arrow-return-left"></i>
                Return & Refund
            </div>

            <div class="return-status-list">

                {{-- Return Requested --}}
                @if($order->return_request_status == 'Requested')

                    <span class="return-status-badge requested">
                        <i class="bi bi-clock"></i>
                        Return Requested
                    </span>

                @endif


                {{-- Return Approved --}}
                @if($order->return_approval_status == 'Approved')

                    <span class="return-status-badge approved">
                        <i class="bi bi-check-circle-fill"></i>
                        Return Approved
                    </span>

                @endif


                {{-- Return Rejected --}}
                @if($order->return_approval_status == 'Rejected')

                    <span class="return-status-badge rejected">
                        <i class="bi bi-x-circle-fill"></i>
                        Return Rejected
                    </span>

                @endif


                {{-- Pickup Scheduled --}}
                @if($order->return_process_status == 'Pickup Scheduled')

                    <span class="return-status-badge scheduled">
                        <i class="bi bi-calendar-check"></i>
                        Pickup Scheduled
                    </span>

                @elseif($order->return_process_status == 'Pickup In Progress')

                    <span class="return-status-badge progress">
                        <i class="bi bi-truck"></i>
                        Pickup In Progress
                    </span>

                @elseif($order->return_process_status == 'Pickup Completed')

                    <span class="return-status-badge completed">
                        <i class="bi bi-check2-circle"></i>
                        Pickup Completed
                    </span>

                @endif


                {{-- Refund --}}
                @if($order->refund_status == 'Pending')

                    <span class="return-status-badge refund-pending">
                        <i class="bi bi-hourglass-split"></i>
                        Refund Pending
                    </span>

                @elseif($order->refund_status == 'Processing')

                    <span class="return-status-badge refund-processing">
                        <i class="bi bi-arrow-repeat"></i>
                        Refund Processing
                    </span>

                @elseif($order->refund_status == 'Refunded')

                    <span class="return-status-badge refunded">
                        <i class="bi bi-cash-coin"></i>
                        Refund Completed
                    </span>

                @endif

            </div>

        </div>

    @endif

</div>


                        <div class="col-md-4 col-12 text-md-end mt-2 mt-md-0">
                            <span class="fw-bold text-dark">
                                Total: ₹{{ number_format($order->total_amount, 2) }}
                            </span>
                        </div>
                    </div>
                </div>

                {{-- Order Body — Table Layout --}}
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-hover align-middle mb-0">
                            <thead class="bg-light">
                                <tr>
                                    <th class="ps-4" style="width: 70px;">#</th>
                                    <th style="min-width: 160px;">Product</th>
                                    <th style="width: 100px;">Qty</th>
                                    <th style="width: 120px;">Price</th>
                                    <th style="width: 120px;">Total</th>
                                    <th class="text-end pe-4" style="width: 180px;">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($order->items as $index => $item)
                                    <tr>
                                        <td class="ps-4 text-muted">{{ $index + 1 }}</td>
                                        <td>
                                            <div class="d-flex align-items-center gap-3">
                                                <img src="{{ asset('uploads/products/' . $item->product->first_image) }}"
                                                    alt="{{ $item->product->name }}" class="rounded-3"
                                                    style="width: 48px; height: 48px; object-fit: cover;"
                                                    alt="{{ $item->product->name }}">
                                                <div>
                                                    <a href="/product/{{ $item->product->slug }}"
                                                        class="text-dark text-decoration-none fw-semibold">
                                                        {{ $item->product->name }}
                                                    </a>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <span class="badge bg-light text-dark rounded-pill px-3 py-2">
                                                {{ $item->quantity }}
                                            </span>
                                        </td>
                                        <td>₹{{ number_format($item->price, 2) }}</td>
                                        <td class="fw-semibold">₹{{ number_format($item->price * $item->quantity, 2) }}
                                        </td>
                                        <td class="text-end pe-4">
                                            <div class="d-flex gap-2 justify-content-end flex-wrap">
                                                <a href="/product/{{ $item->product->slug }}"
                                                    class="btn btn-outline-secondary btn-sm rounded-pill px-3">
                                                    <i class="bi bi-eye me-1"></i> View
                                                </a>

                                                @if ($order->status == 'Delivered')
                                                    @php
                                                        $reviewExists = \App\Models\Review::where(
                                                            'product_id',
                                                            $item->product_id,
                                                        )
                                                            ->where('user_id', auth()->id())
                                                            ->exists();
                                                    @endphp
                                                    @if ($reviewExists)
                                                        <button class="btn btn-success btn-sm rounded-pill px-3" disabled>
                                                            <i class="bi bi-check2-circle me-1"></i> Reviewed
                                                        </button>
                                                    @else
                                                        <a href="{{ route('review.create', $item->product_id) }}"
                                                            class="btn btn-dark btn-sm rounded-pill px-3">
                                                            <i class="bi bi-pencil me-1"></i> Review
                                                        </a>
                                                    @endif
                                                    @if (
                                                        $order->status == 'Delivered' &&
                                                            $order->delivered_at &&
                                                            now()->lte(\Carbon\Carbon::parse($order->delivered_at)->addDays(5)))
                                                        <a href="{{ route('order.return.form', $order->id) }}"
                                                            class="btn btn-warning btn-sm rounded-pill px-3">
                                                            <i class="bi bi-arrow-return-left me-1"></i>
                                                            Return
                                                        </a>
                                                    @endif
                                                @endif
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

                {{-- Order Footer — Cancel Button --}}
                @if (in_array($order->status, ['Pending', 'Processing']))
                    <div class="card-footer bg-white border-top-0 px-4 py-3">
                        <div class="d-flex justify-content-end">
                            <form action="{{ route('order.cancel', $order->id) }}" method="POST"
                                onsubmit="return confirm('Are you sure you want to cancel this order?');">
                                @csrf
                                @method('PUT')
                                <button type="submit" class="btn btn-outline-danger btn-sm rounded-pill px-4">
                                    <i class="bi bi-x-circle me-1"></i> Cancel Order
                                </button>
                            </form>
                        </div>
                    </div>
                @endif
            </div>

        @empty

            {{-- Empty State --}}
            <div class="text-center py-5 my-5">
                <div class="mb-4">
                    <img src="{{ asset('images/empty-order.png') }}" style="width: 180px;" alt="No Orders">
                </div>
                <h4 class="fw-bold">No Orders Yet</h4>
                <p class="text-muted mb-4">You haven't placed any orders yet. Start shopping now!</p>
                <a href="/" class="btn btn-dark btn-lg rounded-pill px-5">
                    <i class="bi bi-shop me-2"></i> Start Shopping
                </a>
            </div>
        @endforelse

        {{-- ✅ 修复分页：只在对象支持分页且有页数时显示 --}}
        @if ($orders instanceof \Illuminate\Pagination\LengthAwarePaginator && $orders->hasPages())
            <div class="d-flex justify-content-center mt-4">
                {{ $orders->links() }}
            </div>
        @endif

    </div>
@endsection
