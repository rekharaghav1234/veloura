 
            @foreach($products as $product)
            {{-- @php
    $isWishlisted = auth()->check()
        ? \App\Models\Wishlist::where('user_id', auth()->id())
            ->where('product_id', $product->id)
            ->exists()
        : false;
@endphp --}}
          <div class="swiper-slide">
            {{-- @include('frontend.partials.new-arrivals') --}}
            <div class="product-item image-zoom-effect link-effect">
              <div class="image-holder position-relative">
                <img src="{{ asset('uploads/products/'.$product->first_image) }}"
                alt="{{ $product->name }}"
                class="product-image img-fluid product-img-fixed">
                <button
                type="button"
                class="btn-icon btn-wishlist wishlist-btn"
                data-product-id="{{ $product->id }}"
                aria-label="Add to wishlist">
            
                <svg width="24" height="24" viewBox="0 0 24 24">
                    <use xlink:href="#heart"></use>
                </svg>
            
            </button>
                <div class="product-content">
                  <h5 class="element-title text-uppercase fs-5 mt-3">
                    {{ $product->name }}
                  </h5>
                  <a href="{{ route('product.details', $product->slug) }}"
                    class="text-decoration-none"
                    data-after="View Product">
                     <span>₹ {{ $product->price }}</span>
                 </a>                </div>
              </div>
            </div> 
          </div>
          @endforeach
       
         