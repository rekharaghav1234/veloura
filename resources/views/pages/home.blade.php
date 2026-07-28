@extends('layouts.app')

@section('content')

{{-- HERO SECTION --}}

<section class="hero-section">

    <div class="container">

        <div class="hero-content text-white">

            <h1>
                Elevate Your Stylesdfghfdsa
            </h1>

            <p>
                Discover the latest fashion trends with VELOURA
            </p>

            <button class="shop-btn">
                Shop Collection
            </button>

        </div>

    </div>

</section>

{{-- CATEGORY SECTION --}}

<section class="container my-5">

    <div class="text-center mb-5">

        <h2 class="fw-bold">
            Shop By Category
        </h2>

    </div>

    <div class="row g-4">

        <div class="col-md-6">

            <div class="category-card">

                <img
                    src="https://images.unsplash.com/photo-1515886657613-9f3515b0c78f?q=80&w=1200"
                    class="w-100"
                >

                <div class="category-overlay">
                    <h3>Women</h3>
                </div>

            </div>

        </div>

        <div class="col-md-6">

            <div class="category-card">

                <img
                    src="https://images.unsplash.com/photo-1512436991641-6745cdb1723f?q=80&w=1200"
                    class="w-100"
                >

                <div class="category-overlay">
                    <h3>Men</h3>
                </div>

            </div>

        </div>

    </div>

</section>

@endsection