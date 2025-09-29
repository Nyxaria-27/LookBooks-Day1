<?php

namespace App\Http\Controllers;

use App\Models\CartItem;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CartItemController extends Controller
{
    public function store(Request $request)
    {
        $cart = auth()->user()->cart()->firstOrCreate();
        $item = $cart->items()->where('book_id', $request->book_id)->first();

        if ($item) {
            $item->increment('quantity');
        } else {
            $cart->items()->create([
                'book_id' => $request->book_id,
                'quantity' => 1
            ]);
        }

        return redirect()->route('cart.index');
    }

    public function destroy(CartItem $cartItem)
    {
        $cartItem->delete();
        return back()->with('success', 'Item dihapus dari keranjang.');
    }
}
