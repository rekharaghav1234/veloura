
@extends('frontend.layouts.app')

@section('content')
  

  <div class="preloader text-white fs-6 text-uppercase overflow-hidden"></div>

  <div class="search-popup">
    <div class="search-popup-container">

      <form role="search" method="get" class="form-group" action="">
        <input type="search" id="search-form" class="form-control border-0 border-bottom"
          placeholder="Type and press enter" value="" name="s" />
        <button type="submit" class="search-submit border-0 position-absolute bg-white"
          style="top: 15px;right: 15px;"><svg class="search" width="24" height="24">
            <use xlink:href="#search"></use>
          </svg></button>
      </form>

      <h5 class="cat-list-title">Browse Categories</h5>

      <ul class="cat-list">
        <li class="cat-list-item">
          <a href="#" title="Jackets">Jackets</a>
        </li>
        <li class="cat-list-item">
          <a href="#" title="T-shirts">T-shirts</a>
        </li>
        <li class="cat-list-item">
          <a href="#" title="Handbags">Handbags</a>
        </li>
        <li class="cat-list-item">
          <a href="#" title="Accessories">Accessories</a>
        </li>
        <li class="cat-list-item">
          <a href="#" title="Cosmetics">Cosmetics</a>
        </li>
        <li class="cat-list-item">
          <a href="#" title="Dresses">Dresses</a>
        </li>
        <li class="cat-list-item">
          <a href="#" title="Jumpsuits">Jumpsuits</a>
        </li>
      </ul>

    </div>
  </div>

  <div class="offcanvas offcanvas-end" data-bs-scroll="true" tabindex="-1" id="offcanvasCart" aria-labelledby="My Cart">
    <div class="offcanvas-header justify-content-center">
      <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">
      <div class="order-md-last">
        <h4 class="d-flex justify-content-between align-items-center mb-3">
          <span class="text-primary">Your cart</span>
          <span class="badge bg-primary rounded-pill">3</span>
        </h4>
        <ul class="list-group mb-3">
          <li class="list-group-item d-flex justify-content-between lh-sm">
            <div>
              <h6 class="my-0">Growers cider</h6>
              <small class="text-body-secondary">Brief description</small>
            </div>
            <span class="text-body-secondary">$12</span>
          </li>
          <li class="list-group-item d-flex justify-content-between lh-sm">
            <div>
              <h6 class="my-0">Fresh grapes</h6>
              <small class="text-body-secondary">Brief description</small>
            </div>
            <span class="text-body-secondary">$8</span>
          </li>
          <li class="list-group-item d-flex justify-content-between lh-sm">
            <div>
              <h6 class="my-0">Heinz tomato ketchup</h6>
              <small class="text-body-secondary">Brief description</small>
            </div>
            <span class="text-body-secondary">$5</span>
          </li>
          <li class="list-group-item d-flex justify-content-between">
            <span>Total (USD)</span>
            <strong>$20</strong>
          </li>
        </ul>

        <button class="w-100 btn btn-primary btn-lg" type="submit">Continue to Checkout</button>
      </div>
    </div>
  </div>

  <section class="d-none d-lg-block py-5">
    <div class="container">
    <div id="heroBanner"
         class="carousel slide"
         data-bs-ride="carousel">
    
    <div class="carousel-inner">
    
    @foreach($banners as $key=>$banner)
    
    <div class="carousel-item {{ $key==0?'active':'' }}">
    
      <img src="{{ asset('uploads/banners/'.$banner->image) }}"
      class="w-100"
      style="height:450px;object-fit:cover;">
    
    <div class="carousel-caption">
    
    <h1>{{ $banner->title }}</h1>
    
    <p>{{ $banner->subtitle }}</p>
    
    <a href="{{ $banner->button_link }}"
    class="btn btn-dark">
    
    {{ $banner->button_text }}
    
    </a>
    
    </div>
    
    </div>
    
    @endforeach
    
    </div>
    
    <button class="carousel-control-prev"
    data-bs-target="#heroBanner"
    data-bs-slide="prev">
    
    <span class="carousel-control-prev-icon"></span>
    
    </button>
    
    <button class="carousel-control-next"
    data-bs-target="#heroBanner"
    data-bs-slide="next">
    
    <span class="carousel-control-next-icon"></span>
    
    </button>
    
    </div>
    </div>
    </section>
    <section class="categories ">
      <div class="container">
        <div class="open-up" data-aos="zoom-out">
          <div class="row">
            <div class="col-md-4 col-4">
              <div class="cat-item text-center">
                  <div class="image-holder">
                      <a href="{{ url('/search?q=Men') }}">
                          <img src="images/cat-item1.jpg"
                               class="img-fluid category-circle"
                               alt="Men">
                      </a>
                  </div>
          
                  <div class="mt-2">
                      <a href="{{ url('/search?q=Men') }}"
                         class="category-btn">
                          Men
                      </a>
                  </div>
              </div>
          </div>
          
          <div class="col-md-4 col-4">
              <div class="cat-item text-center">
                  <div class="image-holder">
                      <a href="{{ url('/search?q=Women') }}">
                          <img src="images/cat-item2.jpg"
                               class="img-fluid category-circle"
                               alt="Women">
                      </a>
                  </div>
          
                  <div class="mt-2">
                      <a href="{{ url('/search?q=Women') }}"
                         class="category-btn">
                          Women
                      </a>
                  </div>
              </div>
          </div>
          
          <div class="col-md-4 col-4">
              <div class="cat-item text-center">
                  <div class="image-holder">
                      <a href="{{ url('/search?q=Accessories') }}">
                          <img src="images/cat-item3.jpg"
                               class="img-fluid category-circle"
                               alt="Accessories">
                      </a>
                  </div>
          
                  <div class="mt-2">
                      <a href="{{ url('/search?q=Accessories') }}"
                         class="category-btn">
                          Accessories
                      </a>
                  </div>
              </div>
          </div>
          </div>
        </div>
      </div>
    </section>
  {{-- <section class="categories overflow-hidden">
    <div class="container">
      <div class="open-up" data-aos="zoom-out">
        <div class="row">
          <div class="col-md-4">
            <div class="cat-item image-zoom-effect">
              <div class="image-holder">
                <a href="{{ url('/search?q=Men') }}">
                  <img src="images/cat-item1.jpg" alt="categories" class="product-image img-fluid">
                </a>
              </div>
              <div class="category-content">
                <div class="product-button">
                  <a href="{{ url('/search?q=Men') }}" class="btn btn-common text-uppercase">Shop for men</a>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="cat-item image-zoom-effect">
              <div class="image-holder">
                <a href="{{ url('/search?q=Women') }}">
                  <img src="images/cat-item2.jpg" alt="categories" class="product-image img-fluid">
                </a>
              </div>
              <div class="category-content">
                <div class="product-button">
                  <a href="{{ url('/search?q=Women') }}" class="btn btn-common text-uppercase">Shop for women</a>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="cat-item image-zoom-effect">
              <div class="image-holder">
                <a href="index.html">
                  <img src="images/cat-item3.jpg" alt="categories" class="product-image img-fluid">
                </a>
              </div>
              <div class="category-content">
                <div class="product-button">
                  <a href="index.html" class="btn btn-common text-uppercase">Shop accessories</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section> --}}
  <section id="new-arrival" class="new-arrival product-carousel py-5 position-relative overflow-hidden">
    <div class="container">
      <div class="d-flex flex-wrap justify-content-between align-items-center  mb-3">
        <h4 class="text-uppercase">Our New Arrivals</h4>
        {{-- <a href="index.html" class="btn-link">View All Products</a> --}}
      </div>
      <div class="swiper product-swiper open-up" data-aos="zoom-out">
        <div class="swiper-wrapper d-flex" id="new-arrival-section">
          @include('frontend.partials.new-arrivals')
        </div>
        <div class="swiper-pagination"></div>
      </div>

    
      <div class="icon-arrow icon-arrow-left"><svg width="50" height="50" viewBox="0 0 24 24">
          <use xlink:href="#arrow-left"></use>
        </svg></div>
      <div class="icon-arrow icon-arrow-right"><svg width="50" height="50" viewBox="0 0 24 24">
          <use xlink:href="#arrow-right"></use>
        </svg></div>
    </div>
  </section>


  {{-- <section id="best-sellers" class="best-sellers product-carousel py-5 position-relative overflow-hidden">
    <div class="container"> --}}
      <section id="new-arrival" class="new-arrival product-carousel py-5 position-relative overflow-hidden">
        <div class="container">
          <div class="d-flex flex-wrap justify-content-between align-items-center  mb-3">
            <h4 class="text-uppercase">Our New Arrivals</h4>
            {{-- <a href="index.html" class="btn-link">View All Products</a> --}}
          </div>
          <div class="swiper product-swiper open-up" data-aos="zoom-out">
            <div class="swiper-wrapper d-flex" id="best-selling-section">
              @include('frontend.partials.best-selling')
            </div>
            <div class="swiper-pagination"></div>
          </div>
    
        
          <div class="icon-arrow icon-arrow-left"><svg width="50" height="50" viewBox="0 0 24 24">
              <use xlink:href="#arrow-left"></use>
            </svg></div>
          <div class="icon-arrow icon-arrow-right"><svg width="50" height="50" viewBox="0 0 24 24">
              <use xlink:href="#arrow-right"></use>
            </svg></div>
        </div>
      </section>
  <section class="py-5" id="#all-products">
    <div class="container">
        <h3 class="mb-4">All Products</h3>

        <div class="row" id="product-list">
          @include('frontend.partials.load-products')
        </div>
        <div id="loading"
        class="text-center py-4"
        style="display:none;">
        
        <div class="spinner-border text-dark"
        role="status">
        
        <span class="visually-hidden">
        
        Loading...
        
        </span>
        
        </div>
        
        <p class="mt-2 mb-0">
        
        Loading Products...
        
        </p>
        
        </div>
    </div>
</section>


  {{-- <section class="video py-5 overflow-hidden">
    <div class="container-fluid">
      <div class="row">
        <div class="video-content open-up" data-aos="zoom-out">
          <div class="video-bg">
            <img src="images/video-image.jpg" alt="video" class="video-image img-fluid">
          </div>
          <div class="video-player">
            <a class="youtube" href="https://www.youtube.com/embed/pjtsGzQjFM4">
              <svg width="24" height="24" viewBox="0 0 24 24">
                <use xlink:href="#play"></use>
              </svg>
              <img src="images/text-pattern.png" alt="pattern" class="text-rotate">
            </a>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="testimonials py-5 bg-light">
    <div class="section-header text-center mt-5">
      <h3 class="section-title">WE LOVE GOOD COMPLIMENT</h3>
    </div>
    <div class="swiper testimonial-swiper overflow-hidden my-5">
      <div class="swiper-wrapper d-flex">
        <div class="swiper-slide">
          <div class="testimonial-item text-center">
            <blockquote>
              <p>“More than expected crazy soft, flexible and best fitted white simple denim shirt.”</p>
              <div class="review-title text-uppercase">casual way</div>
            </blockquote>
          </div>
        </div>
        <div class="swiper-slide">
          <div class="testimonial-item text-center">
            <blockquote>
              <p>“Best fitted white denim shirt more than expected crazy soft, flexible</p>
              <div class="review-title text-uppercase">uptop</div>
            </blockquote>
          </div>
        </div>
        <div class="swiper-slide">
          <div class="testimonial-item text-center">
            <blockquote>
              <p>“Best fitted white denim shirt more white denim than expected flexible crazy soft.”</p>
              <div class="review-title text-uppercase">Denim craze</div>
            </blockquote>
          </div>
        </div>
        <div class="swiper-slide">
          <div class="testimonial-item text-center">
            <blockquote>
              <p>“Best fitted white denim shirt more than expected crazy soft, flexible</p>
              <div class="review-title text-uppercase">uptop</div>
            </blockquote>
          </div>
        </div>
      </div>
    </div>
    <div class="testimonial-swiper-pagination d-flex justify-content-center mb-5"></div>
  </section>


  <section class="instagram position-relative">
    <div class="d-flex justify-content-center w-100 position-absolute bottom-0 z-1">
      <a href="https://www.instagram.com/https://ig.me/j/Abb0G0ZFekN9QxM5//" target="_blank" class="btn btn-dark px-5">Follow us on Instagram</a>
    </div>
    <div class="row g-0">
      <div class="col-6 col-sm-4 col-md-2">
        <div class="insta-item">
          <a href="https://www.instagram.com/templatesjungle/" target="_blank">
            <img src="images/insta-item1.jpg" alt="instagram" class="insta-image img-fluid">
          </a>
        </div>
      </div>
      <div class="col-6 col-sm-4 col-md-2">
        <div class="insta-item">
          <a href="https://www.instagram.com/templatesjungle/" target="_blank">
            <img src="images/insta-item2.jpg" alt="instagram" class="insta-image img-fluid">
          </a>
        </div>
      </div>
      <div class="col-6 col-sm-4 col-md-2">
        <div class="insta-item">
          <a href="https://www.instagram.com/templatesjungle/" target="_blank">
            <img src="images/insta-item3.jpg" alt="instagram" class="insta-image img-fluid">
          </a>
        </div>
      </div>
      <div class="col-6 col-sm-4 col-md-2">
        <div class="insta-item">
          <a href="https://www.instagram.com/templatesjungle/" target="_blank">
            <img src="images/insta-item4.jpg" alt="instagram" class="insta-image img-fluid">
          </a>
        </div>
      </div>
      <div class="col-6 col-sm-4 col-md-2">
        <div class="insta-item">
          <a href="https://www.instagram.com/templatesjungle/" target="_blank">
            <img src="images/insta-item5.jpg" alt="instagram" class="insta-image img-fluid">
          </a>
        </div>
      </div>
      <div class="col-6 col-sm-4 col-md-2">
        <div class="insta-item">
          <a href="https://www.instagram.com/templatesjungle/" target="_blank">
            <img src="images/insta-item6.jpg" alt="instagram" class="insta-image img-fluid">
          </a>
        </div>
      </div>
    </div>
  </section> --}}

  <script src="js/jquery.min.js"></script>
  <script src="js/plugins.js"></script>
  <script src="js/SmoothScroll.js"></script>
 
  <script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>
  <script src="js/script.min.js"></script>
 {{-- <script>
  let page = 2;
let loading = false;
let finished = false;

$(window).on("scroll", function () {

    if (loading || finished) return;

    if ($(window).scrollTop() + $(window).height() >= $(document).height() - 300) {

        loading = true;

        $.ajax({
            url: "{{ route('load.products') }}?page=" + page,
            type: "GET",

            beforeSend: function () {
                $("#loading").show();
            },

            success: function (res) {

                if (res.trim() === "") {
                    finished = true;
                } else {
                    $("#product-list").append(res);
                    page++;
                }

                loading = false;
                $("#loading").hide();
            },

            error: function () {
                loading = false;
                $("#loading").hide();
            }
        });
    }
});
 </script> --}}
 <script>
  let page = 2;
let loading = false;
let finished = false;

let newArrivalLoaded = false;
let bestSellingLoaded = false;

$(window).on("scroll", function () {

    if (loading) return;

    if ($(window).scrollTop() + $(window).height() >= $(document).height() - 300) {

        // =========================
        // 1. ALL PRODUCTS LOAD
        // =========================
        if (!finished) {

            loading = true;

            $.ajax({
                url: "{{ route('load.products') }}?page=" + page,
                type: "GET",

                beforeSend: function () {
                    $("#loading").show();
                },

                success: function (res) {

                    if ($.trim(res) === "") {
                        finished = true;

                        // 👉 ALL PRODUCTS FINISH → NEXT SECTION
                        loadNewArrivals();

                    } else {
                        $("#product-list").append(res);
                        page++;
                    }

                    loading = false;
                    $("#loading").hide();
                },

                error: function () {
                    loading = false;
                    $("#loading").hide();
                }
            });

        }
    }
});


// =========================
// 2. NEW ARRIVALS LOAD
// =========================
function loadNewArrivals() {

    if (newArrivalLoaded) return;

    $.ajax({
        url: "/load-new-arrivals",

        success: function (res) {
            $("#new-arrival-section").html(res).fadeIn();

            newArrivalLoaded = true;

            loadBestSelling(); // 👉 next step trigger
        }
    });
}


// =========================
// 3. BEST SELLING LOAD
// =========================
function loadBestSelling() {

    if (bestSellingLoaded) return;

    $.ajax({
        url: "/load-best-selling",

        success: function (res) {
            $("#best-selling-section").html(res).fadeIn();

            bestSellingLoaded = true;
        }
    });
}
 </script>
  @endsection
{{-- </body>

</html> --}}