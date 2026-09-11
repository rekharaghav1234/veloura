<?php

// use App\Http\Controllers\Admin\AdminController;

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AdminOrderController as AdminAdminOrderController;
use App\Http\Controllers\Admin\BannerController;
use App\Http\Controllers\Admin\CatogryController;
use App\Http\Controllers\Admin\orderController as AdminOrderController;
use App\Http\Controllers\Admin\OrderController as ControllersAdminOrderController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\CartController;
use App\Http\Controllers\Auth\LoginController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\OtpController;
use App\Http\Controllers\Frontend\OrderController;
use App\Http\Controllers\Frontend\ReviewController;
use App\Models\Cart;
use Illuminate\Http\Request;



Route::post('/admin/products/store',
    [ProductController::class, 'store']);

    Route::get('/admin/products/edit/{id}',
    [ProductController::class, 'edit']);

Route::post('/admin/products/update/{id}',
    [ProductController::class, 'update']);

Route::get('/admin/products/delete/{id}',
    [ProductController::class, 'destroy']);

    Route::get('/admin/orders',
    [ProductController::class, 'orders'])->name("admin.orders.index");
    Route::get('/admin/orders/{id}',
    [ProductController::class, 'orderDetails']);

Route::get('/admin/orders/status/{id}',
    [ProductController::class, 'updateOrderStatus']);

// category
    Route::get('/category/{slug}',
    [HomeController::class, 'categoryProducts']);

    Route::get('/admin/categories', [CatogryController::class,'index']);

    Route::get('/admin/categories/create', [CatogryController::class,'create']);
    
    Route::post('/admin/categories/store', [CatogryController::class,'store']);

    Route::get('/admin/categories/edit/{id}', [CatogryController::class, 'edit']);
    Route::post('/admin/categories/update/{id}', [CatogryController::class, 'update']);
    Route::get('/admin/categories/delete/{id}', [CatogryController::class, 'destroy']);
// category

// user

Route::get('/admin/users', [AdminController::class, 'index']);
// user

    Route::middleware(['admin'])->group(function () {

       Route::get('/banners', [BannerController::class, 'index'])->name('admin.banners');

        Route::get('/banners/create', [BannerController::class, 'create'])->name('admin.banners.create');
    
        Route::post('/banners/store', [BannerController::class, 'store'])->name('admin.banners.store');
    
        Route::get('/banners/{id}/edit', [BannerController::class, 'edit'])
    ->name('admin.banners.edit');

Route::post('/banners/{id}/update', [BannerController::class, 'update'])
    ->name('admin.banners.update');

        Route::get('/admin/dashboard',
            [AdminController::class, 'dashboard']);
    
        Route::get('/admin/products',
            [ProductController::class, 'index']);
    
        Route::get('/admin/products/create',
            [ProductController::class, 'create']);
    
    });
    // frontend
   

Route::get('/',
    [HomeController::class, 'home']);

    Route::get('/product/{slug}',
    [HomeController::class, 'productDetails'])->name("product.details");
    Route::get('/districts/{stateId}', [CartController::class,'districts']);
Route::get('/cities/{districtId}', [CartController::class,'cities']);

    // cart
    Route::post('/cart/update/{id}', [CartController::class, 'updateCart'])->name('cart.update');


Route::get('/cart/remove/{id}',
    [CartController::class, 'remove']);



    // search
    Route::get('/search',
    [HomeController::class, 'search']);
Auth::routes();
Route::middleware(['admin'])->group(function () {


});

Route::post('/logout', [LoginController::class, 'logout'])
    ->name('logout');

    Route::get('/load-products', [HomeController::class,'loadProducts'])->name('load.products');
    Route::get('/load-new-arrivals', [HomeController::class, 'loadNewArrivals']);

    Route::get('/load-best-selling', [HomeController::class, 'loadBestSelling']);
  Route::middleware('auth')->group(function () {
    Route::view('/profile', 'frontend.profile');

     
        Route::post('/place-order',[CartController::class, 'placeOrder']);

        Route::get('/add-to-cart/{id}',
            [CartController::class, 'addToCart']);
    
           

        Route::get('/cart',
            [CartController::class, 'cart']);
    
        Route::get('/checkout',
            [CartController::class, 'checkout']);
            
              // return
    Route::get('/order/{id}/return',
    [OrderController::class,'returnForm'])
    ->name('order.return.form');

Route::post('/order/{id}/return',
    [OrderController::class,'submitReturn'])
    ->name('order.return.submit');


    Route::post(
        '/admin/return-approval/{id}',
        [AdminAdminOrderController::class, 'updateReturnApproval']
    )->name('admin.return.approval');
    
    Route::post(
        '/admin/return-process/{id}',
        [AdminAdminOrderController::class, 'updateReturnProcess']
    )->name('admin.return.process');
    
       

            Route::put('/order/{id}/cancel', [OrderController::class, 'cancelOrder'])
    ->name('order.cancel');
    Route::get('/review/{product}', [ReviewController::class,'create'])
    ->name('review.create');

Route::post('/review/store', [ReviewController::class,'store'])
    ->name('review.store');
            
    // refund
    Route::post(
        '/admin/orders/{id}/refund-status',
        [OrderController::class, 'updateRefundStatus']
    )->name('admin.refund.status');

        Route::post('/checkout/address-save',
        [CartController::class, 'saveAddress'])
        ->name('checkout.address.save');
    
    Route::get('/checkout/payment',
        [CartController::class, 'paymentPage'])
        ->name('checkout.payment');

   Route::get('/create-razorpay-order',
    [CartController::class,'createRazorpayOrder']);

Route::post('/payment-success',
    [CartController::class,'paymentSuccess']);

Route::get('/my-orders', [OrderController::class, 'myOrders'])->name("my.orders");
    
    
    });

  

  

    Route::post('/send-otp',
    [OtpController::class, 'sendOtp'])
    ->name('send.otp');

Route::post('/verify-otp',
    [OtpController::class, 'verifyOtp'])
    ->name('verify.otp');
    

    // adminsideorder
    Route::put('/admin/orders/{id}/status',
    [AdminAdminOrderController::class,'updateStatus'])
    ->name('admin.orders.updateStatus');

    
