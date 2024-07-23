<?php

namespace App\Http\Controllers\Api;

use App\Enums\ResponseEnum;
use App\Http\Controllers\Controller;
use App\Models\AppInformation;
use Illuminate\Http\Request;

class AppInfoController extends Controller
{

 public  function aboutUs()
    {
        $about_us = AppInformation::whereHas('translations', function($query){
            $query->where('title','about_us');
        })->with('translations')->select('app_information.id')->first();

        return $this->sendResponse(ResponseEnum::GET , $about_us);
    }

    public  function privacy()
    {
        $privacy = AppInformation::whereHas('translations', function($query){
            $query->where('title','privacy');
        })->
            with('translations')->select('app_information.id')->first();


            return $this->sendResponse(ResponseEnum::GET , $privacy);

    }

}
