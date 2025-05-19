<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderItem;

class CheckoutController extends Controller {
    public function index() {
        return view('checkout');
    }

    public function store(Request $request) {
        $request->validate([
            'customer_name' => 'required',
            'customer_phone' => 'required',
            'customer_address' => 'required'
        ]);

        $order = Order::create([
            'customer_name' => $request->customer_name,
            'customer_phone' => $request->customer_phone,
            'customer_address' => $request->customer_address,
            'total' => collect(session('cart'))->sum(fn($item) => $item['price'] * $item['quantity']),
            'status' => 'pending'
        ]);

        foreach (session('cart') as $id => $item) {
            OrderItem::create([
                'order_id' => $order->id,
                'product_id' => $id,
                'quantity' => $item['quantity'],
                'price' => $item['price']
            ]);
        }

        session()->forget('cart');
        return redirect()->route('checkout.thankyou');
    }

    public function thankyou() {
        return view('thankyou');
    }
}
