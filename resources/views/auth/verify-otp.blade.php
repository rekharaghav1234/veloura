@extends('frontend.layouts.app')

@section('content')

<div class="container">

    <div class="row justify-content-center align-items-center vh-100">

        <div class="col-lg-4 col-md-6">

            <div class="card border-0 shadow rounded-4">

                <div class="card-body p-4">

                    <h4 class="fw-bold text-center mb-4">
                        Verify OTP
                    </h4>

                    @if(session('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                    @endif

                    <form method="POST" action="/verify-otp">
                        @csrf

                        <input type="hidden"
                               name="phone"
                               value="{{ $phone }}">

                        <div class="mb-3">

                            <label class="form-label">
                                Enter OTP
                            </label>

                            <input type="text"
                                   name="otp"
                                   class="form-control form-control-lg"
                                   placeholder="Enter OTP"
                                   required>

                        </div>

                        <button type="submit"
                                class="btn w-100 text-white"
                                style="background:#B76E79;">
                            Verify OTP
                        </button>

                    </form>

                    {{-- Demo OTP only for testing --}}
                    <div class="text-center mt-3">

                        <small class="text-muted">
                            Demo OTP:
                            <b>{{ $otp }}</b>
                        </small>

                    </div>

                </div>

            </div>

        </div>

    </div>

</div>

@endsection