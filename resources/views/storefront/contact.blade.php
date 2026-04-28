<x-layouts.store title="Contact">
    <div class="grid gap-12 lg:grid-cols-2">
        <div>
            <span class="harbor-badge">Aurelia Support</span>
            <h1 class="mt-3 harbor-section-title">Connect with our team</h1>
            <p class="mt-4 text-harbor-muted leading-relaxed">
                Need help with product choices, shipping updates, or your latest order? Send a message and we will respond shortly.
            </p>
            <div class="mt-8 overflow-hidden rounded-3xl border border-harbor-sand/80 shadow-lg">
                <img
                    src="https://images.unsplash.com/photo-1524758631624-e2822e304c36?auto=format&amp;fit=crop&amp;w=900&amp;q=80"
                    alt="Modern home interior consultation"
                    class="h-56 w-full object-cover"
                >
            </div>
        </div>

        <form method="POST" action="{{ route('contact.store') }}" class="harbor-card space-y-5 p-6 sm:p-8">
            @csrf
            <div>
                <label class="harbor-label" for="name">Name</label>
                <input type="text" name="name" id="name" value="{{ old('name') }}" class="harbor-input" required>
            </div>
            <div>
                <label class="harbor-label" for="email">Email</label>
                <input type="email" name="email" id="email" value="{{ old('email') }}" class="harbor-input" required>
            </div>
            <div>
                <label class="harbor-label" for="subject">Subject</label>
                <input type="text" name="subject" id="subject" value="{{ old('subject') }}" class="harbor-input" required>
            </div>
            <div>
                <label class="harbor-label" for="message">Message</label>
                <textarea name="message" id="message" rows="5" class="harbor-input" required>{{ old('message') }}</textarea>
            </div>
            <button type="submit" class="harbor-btn-primary">Send message</button>
        </form>
    </div>
</x-layouts.store>
