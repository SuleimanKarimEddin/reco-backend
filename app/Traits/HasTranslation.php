<?php 
namespace App\Traits;
 


trait HasTranslation {
    public function scopeByLocale($query)
    {
        return $query->with([$this->transaltion => function($q){
            $q->where('locale',request()->language_id);
        }]);
    }
}