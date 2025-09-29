@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto px-4 py-8">
    <h1 class="text-3xl font-bold mb-6 text-gray-800">Bookstore</h1>

    {{-- Grid Book --}}
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
        @foreach($books as $book)
        <div class="bg-white shadow-lg rounded-2xl overflow-hidden hover:shadow-xl transition">
            <img src="{{ asset('storage/'.$book->cover) }}" alt="{{ $book->title }}"
                class="w-full h-48 object-cover">

            <div class="p-4">
                <h2 class="text-lg font-semibold text-gray-900 truncate">{{ $book->title }}</h2>
                <p class="text-sm text-gray-600">by {{ $book->author }}</p>

                <p class="text-gray-700 text-sm mt-2 line-clamp-3">
                    {{ $book->description }}
                </p>

                <div class="mt-4 flex items-center justify-between">
                    <span class="text-blue-600 font-bold">Rp {{ number_format($book->price, 0, ',', '.') }}</span>
                    <a href="{{ route('books.show', $book->id) }}"
                        class="bg-blue-500 text-white px-3 py-1 rounded-lg hover:bg-blue-600 transition">
                        Detail
                    </a>
                </div>
            </div>
        </div>
        @endforeach
    </div>

    {{-- Jika tidak ada buku --}}
    @if($books->isEmpty())
    <p class="text-center text-gray-500 mt-10">Tidak ada buku tersedia.</p>
    @endif

    {{-- Pagination --}}
    <div class="mt-8">
        {{ $books->links() }}
    </div>
</div>
@endsection