<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Models\Cart;
use App\Models\Order;
use App\Models\Contact;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
        'pp',

    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    // One-to-One
    public function cart()
    {
        return $this->hasOne(Cart::class);
    }

    // One-to-Many
    public function orders()
    {
        return $this->hasMany(Order::class);
    }

    // One-to-One
    public function contact()
    {
        return $this->hasOne(Contact::class);
    }

    public function isAdmin(): bool
    {
        return $this->role === 'admin';
    }

    public function wishlist()
    {
        return $this->belongsToMany(Book::class, 'wishlists')->withTimestamps();
    }
}
