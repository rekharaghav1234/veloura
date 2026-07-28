@extends('admin.layouts.app')

@section('content')

<div class="container">

    <h3 class="mb-4">Edit Banner</h3>

    <form action="{{ route('admin.banners.update',$banner->id) }}"
          method="POST"
          enctype="multipart/form-data">

        @csrf

        <div class="mb-3">
            <label>Title</label>
            <input type="text"
                   name="title"
                   class="form-control"
                   value="{{ $banner->title }}">
        </div>

        <div class="mb-3">
            <label>Subtitle</label>
            <textarea name="subtitle"
                      class="form-control">{{ $banner->subtitle }}</textarea>
        </div>

        <div class="mb-3">
            <label>Button Text</label>
            <input type="text"
                   name="button_text"
                   class="form-control"
                   value="{{ $banner->button_text }}">
        </div>

        <div class="mb-3">
            <label>Button Link</label>
            <input type="text"
                   name="button_link"
                   class="form-control"
                   value="{{ $banner->button_link }}">
        </div>

        <div class="mb-3">
            <label>Current Image</label><br>

            <img src="{{ asset('uploads/banners/'.$banner->image) }}"
                 width="250"
                 class="img-thumbnail mb-2">

            <input type="file"
                   name="image"
                   class="form-control">
        </div>

        <div class="mb-3">
            <label>Status</label>

            <select name="status" class="form-control">
                <option value="1" {{ $banner->status==1?'selected':'' }}>
                    Active
                </option>

                <option value="0" {{ $banner->status==0?'selected':'' }}>
                    Inactive
                </option>
            </select>
        </div>

        <button class="btn btn-primary">
            Update Banner
        </button>

    </form>

</div>

@endsection