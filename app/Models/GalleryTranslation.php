<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GalleryTranslation extends Model
{
    use HasFactory;

    protected $fillable = [
        'gallery_id',
        'locale',
        'title',
        'body',
    ];

    public function gallery()
    {
        return $this->belongsTo(Gallery::class);
    }
}
