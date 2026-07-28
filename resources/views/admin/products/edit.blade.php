@extends('frontend.layouts.app')

@section('content')

<link rel="stylesheet" href="{{ asset('css/admin-orders.css') }}">

<div class="container-fluid">

    <!-- Header -->
    <div class="page-header">
        <h3>
            <i class="bi bi-pencil-square"></i>
            Edit Product
        </h3>

        <div class="header-actions">
            <a href="/admin/products"
               class="btn-outline-primary-custom"
               style="text-decoration:none;">
                <i class="bi bi-arrow-left me-1"></i>
                Back to Products
            </a>
        </div>
    </div>

    @if(session('success'))
    <div class="alert alert-success alert-dismissible fade show"
         style="border-radius:16px;border-left:4px solid #22c55e;">
        <i class="bi bi-check-circle-fill me-2"></i>
        {{ session('success') }}

        <button class="btn-close"
                data-bs-dismiss="alert">
        </button>
    </div>
    @endif

    <div class="card card-order">

        <div class="card-body"
             style="padding:2rem;">

            <form action="/admin/products/update/{{ $product->id }}"
                  method="POST"
                  enctype="multipart/form-data">

                @csrf

                <div class="row g-4">

                    <!-- LEFT -->
                    <div class="col-lg-8">

                        <!-- NAME -->
                        <div class="form-group-modern">

                            <label class="form-label-modern">

                                <i class="bi bi-tag me-1"></i>

                                Product Name

                            </label>

                            <input type="text"
                                   name="name"
                                   class="form-control-modern"
                                   value="{{ old('name',$product->name) }}"
                                   required>

                        </div>

                        <!-- DESCRIPTION -->

                        <div class="form-group-modern">

                            <label class="form-label-modern">

                                <i class="bi bi-file-text me-1"></i>

                                Description

                            </label>

                            <textarea
                                name="description"
                                rows="6"
                                class="form-control-modern">{{ old('description',$product->description) }}</textarea>

                        </div>

                    </div>

                    <!-- RIGHT -->

                    <div class="col-lg-4">

                        <!-- CATEGORY -->

                        <div class="form-group-modern">

                            <label class="form-label-modern">

                                <i class="bi bi-folder me-1"></i>

                                Category

                            </label>

                            <select
                                name="category_id"
                                class="form-control-modern">

                                @foreach($categories as $category)

                                <option
                                    value="{{ $category->id }}"
                                    {{ old('category_id',$product->category_id)==$category->id ? 'selected':'' }}>

                                    {{ $category->name }}

                                </option>

                                @endforeach

                            </select>

                        </div>

                        <!-- GENDER -->

                        <div class="form-group-modern">

                            <label class="form-label-modern">

                                <i class="bi bi-gender-ambiguous me-1"></i>

                                Gender

                            </label>

                            <select
                                name="gender"
                                class="form-control-modern">

                                <option value="Men"
                                    {{ old('gender',$product->gender)=='Men'?'selected':'' }}>
                                    👨 Men
                                </option>

                                <option value="Women"
                                    {{ old('gender',$product->gender)=='Women'?'selected':'' }}>
                                    👩 Women
                                </option>

                                <option value="Kids"
                                    {{ old('gender',$product->gender)=='Kids'?'selected':'' }}>
                                    🧒 Kids
                                </option>

                            </select>

                        </div>

                        <!-- PRICE -->

                        <div class="form-group-modern">

                            <label class="form-label-modern">

                                <i class="bi bi-currency-rupee me-1"></i>

                                Price

                            </label>

                            <div class="input-group-modern">

                                <span class="input-group-text-modern">

                                    ₹

                                </span>

                                <input
                                    type="number"
                                    name="price"
                                    class="form-control-modern"
                                    value="{{ old('price',$product->price) }}">

                            </div>

                        </div>

                        <!-- STOCK -->

                        <div class="form-group-modern">

                            <label class="form-label-modern">

                                <i class="bi bi-box me-1"></i>

                                Stock

                            </label>

                            <input
                                type="number"
                                name="stock"
                                class="form-control-modern"
                                value="{{ old('stock',$product->stock) }}">

                        </div>

                    </div>

                    <!-- IMAGE -->

                    <div class="col-12">

                        <div class="form-group-modern">

                            <label class="form-label-modern">

                                <i class="bi bi-image me-1"></i>

                                Product Images

                            </label>

                            <div class="image-upload-wrapper">

                                <div class="image-upload-preview"
                                     id="imagePreview">

                                    @php
                                        $images=json_decode($product->images,true) ?? [];
                                    @endphp

                                    @foreach($images as $img)

                                    <div style="display:inline-block;margin:8px;">

                                        <img
                                            src="{{ asset('uploads/products/'.$img) }}"
                                            style="width:120px;height:120px;object-fit:cover;border-radius:10px;">

                                    </div>

                                    @endforeach

                                </div>

                                <input
                                    type="file"
                                    id="images"
                                    name="images[]"
                                    class="form-control-modern"
                                    multiple
                                    accept="image/*">

                            </div>

                            <small class="text-muted">

                                Select up to 4 images

                            </small>

                        </div>

                    </div>
                                        <!-- BUTTONS -->

                                        <div class="col-12">

                                            <div class="d-flex justify-content-end gap-2 mt-4 pt-3 border-top">
                    
                                                <a href="/admin/products"
                                                   class="btn-outline-primary-custom"
                                                   style="text-decoration:none;">
                    
                                                    Cancel
                    
                                                </a>
                    
                                                <button type="submit"
                                                        class="btn-submit-modern">
                    
                                                    <i class="bi bi-check-circle me-1"></i>
                    
                                                    Update Product
                    
                                                </button>
                    
                                            </div>
                    
                                        </div>
                    
                                    </div>
                    
                                </form>
                    
                            </div>
                    
                        </div>
                    
                    </div>
                    
                    <script>
                    
                    document.addEventListener('DOMContentLoaded', function () {
                    
                        const imageInput = document.getElementById('images');
                    
                        const preview = document.getElementById('imagePreview');
                    
                        imageInput.addEventListener('change', function () {
                    
                            preview.innerHTML = "";
                    
                            const files = this.files;
                    
                            if(files.length > 4){
                    
                                alert("Maximum 4 images allowed.");
                    
                                this.value="";
                    
                                preview.innerHTML=`
                                    @php
                                        $images=json_decode($product->images,true) ?? [];
                                    @endphp
                    
                                    @foreach($images as $img)
                    
                                        <div style="display:inline-block;margin:8px;">
                    
                                            <img src="{{ asset('uploads/products/'.$img) }}"
                                                 style="width:120px;height:120px;object-fit:cover;border-radius:10px;">
                    
                                        </div>
                    
                                    @endforeach
                                `;
                    
                                return;
                    
                            }
                    
                            [...files].forEach(file=>{
                    
                                const reader=new FileReader();
                    
                                reader.onload=function(e){
                    
                                    preview.innerHTML+=`
                    
                                        <div style="display:inline-block;margin:8px;text-align:center;">
                    
                                            <img src="${e.target.result}"
                                                 style="width:120px;
                                                        height:120px;
                                                        object-fit:cover;
                                                        border-radius:12px;
                                                        border:1px solid #ddd;">
                    
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