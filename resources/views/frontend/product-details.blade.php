@extends('frontend.layouts.app')

@section('content')
    <!-- Product Details -->
    <section class="py-5">
        <div class="container">
            <div class="row g-5 align-items-start">

                <!-- Product Image -->
                <div class="col-lg-6">
                    <div class="image-zoom-effect">
                        @php
    $images = json_decode($product->images, true);

    if (!$images) {
        $images = explode(',', str_replace(['[',']','"'], '', $product->images));
    }

    $images = array_filter(array_map('trim', $images));
@endphp

<img id="mainProductImage"
     src="{{ asset('uploads/products/'.$images[0]) }}"
     alt="{{ $product->name }}"
     class="img-fluid rounded-4 shadow-sm w-100"
     style="height:550px; object-fit:cover;">
                    </div>
                    <!-- Thumbnail – सिर्फ एक इमेज (क्योंकि अभी product_images टेबल नहीं है) -->
                    <div class="row mt-3 g-2">

                        @foreach($images as $img)
                        
                        <div class="col-3">
                        
                            <img src="{{ asset('uploads/products/'.$img) }}"
                                 class="img-fluid rounded border product-thumb"
                                 style="height:90px;
                                        width:100%;
                                        object-fit:cover;
                                        cursor:pointer;">
                        
                        </div>
                        
                        @endforeach
                        
                        </div>
                </div>

                <!-- Product Details -->
                <div class="col-lg-6">
                    <!-- Category -->
                    <p class="text-uppercase text-muted small mb-1">
                        {{ $product->category->name ?? 'Uncategorized' }}
                    </p>

                    <h2 class="fw-bold display-6">{{ $product->name }}</h2>

                    <!-- Rating – अब $avgRating और $reviewCount पास हो रहे हैं -->
                    <div class="d-flex align-items-center gap-2 my-2">
                        @php
                            $avg = $avgRating ?? 0;
                            $total = $reviewCount ?? 0;
                            $fullStars = floor($avg);
                            $halfStar = ($avg - $fullStars) >= 0.5 ? 1 : 0;
                            $emptyStars = 5 - $fullStars - $halfStar;
                        @endphp
                        <span class="text-warning">
                            @for($i=0; $i<$fullStars; $i++) ★ @endfor
                            @if($halfStar) ★ @endif
                            @for($i=0; $i<$emptyStars; $i++) ☆ @endfor
                        </span>
                        <span class="text-muted small">({{ number_format($avg, 1) }} / 5.0 – {{ $total }} reviews)</span>
                    </div>

                    <!-- Price -->
                    <div class="fs-2 fw-semibold my-3" style="color: #B76E79;">
                        ₹ {{ number_format($product->price, 2) }}
                    </div>

                    <!-- Description -->
                    <p class="text-muted" style="font-size: 1.05rem;">
                        {{ $product->description ?? 'No description available.' }}
                    </p>

                    <!-- Stock Status -->
                    <div class="mb-3">
                        <span class="badge {{ $product->stock > 0 ? 'bg-success' : 'bg-danger' }} px-3 py-2">
                            {{ $product->stock > 0 ? 'In Stock' : 'Out of Stock' }}
                        </span>
                        <span class="text-muted ms-2">
                            {{ $product->stock }} units available
                        </span>
                    </div>

                    <!-- Quantity Selector -->
                    <div class="d-flex align-items-center gap-3 my-4">
                        <label for="quantity" class="fw-semibold me-2">Qty:</label>
                        <div class="input-group" style="width:170px; height:48px;">
                            <button class="btn btn-outline-dark px-3" type="button" id="minus-btn">−</button>
                        
                            <input type="number"
                                   id="quantity"
                                   class="form-control text-center fw-bold"
                                   value="1"
                                   min="1"
                                   max="{{ $product->stock > 0 ? $product->stock : 1 }}">
                        
                            <button class="btn btn-outline-dark px-3" type="button" id="plus-btn">+</button>
                        </div>
                    </div>

                    <!-- Add to Cart -->
                    <div class="d-flex flex-wrap gap-3 mt-4">
                        <a href="{{ url('/add-to-cart/'.$product->id) }}"
                           class="btn btn-dark px-5 py-3 rounded-pill fw-semibold"
                           style="background-color: #4B342C; border-color: #4B342C;">
                            <i class="bi bi-bag me-2"></i> Add To Cart
                        </a>
                        {{-- <a href="#" class="btn btn-outline-secondary px-4 py-3 rounded-pill">
                            <i class="bi bi-heart"></i>
                        </a> --}}
                    </div>

                    <!-- Meta Info -->
                    <hr class="my-4">
                    <div class="row text-muted small">
                        <div class="col-6">
                            <span class="fw-semibold">SKU:</span> {{ $product->sku ?? 'N/A' }}
                        </div>
                        <div class="col-6">
                            <span class="fw-semibold">Category:</span> {{ $product->category->name ?? 'N/A' }}
                        </div>
                    </div>

                    <!-- Social Share -->
                    <div class="mt-3 d-flex align-items-center gap-2 flex-wrap">
                        <span class="fw-semibold me-2">Share:</span>
                    
                        <!-- WhatsApp -->
                        <a href="https://wa.me/?text={{ urlencode($product->name.' '.url()->current()) }}"
                           target="_blank"
                           class="btn btn-success btn-sm rounded-circle">
                            <i class="bi bi-whatsapp"></i>
                        </a>
                    
                        <!-- Facebook -->
                        <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(url()->current()) }}"
                           target="_blank"
                           class="btn btn-primary btn-sm rounded-circle">
                            <i class="bi bi-facebook"></i>
                        </a>
                    
                        <!-- X (Twitter) -->
                        <a href="https://twitter.com/intent/tweet?text={{ urlencode($product->name) }}&url={{ urlencode(url()->current()) }}"
                           target="_blank"
                           class="btn btn-dark btn-sm rounded-circle">
                            <i class="bi bi-twitter-x"></i>
                        </a>
                    
                        <!-- Telegram -->
                        <a href="https://t.me/share/url?url={{ urlencode(url()->current()) }}&text={{ urlencode($product->name) }}"
                           target="_blank"
                           class="btn btn-info btn-sm rounded-circle">
                            <i class="bi bi-telegram"></i>
                        </a>
                    
                        <!-- LinkedIn -->
                        <a href="https://www.linkedin.com/sharing/share-offsite/?url={{ urlencode(url()->current()) }}"
                           target="_blank"
                           class="btn btn-primary btn-sm rounded-circle">
                            <i class="bi bi-linkedin"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Product Tabs -->
    <section class="py-5 bg-light">
        <div class="container">
            <ul class="nav nav-tabs" id="productTabs" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="desc-tab" data-bs-toggle="tab" data-bs-target="#desc" type="button" role="tab">Description</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="reviews-tab" data-bs-toggle="tab" data-bs-target="#reviews" type="button" role="tab">Reviews ({{ $reviewCount ?? 0 }})</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="shipping-tab" data-bs-toggle="tab" data-bs-target="#shipping" type="button" role="tab">Shipping & Returns</button>
                </li>
            </ul>
            <div class="tab-content p-4 bg-white rounded-bottom shadow-sm">
                <div class="tab-pane fade show active" id="desc" role="tabpanel">
                    <p>{{ $product->description ?? 'No description.' }}</p>
                </div>
                <div class="tab-pane fade" id="reviews" role="tabpanel">
                    @if(isset($product->reviews) && $product->reviews->count() > 0)
                        @foreach($product->reviews as $review)
                            <div class="border-bottom pb-3 mb-3">
                                <strong>{{ $review->user->name ?? 'Anonymous' }}</strong>
                                <span class="text-warning">
                                    @for($i=1; $i<=5; $i++) 
                                        @if($i <= $review->rating) ★ @else ☆ @endif
                                    @endfor
                                </span>
                                <p class="mb-0">{{ $review->comment }}</p>
                                <small class="text-muted">{{ $review->created_at->format('M d, Y') }}</small>
                            </div>
                        @endforeach
                    @else
                        <p>No reviews yet. Be the first to review!</p>
                    @endif
                </div>
                <div class="tab-pane fade" id="shipping" role="tabpanel">
                    <p>Free shipping on orders over ₹500. Returns accepted within 7 days.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Related Products -->
    {{-- @php
        dd($relatedProducts);
    @endphp --}}
    {{-- @if(isset($relatedProducts) && $relatedProducts->count() > 0) --}}
    
    <section class="py-5">
        <div class="container">
    
            <h4 class="text-uppercase mb-4">
                You May Also Like
            </h4>
    
            <div class="row">
    
                @foreach($relatedProducts as $relProduct)
    
                    <div class="col-lg-3 col-md-4 col-6 mb-4">
    
                        <div class="card border-0 shadow-sm h-100">
    
                            <a href="{{ route('product.details', $relProduct->slug) }}">
    
                                <img src="{{ asset('uploads/products/'.$relProduct->image) }}"
                                     class="card-img-top"
                                     alt="{{ $relProduct->name }}"
                                     style="height:300px; width:100%; object-fit:cover;">
    
                            </a>
    
                            <div class="card-body text-center">
    
                                <h6 class="mb-2">
                                    {{ $relProduct->name }}
                                </h6>
    
                                <p class="fw-bold text-dark mb-2">
                                    ₹{{ number_format($relProduct->price,2) }}
                                </p>
    
                                <a href="{{ route('product.details', $relProduct->slug) }}"
                                   class="btn btn-dark btn-sm">
    
                                    View Product
    
                                </a>
    
                            </div>
    
                        </div>
    
                    </div>
    
                @endforeach
    
            </div>
    
        </div>
    </section>
    {{-- @endif --}}

    <!-- JavaScript -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Quantity buttons
            const minusBtn = document.getElementById('minus-btn');
            const plusBtn = document.getElementById('plus-btn');
            const qtyInput = document.getElementById('quantity');
            if (minusBtn && plusBtn && qtyInput) {
                minusBtn.addEventListener('click', function() {
                    let val = parseInt(qtyInput.value);
                    if (val > 1) qtyInput.value = val - 1;
                });
                plusBtn.addEventListener('click', function() {
                    let val = parseInt(qtyInput.value);
                    let max = parseInt(qtyInput.getAttribute('max')) || 999;
                    if (val < max) qtyInput.value = val + 1;
                });
            }

            // Thumbnail click (एक ही इमेज है, फिर भी)
            const thumbnails = document.querySelectorAll('.col-3 img');
            const mainImg = document.querySelector('.image-zoom-effect img');
            if (thumbnails.length && mainImg) {
                thumbnails.forEach(thumb => {
                    thumb.addEventListener('click', function() {
                        mainImg.src = this.src;
                    });
                });
            }
        });
    </script>
    <script>
        document.querySelectorAll('.product-thumb').forEach(function(img){

img.addEventListener('click',function(){

    document.getElementById('mainProductImage').src=this.src;

    document.querySelectorAll('.product-thumb').forEach(function(i){
        i.classList.remove('border-dark','border-3');
    });

    this.classList.add('border-dark','border-3');

});

});
    </script>
@endsection