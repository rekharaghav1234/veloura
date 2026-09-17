@php
    $wishlistProductIds = Auth::check()
        ? \App\Models\Wishlist::where('user_id', Auth::id())
            ->pluck('product_id')
            ->toArray()
        : [];
@endphp

@foreach($bestSellingProducts as $product)

<div class="swiper-slide">

  <div class="product-card">

        {{-- Product Image --}}
        <div class="product-image-box">

            <a href="{{ route('product.details', $product->slug) }}">

                <img
                    src="{{ asset('uploads/products/'.$product->first_image) }}"
                    alt="{{ $product->name }}"
                    class="product-img-fixed"
                    loading="lazy"
                >

            </a>

            {{-- Wishlist --}}
            @if(in_array($product->id, $wishlistProductIds ?? []))

                <button
                    type="button"
                    class="btn-icon btn-wishlist wishlist-btn active"
                    data-product-id="{{ $product->id }}"
                    aria-label="Remove from wishlist">
                    <i class="bi bi-heart-fill"></i>
                </button>

            @else

                <button
                    type="button"
                    class="btn-icon btn-wishlist wishlist-btn"
                    data-product-id="{{ $product->id }}"
                    aria-label="Add to wishlist">
                    <i class="bi bi-heart"></i>
                </button>

            @endif

        </div>


        {{-- Product Content --}}
        <div class="product-content">

            <h6 class="product-name">
                {{ $product->name }}
            </h6>

            <div class="price-rating-row">

                <div class="product-price">
                    ₹{{ number_format($product->price) }}
                </div>

            </div>

            <div class="best-selling-count">
                <i class="bi bi-fire"></i>
                Sold: {{ $product->total_sold }}
            </div>

            <a href="{{ route('product.details', $product->slug) }}"
               class="view-btn">
                View Product
            </a>

        </div>

    </div>

</div>

@endforeach