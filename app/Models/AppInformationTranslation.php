<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AppInformationTranslation extends Model
{
    use HasFactory;
    protected $table="app_information_translations";
    protected $fillable = [
        'locale' ,
        'app_information_id',
        'title',
        'content',
    ];
    

    protected $hidden = [
        'created_at', 'updated_at',
    ];

    public function appinformation()
    {
        return $this->belongsTo(AppInformation::class);
    }
}
