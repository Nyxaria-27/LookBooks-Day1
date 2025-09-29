<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Contact extends Model
{
    protected $fillable = [
        'user_id',
        'subject',
        'message',
        'admin_reply',
        'status',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
