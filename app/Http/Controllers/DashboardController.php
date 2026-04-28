<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class DashboardController extends Controller
{
    /**
     * Breeze user home. Admins are sent to the operations panel instead.
     */
    public function __invoke(Request $request): View|RedirectResponse
    {
        if ($request->user()->is_admin) {
            return redirect()->route('admin.index');
        }

        return view('dashboard');
    }
}
