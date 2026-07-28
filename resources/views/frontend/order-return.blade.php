@extends('frontend.layouts.app')

@section('content')

<div class="container py-5">

    <div class="row justify-content-center">

        <div class="col-md-8">

            <div class="card border-0 shadow rounded-4">

                <div class="card-header bg-white py-4">

                    <h3 class="fw-bold mb-1">
                        Return Request
                    </h3>

                    <p class="text-muted mb-0">
                        Tell us why you want to return this product
                    </p>

                </div>

                <div class="card-body p-4">

                    <form action="{{ route('order.return.submit', $order->id) }}"
                          method="POST"
                          enctype="multipart/form-data">

                        @csrf

                        <div class="mb-3">

                            <label class="form-label fw-semibold">
                                Why do you want to return this product?
                            </label>

                            <select name="reason"
                                    class="form-select"
                                    required>

                                <option value="">Select Reason</option>

                                <option value="Wrong Product Received">
                                    Wrong Product Received
                                </option>

                                <option value="Damaged Product">
                                    Damaged Product
                                </option>

                                <option value="Defective Product">
                                    Defective Product
                                </option>

                                <option value="Product Not As Described">
                                    Product Not As Described
                                </option>

                                <option value="Poor Quality">
                                    Poor Quality
                                </option>

                                <option value="Size/Fit Issue">
                                    Size/Fit Issue
                                </option>

                                <option value="Missing Parts or Accessories">
                                    Missing Parts or Accessories
                                </option>

                                <option value="Received Different Color">
                                    Received Different Color
                                </option>

                                <option value="Changed My Mind">
                                    Changed My Mind
                                </option>

                                <option value="Other">
                                    Other
                                </option>

                            </select>

                        </div>

                        <div class="mb-3">

                            <label class="form-label fw-semibold">
                                Additional Details
                            </label>

                            <textarea name="description"
                                      rows="4"
                                      class="form-control"
                                      placeholder="Please explain the issue in detail..."></textarea>

                        </div>

                        <div class="mb-4">

                            <label class="form-label fw-semibold">
                                Upload Supporting Image
                            </label>

                            <input type="file"
                                   name="image"
                                   class="form-control"
                                   accept="image/*">

                            <small class="text-muted">
                                Upload product photo if damaged, defective, or incorrect.
                            </small>

                        </div>

                        <div class="d-flex justify-content-end gap-2">

                            <a href="{{ route('my.orders') }}"
                               class="btn btn-light border">
                                Cancel
                            </a>

                            <button type="submit"
                                    class="btn btn-warning px-4">
                                Submit Return Request
                            </button>

                        </div>

                    </form>

                </div>

            </div>

        </div>

    </div>

</div>

@endsection