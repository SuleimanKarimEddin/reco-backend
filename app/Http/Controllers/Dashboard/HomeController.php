<?php

namespace App\Http\Controllers\Dashboard;

use App\Enums\ResponseEnum;
use App\Http\Controllers\Controller;
use App\Repositories\HomeRepository;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function __construct(protected HomeRepository $repo) {
    }
    public function getHomeData(){

        return $this->sendResponse(ResponseEnum::GET ,$this->repo->getAllStatics() );
    }
}
