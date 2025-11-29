@extends('layouts.app')

@section('title', 'Edit Product - Laravel CRUD Demo')

@section('content')
    <div class="page-header mb-3 d-flex justify-content-between align-items-center">
        <div>
            <h1>Edit Product</h1>
            <p class="page-subtitle mb-0">
                Update product details and save changes.
            </p>
        </div>
    </div>

    <div class="form-card">
        @if ($errors->any())
            <div class="alert alert-danger">
                <strong>Whoops!</strong> Please fix the following:
                <ul class="mt-2">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('products.update', $product->id) }}" method="POST"
              class="row g-3" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="col-12">
                <label class="form-label">Product Name *</label>
                <input type="text" name="name" class="form-control"
                       value="{{ old('name', $product->name) }}" required>
            </div>

            <div class="col-md-6">
                <label class="form-label">Price (₹) *</label>
                <input type="number" step="0.01" name="price" class="form-control"
                       value="{{ old('price', $product->price) }}" required>
            </div>

            <div class="col-md-6">
                <label class="form-label">Image</label>
                <input type="file" name="image" class="form-control">
                @if($product->image)
                    <div class="mt-2">
                        <small class="text-muted d-block">Current image:</small>
                        <img src="{{ asset('storage/'.$product->image) }}"
                             alt="Image"
                             style="width: 70px; height: 70px; object-fit: cover; border-radius: 10px;">
                    </div>
                @endif
            </div>

            <div class="col-12">
                <label class="form-label">Description</label>
                <textarea name="description" rows="3" class="form-control">{{ old('description', $product->description) }}</textarea>
            </div>

            <div class="col-12 d-flex justify-content-between mt-3">
                <a href="{{ route('products.index') }}" class="btn btn-outline-secondary">
                    Back to list
                </a>
                <button type="submit" class="btn btn-primary">
                    Update Product
                </button>
            </div>
        </form>
    </div>
@endsection
