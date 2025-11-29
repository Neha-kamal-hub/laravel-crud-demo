@extends('layouts.app')

@section('title', 'Products - Laravel CRUD Demo')

@section('content')
    <div class="page-header d-flex flex-wrap justify-content-between align-items-center mb-3">
        <div>
            <h1>Products</h1>
            <p class="page-subtitle mb-0">
                Simple Laravel CRUD with search, pagination and image upload.
            </p>
        </div>

        <a href="{{ route('products.create') }}" class="btn btn-primary mt-3 mt-md-0">
            + Add Product
        </a>
    </div>

    <div class="stats-card d-flex flex-wrap justify-content-between align-items-center">
        <div class="mb-2 mb-md-0">
            <h6>Total Products</h6>
            <div class="number">{{ $products->total() }}</div>
        </div>

        <form method="GET" action="{{ route('products.index') }}" class="d-flex">
            <input type="text"
                   name="search"
                   class="form-control form-control-sm me-2"
                   placeholder="Search by name or description"
                   value="{{ $search }}">
            <button class="btn btn-sm btn-outline-secondary" type="submit">Search</button>
        </form>
    </div>

    @if (session('success'))
        <div class="alert alert-success shadow-sm mt-3">
            {{ session('success') }}
        </div>
    @endif

    <div class="table-card mt-3">
        @if ($products->count())
            <div class="table-responsive">
                <table class="table mb-0 align-middle">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Image</th>
                        <th>Name</th>
                        <th style="width: 12%">Price</th>
                        <th>Description</th>
                        <th style="width: 18%">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($products as $product)
                        <tr>
                            {{-- Correct row number with pagination --}}
                            <td>{{ $products->firstItem() + $loop->index }}</td>
                            <td>
                                @if($product->image)
                                    <img src="{{ asset('storage/'.$product->image) }}"
                                         alt="Image"
                                         style="width: 50px; height: 50px; object-fit: cover; border-radius: 8px;">
                                @else
                                    <span class="text-muted small">No image</span>
                                @endif
                            </td>
                            <td class="fw-semibold">{{ $product->name }}</td>
                            <td>₹ {{ number_format($product->price, 2) }}</td>
                            <td>{{ $product->description }}</td>
                            <td>
                                <a href="{{ route('products.edit', $product->id) }}"
                                   class="btn btn-sm btn-outline-primary me-1">
                                    Edit
                                </a>

                                <form action="{{ route('products.destroy', $product->id) }}" method="POST"
                                      class="d-inline"
                                      onsubmit="return confirm('Delete this product?')">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-sm btn-outline-danger" type="submit">
                                        Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>

            <div class="p-3">
                {{-- Pagination links (Bootstrap style if configured) --}}
                {{ $products->links('components.pagination') }}
            </div>
        @else
            <div class="p-4 text-center text-muted">
                No products found. Try a different search or add a new product.
            </div>
        @endif
    </div>
@endsection
