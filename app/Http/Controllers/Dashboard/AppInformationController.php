<?php

namespace App\Http\Controllers\Dashboard;

use App\Enums\ResponseEnum;
use App\Http\Controllers\Controller;
use App\Models\AppInformation;
use Illuminate\Http\Request;

class AppInformationController extends Controller
{
    public  function getAboutUs()
    {
        $about_us = AppInformation::whereHas('translations', function($query){
            $query->where('title','about_us');
        })->with('translations')->select('app_information.id')->first();

        return $this->sendResponse(ResponseEnum::GET , $about_us);
    }

    public  function getPrivacy()
    {
        $privacy = AppInformation::whereHas('translations', function($query){
            $query->where('title','privacy');
        })->
            with('translations')->select('app_information.id')->first();


            return $this->sendResponse(ResponseEnum::GET , $privacy);

    }

    public  function updateAboutUs(Request $request)
    {
         $aboutus = AppInformation::whereHas('translations', function($query){
            $query->where('title','about_us');
        })->
           select('app_information.id')->first();
          

           $aboutus->translations()->where('locale',1)->update([
            'content'=>$request->content_en
           ]);
           
           $aboutus->translations()->where('locale',2)->update([
            'content'=>$request->content_ar
           ]);
        return $this->sendResponse(ResponseEnum::UPDATE , true);
    }

    public  function updatePrivacy(Request $request)
    {
        $privacy = AppInformation::whereHas('translations', function($query){
            $query->where('title','privacy');
        })->
           select('app_information.id')->first();

           $privacy->translations()->where('locale',1)->update([
            'content'=>$request->content_en
           ]);
           $privacy->translations()->where('locale',2)->update([
            'content'=>$request->content_ar
           ]);
           return $this->sendResponse(ResponseEnum::UPDATE , true);

    }
}
