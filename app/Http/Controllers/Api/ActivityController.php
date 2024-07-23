<?php

namespace App\Http\Controllers\Api;

use App\Enums\ResponseEnum;
use App\Http\Controllers\Controller;
use App\Models\Activity;
use Illuminate\Http\Request;

class ActivityController extends Controller
{
    
    public function getOne ($id){

        $data = Activity::byLocale()->find($id);

        return $this->sendResponse(ResponseEnum::GET , $data);
    }
    public function getAll(Request $request){

        $data = Activity::query();
        
        return $this->sendResponse(ResponseEnum::GET , $data->paginate($request->per_page ?? 10));
    }
}
