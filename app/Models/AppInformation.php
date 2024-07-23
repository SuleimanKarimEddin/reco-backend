<?php

namespace App\Models;

use App\Models\base\BaseModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AppInformation extends Model
{
    use HasFactory, SoftDeletes;
    protected $table= "app_information";
    protected $hidden = [
        'created_at', 'updated_at', 'deleted_at'
    ];

    protected $fillable = [
        'id' ,
        
    ];
    public function translations(){
        return $this->HasMany(AppInformationTranslation::class);
    }
    
}
