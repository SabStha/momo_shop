<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Log;

class ProductController extends Controller {
    public function index() {
        $products = Product::all();
        return view('admin.products', compact('products'));
    }

    public function create() {
        return view('admin.create_product');
    }

    

    public function store(Request $request) {
        try {
            Log::info('🟢 [AdminProductController@store] Form submission received.', [
                'inputs' => $request->all()
            ]);

            $validated = $request->validate([
                'name' => 'required|string|max:255',
                'description' => 'nullable|string',
                'price' => 'required|numeric|min:0',
                'image' => 'nullable|image|max:12400',
            ]);

            Log::info('✅ Validation passed.', ['validated' => $validated]);

            if ($request->hasFile('image')) {
                $filename = time() . '.' . $request->image->extension();
                $request->image->move(public_path('images/momos'), $filename);
                $validated['image'] = $filename;

                Log::info('📸 Image uploaded successfully.', [
                    'filename' => $filename
                ]);
            } else {
                Log::info('⚠️ No image uploaded.');
            }

            $product = Product::create($validated);

            Log::info('✅ Product created in database.', ['product_id' => $product->id]);

            return redirect()->route('admin.products.index')->with('success', 'Product created');
        } catch (\Exception $e) {
            Log::error('🔥 [AdminProductController@store] Failed to create product.', [
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ]);

            return redirect()->back()->with('error', 'Something went wrong: ' . $e->getMessage());
        }
    }

    
}
