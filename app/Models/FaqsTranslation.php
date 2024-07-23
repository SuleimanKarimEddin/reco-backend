<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FaqsTranslation extends Model
{
    use HasFactory;
    protected $table= "faqs_translations";
    protected $fillable = [
        'faqs_id',
        'locale',
        'title',
        'description',
    ];

    public function faqs()
    {
        return $this->belongsTo(Faqs::class);
    }
}
