@extends('frontend.layouts.app')

@section('content')

<link rel="stylesheet" href="{{ asset('css/admin-orders.css') }}">

<section class="cart-section">

    <div class="container">

        <!-- ─── Header ─── -->
        <div class="cart-header">
            <h2>
                <i class="bi bi-cart4"></i>
                Shopping Cart
                <span class="badge bg-primary bg-opacity-10 text-primary fw-semibold ms-2" style="font-size:0.8rem; padding:0.3rem 1rem;">
                    {{ count($carts) }} items
                </span>
            </h2>

            <a href="/products" class="btn-outline-primary-custom" style="text-decoration:none;">
                <i class="bi bi-arrow-left me-1"></i> Continue Shopping
            </a>
        </div>

        @php
            $total = 0;
        @endphp

        @if($carts->count() > 0)

            <!-- ─── Cart Items ─── -->
            @foreach($carts as $cart)
                @php
                    $subtotal = $cart->product->price * $cart->quantity;
                    $total += $subtotal;
                @endphp

                <div class="cart-item" data-cart-id="{{ $cart->id }}">
                    <div class="row g-3">

                        <!-- Image -->
                        <div class="col-md-2 col-4">
                            <img src="{{ asset('uploads/products/'.$cart->product->image) }}"
                                 class="product-image w-100"
                                 alt="{{ $cart->product->name }}"
                                 onerror="this.src='{{ asset('images/placeholder.png') }}'">
                        </div>

                        <!-- Name -->
                        <div class="col-md-3 col-8">
                            <h5 class="product-name">{{ $cart->product->name }}</h5>
                            <small class="text-muted">Category: {{ $cart->product->category->name ?? '—' }}</small>
                        </div>

                        <!-- Price -->
                        <div class="col-md-2 col-4">
                            <span class="product-price">₹ {{ number_format($cart->product->price, 2) }}</span>
                        </div>

                        <!-- Quantity -->
                        <div class="col-md-2 col-4">
                            <div class="quantity-control">
                                <a href="#" class="qty-btn decrement" data-id="{{ $cart->id }}">−</a>
                                <input type="number" class="qty-input" value="{{ $cart->quantity }}" min="1" readonly>
                                <a href="#" class="qty-btn increment" data-id="{{ $cart->id }}">+</a>
                            </div>
                        </div>

                        <!-- Subtotal -->
                        <div class="col-md-2 col-4">
                            <span class="item-total">₹ {{ number_format($subtotal, 2) }}</span>
                        </div>

                        <!-- Remove -->
                        <div class="col-md-1 col-4 text-end">
                            <a href="/cart/remove/{{ $cart->id }}"
                               class="btn-remove"
                               onclick="return confirm('Remove this item?')">
                                <i class="bi bi-trash3"></i> Remove
                            </a>
                        </div>

                    </div>
                </div>
            @endforeach

            <!-- ─── Summary ─── -->
            <div class="cart-summary">
                <div>
                    <span class="total-label">Total ({{ count($carts) }} items)</span>
                    <div class="total-amount">₹ {{ number_format($total, 2) }}</div>
                </div>
                <div>
                    <a href="/checkout" class="btn-checkout">
                        <i class="bi bi-lock"></i> Proceed to Checkout
                    </a>
                </div>
            </div>

        @else

            <!-- ─── Empty Cart ─── -->
            <div class="empty-cart">
                <i class="bi bi-cart-x"></i>
                <h4>Your cart is empty</h4>
                <p>Looks like you haven't added any items yet.</p>
                <a href="/" class="btn-checkout" style="display:inline-flex;">
                    <i class="bi bi-shop"></i> Start Shopping
                </a>
            </div>

        @endif

    </div>

</section>

<!-- ─── Quantity Update with AJAX (Optional) ─── -->
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const decrementBtns = document.querySelectorAll('.decrement');
        const incrementBtns = document.querySelectorAll('.increment');

        function updateQuantity(cartId, newQty) {
            // You can implement AJAX to update the database
            // For now, just reload page to reflect changes
            window.location.href = `/cart/update/${cartId}?quantity=${newQty}`;
        }

        decrementBtns.forEach(btn => {
            btn.addEventListener('click', function(e) {
                e.preventDefault();
                const cartId = this.dataset.id;
                const input = this.closest('.quantity-control').querySelector('.qty-input');
                let qty = parseInt(input.value);
                if (qty > 1) {
                    qty--;
                    input.value = qty;
                    updateQuantity(cartId, qty);
                }
            });
        });

        incrementBtns.forEach(btn => {
            btn.addEventListener('click', function(e) {
                e.preventDefault();
                const cartId = this.dataset.id;
                const input = this.closest('.quantity-control').querySelector('.qty-input');
                let qty = parseInt(input.value);
                qty++;
                input.value = qty;
                updateQuantity(cartId, qty);
            });
        });
    });
</script>

@endsection