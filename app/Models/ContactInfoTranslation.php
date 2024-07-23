<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContactInfoTranslation extends Model
{
    use HasFactory;

    protected $fillable = [
        'contact_info_id',
        'key',
        'value',
    ];

    public function contactinfo()
    {
        return $this->belongsTo(ContactInfo::class);
    }
}
