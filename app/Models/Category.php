<?php

namespace App\Models;

use App\Models\base\BaseModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        
    ];

    protected $hidden = [
        'created_at', 'updated_at',
    ];

    public function categoryTranslations()
    {
        return $this->HasMany(CategoryTranslation::class);
    }

    public function posts(){
        return $this->hasMany(Post::class);
    }

}
