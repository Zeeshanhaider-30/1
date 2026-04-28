<?php

namespace Database\Seeders;

use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $admin = User::updateOrCreate(
            ['email' => 'admin@example.com'],
            [
                'name' => 'Main Admin',
                'password' => Hash::make('password'),
                'is_admin' => true,
            ]
        );

        $customer = User::updateOrCreate(
            ['email' => 'customer@example.com'],
            [
                'name' => 'Sample Customer',
                'password' => Hash::make('password'),
                'is_admin' => false,
            ]
        );

        $products = collect([
            [
                'name' => 'Aurora Desk Lamp',
                'price' => 6900,
                'stock' => 40,
                'image_url' => 'https://images.unsplash.com/photo-1513506003901-1e6a229e2d15?auto=format&fit=crop&w=900&q=80',
            ],
            [
                'name' => 'CloudWeave Throw',
                'price' => 5200,
                'stock' => 25,
                'image_url' => 'https://images.unsplash.com/photo-1616046229478-9901c5536a45?auto=format&fit=crop&w=900&q=80',
            ],
            [
                'name' => 'Sierra Ceramic Set',
                'price' => 7800,
                'stock' => 35,
                'image_url' => 'https://images.unsplash.com/photo-1612196808214-b8e1d6145a38?auto=format&fit=crop&w=900&q=80',
            ],
            [
                'name' => 'Nordic Wall Clock',
                'price' => 4600,
                'stock' => 50,
                'image_url' => 'https://images.unsplash.com/photo-1563865436914-44ee14a35e4b?auto=format&fit=crop&w=900&q=80',
            ],
            [
                'name' => 'Moss Aroma Diffuser',
                'price' => 6100,
                'stock' => 60,
                'image_url' => 'https://images.unsplash.com/photo-1604329760661-e71dc83f8f26?auto=format&fit=crop&w=900&q=80',
            ],
        ])->map(function (array $item) {
            return Product::updateOrCreate(
                ['slug' => Str::slug($item['name'])],
                [
                    'name' => $item['name'],
                    'description' => 'Premium quality '.$item['name'].' for daily and professional use.',
                    'price' => $item['price'],
                    'stock' => $item['stock'],
                    'is_active' => true,
                    'image_url' => $item['image_url'],
                ]
            );
        });

        $order = Order::create([
            'user_id' => $customer->id,
            'customer_name' => $customer->name,
            'customer_email' => $customer->email,
            'customer_phone' => '0300-1234567',
            'shipping_address' => 'Main Boulevard, Lahore, Pakistan',
            'total_amount' => 0,
            'status' => 'placed',
        ]);

        $runningTotal = 0;

        foreach ($products->take(2) as $product) {
            $qty = 1;
            $lineTotal = $product->price * $qty;

            OrderItem::create([
                'order_id' => $order->id,
                'product_id' => $product->id,
                'quantity' => $qty,
                'unit_price' => $product->price,
                'line_total' => $lineTotal,
            ]);

            $runningTotal += $lineTotal;
        }

        $order->update(['total_amount' => $runningTotal]);
    }
}
