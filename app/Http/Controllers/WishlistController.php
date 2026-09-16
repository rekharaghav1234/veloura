<?php

namespace App\Http\Controllers;

use App\Models\Wishlist;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WishlistController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Add / Remove Wishlist
    |--------------------------------------------------------------------------
    */

    public function toggle(Request $request, $productId)
    {
        if (!Auth::check()) {
            return response()->json([
                'status' => false,
                'message' => 'Please login to use wishlist.',
                'login_required' => true
            ], 401);
        }

        $product = Product::findOrFail($productId);

        $wishlist = Wishlist::where('user_id', Auth::id())
            ->where('product_id', $product->id)
            ->first();

        // Already in wishlist → Remove
        if ($wishlist) {

            $wishlist->delete();

            return response()->json([
                'status' => true,
                'wishlisted' => false,
                'message' => 'Removed from wishlist.'
            ]);
        }

        // Not in wishlist → Add
        Wishlist::create([
            'user_id' => Auth::id(),
            'product_id' => $product->id,
        ]);

        return response()->json([
            'status' => true,
            'wishlisted' => true,
            'message' => 'Added to wishlist.'
        ]);
    }


    /*
    |--------------------------------------------------------------------------
    | Wishlist Page
    |--------------------------------------------------------------------------
    */

    public function index()
    {
        $wishlists = Wishlist::with('product')
            ->where('user_id', Auth::id())
            ->latest()
            ->get();

        return view('frontend.wishlist', compact('wishlists'));
    }
}