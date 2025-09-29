@extends('layouts.app')

@section('content')
<div class="container">
    <h2>📩 Contact from {{ $contact->user->name }}</h2>

    <div class="mb-4">
        <strong>Subject:</strong> {{ $contact->subject ?? '-' }} <br>
        <strong>Status:</strong> {{ ucfirst($contact->status) }}
    </div>

    <div class="mb-4">
        <h4>User Message</h4>
        <pre class="bg-light p-3 border rounded">{{ $contact->message }}</pre>
    </div>

    @if($contact->admin_reply)
    <div class="mb-4">
        <h4>Admin Reply</h4>
        <pre class="bg-light p-3 border rounded">{{ $contact->admin_reply }}</pre>
    </div>
    @endif

    <form action="{{ route('admin.contacts.reply', $contact->id) }}" method="POST">
        @csrf
        <div class="mb-3">
            <label>Reply Message</label>
            <textarea name="admin_reply" rows="4" class="form-control" required></textarea>
        </div>
        <button class="btn btn-success">Send Reply</button>
    </form>
</div>
@endsection