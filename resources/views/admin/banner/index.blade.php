@extends('admin.layouts.app')

@section('content')

<div class="container">

    <a href="{{ route('admin.banners.create') }}"
       class="btn btn-success mb-3">
        Add Banner
    </a>

    <table class="table table-bordered">

        <tr>
            <th>Image</th>
            <th>Title</th>
            <th>Status</th>
            <th>Action</th>
        </tr>

        @foreach($banners as $banner)

        <tr>

            <td width="180">

                <img src="{{ asset('uploads/banners/'.$banner->image) }}"
                     width="150">

            </td>

            <td>{{ $banner->title }}</td>

            <td>
                {{ $banner->status ? 'Active' : 'Inactive' }}
            </td>
            <td>

                <a href="{{ route('admin.banners.edit',$banner->id) }}"
                   class="btn btn-warning btn-sm">
                    Edit
                </a>
            
            </td>

        </tr>

        @endforeach

    </table>

</div>

@endsection