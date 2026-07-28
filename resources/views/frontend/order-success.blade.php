
@extends('frontend.layouts.app')

@section('content')

<h2>🎉 Order Placed Successfully</h2>

<p>Thank you for shopping with Veloura.</p>

<p>Order ID: #123</p>

<p>Payment Method: COD</p>

<p>Total Amount: ₹1499</p>

<p>Expected Delivery:
   10 Jul 2026
</p>

<a href="/my-orders" class="btn btn-dark">
    Track Order
</a>

<a href="/" class="btn btn-outline-dark">
    Continue Shopping
</a>
@endsection