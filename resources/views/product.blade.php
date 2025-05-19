@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-6">
            <img src="{{ asset('images/momos/' . $product->image) }}" class="img-fluid" alt="{{ $product->name }}">
        </div>
        <div class="col-md-6">
            <h2>{{ $product->name }}</h2>
            <p>Rs. {{ $product->price }}</p>
            <form action="{{ route('cart.add', $product->id) }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label>Quantity</label>
                    <input type="number" name="quantity" class="form-control" value="1" min="1">
                </div>
                <button type="submit" class="btn btn-success">Add to Cart</button>
            </form>
        </div>
    </div>
</div>
@endsection
