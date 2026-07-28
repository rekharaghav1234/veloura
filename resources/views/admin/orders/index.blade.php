

@extends('frontend.layouts.app')

@section('content')

{{-- Link to the external CSS file (adjust the path as needed) --}}


<div class="container-fluid">

    <!-- ─── Page Header ─── -->
    <div class="page-header">
        <h3>
            <i class="bi bi-box-seam"></i>
            Customer Orders
            <span class="badge bg-primary bg-opacity-10 text-primary fw-semibold ms-2" style="font-size:0.75rem; padding:0.25rem 0.85rem;">
                {{ $orders->total() }}
            </span>
        </h3>

        <div class="header-actions">
            <div class="search-box">
                <i class="bi bi-search"></i>
                <input type="text" placeholder="Search orders..." id="tableSearch" />
            </div>
            {{-- <button class="btn-outline-primary-custom" type="button">
                <i class="bi bi-funnel me-1"></i> Filter
            </button>
            <button class="btn-outline-primary-custom" type="button">
                <i class="bi bi-download me-1"></i> Export
            </button> --}}
        </div>
    </div>

    <!-- ─── Card ─── -->
    <div class="card card-order">

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-order" id="orderTable">

                    <thead>
                        <tr>
                            <th><i class="bi bi-hash"></i> ID</th>
                            <th><i class="bi bi-person"></i> Customer</th>
                            <th><i class="bi bi-telephone"></i> Phone</th>
                            <th><i class="bi bi-currency-rupee"></i> Total</th>
                            <th><i class="bi bi-check-circle"></i> Order Status</th>
                            <th><i class="bi bi-arrow-return-left"></i> Return Request</th>
                            <th><i class="bi bi-clipboard-check"></i> Admin Decision</th>
                            <th><i class="bi bi-truck"></i> Return Process</th>
                            <th><i class="bi bi-credit-card"></i> Refund</th>
                            <th><i class="bi bi-geo-alt"></i> Address</th>
                            <th><i class="bi bi-eye"></i> Action</th>
                        </tr>
                    </thead>

                    <tbody>
                        @forelse($orders as $order)
                        <tr>
                            <!-- ID -->
                            <td>
                                <span class="fw-semibold text-dark">#{{ $order->id }}</span>
                            </td>

                            <!-- Customer -->
                            <td>
                                <div class="customer-cell">
                                    <span class="name">{{ $order->name }}</span>
                                    <span class="email">{{ $order->email }}</span>
                                </div>
                            </td>

                            <!-- Phone -->
                            <td>{{ $order->phone }}</td>

                            <!-- Total -->
                            <td>
                                <span class="fw-semibold">₹ {{ number_format($order->total_amount, 2) }}</span>
                            </td>

                            <!-- Order Status -->
                            <td>
                                <span class="badge-status bg-primary-soft">
                                    <span class="dot blue"></span>
                                    {{ $order->status }}
                                </span>
                            </td>

                            <!-- Return Request -->
                            <td>
                                @if($order->return_request_status == 'Requested')
                                <form action="{{ route('admin.return.approval', $order->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    <select name="return_approval_status" class="form-select-sm-custom" onchange="this.form.submit()">
                                        <option value="">Select</option>
                                        <option value="Approved" {{ $order->return_approval_status == 'Approved' ? 'selected' : '' }}>
                                            ✅ Approve
                                        </option>
                                        <option value="Rejected" {{ $order->return_approval_status == 'Rejected' ? 'selected' : '' }}>
                                            ❌ Reject
                                        </option>
                                    </select>
                                </form>
                                @else
                                <span class="text-muted" style="font-size:0.8rem;">—</span>
                                @endif
                            </td>

                            <!-- Admin Decision -->
                            <td>
                                @if($order->return_approval_status == 'Approved')
                                <span class="badge-status bg-success-soft">
                                    <span class="dot green"></span> Approved
                                </span>
                                @elseif($order->return_approval_status == 'Rejected')
                                <span class="badge-status bg-danger-soft">
                                    <span class="dot red"></span> Rejected
                                </span>
                                @else
                                <span class="text-muted" style="font-size:0.8rem;">—</span>
                                @endif
                            </td>

                            <!-- Return Process -->
                            <td>
                                @if($order->return_approval_status == 'Approved')
                                <form action="{{ route('admin.return.process', $order->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    <select name="return_process_status" class="form-select-sm-custom" onchange="this.form.submit()">
                                        <option value="">Select</option>
                                        <option value="Pickup Scheduled" {{ $order->return_process_status == 'Pickup Scheduled' ? 'selected' : '' }}>
                                            📅 Scheduled
                                        </option>
                                        <option value="Pickup In Progress" {{ $order->return_process_status == 'Pickup In Progress' ? 'selected' : '' }}>
                                            🚚 In Progress
                                        </option>
                                        <option value="Pickup Completed" {{ $order->return_process_status == 'Pickup Completed' ? 'selected' : '' }}>
                                            ✅ Completed
                                        </option>
                                    </select>
                                </form>
                                @else
                                <span class="text-muted" style="font-size:0.8rem;">—</span>
                                @endif
                            </td>

                            <!-- Refund Status -->
                            <td>
                                @if($order->return_process_status == 'Pickup Completed')
                                <form action="{{ route('admin.refund.status', $order->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    <select name="refund_status" class="form-select-sm-custom" onchange="this.form.submit()">
                                        <option value="">Select</option>
                                        <option value="Pending" {{ $order->refund_status == 'Pending' ? 'selected' : '' }}>
                                            ⏳ Pending
                                        </option>
                                        <option value="Processing" {{ $order->refund_status == 'Processing' ? 'selected' : '' }}>
                                            🔄 Processing
                                        </option>
                                        <option value="Refunded" {{ $order->refund_status == 'Refunded' ? 'selected' : '' }}>
                                            💰 Refunded
                                        </option>
                                    </select>
                                </form>
                                @else
                                <span class="text-muted" style="font-size:0.8rem;">—</span>
                                @endif
                            </td>

                            <!-- Address -->
                            <td>
                                <div class="address-cell">{{ $order->address }}</div>
                            </td>

                            <!-- Action -->
                            <td>
                                <a href="/admin/orders/{{ $order->id }}" class="btn-view">
                                    <i class="bi bi-eye"></i> View
                                </a>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="11">
                                <div class="empty-state">
                                    <i class="bi bi-inbox"></i>
                                    <h5>No orders found</h5>
                                    <p>Try adjusting your filters or search terms.</p>
                                </div>
                            </td>
                        </tr>
                        @endforelse
                    </tbody>

                </table>

            </div><!-- /table-responsive -->

        </div><!-- /card-body -->

        <!-- ─── Optional: Pagination ─── -->
        @if(method_exists($orders, 'links'))
        <div class="card-footer bg-transparent border-top-0 d-flex justify-content-between align-items-center flex-wrap p-3 pt-0">
            <div class="text-muted small">
                Showing {{ $orders->firstItem() ?? 0 }} – {{ $orders->lastItem() ?? 0 }} of {{ $orders->total() ?? 0 }}
            </div>
            <div>
                {{ $orders->links('pagination::bootstrap-5') }}
            </div>
        </div>
        @endif

    </div><!-- /card -->

</div><!-- /container -->

<!-- ─── Simple search filter (optional) ─── -->
<script>
    (function() {
        const searchInput = document.getElementById('tableSearch');
        if (!searchInput) return;

        const table = document.getElementById('orderTable');
        const rows = table ? table.querySelectorAll('tbody tr') : [];

        searchInput.addEventListener('keyup', function() {
            const query = this.value.toLowerCase().trim();

            rows.forEach(row => {
                // skip empty-state row (if any)
                if (row.querySelector('.empty-state')) return;

                const text = row.textContent.toLowerCase();
                row.style.display = text.includes(query) ? '' : 'none';
            });

            // optional: show/hide empty state if all hidden
            const visible = Array.from(rows).filter(r => r.style.display !== 'none' && !r.querySelector(
                '.empty-state'));
            const emptyRow = table.querySelector('tbody tr .empty-state')?.closest('tr');
            if (emptyRow) {
                emptyRow.style.display = visible.length === 0 ? '' : 'none';
            }
        });
    })();
</script>

@endsection

