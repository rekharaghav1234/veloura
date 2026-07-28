@extends('frontend.layouts.app')

@section('content')

<div class="container">

    <div class="row justify-content-center align-items-center vh-100">

        <div class="col-lg-5 col-md-7">

            <div class="card border-0 shadow-lg rounded-4">

                <div class="card-body p-5">

                    <div class="text-center mb-4">

                        <h1 class="fw-bold display-6">
                            VELOURA
                        </h1>

                        <p class="text-muted">
                            Fashion Admin Login
                        </p>

                    </div>

                    <form method="POST" action="/send-otp">
                        @csrf
                    
                        <div class="mb-4">
                            <label class="form-label fw-semibold">
                                Mobile Number
                            </label>
                    
                            <input type="text"
                                   name="phone"
                                   class="form-control form-control-lg rounded-3"
                                   placeholder="Enter Mobile Number"
                                   required>
                        </div>
                    
                        <button type="submit"
                                class="btn btn-dark btn-lg w-100 rounded-3">
                            Send OTP
                        </button>
                    </form>

                    <div class="text-center mt-4">

                        <span class="text-muted">
                            Don't have an account?
                        </span>

                        <a href="/register"
                           class="text-decoration-none fw-semibold text-dark">

                            Register

                        </a>

                    </div>

                </div>

            </div>

        </div>

    </div>

</div>

@endsection

{{-- 

@extends('frontend.layouts.app')

@section('content')

<div class="container">

    <div class="row justify-content-center align-items-center vh-100">

        <div class="col-lg-4 col-md-6">

            <div class="card border-0 shadow rounded-4">

                <div class="card-body p-4">

                    <div class="text-center mb-4">

                        <img src="{{ asset('images/logo.png') }}"
                             style="height:70px;">

                        <h4 class="mt-3 fw-bold">
                            Login to VELOURA
                        </h4>

                        <p class="text-muted small">
                            Enter your mobile number
                        </p>

                    </div>

                    <form method="POST"
                          action="/send-otp">

                        @csrf

                        <div class="mb-3">

                            <input type="text"
                                   name="phone"
                                   class="form-control form-control-lg rounded-3"
                                   placeholder="Enter mobile number"
                                   required>

                        </div>

                        <button type="submit"
                                class="btn w-100 text-white rounded-3 py-2"
                                style="background:#B76E79;">

                            Continue

                        </button>

                    </form>

                </div>

            </div>

        </div>

    </div>

</div>

@endsection --}}