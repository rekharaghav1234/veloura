@extends('frontend.layouts.app')

@section('content')

<link rel="stylesheet" href="{{ asset('css/admin-orders.css') }}">

<div class="container-fluid">

    <!-- Header -->
    <div class="page-header">

        <h3>
            <i class="bi bi-pencil-square"></i>
            Edit Category
        </h3>

        <div class="header-actions">

            <a href="/admin/categories"
               class="btn-outline-primary-custom"
               style="text-decoration:none;">

                <i class="bi bi-arrow-left me-1"></i>

                Back to Categories

            </a>

        </div>

    </div>

    @if(session('success'))

    <div class="alert alert-success alert-dismissible fade show alert-success-modern">

        <i class="bi bi-check-circle-fill me-2"></i>

        {{ session('success') }}

        <button class="btn-close"
                data-bs-dismiss="alert"></button>

    </div>

    @endif

    <div class="card card-order">

        <div class="card-body" style="padding:2rem;">

            <form action="/admin/categories/update/{{ $category->id }}"
                  method="POST"
                  enctype="multipart/form-data">

                @csrf

                <div class="row g-4">

                    <!-- Left -->

                    <div class="col-lg-8">

                        <div class="form-group-modern">

                            <label class="form-label-modern">

                                <i class="bi bi-folder me-1"></i>

                                Category Name <span class="text-danger">*</span>

                            </label>

                            <input type="text"
                                   name="name"
                                   class="form-control-modern"
                                   value="{{ old('name',$category->name) }}"
                                   required>

                            @error('name')

                            <small class="text-danger">{{ $message }}</small>

                            @enderror

                        </div>

                    </div>

                    <!-- Right -->

                    <div class="col-lg-4">

                        <div class="form-group-modern">

                            <label class="form-label-modern">

                                <i class="bi bi-image me-1"></i>

                                Category Image

                            </label>

                            <div class="image-upload-wrapper">

                                <div class="image-upload-preview"
                                     id="imagePreview">

                                    <img src="{{ !empty($category->image)
                                        ? asset('uploads/categories/'.$category->image)
                                        : asset('images/category2.jpg') }}"
                                         style="width:140px;height:140px;border-radius:12px;object-fit:cover;">

                                </div>

                                <input type="file"
                                       name="image"
                                       id="image"
                                       class="form-control-modern"
                                       accept="image/*">

                            </div>

                        </div>

                    </div>

                </div>

                <div class="d-flex justify-content-end gap-2 mt-4 pt-3 border-top">

                    <a href="/admin/categories"
                       class="btn-outline-primary-custom"
                       style="text-decoration:none;">

                        Cancel

                    </a>

                    <button type="submit"
                            class="btn-submit-modern">

                        <i class="bi bi-check-circle me-1"></i>

                        Update Category

                    </button>

                </div>

            </form>

        </div>

    </div>

</div>

<script>

document.getElementById('image').addEventListener('change',function(){

    const preview=document.getElementById('imagePreview');

    preview.innerHTML='';

    const file=this.files[0];

    if(file){

        const reader=new FileReader();

        reader.onload=function(e){

            preview.innerHTML=`
                <img src="${e.target.result}"
                     style="width:140px;height:140px;border-radius:12px;object-fit:cover;">
            `;

        }

        reader.readAsDataURL(file);

    }

});

</script>

@endsection