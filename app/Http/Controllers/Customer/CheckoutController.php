<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;

class CheckoutController extends Controller
{
    public function index() {
        return view('customer.checkout.index');
    }

    public function payment() {
        return view('customer.checkout.payment');
    }

    public function confirmation() {
        return view('customer.checkout.confirmation');
    }
}

