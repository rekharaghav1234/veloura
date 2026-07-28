@extends('frontend.layouts.app')

@section('content')

<link rel="stylesheet" href="{{ asset('css/admin-orders.css') }}">

<div class="container-fluid">

    <!-- Header -->
    <div class="page-header">

        <h3>
            <i class="bi bi-folder-plus"></i>
            Add Category
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
                data-bs-dismiss="alert">
        </button>

    </div>

    @endif

    <div class="card card-order">

        <div class="card-body" style="padding:2rem;">

            <form action="/admin/categories/store"
                  method="POST"
                  enctype="multipart/form-data">

                @csrf

                <div class="row g-4">

                    <!-- LEFT -->

                    <div class="col-lg-8">

                        <!-- Category Name -->

                        <div class="form-group-modern">

                            <label class="form-label-modern">

                                <i class="bi bi-tag me-1"></i>

                                Category Name

                                <span class="text-danger">*</span>

                            </label>

                            <input type="text"
                                   name="name"
                                   class="form-control-modern"
                                   placeholder="Enter Category Name"
                                   value="{{ old('name') }}"
                                   required>

                            @error('name')

                                <small class="text-danger">
                                    {{ $message }}
                                </small>

                            @enderror

                        </div>

                        <!-- Slug -->

                        <div class="form-group-modern">

                            <label class="form-label-modern">

                                <i class="bi bi-link-45deg me-1"></i>

                                Slug

                            </label>

                            <input type="text"
                                   id="slug"
                                   class="form-control-modern"
                                   readonly
                                   placeholder="Slug will generate automatically">

                        </div>

                    </div>

                    <!-- RIGHT -->

                    <div class="col-lg-4">

                        <!-- Image -->

                        <div class="form-group-modern">

                            <label class="form-label-modern">

                                <i class="bi bi-image me-1"></i>

                                Category Image

                            </label>

                            <div class="image-upload-wrapper">

                                <div class="image-upload-preview"
                                     id="imagePreview">

                                    <i class="bi bi-cloud-upload"
                                       style="font-size:2.5rem;color:#94a3b8;"></i>

                                    <p>Select Image</p>

                                    <small>PNG, JPG, JPEG</small>

                                </div>

                                <input type="file"
                                       id="image"
                                       name="image"
                                       class="form-control-modern"
                                       accept="image/*">

                            </div>

                            @error('image')

                                <small class="text-danger">

                                    {{ $message }}

                                </small>

                            @enderror

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

                        <i class="bi bi-plus-circle me-1"></i>

                        Add Category

                    </button>

                </div>

            </form>

        </div>

    </div>

</div>

<script>

const name=document.querySelector('input[name="name"]');

const slug=document.getElementById('slug');

name.addEventListener('keyup',function(){

slug.value=this.value
.toLowerCase()
.replace(/ /g,'-')
.replace(/[^\w-]+/g,'');

});

const imageInput=document.getElementById('image');

const preview=document.getElementById('imagePreview');

imageInput.addEventListener('change',function(){

const file=this.files[0];

if(file){

const reader=new FileReader();

reader.onload=function(e){

preview.innerHTML=`

<img src="${e.target.result}"
style="width:180px;height:180px;object-fit:cover;border-radius:12px;">

<br>

<small style="margin-top:10px;">${file.name}</small>

`;

}

reader.readAsDataURL(file);

}

});

</script>

@endsection