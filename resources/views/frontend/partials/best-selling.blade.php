<div class="swiper product-swiper open-up" data-aos="zoom-out">
    <div class="swiper-wrapper d-flex">
      @foreach($bestSellingProducts as $product)
      <div class="swiper-slide">
        <div class="product-item image-zoom-effect link-effect">
          <div class="image-holder">
            <img src="{{ asset('uploads/products/'.$product->first_image) }}"
            alt="{{ $product->name }}"
            class="product-image img-fluid product-img-fixed">
            <a href="index.html" class="btn-icon btn-wishlist">
              <svg width="24" height="24" viewBox="0 0 24 24">
                <use xlink:href="#heart"></use>
              </svg>
            </a>
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
    </div>
    <div class="swiper-pagination"></div>
  </div>