@extends('frontend.layouts.app')

@section('content')

<div class="container py-5">

    <h2 class="fw-bold mb-4">
        Admin Dashboard
    </h2>

    <div class="row">

        <div class="col-md-3 mb-4">
            <div class="card shadow border-0 bg-primary text-white">
                <div class="card-body text-center">
                    <h5>Total Products</h5>
                    <h2>{{ $totalProducts }}</h2>
                </div>
            </div>
        </div>

        <div class="col-md-3 mb-4">
            <div class="card shadow border-0 bg-success text-white">
                <div class="card-body text-center">
                    <h5>Total Orders</h5>
                    <h2>{{ $totalOrders }}</h2>
                </div>
            </div>
        </div>

        <div class="col-md-3 mb-4">
            <div class="card shadow border-0 bg-info text-white">
                <div class="card-body text-center">
                    <h5>Total Users</h5>
                    <h2>{{ $totalUsers }}</h2>
                </div>
            </div>
        </div>

        <div class="col-md-3 mb-4">
            <div class="card shadow border-0 bg-warning text-dark">
                <div class="card-body text-center">
                    <h5>Return Requests</h5>
                    <h2>{{ $totalReturns }}</h2>
                </div>
            </div>
        </div>

    </div>

    <div class="row">

        <div class="col-md-4 mb-4">
            <div class="card shadow border-0">
                <div class="card-body text-center">
                    <h5>Total Revenue</h5>
                    <h3>₹{{ number_format($totalRevenue,2) }}</h3>
                </div>
            </div>
        </div>

        <div class="col-md-4 mb-4">
            <div class="card shadow border-0">
                <div class="card-body text-center">
                    <h5>Pending Orders</h5>
                    <h3>{{ $pendingOrders }}</h3>
                </div>
            </div>
        </div>

        <div class="col-md-4 mb-4">
            <div class="card shadow border-0">
                <div class="card-body text-center">
                    <h5>Delivered Orders</h5>
                    <h3>{{ $deliveredOrders }}</h3>
                </div>
            </div>
        </div>

    </div>

    <div class="card shadow border-0">
        <div class="card-header bg-dark text-white">
            Recent Orders
        </div>

        <div class="card-body">

            <table class="table">
                <thead>
                    <tr>
                        <th>Order ID</th>
                        <th>Name</th>
                        <th>Total</th>
                        <th>Status</th>
                    </tr>
                </thead>

                <tbody>

                    @foreach(\App\Models\Order::latest()->take(10)->get() as $order)

                    <tr>
                        <td>#{{ $order->id }}</td>
                        <td>{{ $order->name }}</td>
                        <td>₹{{ $order->total_amount }}</td>
                        <td>{{ $order->status }}</td>
                    </tr>

                    @endforeach

                </tbody>

            </table>

        </div>
    </div>

</div>

@endsection