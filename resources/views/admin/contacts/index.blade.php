@extends('layouts.app')

@section('content')
<div class="container pt-28">
    <h2>📬 User Contacts</h2>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>User</th>
                <th>Subject</th>
                <th>Status</th>
                <th>Last Update</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($contacts as $contact)
            <tr>
                <td>{{ $contact->user->name }}</td>
                <td>{{ $contact->subject ?? '-' }}</td>
                <td>
                    @if($contact->status === 'replied')
                    <span class="badge bg-success">Replied</span>
                    @else
                    <span class="badge bg-warning text-dark">Open</span>
                    @endif
                </td>
                <td>{{ $contact->updated_at->diffForHumans() }}</td>
                <td>
                    <a href="{{ route('admin.contacts.show', $contact->id) }}" class="btn btn-sm btn-primary">View</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection