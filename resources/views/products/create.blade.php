@extends('layouts.app')

@section('title', 'Add Product - Laravel CRUD Demo')

@section('content')
    <div class="page-header mb-3">
        <h1>Add Product</h1>
        <p class="page-subtitle mb-0">
            Create a new product record using Laravel validation and Eloquent.
        </p>
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

        <form action="{{ route('products.store') }}" method="POST" class="row g-3" enctype="multipart/form-data">
            @csrf

            <div class="col-12">
                <label class="form-label">Product Name *</label>
                <input type="text" name="name" class="form-control"
                       value="{{ old('name') }}" required>
            </div>

            <div class="col-md-6">
                <label class="form-label">Price (₹) *</label>
                <input type="number" step="0.01" name="price" class="form-control"
                       value="{{ old('price') }}" required>
            </div>

            <div class="col-md-6">
                <label class="form-label">Image</label>
                <input type="file" name="image" class="form-control">
            </div>

            <div class="col-12">
                <label class="form-label">Description</label>
                <textarea name="description" rows="3" class="form-control">{{ old('description') }}</textarea>
            </div>

            <div class="col-12 d-flex justify-content-between mt-3">
                <a href="{{ route('products.index') }}" class="btn btn-outline-secondary">
                    Back to list
                </a>
                <button type="submit" class="btn btn-success">
                    Save Product
                </button>
            </div>
        </form>
    </div>
@endsection
