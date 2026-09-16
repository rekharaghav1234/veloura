
      @foreach($bestSellingProducts as $product)
      <div class="swiper-slide">
        <div class="product-item image-zoom-effect link-effect">
          <div class="image-holder">
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
              <h5 class="text-uppercase fs-5 mt-3">
                  {{ $product->name }}
              </h5>

              <span>₹ {{ $product->price }}</span>

              <br>

              <small>
                  Sold: {{ $product->total_sold }}
              </small>
          </div>
          </div>
        </div>
      </div>
    @endforeach
 
   