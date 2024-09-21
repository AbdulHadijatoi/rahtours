<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Blog extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function contents()
    {
        return $this->hasMany(BlogContent::class);
    }

    public function faqs()
    {
        return $this->hasMany(Faq::class);
    }

    protected $appends = ['banner_image_url'];

    public function getBannerImageUrlAttribute() {
        if (!empty($this->banner_image) && Storage::disk('public')->exists('uploads/' . $this->banner_image)) {
            return asset('storage/uploads/' . $this->banner_image);
        }

        return asset('storage/uploads/blog/banner_image.jpg');
    }
}