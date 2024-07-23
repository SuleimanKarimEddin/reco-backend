<?php  



namespace App\Models\base ;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BaseModel extends Model {
    use HasFactory;

    public function __construct(public string $transaltion)
    {
        
    }


    public function scopeByLocale($query)
    {
        return $query->with([$this->transaltion => function($q){
            $q->where('locale',request()->language_id);
        }]);
    }

    public function scopeActive($query)
    {
        return $query->where('is_active', 1);
    }

}