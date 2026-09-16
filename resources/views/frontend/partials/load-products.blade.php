{{-- @foreach($products as $product)

@php
$images=str_replace(['[',']','"'],'',$product->images);
$images=explode(',',$images);
$firstImage=$images[0] ?? 'no-image.png';
@endphp

<div class="col-lg-3 col-md-4 col-6 mb-4">

<div class="product-card">

<div class="product-image-box">

<a href="{{ route('product.details',$product->slug) }}">
    <img
    src="{{ asset('uploads/products/'.$firstImage) }}"
    loading="lazy"
    class="product-img-fixed"
    alt="{{ $product->name }}">
</a>

</div>

<div class="product-content">

<h6 class="product-name">
{{ $product->name }}
</h6>

<p class="product-description">
{{ \Illuminate\Support\Str::limit($product->description,35) }}
</p>

<div class="price-rating-row">

<div class="product-price">
₹{{ number_format($product->price) }}
</div>

<div class="rating-box">

@if($product->reviews_count>0)

⭐ {{ number_format($product->reviews_avg_rating,1) }}

@else

⭐0.0

@endif

</div>

</div>

<a href="{{ route('product.details',$product->slug) }}"
class="view-btn">
View Product
</a>

</div>

</div>

</div>

@endforeach --}}
@foreach($products as $product)

@php
    $images = str_replace(['[',']','"'], '', $product->images);
    $images = explode(',', $images);
    $firstImage = trim($images[0] ?? '');

    $hasRating = ($product->reviews_count ?? 0) > 0;
    $rating = $product->reviews_avg_rating ?? 0;
@endphp

<div class="col-lg-3 col-md-4 col-6 mb-4">

    <div class="product-card">

        <!-- Product Image -->
        <div class="product-image-box">

            <a href="{{ route('product.details', $product->slug) }}">
        
                @if($firstImage)
                    <img
                        src="{{ asset('uploads/products/'.$firstImage) }}"
                        loading="lazy"
                        class="product-img-fixed"
                        alt="{{ $product->name }}">
                @else
                    <img
                        src="{{ asset('uploads/products/no-image.png') }}"
                        class="product-img-fixed"
                        alt="No Image">
                @endif
        
            </a>
        
            <!-- Wishlist Button -->
            <button
                type="button"
                class="btn-icon btn-wishlist wishlist-btn"
                data-product-id="{{ $product->id }}"
                aria-label="Add to wishlist"
                style="
                    position: absolute;
                    top: 15px;
                    left: 15px;
                    z-index: 9999;
                    pointer-events: auto;
                    cursor: pointer;
                "
            >
                <svg width="24" height="24" viewBox="0 0 24 24" style="pointer-events: none;">
                    <use xlink:href="#heart"></use>
                </svg>
            </button>
        
        </div>

        <!-- Product Content -->
        <div class="product-content">

            <h6 class="product-name">
                {{ $product->name }}
            </h6>

            <p class="product-description">
                {{ \Illuminate\Support\Str::limit($product->description, 45) }}
            </p>

            <!-- Price + Rating -->
            <div class="price-rating-row">

                <div class="product-price">
                    ₹{{ number_format($product->price) }}
                </div>

                @if($hasRating)
                    <div class="rating-box">
                        <span class="rating-star">★</span>
                        <span>{{ number_format($rating, 1) }}</span>
                        <span class="rating-count">
                            ({{ $product->reviews_count }})
                        </span>
                    </div>
                @endif

            </div>

            <!-- View Button -->
            <a href="{{ route('product.details', $product->slug) }}"
               class="view-btn">
                View Product
            </a>

        </div>

    </div>

</div>

@endforeach