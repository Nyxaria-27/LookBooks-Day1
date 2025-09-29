<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\User;
use App\Models\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $query = Book::query();

        // Search by title / author / isbn
        if ($request->has('search') && $request->search != null) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('title', 'like', '%' . $search . '%')
                    ->orWhere('author', 'like', '%' . $search . '%')
                    ->orWhere('isbn', 'like', '%' . $search . '%');
            });
        }

        // Sorting
        if ($request->filled('sort')) {
            switch ($request->sort) {
                case 'newest':
                    $query->latest();
                    break;
                case 'oldest':
                    $query->oldest();
                    break;
                case 'price_asc':
                    $query->orderBy('price', 'asc');
                    break;
                case 'price_desc':
                    $query->orderBy('price', 'desc');
                    break;
            }
        }

        // Get data with pagination
        $books = $query->paginate(9)->withQueryString();

        return view('user.dashboard', compact('books'));
    }

    public function show($id)
    {
        $book = Book::findOrFail($id);
        return view('user.show', compact('book'));
    }

    public function admin()
    {
        return view('admin.dashboard', [
            'booksCount'   => Book::count(),
            'usersCount'   => User::count(),
            'ordersCount'  => Order::count(),
            'latestBooks'  => Book::latest()->take(5)->get(),
        ]);
    }

    public function adminIndex()
    {
        $users = User::where('role', 'user')->latest()->paginate(10);
        return view('admin.users.index', compact('users'));
    }
}
