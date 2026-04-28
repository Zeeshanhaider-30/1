<x-layouts.store title="Checkout">
    <div class="mx-auto max-w-2xl">
        <span class="harbor-badge">Secure Checkout</span>
        <h1 class="mt-3 harbor-section-title">Complete your purchase</h1>
        <p class="mt-3 text-sm text-harbor-muted">Review your selection and delivery details in one clean, streamlined flow.</p>

        <form method="POST" action="{{ route('checkout.store') }}" class="harbor-card mt-10 space-y-5 p-6 sm:p-8">
            @csrf
            <div>
                <label class="harbor-label" for="product_id">Product</label>
                <select name="product_id" id="product_id" class="harbor-input">
                    @foreach ($products as $product)
                        <option value="{{ $product->id }}">{{ $product->name }} — PKR {{ number_format($product->price, 2) }}</option>
                    @endforeach
                </select>
            </div>
            <div>
                <label class="harbor-label" for="quantity">Quantity</label>
                <input type="number" min="1" name="quantity" id="quantity" value="1" class="harbor-input">
            </div>
            <div class="grid gap-5 sm:grid-cols-2">
                <div>
                    <label class="harbor-label" for="customer_name">Customer name</label>
                    <input type="text" name="customer_name" id="customer_name" value="{{ old('customer_name', auth()->user()->name) }}" class="harbor-input">
                </div>
                <div>
                    <label class="harbor-label" for="customer_email">Email</label>
                    <input type="email" name="customer_email" id="customer_email" value="{{ old('customer_email', auth()->user()->email) }}" class="harbor-input">
                </div>
            </div>
            <div>
                <label class="harbor-label" for="customer_phone">Phone</label>
                <input type="text" name="customer_phone" id="customer_phone" class="harbor-input">
            </div>
            <div>
                <label class="harbor-label" for="shipping_address">Shipping address</label>
                <textarea name="shipping_address" id="shipping_address" rows="3" class="harbor-input"></textarea>
            </div>
            <button type="submit" class="harbor-btn-primary w-full sm:w-auto">Place order</button>
        </form>
    </div>
</x-layouts.store>
