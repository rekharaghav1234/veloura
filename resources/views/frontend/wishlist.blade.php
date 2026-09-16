@extends('frontend.layouts.app')

@section('content')

<div class="container py-5">

    <div class="d-flex justify-content-between align-items-center mb-4">

        <div>
            <h2 class="fw-bold mb-1">My Wishlist</h2>
            <p class="text-muted mb-0">
                Your favourite products
            </p>
        </div>

        <a href="{{ url('/') }}"
           class="btn btn-outline-dark rounded-pill px-4">
            <i class="bi bi-arrow-left me-1"></i>
            Continue Shopping
        </a>

    </div>


    @if($wishlists->count() > 0)

        <div class="row g-4">

            @foreach($wishlists as $wishlist)

                @php

                    $product = $wishlist->product;

                    $images = json_decode($product->images, true);

                    if (!$images) {
                        $images = explode(
                            ',',
                            str_replace(
                                ['[', ']', '"'],
                                '',
                                $product->images
                            )
                        );
                    }

                    $images = array_filter(
                        array_map('trim', $images)
                    );

                    $firstImage = $images[0] ?? 'no-image.png';

                @endphp


                <div class="col-lg-3 col-md-4 col-6">

                    <div class="wishlist-card">

                        <div class="wishlist-image">

                            <a href="{{ route('product.details', $product->slug) }}">

                                <img
                                    src="{{ asset('uploads/products/'.$firstImage) }}"
                                    alt="{{ $product->name }}">

                            </a>


                            <button
                                type="button"
                                class="wishlist-remove wishlist-btn active"
                                data-product-id="{{ $product->id }}">

                                <i class="bi bi-heart-fill"></i>

                            </button>

                        </div>


                        <div class="wishlist-content">

                            <h6>
                                {{ $product->name }}
                            </h6>

                            <p>
                                ₹{{ number_format($product->price) }}
                            </p>

                            <a
                                href="{{ route('product.details', $product->slug) }}"
                                class="btn btn-dark w-100 rounded-pill">

                                View Product

                            </a>

                        </div>

                    </div>

                </div>

            @endforeach

        </div>

    @else

        <div class="text-center py-5">

            <i
                class="bi bi-heart"
                style="font-size:70px; color:#ccc;">
            </i>

            <h4 class="fw-bold mt-3">
                Your Wishlist is Empty
            </h4>

            <p class="text-muted">
                Save products you love here.
            </p>

            <a href="/"
               class="btn btn-dark rounded-pill px-5">

                Start Shopping

            </a>

        </div>

    @endif

</div>


<style>

.wishlist-card {
    background: #fff;
    border: 1px solid #eee;
    border-radius: 16px;
    overflow: hidden;
    height: 100%;
    transition: .3s;
}

.wishlist-card:hover {
    transform: translateY(-4px);
    box-shadow: 0 8px 25px rgba(0,0,0,.08);
}

.wishlist-image {
    position: relative;
    height: 300px;
    background: #f8f5f3;
}

.wishlist-image img {
    width: 100%;
    height: 100%;
    object-fit: cover;
}

.wishlist-remove {
    position: absolute;
    top: 12px;
    right: 12px;

    width: 40px;
    height: 40px;

    border-radius: 50%;
    border: none;

    background: #fff;
    color: #dc3545;

    display: flex;
    align-items: center;
    justify-content: center;

    cursor: pointer;

    box-shadow: 0 3px 12px rgba(0,0,0,.15);

    font-size: 18px;
}

.wishlist-content {
    padding: 15px;
}

.wishlist-content h6 {
    font-weight: 600;
    margin-bottom: 8px;
}

.wishlist-content p {
    font-size: 18px;
    font-weight: 700;
    color: #4B342C;
    margin-bottom: 12px;
}


@media (max-width: 576px) {

    .wishlist-image {
        height: 220px;
    }

    .wishlist-content {
        padding: 10px;
    }

    .wishlist-content h6 {
        font-size: 14px;
    }

    .wishlist-content p {
        font-size: 16px;
    }

    .wishlist-remove {
        width: 35px;
        height: 35px;
        top: 8px;
        right: 8px;
    }

}

</style>

@endsection