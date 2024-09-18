<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles;

    protected $guarded = [];

    protected $hidden = [
        'password',
        'remember_token',
    ];


    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    // Automatically append the 'profile_pic_url' attribute to the model's array and JSON form.
    protected $appends = ['profile_pic_url'];

    // This function generates the URL for the profile picture
    public function getProfilePicUrlAttribute()
    {
        // Check if the profile_image field is set and the file exists in storage
        if (!empty($this->profile_image) && Storage::disk('public')->exists('uploads/' . $this->profile_image)) {
            // Return the full URL to the image
            return asset('storage/uploads/' . $this->profile_image);
        }

        // Return a default image if profile_image is empty or does not exist
        return asset('storage/default-avatar.png'); // Make sure you have a default image
    }

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    public function cart_items()
    {
        return $this->hasMany(CartItem::class);
    }


    public function wishlists()
    {
        return $this->hasMany(Wishlist::class);
    }

    public function bookings()
    {
        return $this->hasMany(Order::class);
    }
}