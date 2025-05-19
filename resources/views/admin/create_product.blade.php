@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Add New Product</h2>
    <form action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <!-- Name -->
        <div class="mb-3">
            <label for="name" class="form-label">Product Name</label>
            <input type="text" name="name" class="form-control" required>
        </div>

        <!-- Description -->
        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea name="description" class="form-control" rows="3"></textarea>
        </div>

        <!-- Price -->
        <div class="mb-3">
            <label for="price" class="form-label">Price (NPR)</label>
            <input type="number" name="price" class="form-control" step="0.01" required>
        </div>

        <!-- Image -->
        <div class="mb-3">
            <label class="form-label">Image</label>
            <input type="file" name="image" class="form-control" accept="image/*">
        </div>

        <!-- Submit -->
        <button type="submit" class="btn btn-success">Save</button>
    </form>
</div>
@endsection
