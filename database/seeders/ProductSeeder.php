<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        Product::create([
            'name' => 'iPhone 15',
            'slug' => 'iphone-15',
            'price' => 250000,
            'description' => 'Latest Apple phone',
            'image_url' => 'https://www.pakmobizone.pk/mobile-phone/apple-iphone-15-plus-black-128gb-6gb/'
        ]);
        Product::create([
    'name' => 'Samsung S25',
    'slug' => 'samsung-s25',
    'price' => 220000,
    'description' => 'New Samsung flagship',
    'image_url' => 'https://images.priceoye.pk/samsung-galaxy-s25-pakistan-priceoye-5hblq-500x500.webp'
]);

Product::create([
    'name' => 'MacBook Pro',
    'slug' => 'macbook-pro',
    'price' => 450000,
    'description' => 'Apple laptop',
    'image_url' => 'https://mrlaptop.pk/laptops/apple-macbook-pro-mpxv2-core-i5-7th-generation-grey/'
]);
    }
}