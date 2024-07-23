<?php

namespace App\Models;

use App\Traits\HasTranslation;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory , HasTranslation;

    protected $translation = 'postTranslation';
    protected $fillable = [
        'category_id',
        'is_active',
        'type',
        'path',
        'priority'
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function postTranslations()
    {
        return $this->HasMany(PostTranslation::class,"post_id");
    }
}
