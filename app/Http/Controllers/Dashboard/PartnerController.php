<?php

namespace App\Http\Controllers\Dashboard;
use App\Enums\ResponseEnum;
use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\Partner\CreatePartnerRequest;
use App\Http\Requests\Dashboard\Partner\DeletePartnerRequest;
use App\Http\Requests\Dashboard\Partner\GetAllPartnerRequest;
use App\Http\Requests\Dashboard\Partner\UpdatePartnerRequest;
use App\Http\Resources\Dashboard\Partner\GetAllPartnerResource;
use App\Repositories\PartnerRepository;

class PartnerController extends Controller
{

    public function __construct(private  PartnerRepository $repository  ) {

    }

    public  function  getAll(GetAllPartnerRequest $request){

        $data = $this->repository->getAll($is_pagenate = false ,  $request->per_page ?? 8 , $request->search );
        $response =  GetAllPartnerResource::collection($data);

        return $this->sendResponse(ResponseEnum::GET ,$response );

    }
    public  function  create(CreatePartnerRequest $request){

        $data = $this->repository->create($request->validated());

        return $this->sendResponse(ResponseEnum::ADD ,$data );

    }
    public  function  update(UpdatePartnerRequest $request){

        $data = $this->repository->edit($request->id , $request->validated());

        return $this->sendResponse(ResponseEnum::UPDATE ,$data );

    }
    public  function  delete(DeletePartnerRequest $request){

        $data = $this->repository->delete($request->id);

        return $this->sendResponse(ResponseEnum::DELETE ,$data );

    }

}
