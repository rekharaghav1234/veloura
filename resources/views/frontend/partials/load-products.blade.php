@foreach($products as $product)

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

@endforeach