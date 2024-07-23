<?php

namespace App\Http\Controllers\Api;

use App\Enums\ResponseEnum;
use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    
    public function getOne ($id){

        $data = Post::byLocale()->find($id);

        return $this->sendResponse(ResponseEnum::GET , $data);
    }
    public function getAll(Request $request){

        $data = Post::query();
        
        return $this->sendResponse(ResponseEnum::GET , $data->paginate($request->per_page ?? 10));
    }
}
