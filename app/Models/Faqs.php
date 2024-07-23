<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Faqs extends Model
{
    use HasFactory;
    protected $table= "faqs";
    protected $fillable = [
        'is_active',
        'priority'
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    public function faqsTranslations()
    {
        return $this->HasMany(FaqsTranslation::class,"faqs_id","id");
    }
}
