<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;

class ProductController extends Controller
{
    public function listing() {
        return view('customer.products.shop');
    }

    public function category($slug) {
        return view('customer.products.category', compact('slug'));
    }

    public function details($slug) {
        return view('customer.products.details', compact('slug'));
    }

    public function search() {
        return view('customer.products.search');
    }

        public function bestsellers() {
        return view('customer.products.bestsellers');
    }
}
