<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;

use App\Enums\ResponseEnum;
use Illuminate\Http\Request;
use App\Http\Requests\User\CreateUserRequest;
use App\Http\Requests\User\DeleteUserRequest;
use App\Http\Requests\User\GetOneUserRequest;
use App\Http\Requests\User\UpdateUserRequest;
use App\Http\Requests\User\GetAllUserRequest;

use App\Http\Resources\User\GetAllUserResource;
use App\Http\Resources\User\GetOneUserResource;
use App\Interfaces\UserInterface;

class UserController extends Controller
{

    public function __construct(private UserInterface $repository) {

    }
    public  function  getOne(GetOneUserRequest $request){

        $data = $this->repository->findByID($request->user_id);
        $response = new GetOneUserResource($data);
        return $this->sendResponse(ResponseEnum::GET ,$response );
    }
    public  function  getAll(GetAllUserRequest $request){

        $data = $this->repository->getAll($is_pagenate = true ,  $request->per_page ?? 8 , $request->search );
        $response =  GetAllUserResource::collection($data);

        return $this->sendResponse(ResponseEnum::GET ,$response );

    }
    public  function  create(CreateUserRequest $request){

        $data = $this->repository->create($request->validated());

        return $this->sendResponse(ResponseEnum::ADD ,$data );

    }
    public  function  update(UpdateUserRequest $request){

        $data = $this->repository->edit($request->user_id , $request->validated());

        return $this->sendResponse(ResponseEnum::UPDATE ,$data );

    }
    public  function  delete(DeleteUserRequest $request){

        $data = $this->repository->delete($request->id);

        return $this->sendResponse(ResponseEnum::DELETE ,$data );

    }

}
