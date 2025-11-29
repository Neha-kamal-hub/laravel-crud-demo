@extends('layouts.app')

@section('title', 'Home - Laravel CRUD Demo')

@section('content')
    <div class="row align-items-center">
        <div class="col-lg-6 mb-4 mb-lg-0">
            <h1 class="mb-3">Laravel Products CRUD Demo</h1>
            <p class="page-subtitle">
                This mini project demonstrates a full Create / Read / Update / Delete flow
                using Laravel, MySQL, Bootstrap and image upload.
            </p>

            <ul class="mt-3 mb-4 text-muted">
                <li>Laravel latest version with Eloquent ORM</li>
                <li>Form validation & user-friendly error messages</li>
                <li>Search, pagination and image thumbnails</li>
                <li>Responsive UI with custom design</li>
            </ul>

            <a href="{{ route('products.index') }}" class="btn btn-primary me-2">
                View Products
            </a>
            <a href="{{ route('products.create') }}" class="btn btn-outline-secondary">
                Add New Product
            </a>
        </div>

        <div class="col-lg-6">
            <div class="form-card">
                <h5 class="mb-3">Tech Stack</h5>
                <div class="row small">
                    <div class="col-6 mb-2">✅ Laravel</div>
                    <div class="col-6 mb-2">✅ PHP 8.2</div>
                    <div class="col-6 mb-2">✅ MySQL</div>
                    <div class="col-6 mb-2">✅ Bootstrap 5</div>
                    
                </div>
            </div>
        </div>
    </div>
@endsection
