<?php

namespace App\Http\Controllers;

use App\Models\Product;

class StorefrontController extends Controller
{
    public function front()
    {
        $featuredProducts = Product::query()->where('is_active', true)->latest()->take(3)->get();

        return view('storefront.front', compact('featuredProducts'));
    }

    public function products()
    {
        $products = Product::query()->where('is_active', true)->latest()->paginate(9);

        return view('storefront.products', compact('products'));
    }

    public function show(Product $product)
    {
        abort_unless($product->is_active, 404);

        return view('storefront.product-show', compact('product'));
    }
}
