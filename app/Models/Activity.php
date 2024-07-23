<?php

namespace App\Models;

use App\Traits\HasTranslation;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Testing\Fluent\Concerns\Has;

class Activity extends Model
{
    use HasFactory , HasTranslation;

    protected $translation = 'activityTranslations';
    protected $fillable = [
        'activity_image',
        'is_active',
        'start_date',
        'end_date',
        "start_date",
        "end_date",
    ];
    protected $hidden = [   
        'created_at', 'updated_at'
    ];
    public function activityTranslations()
    {
        return $this->HasMany(ActivityTranslation::class);
    }
}
