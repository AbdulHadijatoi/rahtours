<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Help extends Model
{
    use HasFactory;
    protected $fillable=[
        'email',
        'description',
        'booking_ref_no',
    ];
}
