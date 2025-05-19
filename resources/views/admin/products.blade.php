@extends('layouts.app')

@section('content')
<div class="container">
    <h2>All Products</h2>
    <a href="{{ route('admin.products.create') }}" class="btn btn-primary mb-3">Add New Product</a>
    <table class="table">
        <thead>
            <tr><th>Name</th><th>Price</th><th>Created</th></tr>
        </thead>
        <tbody>
            @foreach($products as $product)
            <tr>
                <td>{{ $product->name }}</td>
                <td>Rs. {{ $product->price }}</td>
                <td>{{ $product->created_at->format('Y-m-d') }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
