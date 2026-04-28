<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CheckoutController extends Controller
{
    public function create()
    {
        $products = Product::query()->where('is_active', true)->orderBy('name')->get();

        return view('storefront.checkout', compact('products'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'product_id' => ['required', 'exists:products,id'],
            'quantity' => ['required', 'integer', 'min:1'],
            'customer_name' => ['required', 'string', 'max:255'],
            'customer_email' => ['required', 'email', 'max:255'],
            'customer_phone' => ['nullable', 'string', 'max:30'],
            'shipping_address' => ['required', 'string', 'max:500'],
        ]);

        $product = Product::query()->findOrFail($validated['product_id']);
        $quantity = (int) $validated['quantity'];
        $lineTotal = $quantity * $product->price;

        DB::transaction(function () use ($request, $validated, $product, $quantity, $lineTotal): void {
            $order = Order::create([
                'user_id' => $request->user()->id,
                'customer_name' => $validated['customer_name'],
                'customer_email' => $validated['customer_email'],
                'customer_phone' => $validated['customer_phone'],
                'shipping_address' => $validated['shipping_address'],
                'total_amount' => $lineTotal,
                'status' => 'placed',
            ]);

            OrderItem::create([
                'order_id' => $order->id,
                'product_id' => $product->id,
                'quantity' => $quantity,
                'unit_price' => $product->price,
                'line_total' => $lineTotal,
            ]);
        });

        return redirect()->route('checkout.create')->with('success', 'Your order was placed successfully.');
    }
}
