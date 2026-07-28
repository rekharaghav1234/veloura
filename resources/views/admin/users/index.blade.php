@extends('frontend.layouts.app')

@section('content')

<link rel="stylesheet" href="{{ asset('css/admin-orders.css') }}">

<div class="container-fluid">

    <!-- Header -->
    <div class="page-header">

        <h3>
            <i class="bi bi-people"></i>
            All Users

            <span class="badge bg-primary bg-opacity-10 text-primary fw-semibold ms-2">
                {{ $users->total() }}
            </span>
        </h3>

    </div>

    <!-- Card -->
    <div class="card card-order">

        <div class="card-body p-0">

            <div class="table-responsive">

                <table class="table table-order">

                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Joined</th>
                        </tr>
                    </thead>

                    <tbody>

                        @forelse($users as $user)

                        <tr>
                            <td>{{ $user->id }}</td>

                            <td>
                                <span class="product-name">
                                    {{ $user->name }}
                                </span>
                            </td>

                            <td>
                                {{ $user->email }}
                            </td>

                            <td>
                                {{ $user->created_at->format('d M Y') }}
                            </td>

                        </tr>

                        @empty

                        <tr>
                            <td colspan="4">
                                <div class="empty-state">
                                    <i class="bi bi-people"></i>
                                    <h5>No Users Found</h5>
                                </div>
                            </td>
                        </tr>

                        @endforelse

                    </tbody>

                </table>
                <div class="card-footer bg-transparent border-top-0 p-3 d-flex justify-content-between align-items-center">

                    <div class="text-muted small">
                        Showing {{ $users->firstItem() }} - {{ $users->lastItem() }} of {{ $users->total() }}
                    </div>
                
                    <div>
                        {{ $users->links('pagination::bootstrap-5') }}
                    </div>
                
                </div>
            </div>

        </div>

        <!-- Pagination -->
    

    </div>

</div>

@endsection