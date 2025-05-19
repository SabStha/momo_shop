@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Customer Orders</h2>
    <table class="table">
        <thead>
            <tr><th>Customer</th><th>Phone</th><th>Address</th><th>Total</th><th>Status</th><th>Date</th></tr>
        </thead>
        <tbody>
        @foreach($orders as $order)
        <tr>
            <td>{{ $order->customer_name }}</td>
            <td>{{ $order->customer_phone }}</td>
            <td>{{ $order->customer_address }}</td>
            <td>Rs. {{ $order->total }}</td>
            <td>
                <form action="{{ route('admin.orders.updateStatus', $order->id) }}" method="POST">
                    @csrf
                    <select name="status" onchange="this.form.submit()" class="form-select form-select-sm">
                        <option value="pending" {{ $order->status == 'pending' ? 'selected' : '' }}>Pending</option>
                        <option value="processing" {{ $order->status == 'processing' ? 'selected' : '' }}>Processing</option>
                        <option value="delivered" {{ $order->status == 'delivered' ? 'selected' : '' }}>Delivered</option>
                    </select>
                </form>
            </td>
            <td>{{ $order->created_at->format('Y-m-d') }}</td>
        </tr>
        @endforeach

        </tbody>
    </table>
</div>
@endsection
