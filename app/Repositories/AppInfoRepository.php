<?php

namespace App\Repositories;
use App\Models\AppInformation;
use App\Models\AppInformationTranslation;
use App\Repositories\Base\CrudBaseRepository;
use Illuminate\Http\Request;


class AppInfoRepository
 {


   public function showAboutus()
   {
    $data=AppInformation::whereHas('translations',function($query){
        $query->where('title','about_us');
         })->with('translations')-> first();

    return $data;
   }

   public function showPrivacy()
   {
    $data=AppInformation::whereHas('translations',function($query){
        $query->where('title','privacy');
       })-> with('translations')-> first();

    return $data;
   }


}
