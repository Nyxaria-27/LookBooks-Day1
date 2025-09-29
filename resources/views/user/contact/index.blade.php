@extends('layouts.app')

@section('content')
<div class="max-w-3xl mx-auto pt-28 px-4">

    <h2 class="text-3xl font-bold text-black mb-6 flex items-center gap-2">
        📩 Contact Admin
    </h2>

    {{-- Notifikasi sukses --}}
    @if(session('success'))
    <div class="mb-6 rounded-xl border border-green-500/20 bg-green-500/10 text-green-300 px-4 py-3">
        {{ session('success') }}
    </div>
    @endif

    {{-- Form --}}
    <form action="{{ route('user.contact.store') }}" method="POST"
        class="space-y-6 bg-white/5 backdrop-blur-xl border border-white/10 rounded-2xl p-6 shadow-xl">
        @csrf

        <div>
            <label class="block text-sm font-medium text-black/80 mb-2">Subject</label>
            <input type="text" name="subject"
                value="{{ old('subject', $contact->subject ?? '') }}"
                class="w-full px-4 py-3 rounded-xl bg-white/10 border border-white/10 text-black placeholder-white/40 focus:outline-none focus:ring-2 focus:ring-blue-500/50 focus:border-blue-500/50 transition">
        </div>

        <div>
            <label class="block text-sm font-medium text-black/80 mb-2">Message</label>
            <textarea name="message" rows="5" required
                class="w-full px-4 py-3 rounded-xl bg-white/10 border border-white/10 text-black placeholder-white/40 focus:outline-none focus:ring-2 focus:ring-blue-500/50 focus:border-blue-500/50 transition"></textarea>
        </div>

        <button type="submit"
            class="w-full sm:w-auto inline-flex items-center justify-center px-6 py-3 rounded-xl bg-blue-600 hover:bg-blue-500 text-black font-semibold shadow-lg shadow-blue-500/20 transition">
            Send
        </button>
    </form>

    {{-- Pesan Sebelumnya --}}
    @if($contact)
    <div class="mt-12 space-y-6">
        <div class="bg-white/5 backdrop-blur-xl border border-white/10 rounded-2xl p-6">
            <h4 class="text-xl font-semibold text-black mb-4">Pesan Sebelumnya</h4>
            <p class="text-black/80 mb-2"><strong class="text-black">Subject:</strong> {{ $contact->subject }}</p>
            <pre class="whitespace-pre-wrap text-black/70 bg-black/20 p-4 rounded-xl">{{ $contact->message }}</pre>
        </div>

        @if($contact->admin_reply)
        <div class="bg-white/5 backdrop-blur-xl border border-white/10 rounded-2xl p-6">
            <h4 class="text-xl font-semibold text-black mb-4">Balasan Admin</h4>
            <pre class="whitespace-pre-wrap text-black/70 bg-blue-500/10 p-4 rounded-xl border border-blue-500/20">{{ $contact->admin_reply }}</pre>
        </div>
        @endif
    </div>
    @endif

</div>
@endsection