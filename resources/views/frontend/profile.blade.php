@extends('frontend.layouts.app')

@section('content')

<div class="container py-5">

    <div class="row justify-content-center">

        <div class="col-lg-8">

            <div class="card border-0 shadow rounded-4">

                <div class="card-body p-5">

                    <div class="text-center mb-4">

                        <div class="mx-auto mb-3 d-flex align-items-center justify-content-center rounded-circle bg-dark text-white fw-bold"
                             style="width:90px;height:90px;font-size:32px;">

                            {{ strtoupper(substr(Auth::user()->name,0,1)) }}

                        </div>

                        <h3 class="fw-bold mb-1">
                            {{ Auth::user()->name }}
                        </h3>

                        <p class="text-muted mb-0">
                            My Profile
                        </p>

                    </div>

                    <hr>

                    <div class="row g-4">

                        <div class="col-md-6">

                            <label class="text-muted small">
                                Full Name
                            </label>

                            <div class="fw-semibold">
                                {{ Auth::user()->name }}
                            </div>

                        </div>

                        <div class="col-md-6">

                            <label class="text-muted small">
                                Email Address
                            </label>

                            <div class="fw-semibold">
                                {{ Auth::user()->email }}
                            </div>

                        </div>

                        <div class="col-md-6">

                            <label class="text-muted small">
                                Mobile Number
                            </label>

                            <div class="fw-semibold">
                                {{ Auth::user()->phone ?? 'Not Available' }}
                            </div>

                        </div>

                        <div class="col-md-6">

                            <label class="text-muted small">
                                Member Since
                            </label>

                            <div class="fw-semibold">
                                {{ Auth::user()->created_at->format('d M Y') }}
                            </div>

                        </div>

                        <div class="col-12">

                            <label class="text-muted small">
                                Address
                            </label>

                            <div class="fw-semibold">
                                {{ Auth::user()->address ?? 'Not Available' }}
                            </div>

                        </div>

                    </div>

                    <hr>

                    <div class="row text-center">

                        <div class="col-md-4">

                            <div class="border rounded-4 p-3">

                                <h4 class="fw-bold text-primary">
                                    {{ \App\Models\Order::where('user_id',Auth::id())->count() }}
                                </h4>

                                <small class="text-muted">
                                    Total Orders
                                </small>

                            </div>

                        </div>

                        <div class="col-md-4">

                            <div class="border rounded-4 p-3">

                                <h4 class="fw-bold text-success">
                                    {{ \App\Models\Order::where('user_id',Auth::id())->where('status','Delivered')->count() }}
                                </h4>

                                <small class="text-muted">
                                    Delivered Orders
                                </small>

                            </div>

                        </div>

                        <div class="col-md-4">

                            <div class="border rounded-4 p-3">

                                <h4 class="fw-bold text-warning">
                                    {{ \App\Models\Review::where('user_id',Auth::id())->count() }}
                                </h4>

                                <small class="text-muted">
                                    Reviews Given
                                </small>

                            </div>

                        </div>

                    </div>

                    <div class="text-center mt-4">

                        <a href="/my-orders"
                           class="btn btn-dark rounded-pill px-4">
                            My Orders
                        </a>

                    </div>

                </div>

            </div>

        </div>

    </div>

</div>

@endsection