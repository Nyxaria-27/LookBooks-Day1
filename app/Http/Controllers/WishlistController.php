<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class WishlistController extends Controller
{
    public function store($bookId)
    {
        $book = Book::findOrFail($bookId);
        auth()->user()->wishlist()->toggle($book);

        return redirect()->back()->with('success', 'Wishlist updated!');
    }

    public function index()
    {
        $books = auth()->user()->wishlist()->get();
        return view('user.wishlist', compact('books'));
    }

    public function destroy(Book $book)
    {
        auth()->user()->wishlist()->detach($book->id);
        return back()->with('success', 'Book removed from wishlist!');
    }
}
