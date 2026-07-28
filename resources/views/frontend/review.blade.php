@extends('frontend.layouts.app')

@section('content')
<div class="container py-5">

    <div class="row justify-content-center">

        <div class="col-md-8">

            <div class="card border-0 shadow rounded-4">

                <div class="card-header bg-white py-4 text-center border-bottom">

                    <h3 class="fw-bold mb-1">
                        Write a Review
                    </h3>

                    <p class="text-muted mb-0">
                        Share your experience with this product
                    </p>

                </div>

                <div class="card-body p-4">

                    <form action="{{ route('review.store') }}"
                          method="POST"
                          enctype="multipart/form-data">

                        @csrf

                        <input type="hidden"
                               name="product_id"
                               value="{{ $product->id }}">

                        <!-- Product -->
                        <div class="d-flex align-items-center mb-4">

                            <img src="{{ asset('uploads/products/'.$product->image) }}"
                                 width="80"
                                 height="80"
                                 class="rounded-3 border me-3"
                                 style="object-fit:cover;">

                            <div>
                                <h5 class="mb-1">
                                    {{ $product->name }}
                                </h5>

                                <small class="text-muted">
                                    Share your honest review
                                </small>
                            </div>

                        </div>

                        <!-- Rating -->
                        <div class="mb-4">

                            <label class="form-label fw-semibold">
                                Rating
                            </label>

                            <select name="rating"
                                    class="form-select">

                                <option value="">Select Rating</option>
                                <option value="5">⭐⭐⭐⭐⭐ Excellent</option>
                                <option value="4">⭐⭐⭐⭐ Very Good</option>
                                <option value="3">⭐⭐⭐ Good</option>
                                <option value="2">⭐⭐ Fair</option>
                                <option value="1">⭐ Poor</option>

                            </select>

                        </div>

                        <!-- Review -->
                        <div class="mb-4">

                            <label class="form-label fw-semibold">
                                Review
                            </label>

                            <textarea name="comment"
                                      rows="5"
                                      class="form-control"
                                      placeholder="Tell other customers about product quality, fitting, packaging, delivery etc."></textarea>

                        </div>

                        <!-- Upload Image -->
                        <div class="mb-4">

                            <label class="form-label fw-semibold">
                                Upload Product Image
                            </label>

                            <input type="file"
                                   name="image"
                                   class="form-control"
                                   accept="image/*">

                            <small class="text-muted">
                                Upload a real product photo (Optional)
                            </small>

                        </div>

                        <!-- Buttons -->
                        <div class="d-flex justify-content-end gap-2">

                            <a href="{{ url()->previous() }}"
                               class="btn btn-light border">
                                Cancel
                            </a>

                            <button type="submit"
                                    class="btn btn-dark px-4">
                                Submit Review
                            </button>

                        </div>

                    </form>

                </div>

            </div>

        </div>

    </div>

</div>
@endsection