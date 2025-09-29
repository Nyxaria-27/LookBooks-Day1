<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class BookController extends Controller
{
    public function show($id)
    {
        $book = Book::findOrFail($id);

        // Untuk sekarang tidak ada relatedBooks berdasarkan kategori
        return view('user.books.show', compact('book'));
    }

    public function index(Request $request)
    {
        $query = Book::query();

        if ($request->has('search')) {
            $query->where(function ($q) use ($request) {
                $q->where('title', 'like', '%' . $request->search . '%')
                    ->orWhere('author', 'like', '%' . $request->search . '%')
                    ->orWhere('isbn', 'like', '%' . $request->search . '%');
            });
        }

        $books = $query->paginate(10);
        return view('books.index', compact('books'));
    }

    public function adminIndex(Request $request)
    {
        $query = Book::query();

        if ($request->has('search')) {
            $query->where(function ($q) use ($request) {
                $q->where('title', 'like', '%' . $request->search . '%')
                    ->orWhere('author', 'like', '%' . $request->search . '%')
                    ->orWhere('isbn', 'like', '%' . $request->search . '%');
            });
        }

        $books = $query->paginate(10);
        return view('admin.books.index', compact('books'));
    }

    public function create()
    {
        return view('admin.books.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required',
            'author' => 'required',
            'isbn' => 'required|unique:books,isbn',
            'price' => 'required|integer|min:10000',
            'stock' => 'required|integer|min:0',
            'description' => 'nullable',
            'cover' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        if ($request->hasFile('cover')) {
            $coverPath = $request->file('cover')->store('covers', 'public');
            $validated['cover'] = $coverPath;
        }

        Book::create($validated);

        return redirect()->route('admin.books.index')->with('success', 'Buku berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $book = Book::findOrFail($id);
        return view('admin.books.edit', compact('book'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'author' => 'required',
            'isbn' => 'required|unique:books,isbn,' . $id,
            'price' => 'required|integer|min:10000',
            'stock' => 'required|integer|min:0',
            'description' => 'nullable',
            'cover' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $book = Book::findOrFail($id);

        $data = $request->only(['title', 'author', 'isbn', 'price', 'stock', 'description']);

        if ($request->hasFile('cover')) {
            if ($book->cover && Storage::disk('public')->exists($book->cover)) {
                Storage::disk('public')->delete($book->cover);
            }
            $data['cover'] = $request->file('cover')->store('covers', 'public');
        }

        $book->update($data);

        return redirect()->route('admin.books.index')->with('success', 'Buku berhasil diupdate.');
    }

    public function destroy($id)
    {
        $book = Book::findOrFail($id);

        if ($book->stock > 0) {
            return redirect()->route('admin.books.index')
                ->with('error', 'Buku tidak bisa dihapus karena stok masih tersedia.');
        }

        $book->delete();
        return redirect()->route('admin.books.index')->with('success', 'Buku dihapus.');
    }
}
