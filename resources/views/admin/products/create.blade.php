@extends('frontend.layouts.app')

@section('content')

<link rel="stylesheet" href="{{ asset('css/admin-orders.css') }}">

<div class="container-fluid">

    <!-- ─── Page Header ─── -->
    <div class="page-header">
        <h3>
            <i class="bi bi-plus-circle"></i>
            Add Product
        </h3>

        <div class="header-actions">
            <a href="/admin/products" class="btn-outline-primary-custom" style="text-decoration:none;">
                <i class="bi bi-arrow-left me-1"></i> Back to Products
            </a>
        </div>
    </div>

    <!-- ─── Success Alert ─── -->
    @if(session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert" style="border-radius:16px; border-left:4px solid #22c55e;">
        <i class="bi bi-check-circle-fill me-2"></i>
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif

    <!-- ─── Card ─── -->
    <div class="card card-order">

        <div class="card-body" style="padding:2rem;">

            <form action="/admin/products/store"
                  method="POST"
                  enctype="multipart/form-data"
                  id="productForm">

                @csrf

                <div class="row g-4">

                    <!-- ─── Left Column ─── -->
                    <div class="col-lg-8">

                        <!-- Product Name -->
                        <div class="form-group-modern">
                            <label class="form-label-modern" for="name">
                                <i class="bi bi-tag me-1"></i> Product Name <span class="text-danger">*</span>
                            </label>
                            <input type="text"
                                   name="name"
                                   id="name"
                                   class="form-control-modern"
                                   placeholder="Enter product name"
                                   value="{{ old('name') }}"
                                   required>
                            @error('name')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <!-- Description -->
                        <div class="form-group-modern">
                            <label class="form-label-modern" for="description">
                                <i class="bi bi-file-text me-1"></i> Description
                            </label>
                            <textarea name="description"
                                      id="description"
                                      rows="5"
                                      class="form-control-modern"
                                      placeholder="Describe your product...">{{ old('description') }}</textarea>
                            @error('description')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                    </div>

                    <!-- ─── Right Column ─── -->
                    <div class="col-lg-4">

                        <!-- Category -->
                        <div class="form-group-modern">
                            <label class="form-label-modern" for="category_id">
                                <i class="bi bi-folder me-1"></i> Category <span class="text-danger">*</span>
                            </label>
                            <select name="category_id"
                                    id="category_id"
                                    class="form-control-modern"
                                    required>
                                <option value="">Select Category</option>
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                                        {{ $category->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('category_id')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <!-- Gender -->
                        <div class="form-group-modern">
                            <label class="form-label-modern" for="gender">
                                <i class="bi bi-gender-ambiguous me-1"></i> Gender
                            </label>
                            <select name="gender"
                                    id="gender"
                                    class="form-control-modern">
                                <option value="">Select Gender</option>
                                <option value="Men" {{ old('gender') == 'Men' ? 'selected' : '' }}>👨Men</option>
                                <option value="Women" {{ old('gender') == 'Women' ? 'selected' : '' }}>👩Women</option>
                                <option value="Kids" {{ old('gender') == 'Kids' ? 'selected' : '' }}>Kids</option>
                            </select>
                            @error('gender')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <!-- Price -->
                        <div class="form-group-modern">
                            <label class="form-label-modern" for="price">
                                <i class="bi bi-currency-rupee me-1"></i> Price <span class="text-danger">*</span>
                            </label>
                            <div class="input-group-modern">
                                <span class="input-group-text-modern">₹</span>
                                <input type="number"
                                       name="price"
                                       id="price"
                                       class="form-control-modern"
                                       placeholder="0.00"
                                       step="0.01"
                                       min="0"
                                       value="{{ old('price') }}"
                                       required>
                            </div>
                            @error('price')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <!-- Stock -->
                        <div class="form-group-modern">
                            <label class="form-label-modern" for="stock">
                                <i class="bi bi-box me-1"></i> Stock <span class="text-danger">*</span>
                            </label>
                            <input type="number"
                                   name="stock"
                                   id="stock"
                                   class="form-control-modern"
                                   placeholder="Quantity"
                                   min="0"
                                   value="{{ old('stock') }}"
                                   required>
                            @error('stock')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                    </div>

                    <!-- ─── Full Width ─── -->
                    <div class="col-12">

                        <!-- Image Upload -->
                        <div class="form-group-modern">
                            <label class="form-label-modern" for="image">
                                <i class="bi bi-image me-1"></i> Product Image <span class="text-danger">*</span>
                            </label>
                            <div class="image-upload-wrapper">
                                <div class="image-upload-preview" id="imagePreview">
                                    <i class="bi bi-cloud-upload" style="font-size:2.5rem;color:#94a3b8;"></i>
                                    <p>Select up to 4 Images</p>
                                    <small>PNG, JPG, JPEG (Maximum 4 Images)</small>
                                </div>
                                <input type="file"
                                name="images[]"
                                id="images"
                                class="form-control-modern"
                                accept="image/*"
                                multiple
                                required>
                            </div>
                            @error('image')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                    </div>

                </div>

                <!-- ─── Submit Button ─── -->
                <div class="d-flex justify-content-end gap-2 mt-4 pt-3 border-top">
                    <a href="/admin/products" class="btn-outline-primary-custom" style="text-decoration:none;">
                        Cancel
                    </a>
                    <button type="submit" class="btn-submit-modern">
                        <i class="bi bi-plus-circle me-1"></i> Add Product
                    </button>
                </div>

            </form>

        </div>

    </div>

</div>
<script>
    // document.addEventListener('DOMContentLoaded', function() {
    //     const imageInput = document.getElementById('image');
    //     const preview = document.getElementById('imagePreview');

    //     if (imageInput) {
    //         imageInput.addEventListener('change', function(e) {
    //             const file = e.target.files[0];
    //             if (file) {
    //                 const reader = new FileReader();
    //                 reader.onload = function(event) {
    //                     preview.innerHTML = `
    //                         <img src="${event.target.result}" alt="Preview" style="max-width:150px; max-height:150px; border-radius:12px; object-fit:cover;">
    //                         <small style="color:#3b82f6; margin-top:0.5rem;">${file.name}</small>
    //                     `;
    //                 };
    //                 reader.readAsDataURL(file);
    //             }
    //         });
    //     }
    // });
    document.addEventListener('DOMContentLoaded', function () {

const imageInput = document.getElementById('images');
const preview = document.getElementById('imagePreview');

imageInput.addEventListener('change', function () {

    preview.innerHTML = "";

    const files = this.files;

    if (files.length > 4) {

        alert("Maximum 4 images allowed.");

        this.value = "";

        preview.innerHTML = `
            <i class="bi bi-cloud-upload" style="font-size:2.5rem;color:#94a3b8;"></i>
            <p>Select up to 4 Images</p>
        `;

        return;
    }

    [...files].forEach(file => {

        const reader = new FileReader();

        reader.onload = function(e){

            preview.innerHTML += `
                <div style="display:inline-block;margin:8px;text-align:center;">
                    <img src="${e.target.result}"
                         style="width:120px;height:120px;object-fit:cover;border-radius:10px;border:1px solid #ddd;">
                    <br>
                    <small>${file.name}</small>
                </div>
            `;

        }

        reader.readAsDataURL(file);

    });

});

});
</script>

@endsection