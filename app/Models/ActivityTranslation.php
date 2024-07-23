<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ActivityTranslation extends Model
{
    use HasFactory;

    protected $fillable = [
        'activity_id',
        'locale',
        'title',
        'description',
        'location',
    ];
    // protected $hidden = [

    public function activity()
    {
        return $this->belongsTo(Activity::class);
    }
}
