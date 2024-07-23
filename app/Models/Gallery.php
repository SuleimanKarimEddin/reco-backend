<?php

namespace App\Models;

use App\Traits\HasTranslation;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    use HasFactory ,HasTranslation ;

    protected $transaltion = 'galleryTranslations';
    protected $fillable = [
        'is_active',
        'width',
        'hight',
        'type',
        'URL',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];
    
    public function galleryTranslations()
    {
        return $this->HasMany(GalleryTranslation::class);
    }
}
