<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{
    public function index()
    {
        $cart = Cart::with('items.book')->where('user_id', Auth::id())->first();

        if (!$cart || $cart->items->isEmpty()) {
            return redirect()->route('user.cart.index')->with('error', 'Your cart is empty.');
        }

        $total = 0;
        foreach ($cart->items as $item) {
            $total += $item->book->price * $item->quantity;
        }

        return view('user.checkout.index', compact('cart', 'total'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'address' => 'required|string|max:255',
            'payment_method' => 'required|in:cod,bank_transfer,qris',
        ]);

        $cart = auth()->user()->cart()->with('items.book')->firstOrFail();

        if ($cart->items->isEmpty()) {
            return redirect()->route('user.cart.index')->with('error', 'Cart kosong!');
        }

        // Validasi stok
        foreach ($cart->items as $item) {
            if ($item->quantity > $item->book->stock) {
                return redirect()->route('user.cart.index')
                    ->with('error', "Stok untuk {$item->book->title} tidak mencukupi!");
            }
        }

        // Buat order
        $order = Order::create([
            'user_id' => auth()->id(),
            'status' => 'pending',
            'address' => $request->address,
            'payment_method' => $request->payment_method,
            'total_price' => 0,
        ]);

        $total = 0;

        foreach ($cart->items as $item) {
            $price = $item->book->price;
            $total += $price * $item->quantity;

            $order->items()->create([
                'book_id' => $item->book->id,
                'quantity' => $item->quantity,
                'price' => $price,
            ]);

            $item->book->decrement('stock', $item->quantity);
        }

        $order->update(['total_price' => $total]);

        $cart->items()->delete();

        return redirect()->route('user.orders.show', $order->id)->with('success', 'Checkout berhasil!');
    }

    public function buyNow(Request $request, Book $book)
    {
        $quantity = 1;

        if ($book->stock < $quantity) {
            return back()->with('error', 'Quantity exceeds available stock!');
        }

        // Simpan data sementara (pakai session)
        session([
            'buy_now' => [
                'book_id' => $book->id,
                'quantity' => $quantity,
            ]
        ]);

        // redirect ke halaman checkout khusus buyNow
        return redirect()->route('user.checkout.buyNow');
    }

    public function checkoutBuyNow()
    {
        $data = session('buy_now');
        if (!$data) {
            return redirect()->route('user.dashboard')->with('error', 'No item selected for buy now.');
        }

        $book = Book::findOrFail($data['book_id']);
        $quantity = $data['quantity'];

        return view('user.checkout.buyNow', compact('book', 'quantity'));
    }

    public function confirmBuyNow(Request $request)
    {
        $data = session('buy_now');
        if (!$data) {
            return redirect()->route('user.dashboard')->with('error', 'Session expired.');
        }

        $book = Book::findOrFail($data['book_id']);
        $quantity = $data['quantity'];

        // Buat order
        $order = Order::create([
            'user_id' => Auth::id(),
            'status' => 'pending',
            'total_price' => $book->price * $quantity,
        ]);

        OrderItem::create([
            'order_id' => $order->id,
            'book_id' => $book->id,
            'quantity' => $quantity,
            'price' => $book->price,
        ]);

        // Hapus session
        session()->forget('buy_now');

        return redirect()->route('user.orders.show', $order->id)
            ->with('success', 'Order berhasil dibuat!');
    }
}
