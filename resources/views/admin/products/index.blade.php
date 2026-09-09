@extends('frontend.layouts.app')

@section('content')

<link rel="stylesheet" href="{{ asset('css/admin-orders.css') }}">

<div class="container-fluid">

    <!-- ─── Page Header ─── -->
    <div class="page-header">
        <h3>
            <i class="bi bi-box-seam"></i>
            All Products
            <span class="badge bg-primary bg-opacity-10 text-primary fw-semibold ms-2" style="font-size:0.75rem; padding:0.25rem 0.85rem;">
                {{ $products->total() ?? 0 }}
            </span>
        </h3>

        <div class="header-actions">
            <div class="search-box">
                <i class="bi bi-search"></i>
                <input type="text" placeholder="Search products..." id="tableSearch" />
            </div>
            <a href="/admin/products/create" class="btn-outline-primary-custom" style="text-decoration:none;">
                <i class="bi bi-plus-circle me-1"></i> Add Product
            </a>
        </div>
    </div>

    <!-- ─── Card ─── -->
    <div class="card card-order">

        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-order" id="productTable">
                    <thead>
                        <tr>
                            <th style="width:80px;"><i class="bi bi-image"></i> Image</th>
                            <th><i class="bi bi-tag"></i> Name</th>
                            <th><i class="bi bi-currency-rupee"></i> Price</th>
                            <th><i class="bi bi-box"></i> Stock</th>
                            <th><i class="bi bi-folder"></i> Category</th>
                            <th style="width:200px;"><i class="bi bi-tools"></i> Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($products as $product)
                        <tr>
                            <!-- Image -->
                            <td>
                                @php
                                $images = json_decode($product->images, true);
                                $firstImage = $images[0] ?? 'placeholder.png';
                            @endphp
                            
                            <img src="{{ asset('uploads/products/'.$firstImage) }}"
                            class="product-img"
                            style="width:72px;height:72px;max-width:72px;max-height:72px;object-fit:cover;display:block;border-radius:12px;"
                            alt="{{ $product->name }}">
                       
                            </td>

                            <!-- Name -->
                            <td>
                                <span class="product-name">{{ $product->name }}</span>
                            </td>

                            <!-- Price -->
                            <td>
                                <span class="fw-semibold">₹ {{ number_format($product->price, 2) }}</span>
                            </td>

                            <!-- Stock -->
                            <td>
                                @php
                                    $stockClass = 'in-stock';
                                    $dotClass = 'green';
                                    if ($product->stock <= 0) {
                                        $stockClass = 'out-of-stock';
                                        $dotClass = 'red';
                                    } elseif ($product->stock <= 5) {
                                        $stockClass = 'low-stock';
                                        $dotClass = 'amber';
                                    }
                                @endphp
                                <span class="badge-stock {{ $stockClass }}">
                                    <span class="dot {{ $dotClass }}"></span>
                                    {{ $product->stock }}
                                </span>
                            </td>

                            <!-- Category -->
                            <td>
                                <span style="color:#475569;">
                                    {{ $product->category->name ?? '—' }}
                                </span>
                            </td>

                            <!-- Action -->
                            <td>
                                <a href="/admin/products/edit/{{ $product->id }}"
                                   class="btn-view btn-edit me-1">
                                    <i class="bi bi-pencil"></i> Edit
                                </a>
                                <a href="/admin/products/delete/{{ $product->id }}"
                                   class="btn-view btn-delete"
                                   onclick="return confirm('Are you sure you want to delete this product?')">
                                    <i class="bi bi-trash"></i> Delete
                                </a>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="6">
                                <div class="empty-state">
                                    <i class="bi bi-inbox"></i>
                                    <h5>No products found</h5>
                                    <p>Start by adding your first product.</p>
                                </div>
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        <!-- ─── Pagination ─── -->
        @if(method_exists($products, 'links'))
        <div class="card-footer bg-transparent border-top-0 d-flex flex-wrap align-items-center justify-content-between p-3 pt-0">
            <div class="text-muted small">
                Showing {{ $products->firstItem() ?? 0 }} – {{ $products->lastItem() ?? 0 }} of {{ $products->total() ?? 0 }}
            </div>
            <div>
                {{ $products->links('pagination::bootstrap-5') }}
            </div>
        </div>
        @endif

    </div>

</div>

<!-- ─── Search filter ─── -->
<script>
    (function() {
        const searchInput = document.getElementById('tableSearch');
        if (!searchInput) return;
        const table = document.getElementById('productTable');
        const rows = table ? table.querySelectorAll('tbody tr') : [];

        searchInput.addEventListener('keyup', function() {
            const query = this.value.toLowerCase().trim();
            rows.forEach(row => {
                if (row.querySelector('.empty-state')) return;
                const text = row.textContent.toLowerCase();
                row.style.display = text.includes(query) ? '' : 'none';
            });
            const visible = Array.from(rows).filter(r => r.style.display !== 'none' && !r.querySelector('.empty-state'));
            const emptyRow = table.querySelector('tbody tr .empty-state')?.closest('tr');
            if (emptyRow) {
                emptyRow.style.display = visible.length === 0 ? '' : 'none';
            }
        });
    })();
</script>

@endsection