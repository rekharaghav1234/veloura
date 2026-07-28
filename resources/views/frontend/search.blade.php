@extends('frontend.layouts.app')

@section('content')

<section class="py-5">

    <div class="container">

        <div class="row">

            @forelse($products as $product)

            <div class="col-lg-3 col-md-4 col-6 mb-4">

                <div class="card h-100">

                    @php
                        $images = str_replace(['[',']','"'], '', $product->images);
                        $images = explode(',', $images);
                        $firstImage = $images[0] ?? 'no-image.png';
                    @endphp

                    <img src="{{ asset('uploads/products/'.$firstImage) }}"
                         class="product-image img-fluid product-img-fixed">

                    <div class="card-body">

                        <h6>{{ $product->name }}</h6>

                        <p>₹ {{ $product->price }}</p>

                        <a href="{{ route('product.details',$product->slug) }}"
                           class="btn btn-dark w-100">
                            View Product
                        </a>

                    </div>

                </div>

            </div>

            @empty

            <div class="text-center py-5">

                <h4>No Products Found</h4>

            </div>

            @endforelse

        </div>

    </div>

</section>

@endsection