@extends('frontend.layouts.app')

@section('content')

<link rel="stylesheet" href="{{ asset('css/admin-orders.css') }}">

<div class="container-fluid">

    <!-- Header -->
    <div class="page-header">

        <h3>

            <i class="bi bi-folder"></i>

            All Categories

            <span class="badge bg-primary bg-opacity-10 text-primary fw-semibold ms-2"
                  style="font-size:0.75rem;padding:0.25rem 0.85rem;">

                {{ $categories->total() }}

            </span>

        </h3>

        <div class="header-actions">

            <div class="search-box">

                <i class="bi bi-search"></i>

                <input type="text"
                       placeholder="Search Category..."
                       id="tableSearch">

            </div>

            <a href="/admin/categories/create"
               class="btn-outline-primary-custom"
               style="text-decoration:none;">

                <i class="bi bi-plus-circle me-1"></i>

                Add Category

            </a>

        </div>

    </div>

    <!-- Success -->

    @if(session('success'))

    <div class="alert alert-success alert-dismissible fade show alert-success-modern">

        <i class="bi bi-check-circle-fill me-2"></i>

        {{ session('success') }}

        <button class="btn-close"
                data-bs-dismiss="alert">
        </button>

    </div>

    @endif

    <!-- Card -->

    <div class="card card-order">

        <div class="card-body p-0">

            <div class="table-responsive">

                <table class="table table-order"
                       id="categoryTable">

                    <thead>

                        <tr>

                            <th width="90">

                                <i class="bi bi-image"></i>

                                Image

                            </th>

                            <th>

                                <i class="bi bi-folder"></i>

                                Category

                            </th>

                            <th>

                                <i class="bi bi-link-45deg"></i>

                                Slug

                            </th>

                            <th width="220">

                                <i class="bi bi-tools"></i>

                                Action

                            </th>

                        </tr>

                    </thead>

                    <tbody>

                        @forelse($categories as $category)

                        <tr>

                            <!-- Image -->

                            <td>
                                <img src="{{ !empty($category->image)
                                    ? asset('uploads/categories/'.$category->image)
                                    : asset('images/category2.jpg') }}"
                                     class="product-img"
                                     alt="Category">
                            </td>

                            <!-- Name -->

                            <td>

                                <span class="product-name">

                                    {{ $category->name }}

                                </span>

                            </td>

                            <!-- Slug -->

                            <td>

                                <span class="text-muted">

                                    {{ $category->slug }}

                                </span>

                            </td>

                            <!-- Action -->

                            <td>

                                <a href="/admin/categories/edit/{{ $category->id }}"
                                   class="btn-view btn-edit me-2">

                                    <i class="bi bi-pencil"></i>

                                    Edit

                                </a>
                                <a href="/admin/categories/delete/{{ $category->id }}"
                                    class="btn-view btn-delete delete-btn">
                                     <i class="bi bi-trash"></i> Delete
                                 </a>

                            </td>

                        </tr>

                        @empty

                        <tr>

                            <td colspan="4">

                                <div class="empty-state">

                                    <i class="bi bi-folder-x"></i>

                                    <h5>No Categories Found</h5>

                                    <p>

                                        Click on <b>Add Category</b> to create one.

                                    </p>

                                </div>

                            </td>

                        </tr>

                        @endforelse

                    </tbody>

                </table>

            </div>

        </div>

        <!-- Pagination -->

        @if(method_exists($categories,'links'))

        <div class="card-footer bg-transparent border-top-0 d-flex justify-content-between align-items-center p-3">

            <div class="text-muted small">

                Showing

                {{ $categories->firstItem() ?? 0 }}

                -

                {{ $categories->lastItem() ?? 0 }}

                of

                {{ $categories->total() }}

            </div>

            <div>

                {{ $categories->links('pagination::bootstrap-5') }}

            </div>

        </div>

        @endif

    </div>

</div>

<script>

const input=document.getElementById("tableSearch");

const rows=document.querySelectorAll("#categoryTable tbody tr");

input.addEventListener("keyup",function(){

let value=this.value.toLowerCase();

rows.forEach(row=>{

if(row.querySelector(".empty-state")) return;

row.style.display=row.innerText.toLowerCase().includes(value) ? "" : "none";

});

});

</script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
document.querySelectorAll('.delete-btn').forEach(function(button){

    button.addEventListener('click', function(e){

        e.preventDefault();

        let url = this.getAttribute('href');

        Swal.fire({
            title: 'Delete Category?',
            text: 'Are you sure you want to delete this category?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#ef4444',
            cancelButtonColor: '#6c757d',
            confirmButtonText: 'Yes, Delete',
            cancelButtonText: 'Cancel'
        }).then((result) => {

            if(result.isConfirmed){
                window.location.href = url;
            }

        });

    });

});
</script>

@endsection