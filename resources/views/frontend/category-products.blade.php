@extends('frontend.layouts.app')

@section('content')

<section class="py-5">

    <div class="container">

        <div class="text-center mb-5">

            <h2 class="fw-bold">

                {{ $category->name }}

            </h2>

            <p class="text-muted">

                Explore latest collection

            </p>

        </div>

        <div class="row g-4">

            @foreach($products as $product)

            <div class="col-lg-3
                        col-md-4
                        col-6">

                <div class="product-card shadow-sm">

                    <img
                        src="{{ asset('uploads/products/'.$product->image) }}"
                        class="w-100">

                    <div class="p-3">

                        <h6 class="fw-semibold">

                            {{ $product->name }}

                        </h6>

                        <div class="price">

                            ₹ {{ $product->price }}

                        </div>

                        <a href="/product/{{ $product->slug }}"
                           class="btn btn-dark w-100 mt-3">

                            View Product

                        </a>

                    </div>

                </div>

            </div>

            @endforeach

        </div>

    </div>

</section>

@endsection