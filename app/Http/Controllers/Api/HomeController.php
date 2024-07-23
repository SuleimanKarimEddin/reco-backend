<?php

namespace App\Http\Controllers\Api;

use App\Enums\ResponseEnum;
use App\Http\Controllers\Controller;
use App\Repositories\HomeRepository;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    
    public function __construct(protected HomeRepository $repo) {
        
    }
    public function getHomeData(){

        $data = $this->repo->getWebSiteData();

        return $this->sendResponse(ResponseEnum::GET , $data );
    }
}
