<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class CartController extends Controller {
    public function index() {
        $cart = session()->get('cart', []);
        return view('cart', compact('cart'));
    }

    public function add(Request $request, $id) {
        $product = Product::findOrFail($id);
        $cart = session()->get('cart', []);
        $cart[$id] = [
            "name" => $product->name,
            "quantity" => $request->quantity,
            "price" => $product->price,
            "image" => $product->image
        ];
        session()->put('cart', $cart);
        return redirect()->route('cart.index')->with('success', 'Momo added to cart!');
    }

    public function remove($id) {
        $cart = session()->get('cart', []);
        unset($cart[$id]);
        session()->put('cart', $cart);
        return redirect()->back()->with('success', 'Item removed!');
    }
}
