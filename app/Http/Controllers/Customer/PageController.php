<?php
namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;

class PageController extends Controller
{
    public function about()
    {
        return view('customer.pages.about');
    }
    public function contact()
    {
        return view('customer.pages.contact');
    }
    public function faq()
    {
        return view('customer.pages.faq');
    }
    public function terms()
    {
        return view('customer.pages.terms');
    }
    public function privacy()
    {
        return view('customer.pages.privacy');
    }
    public function refund()
    {
        return view('customer.pages.refund');
    }
    public function sizeGuide()
    {
        return view('customer.pages.size-guide');
    }

        public function concerns()
    {
        return view('customer.pages.concerns');
    }

    public function ingredients()
    {
        return view('customer.pages.ingridiants'); // Note: your blade file is named 'ingridiants'
    }

}
