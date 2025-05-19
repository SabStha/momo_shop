<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Customer;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use Illuminate\Support\Facades\Log;

class OrderSeeder extends Seeder
{
    public function run(): void
    {
        // Create Customer
        $customer = Customer::create([
            'name'       => 'Test User',
            'email'      => 'test@example.com',
            'phone'      => '9800000000',
            'address'    => 'Kathmandu, Nepal',
        ]);

        // Fetch products
        $product1 = Product::where('name', 'Steamed Buff Momo')->first();
        $product2 = Product::where('name', 'C-Momo Lava')->first();

        if (!$product1 || !$product2) {
            Log::error('❌ OrderSeeder failed: Required products not found.');
            return;
        }

        // Calculate total
        $total = ($product1->price * 2) + ($product2->price * 1);

        // Create Order with snapshot info
        $order = Order::create([
            'customer_id'      => $customer->id,
            'customer_name'    => $customer->name,
            'customer_phone'   => $customer->phone,
            'customer_address' => $customer->address,
            'total_amount'     => $total,
            'status'           => 'pending',
        ]);

        // Create OrderItems
        OrderItem::insert([
            [
                'order_id'    => $order->id,
                'product_id'  => $product1->id,
                'quantity'    => 2,
                'price'       => $product1->price,
                'created_at'  => now(),
                'updated_at'  => now(),
            ],
            [
                'order_id'    => $order->id,
                'product_id'  => $product2->id,
                'quantity'    => 1,
                'price'       => $product2->price,
                'created_at'  => now(),
                'updated_at'  => now(),
            ],
        ]);

        Log::info('✅ OrderSeeder completed successfully.');
    }
}
