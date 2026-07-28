<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Razorpay\Api\Api;
use Exception;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Cart;
use App\Models\Product;

use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function addToCart($id)
    {
        $product = Product::findOrFail($id);

        $cart = Cart::where('user_id', Auth::id())
                    ->where('product_id', $id)
                    ->first();

        if($cart)
        {
            $cart->increment('quantity');
        }
        else
        {
            Cart::create([

                'user_id' => Auth::id(),

                'product_id' => $id,

                'quantity' => 1

            ]);
        }

        return redirect('/cart')
                ->with('success', 'Product Added To Cart');
    }

    public function cart()
    {
        $carts = Cart::where('user_id', Auth::id())
                    ->latest()
                    ->get();

        return view(
            'frontend.cart',
            compact('carts')
        );
    }

    public function updateCart($id, Request $request)
{
    $cart = Cart::findOrFail($id);

    $cart->quantity = $request->quantity;

    $cart->save();

    return redirect()->back();
}
    public function remove($id)
    {
        Cart::where('user_id', Auth::id())
            ->findOrFail($id)
            ->delete();

        return redirect()->back();
    }

    public function checkout()
    {
        $carts = Cart::with('product')
            ->where('user_id', Auth::id())
            ->latest()
            ->get();
    
        foreach ($carts as $cart) {
    
            if ($cart->product) {
    
                $images = json_decode($cart->product->images, true);
    
                if (!is_array($images)) {
                    $images = explode(',', $cart->product->images);
                }
    
                $cart->product->first_image = trim($images[0] ?? '', '[]" ');
            }
        }
    
        return view('frontend.checkout', compact('carts'));
    }

    public function placeOrder(Request $request)
    {
        $checkoutData = session('checkout_data');
    
        if (!$checkoutData) {
            return response()->json([
                'success' => false,
                'message' => 'Checkout data not found'
            ]);
        }
    
        $carts = Cart::where('user_id', Auth::id())->get();
    
        if ($carts->isEmpty()) {
            return response()->json([
                'success' => false,
                'message' => 'Cart is empty'
            ]);
        }
    
        $total = 0;
    
        foreach ($carts as $cart) {
            $total += $cart->product->price * $cart->quantity;
        }
    
        // $order = Order::create([
        //     'user_id' => Auth::id(),
    
        //     'name' => $checkoutData['name'],
        //     'email' => $checkoutData['email'],
        //     'phone' => $checkoutData['phone'],
    
        //     'country' => $checkoutData['country'],
        //     'state' => $checkoutData['state'],
        //     'district' => $checkoutData['district'],
        //     'city' => $checkoutData['city'],
    
        //     'pincode' => $checkoutData['pincode'],
        //     'house_no' => $checkoutData['house_no'],
        //     'area' => $checkoutData['area'],
        //     'landmark' => $checkoutData['landmark'],
    
        //     'address' => $checkoutData['address'],
    
        //     'total_amount' => $total,
        //     'payment_method' => $request->payment_method,
        //     'status' => 'Pending'
        // ]);
    
        // foreach ($carts as $cart) {
    
        //     OrderItem::create([
        //         'order_id' => $order->id,
        //         'product_id' => $cart->product_id,
        //         'quantity' => $cart->quantity,
        //         'price' => $cart->product->price,
        //     ]);
        // }
    
        // Cart::where('user_id', Auth::id())->delete();
    
        return response()->json([
            'success' => true,
            'data' => $checkoutData,
            'data2' => $carts,
           
            // 'order_id' => $order->id
        ]);
    }
   
  
    
    // public function placeOrder(Request $request)
    // {
    //     try {
    
    //         // Checkout data
    //         $checkoutData = session('checkout_data');
    
    //         if (!$checkoutData) {
    //             return response()->json([
    //                 'success' => false,
    //                 'message' => 'Checkout data not found.'
    //             ]);
    //         }
    
    //         // User cart
    //         $carts = Cart::where('user_id', Auth::id())->get();
    
    //         if ($carts->isEmpty()) {
    //             return response()->json([
    //                 'success' => false,
    //                 'message' => 'Your cart is empty.'
    //             ]);
    //         }
    
    //         // Calculate Total
    //         $total = 0;
    
    //         foreach ($carts as $cart) {
    
    //             $total += $cart->product->price * $cart->quantity;
    
    //         }
    
    //         // Create Order
    //         $order = new Order();
    
    //         $order->user_id = Auth::id();
    
    //         $order->name = $checkoutData['name'];
    //         $order->email = $checkoutData['email'];
    //         $order->phone = $checkoutData['phone'];
    
    //         $order->country = $checkoutData['country'];
    //         $order->state = $checkoutData['state'];
    //         $order->district = $checkoutData['district'];
    //         $order->city = $checkoutData['city'];
    
    //         $order->pincode = $checkoutData['pincode'];
    //         $order->house_no = $checkoutData['house_no'];
    //         $order->area = $checkoutData['area'];
    //         $order->landmark = $checkoutData['landmark'];
    
    //         $order->address = $checkoutData['address'];
    
    //         $order->total_amount = $total;
    
    //         $order->payment_method = $request->payment_method ?? 'COD';
    
    //         $order->payment_status = 'pending';
    
    //         $order->order_status = 'placed';
    
    //         $order->status = 'Pending';
    
    //         $order->save();
    
    //         // Save Order Items
    //         foreach ($carts as $cart) {
    
    //             OrderItem::create([
    
    //                 'order_id'   => $order->id,
    //                 'product_id' => $cart->product_id,
    //                 'quantity'   => $cart->quantity,
    //                 'price'      => $cart->product->price
    
    //             ]);
    
    //         }
    
    //         // Clear Cart
    //         Cart::where('user_id', Auth::id())->delete();
    
    //         return response()->json([
    
    //             'success' => true,
    //             'message' => 'Order placed successfully.',
    //             'order_id' => $order->id
    
    //         ]);
    
    //     } catch (\Throwable $e) {
    
    //         return response()->json([
    
    //             'success' => false,
    //             'message' => $e->getMessage(),
    //             'line' => $e->getLine(),
    //             'file' => $e->getFile()
    
    //         ], 500);
    
    //     }
    // }
    public function saveAddress(Request $request)
    {
        $request->validate([
            'name'      => 'required',
            'phone'     => 'required',
            'email'     => 'required',
            'country'   => 'required',
            'state'     => 'required',
            'district'  => 'required',
            'city'      => 'required',
            'area'      => 'required',
            'pincode'   => 'required',
        ]);
    
        $fullAddress =
            ($request->house_no ?? '') . ', ' .
            ($request->area ?? '') . ', ' .
            ($request->landmark ?? '') . ', ' .
            ($request->city ?? '') . ', ' .
            ($request->district ?? '') . ', ' .
            ($request->state ?? '') . ', ' .
            ($request->country ?? '') . ' - ' .
            ($request->pincode ?? '');
    
        $user = auth()->user();
    
        $user->update([
            'name'      => $request->name,
            'phone'     => $request->phone,
            'email'     => $request->email,
            'country'   => $request->country,
            'state'     => $request->state,
            'district'  => $request->district,
            'city'      => $request->city,
            'house_no'  => $request->house_no,
            'area'      => $request->area,
            'landmark'  => $request->landmark,
            'pincode'   => $request->pincode,
            'address'   => $fullAddress
        ]);
    
        session([
            'checkout_data' => [
                'name'      => $request->name,
                'phone'     => $request->phone,
                'email'     => $request->email,
                'address'   => $fullAddress,
                'country'   => $request->country,
                'state'     => $request->state,
                'district'  => $request->district,
                'city'      => $request->city,
                'house_no'  => $request->house_no,
                'area'      => $request->area,
                'landmark'  => $request->landmark,
                'pincode'   => $request->pincode,
            ]
        ]);
    
        return redirect()->route('checkout.payment');
    }

public function paymentPage()
{
    $carts = Cart::where('user_id', Auth::id())
                ->with('product')
                ->get();

    return view(
        'frontend.checkout-payment',
        compact('carts')
    );
}

public function paymentSuccess(Request $request)
{
    session([
        'payment_status' => 'Paid',
        'payment_method' => 'Online',
        'transaction_id' => $request->razorpay_payment_id,
    ]);

    return response()->json([
        'success' => true
    ]);
}

public function createRazorpayOrder()
{
    $total = 0;

    $carts = Cart::where('user_id', Auth::id())->get();

    foreach($carts as $cart)
    {
        $total += $cart->product->price * $cart->quantity;
    }

    $api = new \Razorpay\Api\Api(
        env('RAZORPAY_KEY'),
        env('RAZORPAY_SECRET')
    );

    $order = $api->order->create([
        'receipt' => 'ORD_' . time(),
        'amount' => $total * 100,
        'currency' => 'INR'
    ]);

    return response()->json([
        'order_id' => $order['id'],
        'amount' => $order['amount']
    ]);
}

    public function districts($stateId)
{
    return District::where('state_id',$stateId)->get();
}

public function cities($districtId)
{
    return City::where('district_id',$districtId)->get();
}
}