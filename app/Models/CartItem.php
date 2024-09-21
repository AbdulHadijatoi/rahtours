<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CartItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'package_id',
        'tour_date',
        'group',
        'adult',
        'child',
        'infant',
        'cancel_date',
        'price',
        'quantity',
        'group_size',
        'activity_image',
        'activity_slug',
        'package_highlight',
        'package_title',
        'cancellation_duration',
        'category',
    ];

    protected $casts = [
        'attributes' => 'array',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function package()
    {
        return $this->belongsTo(Package::class);
    }
    
}