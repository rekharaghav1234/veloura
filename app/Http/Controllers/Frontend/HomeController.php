<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;

use App\Models\Banner;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
class HomeController extends Controller
{
  
public function productDetails($slug)
{
    // Eager load: category, reviews (with user)
    $product = Product::with(['category', 'reviews.user'])
                      ->where('slug', $slug)
                      ->firstOrFail();

    // Average rating & review count
    $avgRating = $product->reviews->avg('rating') ?? 0;
    $reviewCount = $product->reviews->count();

    // Related products (same category, exclude current)
    $relatedProducts = Product::where('id', '!=', $product->id)
 
    ->where('category_id', $product->category_id)
    ->where('gender', $product->gender)
   
    ->latest()
    ->limit(6)
    ->get();
    // dd($relatedProducts);
    return view('frontend.product-details', compact(
        'product',
        'avgRating',
        'reviewCount',
        'relatedProducts'
    ));
}
public function categoryProducts($slug)
{
    $category = Category::where(
                    'slug',
                    $slug
                )->firstOrFail();

    $products = $category->products;

    return view(
        'frontend.category-products',
        compact('category', 'products')
    );
}

public function loadProducts(Request $request)
{
    $products = Product::latest()->paginate(5);

    return view('frontend.partials.load-products', compact('products'))->render();
}
public function loadBestSelling()
{

    $bestSellingProducts = Product::select(
            'products.id',
            'products.name',
            'products.slug',
            'products.images',
            'products.price',
            DB::raw('SUM(order_items.quantity) as total_sold')
        )
        ->join('order_items', 'products.id', '=', 'order_items.product_id')
        ->groupBy(
            'products.id',
            'products.name',
            'products.slug',
            'products.images',
            'products.price'
        )
        ->orderByDesc('total_sold')
        ->take(8)
        ->get();
        
    return view('frontend.partials.best-selling', compact('bestSellingProducts'))->render();
}

public function loadNewArrivals()
{
    $newArrivals = Product::withAvg('reviews', 'rating')
        ->withCount('reviews')
        ->latest()
        ->take(8)
        ->get();

    return view('frontend.partials.new-arrivals', compact('newArrivals'))->render();
}

public function home()
{
    $banners = Banner::where('status', 1)
        ->orderByDesc('id')
        ->get();

    $categories = Category::all();

    $products = Product::withAvg('reviews', 'rating')
        ->withCount('reviews')
        ->latest()
        ->paginate(5);

    $newArrivals = Product::withAvg('reviews', 'rating')
        ->withCount('reviews')
        ->latest()
        ->take(5)
        ->get();

    $bestSellingProducts = Product::select(
            'products.id',
            'products.name',
            'products.slug',
            'products.images',
            'products.price',
            DB::raw('SUM(order_items.quantity) as total_sold')
        )
        ->join('order_items', 'products.id', '=', 'order_items.product_id')
        ->groupBy(
            'products.id',
            'products.name',
            'products.slug',
            'products.images',
            'products.price'
        )
        ->orderByDesc('total_sold')
        ->take(5)
        ->get();

    return view('frontend.home', compact(
        'banners',
        'products',
        'categories',
        'newArrivals',
        'bestSellingProducts'
    ));
}
// public function home()
// {
//     $categories = Category::all();

//     $products = Product::latest()->paginate(8); // main listing only 1 section ke liye

//     $newArrivals = Product::latest()->take(8)->get();

//     $bestSellingProducts = Product::select(
//         'products.id',
//         'products.name',
//         'products.slug',
//         'products.images',
//         'products.price',
//         DB::raw('SUM(order_items.quantity) as total_sold')
//     )
//     ->join('order_items', 'products.id', '=', 'order_items.product_id')
//     ->groupBy(
//         'products.id',
//         'products.name',
//         'products.slug',
//         'products.images',
//         'products.price'
//     )
//     ->orderByDesc('total_sold')
//     ->take(8)
//     ->get();

//     return view('frontend.home', compact(
//         'products',
//         'categories',
//         'newArrivals',
//         'bestSellingProducts'
//     ));
// }
// public function search(Request $request)
// {
//     $search = $request->search;

//     $products = Product::where(
//                     'name',
//                     'LIKE',
//                     "%$search%"
//                 )->latest()->get();

//     return view(
//         'frontend.search',
//         compact('products', 'search')
//     );
// }

public function search(Request $request)
{
    $search = trim($request->q);

    $words = explode(' ', $search);

    $products = Product::with('category');

    foreach ($words as $word) {

        $products->where(function ($query) use ($word) {

            $query->where('name', 'LIKE', "%{$word}%")

                  ->orWhereHas('category', function ($q) use ($word) {
                      $q->where('name', 'LIKE', "%{$word}%");
                  });

            // Gender exact match
            if (strtolower($word) == 'men' || strtolower($word) == 'women') {
                $query->orWhere('gender', ucfirst(strtolower($word)));
            }

        });

    }

    $products = $products->latest()->get();

    return view('frontend.search', compact('products', 'search'));
}
}