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
                <input type="file" name="image" class="form-control" id="imageInputCreate" accept="image/*">

                <small id="imageNameCreate" class="text-muted d-block mt-1"></small>

                <div class="mt-2">
                    <img id="imagePreviewCreate"
                        src="#"
                        alt="Selected image preview"
                        style="display:none;width:90px;height:90px;object-fit:cover;border-radius:10px;">
                </div>
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
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const input   = document.getElementById('imageInputCreate');
            const preview = document.getElementById('imagePreviewCreate');
            const nameEl  = document.getElementById('imageNameCreate');

            if (!input) return;

            input.addEventListener('change', function (e) {
                const file = e.target.files[0];

                if (!file) {
                    preview.style.display = 'none';
                    preview.src = '#';
                    nameEl.textContent = '';
                    return;
                }

                nameEl.textContent = file.name;

                const url = URL.createObjectURL(file);
                preview.src = url;
                preview.style.display = 'block';
            });
        });
    </script>
@endsection
