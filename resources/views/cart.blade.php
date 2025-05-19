@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Your Cart</h2>
    @if(session('cart') && count($cart))
    <table class="table">
        <thead>
            <tr><th>Item</th><th>Qty</th><th>Price</th><th>Action</th></tr>
        </thead>
        <tbody>
            @foreach($cart as $id => $item)
            <tr>
                <td>{{ $item['name'] }}</td>
                <td>{{ $item['quantity'] }}</td>
                <td>Rs. {{ $item['price'] * $item['quantity'] }}</td>
                <td><a href="{{ route('cart.remove', $id) }}" class="btn btn-danger btn-sm">Remove</a></td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <a href="{{ route('checkout.index') }}" class="btn btn-primary">Proceed to Checkout</a>
    @else
    <p>Your cart is empty.</p>
    @endif
</div>
@endsection
