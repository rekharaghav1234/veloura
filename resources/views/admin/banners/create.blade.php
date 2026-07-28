@extends('admin.layouts.app')

@section('content')

<div class="container">

    <h3 class="mb-4">Add Banner</h3>

    <form action="{{ route('admin.banners.store') }}"
          method="POST"
          enctype="multipart/form-data">

        @csrf

        <div class="mb-3">
            <label>Title</label>

            <input type="text"
                   name="title"
                   class="form-control">
        </div>

        <div class="mb-3">
            <label>Subtitle</label>

            <textarea name="subtitle"
                      class="form-control"></textarea>
        </div>

        <div class="mb-3">
            <label>Button Text</label>

            <input type="text"
                   name="button_text"
                   class="form-control">
        </div>

        <div class="mb-3">
            <label>Button Link</label>

            <input type="text"
                   name="button_link"
                   class="form-control">
        </div>

        <div class="mb-3">
            <label>Banner Image</label>

            <input type="file"
                   name="image"
                   class="form-control">
        </div>

        <button class="btn btn-primary">
            Save Banner
        </button>

    </form>

</div>

@endsection