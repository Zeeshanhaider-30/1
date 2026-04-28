# Laravel storefront and admin

## How it works

This application is a small e-commerce style site built on Laravel. Visitors land on the home page, browse a paginated product catalog, and open individual product pages. Anyone can view the storefront and submit the contact form. Creating an account (or signing in) is required for checkout: authenticated users pick a product, quantity, and shipping details, then place an order that is stored for administrators to review.

Staff accounts with the `admin` role can open the **Admin** area. There they see a dashboard with shortcuts to server-backed DataTables for products, orders, order line items, customers who have ordered, and other administrators. Tables load rows via AJAX so large datasets stay fast. Regular signed-in users get Laravel Breeze’s **Dashboard** and **Profile** screens for account maintenance.

Typical flow: configure `.env` and the database, run migrations and seeders if you use them, then `composer install`, `npm install`, and `npm run build` (or `npm run dev` while developing). Start the app with `php artisan serve`, visit `/` for the shop, `/register` or `/login` for auth, and `/admin` for the operations panel (admin users only).

## Admin access (403 “Unauthorized”)

The `/admin` routes use middleware that checks `users.is_admin`. Normal registration sets `is_admin` to `false`, so you will see **403 Unauthorized admin access** until an admin user signs in.

**Option A — seeded admin (after migrations):** run `php artisan db:seed`, then sign in as **admin@example.com** with password **password**. That user has `is_admin = true`.

**Option B — promote your own account:** from the project directory run `php artisan tinker`, then:

```php
\App\Models\User::where('email', 'your-email@example.com')->update(['is_admin' => true]);
```

Exit tinker, log out and back in (or refresh), then open `/admin` again.

**Routes:** After **login** or **register**, you are sent to the **shop home** (`/`). `/dashboard` is the normal user home (Breeze); admins who open `/dashboard` are redirected to `/admin`. The shop sidebar shows **Admin panel** or **Dashboard** plus **Log out** when signed in.

## Important concepts used

- **Laravel routing and controllers** — HTTP routes in `routes/web.php` map URLs to controller actions for the storefront, checkout, contact form, Breeze auth, and the admin namespace.
- **Blade templates and components** — Pages are built with Blade; reusable UI pieces (layouts, buttons, inputs, modals) live under `resources/views/components` and keep markup consistent.
- **Middleware** — `auth`, `verified`, and a custom `admin` middleware gate checkout and admin routes so only the right users reach those actions.
- **Eloquent ORM** — Products, orders, users, and related records are modeled as Eloquent entities and persisted through the database layer.
- **Laravel Breeze** — Provides registration, login, email verification, profile editing, and session handling with minimal scaffolding.
- **Tailwind CSS** — Utility-first styling with a custom `harbor` color palette and shared classes (for example in `resources/css/app.css`) for cards, inputs, and buttons.
- **Vite** — Bundles `resources/css/app.css` and `resources/js/app.js` for the browser; Alpine.js (via Breeze) powers small interactions such as the mobile navigation drawer and dropdown menus.
- **jQuery DataTables (Yajra pattern)** — Admin list pages use DataTables with server-side processing for sortable, filterable tables without loading every row at once.
- **CSRF protection and form requests** — POST forms include Laravel’s CSRF tokens; validation runs in controllers or form request classes depending on how each feature is implemented.
