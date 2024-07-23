<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SocialMedia extends Model
{
    use HasFactory;

    protected $fillable = [
        'is_active',
        'image',
        'link'
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];
}
