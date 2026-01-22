<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\Page;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function show($slug)
    {
        $page = Page::where('slug', $slug)->where('is_active', true)->firstOrFail();
        return view('customer.pages.show', compact('page'));
    }

    public function concerns()
{
    return view('customer.pages.concerns');
}

public function ingredients()
{
    return view('customer.pages.ingredients');
}

public function privacyPolicy() // Note: File 1 already has a dynamic route for this
{
    return view('customer.pages.privacy-policy');
}

public function refund()
{
    return view('customer.pages.refund');
}
}
