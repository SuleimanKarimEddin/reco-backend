<?php

namespace App\Http\Controllers\Dashboard;

use App\Enums\ResponseEnum;
use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\Auth\LoginRequest;
use App\Repositories\AuthRepository;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function __construct(private AuthRepository $repository)
    {
    }

    public function  login(LoginRequest $request)
    {
        $data = $this->repository->login($request->email , $request->password);
        if(!$data){
            return $this->sendError("Login failed");
        }
        return $this->sendResponse(ResponseEnum::GET , $data);
    }

}
