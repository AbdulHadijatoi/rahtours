<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class BlogContent extends Model
{
    use HasFactory;
    protected $gaurded = [];

    public function blog() {
        return $this->belongsTo(Blog::class);
    }

    protected $appends = ['image_url'];

    public function getImageUrlAttribute() {
        if (!empty($this->image) && Storage::disk('public')->exists('uploads/' . $this->image)) {
            return asset('storage/uploads/' . $this->image);
        }

        return asset('storage/uploads/blog_contents/content_image.jpg');
    }
}