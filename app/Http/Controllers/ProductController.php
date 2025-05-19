<?php

namespace App\Http\Controllers;

use App\Models\Product;

class ProductController extends Controller {
    public function show($id) {
        $product = Product::findOrFail($id);
        return view('product', compact('product'));
    }

    public function store(Request $request) {
        $request->validate([
            'name' => 'required',
            'price' => 'required|numeric',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);
    
        $data = $request->all();
    
        if ($request->hasFile('image')) {
            $fileName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('images/momos'), $fileName);
            $data['image'] = $fileName;
        }
    
        Product::create($data);
    
        return redirect()->route('admin.products.index')->with('success', 'Product created');
    }
    
}
