<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Enums\ResponseEnum;
use App\Http\Requests\Dashboard\Activity\CreateActivityRequest;
use App\Http\Requests\Dashboard\Activity\DeleteActivityRequest;
use App\Http\Requests\Dashboard\Activity\GetoneActivityRequest;
use App\Http\Requests\Dashboard\Activity\UpdateActivityRequest;
use App\Http\Resources\Dashboard\Activity\CreateActivityResource;
use App\Repositories\ActivityRepository;

class ActivityController extends Controller
{
    public function __construct(private ActivityRepository $repository) {

    }
    public  function  getAllForDashboard(){
        $data = $this->repository->getAllForDashboard();
        return $this->sendResponse(ResponseEnum::GET ,$data );
    }

    public  function  getOne(GetoneActivityRequest $request){
        $data = $this->repository->getOneForDashboard($request->activity_id);
        return $this->sendResponse(ResponseEnum::GET ,$data );
    }
    public  function  create(CreateActivityRequest $request){
        $data = $this->repository->create($request);
        $response = new CreateActivityResource($data);

        return $this->sendResponse(ResponseEnum::ADD );
    }
    public  function  update(UpdateActivityRequest $request){
        $this->repository->edit($request->activity_id , $request);
        return $this->sendResponse(ResponseEnum::UPDATE);
    }
    public  function  delete(DeleteActivityRequest $request){
        $this->repository->delete($request->activity_id);
        return $this->sendResponse(ResponseEnum::DELETE);
    }
}
