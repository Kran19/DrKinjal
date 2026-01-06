<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| CUSTOMER CONTROLLERS
|--------------------------------------------------------------------------
*/
use App\Http\Controllers\Customer\AuthController as CustomerAuth;
use App\Http\Controllers\Customer\HomeController as CustomerHome;
use App\Http\Controllers\Customer\ProductController as CustomerProduct;
use App\Http\Controllers\Customer\CartController as CustomerCart;
use App\Http\Controllers\Customer\CheckoutController as CustomerCheckout;
use App\Http\Controllers\Customer\WishlistController as CustomerWishlist;
use App\Http\Controllers\Customer\PageController as CustomerPage;
use App\Http\Controllers\Customer\AccountController as CustomerAccount;
use App\Http\Controllers\Customer\OrderController as CustomerOrder;
use App\Http\Controllers\Customer\UserController as CustomerUser;

/*
|--------------------------------------------------------------------------
| CUSTOMER ROUTES
|--------------------------------------------------------------------------
*/
Route::name('customer.')->group(function () {

    /*
    |--------------------------------------------------------------------------
    | HOME PAGE
    |--------------------------------------------------------------------------
    */
    Route::get('/', [CustomerHome::class, 'index'])->name('home.index');


    /*
    |--------------------------------------------------------------------------
    | NEW PAGES
    |--------------------------------------------------------------------------
    */
    Route::get('/bestsellers', [CustomerProduct::class, 'bestsellers'])->name('products.bestsellers');
    Route::get('/concerns', [CustomerPage::class, 'concerns'])->name('page.concerns');
    Route::get('/ingredients', [CustomerPage::class, 'ingredients'])->name('page.ingredients');


    /*
    |--------------------------------------------------------------------------
    | CUSTOMER AUTH (UI ONLY)
    |--------------------------------------------------------------------------
    */
    Route::get('/login', [CustomerAuth::class, 'loginPage'])->name('login');
        Route::post('/logout', [CustomerAuth::class, 'logout'])->name('logout');

    Route::get('/register', [CustomerAuth::class, 'registerPage'])->name('register');
    Route::get('/forgot-password', [CustomerAuth::class, 'showForgotPassword'])->name('forgot-password');

    /*
    |--------------------------------------------------------------------------
    | PRODUCTS
    |--------------------------------------------------------------------------
    */
    Route::get('/products', [CustomerProduct::class, 'listing'])->name('products.list');
    Route::get('/category/{slug}', [CustomerProduct::class, 'category'])->name('category.products');
    Route::get('/product/{slug}', [CustomerProduct::class, 'details'])->name('products.details');
    Route::get('/search', [CustomerProduct::class, 'search'])->name('products.search');

    /*
    |--------------------------------------------------------------------------
    | CART
    |--------------------------------------------------------------------------
    */
    Route::get('/cart', [CustomerCart::class, 'index'])->name('cart');

    /*
    |--------------------------------------------------------------------------
    | CHECKOUT
    |--------------------------------------------------------------------------
    */
    Route::get('/checkout', [CustomerCheckout::class, 'index'])->name('checkout');
    Route::get('/checkout/payment', [CustomerCheckout::class, 'payment'])->name('checkout.payment');
    Route::get('/checkout/confirmation', [CustomerCheckout::class, 'confirmation'])->name('checkout.confirmation');

    /*
    |--------------------------------------------------------------------------
    | WISHLIST
    |--------------------------------------------------------------------------
    */
    Route::get('/wishlist', [CustomerWishlist::class, 'index'])->name('wishlist');

    /*
    |--------------------------------------------------------------------------
    | CMS STATIC PAGES
    |--------------------------------------------------------------------------
    */
    Route::prefix('page')->group(function () {
        Route::get('/about', [CustomerPage::class, 'about'])->name('page.about');
        Route::get('/contact', [CustomerPage::class, 'contact'])->name('page.contact');
        Route::get('/faq', [CustomerPage::class, 'faq'])->name('page.faq');
        Route::get('/terms', [CustomerPage::class, 'terms'])->name('page.terms');
        Route::get('/privacy', [CustomerPage::class, 'privacy'])->name('page.privacy');
        Route::get('/refund', [CustomerPage::class, 'refund'])->name('page.refund');
        Route::get('/size-guide', [CustomerPage::class, 'sizeGuide'])->name('page.size-guide');

    });

    /*
    |--------------------------------------------------------------------------
    | CUSTOMER ACCOUNT (LOGGED-IN AREA)
    |--------------------------------------------------------------------------
    */
    Route::prefix('account')->name('account.')->group(function () {

        Route::get('/profile', [CustomerAccount::class, 'profile'])->name('profile');
        Route::get('/orders', [CustomerOrder::class, 'orders'])->name('orders');
        Route::get('/orders/{id}', [CustomerOrder::class, 'orderDetails'])->name('orders.details');
        Route::get('/addresses', [CustomerAccount::class, 'addresses'])->name('addresses');
        Route::get('/change-password', [CustomerAccount::class, 'changePassword'])->name('change-password');
    });

});