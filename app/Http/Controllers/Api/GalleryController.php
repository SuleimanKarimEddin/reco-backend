<?php

namespace App\Http\Controllers\Api;

use App\Enums\ResponseEnum;
use App\Http\Controllers\Controller;
use App\Models\Gallery;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
    public function gallery(){

        $data = Gallery::byLocale()->get();
        return  $this->sendResponse(ResponseEnum::GET , $data);
    }
}
