<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
    BookController,
    CartController,
    CartItemController,
    CheckoutController,
    OrderController,
    UserController,
    ContactController,
    WishlistController,
    ReportController
};
use App\Http\Middleware\AdminMiddleware;
use App\Http\Middleware\CheckRole;
use App\Http\Middleware\RedirectIfAuthenticated;

Route::middleware(['auth'])->group(function () {
    Route::get('/admin/dashboard', [UserController::class, 'admin'])->name('admin.dashboard');
    Route::get('/user/dashboard', [UserController::class, 'index'])->name('user.dashboard');
});

// 🌐 Halaman umum
Route::get('/', [BookController::class, 'index'])->name('home');
Route::get('/books/{book}', [BookController::class, 'show'])->name('books.show');

// 📃 Tentang & Kontak
Route::view('/about', 'pages.about')->name('about');
Route::post('/contact', [ContactController::class, 'store'])->middleware('auth')->name('contact.store');

// 🛡️ Otentikasi bawaan Breeze
require __DIR__ . '/auth.php';

// 🌟 Semua route berikut wajib login
Route::middleware('auth')->group(function () {
    // 🔐 Admin-only routes
    Route::middleware([CheckRole::class . ':user'])->group(function () {
        // Route Katalog untuk User
        // User Book
        Route::get('/dashboard', [UserController::class, 'index'])->name('user.dashboard');
        Route::get('/books/{id}', [BookController::class, 'show'])->name('user.books.show');
        Route::post('/wishlist/{book}', [WishlistController::class, 'store'])->name('wishlist.store');
        Route::get('/wishlist', [WishlistController::class, 'index'])->name('user.wishlist');

        // 🛒 Cart
        Route::get('/cart', [CartController::class, 'index'])->name('user.cart.index');
        Route::post('/books/{id}/add-to-cart', [CartController::class, 'store'])->name('user.books.addToCart');
        Route::put('/cart/{id}', [CartController::class, 'update'])->name('cart.update');
        // Route::post('/cart/add', [CartItemController::class, 'store'])->name('cart.add');
        Route::delete('/cart/item/{cartItem}', [CartItemController::class, 'destroy'])->name('cart.destroy');


        // 🧾 Order
        Route::post('/checkout', [CheckoutController::class, 'store'])->name('checkout.store');
        Route::get('/my-orders', [CheckoutController::class, 'index'])->name('checkout.index');

        // 🛒 Buy Now
        // web.php
        Route::post('/books/buyNow', [CheckoutController::class, 'index'])->name('user.books.buyNow');
        Route::post('/books/{id}/buyNow', [CheckoutController::class, 'buyNow'])->name('user.checkout.buyNow');

        // ✉️ Order History
        Route::get('/orders', [OrderController::class, 'index'])->name('user.orders.index');
        Route::get('/orders/{id}', [OrderController::class, 'show'])->name('user.orders.show');

        // 📩 Contact
        Route::get('/contact', [ContactController::class, 'index'])->name('user.contact.index');
        Route::post('/contact', [ContactController::class, 'store'])->name('user.contact.store');

        //struk pdf
        Route::get('/orders/{id}/invoice', action: [ReportController::class, 'generateInvoice'])->name('orders.invoice');
    });
    Route::middleware([CheckRole::class . ':admin'])->group(function () {

        // 📚 CRUD Buku
        Route::get('admin/books', [BookController::class, 'adminIndex'])->name('admin.books.index');
        Route::get('admin/books/create', [BookController::class, 'create'])->name('admin.books.create');
        Route::post('admin/books/', [BookController::class, 'store'])->name('admin.books.store');
        Route::get('admin/books/edit/{id}', [BookController::class, 'edit'])->name('admin.books.edit');
        Route::put('admin/books/{id}', [BookController::class, 'update'])->name('admin.books.update');
        Route::delete('admin/books/{id}', [BookController::class, 'destroy'])->name('admin.books.destroy');


        Route::get('/admin/users', [UserController::class, 'adminIndex'])->name('admin.users.index');

        // 📦 Semua pesanan
        Route::get('/admin/orders', [OrderController::class, 'index'])->name('admin.orders.index');
        Route::get('/admin/orders/{id}', [OrderController::class, 'show'])->name('admin.orders.show');
        Route::put('/admin/orders/{id}/status', [OrderController::class, 'updateStatus'])->name('admin.orders.updateStatus');

        // 📬 Admin Contact (Inbox)
        Route::get('/admin/contacts', [ContactController::class, 'adminIndex'])->name('admin.contacts.index');
        Route::get('/admin/contacts/{id}', [ContactController::class, 'adminShow'])->name('admin.contacts.show');
        Route::post('/admin/contacts/{id}/reply', [ContactController::class, 'adminReply'])->name('admin.contacts.reply');

        // ✉️ Order History
        Route::get('admin/orders', [OrderController::class, 'adminIndex'])->name('admin.orders.index');
        Route::get('admin/orders/{id}', [OrderController::class, 'adminShow'])->name('admin.orders.show');
        Route::put('admin/orders/{id}/status', [OrderController::class, 'adminUpdateStatus'])->name('admin.orders.updateStatus');

        // 📬 Admin Contact (Inbox)
        Route::get('/admin/contacts', [ContactController::class, 'adminIndex'])->name('admin.contacts.index');
        Route::get('/admin/contacts/{id}', [ContactController::class, 'adminShow'])->name('admin.contacts.show');
        Route::post('/admin/contacts/{id}/reply', [ContactController::class, 'adminReply'])->name('admin.contacts.reply');

        Route::get('/orders/{id}/invoice', action: [ReportController::class, 'generateInvoice'])->name('orders.invoice');

        //laporan admin
        Route::get('/admin/reports/orders', [ReportController::class, 'generateOrdersReport'])->name('admin.reports.orders');
    });
});

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
