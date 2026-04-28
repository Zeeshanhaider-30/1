<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class AdminDashboardController extends Controller
{
    public function index()
    {
        return view('admin.dashboard');
    }

    public function products(Request $request)
    {
        if ($request->ajax()) {
            return DataTables::of(Product::query()->latest())->make(true);
        }

        return view('admin.tables.products');
    }

    public function orders(Request $request)
    {
        if ($request->ajax()) {
            return DataTables::of(Order::query()->with('user')->latest())
                ->addColumn('ordered_by', fn (Order $order) => $order->user?->name ?? 'Guest')
                ->make(true);
        }

        return view('admin.tables.orders');
    }

    public function orderItems(Request $request)
    {
        if ($request->ajax()) {
            return DataTables::of(OrderItem::query()->with(['order', 'product'])->latest())
                ->addColumn('order_reference', fn (OrderItem $item) => '#'.$item->order_id)
                ->addColumn('product_name', fn (OrderItem $item) => $item->product?->name ?? 'N/A')
                ->make(true);
        }

        return view('admin.tables.order-items');
    }

    public function customers(Request $request)
    {
        if ($request->ajax()) {
            return DataTables::of(User::query()->whereHas('orders')->withCount('orders')->latest())->make(true);
        }

        return view('admin.tables.customers');
    }

    public function admins(Request $request)
    {
        if ($request->ajax()) {
            return DataTables::of(User::query()->where('is_admin', true)->latest())->make(true);
        }

        return view('admin.tables.admins');
    }
}
