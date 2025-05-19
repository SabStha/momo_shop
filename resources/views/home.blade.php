@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Our Momos</h1>
    <div class="row">
        @foreach($products as $product)
        <div class="col-md-4 mb-3">
            <div class="card h-100">
                <img src="{{ asset('images/momos/' . $product->image) }}" class="card-img-top" alt="{{ $product->name }}">
                <div class="card-body">
                    <h5 class="card-title">{{ $product->name }}</h5>
                    <p class="card-text">Rs. {{ $product->price }}</p>
                    <a href="{{ route('product.show', $product->id) }}" class="btn btn-primary">Order Now</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
