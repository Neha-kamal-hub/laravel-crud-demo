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
                <input type="file" name="image" class="form-control" id="imageInputEdit" accept="image/*">

                {{-- New image (just selected) --}}
                <small id="newImageName" class="text-muted d-block mt-1"></small>
                <div class="mt-2">
                    <img id="newImagePreview"
                        src="#"
                        alt="New image preview"
                        style="display:none;width:70px;height:70px;object-fit:cover;border-radius:10px;">
                </div>

                {{-- Current image coming from database --}}
                @if($product->image)
                    <div class="mt-3">
                        <small class="text-muted d-block">Current image:</small>
                        <span class="small d-block mb-1">{{ basename($product->image) }}</span>
                        <img src="{{ asset('storage/'.$product->image) }}"
                            alt="Current image"
                            style="width:70px;height:70px;object-fit:cover;border-radius:10px;">
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
<script>
        document.addEventListener('DOMContentLoaded', function () {
            const input   = document.getElementById('imageInputEdit');
            const preview = document.getElementById('newImagePreview');
            const nameEl  = document.getElementById('newImageName');

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
