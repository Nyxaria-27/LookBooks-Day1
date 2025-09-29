<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ContactController extends Controller
{
    public function index()
    {
        // Ambil pesan user (kalau ada)
        $contact = Contact::where('user_id', Auth::id())->first();

        return view('user.contact.index', compact('contact'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'subject' => 'nullable|string|max:255',
            'message' => 'required|string',
        ]);

        // Cek apakah user sudah punya pesan
        $contact = Contact::where('user_id', Auth::id())->first();

        if ($contact) {
            // Update pesan lama
            $contact->update([
                'subject' => $request->subject,
                'message' => $contact->message . "\n\n--- Update " . now()->format('d M Y H:i') . " ---\n" . $request->message,
                'status' => 'open', // otomatis open lagi kalau update
            ]);
        } else {
            // Buat pesan baru
            Contact::create([
                'user_id' => Auth::id(),
                'subject' => $request->subject,
                'message' => $request->message,
            ]);
        }

        return redirect()->route('user.contact.index')->with('success', 'Pesan berhasil dikirim!');
    }

    public function adminIndex()
    {
        $contacts = Contact::with('user')->latest('updated_at')->get();
        return view('admin.contacts.index', compact('contacts'));
    }

    public function adminShow($id)
    {
        $contact = Contact::with('user')->findOrFail($id);
        return view('admin.contacts.show', compact('contact'));
    }

    public function adminReply(Request $request, $id)
    {
        $request->validate([
            'admin_reply' => 'required|string',
        ]);

        $contact = Contact::findOrFail($id);
        $contact->update([
            'admin_reply' => $contact->admin_reply . "\n\n--- Reply " . now()->format('d M Y H:i') . " ---\n" . $request->admin_reply,
            'status' => 'replied',
        ]);

        return redirect()->route('admin.contacts.show', $id)->with('success', 'Balasan terkirim!');
    }
}
