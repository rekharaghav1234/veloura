<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\Review;

use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{
    public function create($productId)
{
    $product = Product::findOrFail($productId);

    return view('frontend.review', compact('product'));
}


public function store(Request $request)
{
    $request->validate([
        'product_id' => 'required',
        'rating' => 'required|min:1|max:5',
        'comment' => 'required',
        'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048'
    ]);

    $imageName = null;

    if($request->hasFile('image'))
    {
        $imageName = time().'_'.$request->image->getClientOriginalName();

        $request->image->move(
            public_path('uploads/reviews'),
            $imageName
        );
    }

    Review::create([
        'product_id' => $request->product_id,
        'user_id' => auth()->id(),
        'rating' => $request->rating,
        'comment' => $request->comment,
        'image' => $imageName
    ]);

    return redirect()->route('my.orders')
    ->with('success', 'Thank you! Your review has been submitted.');
            
}
}
