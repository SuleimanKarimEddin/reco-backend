<?php

namespace App\Http\Controllers\Dashboard;
use App\Http\Controllers\Controller;

use App\Enums\ResponseEnum;
use App\Repositories\CategoryRepository;
use Illuminate\Http\Request;
use App\Http\Requests\Dashboard\Catgeory\CreateCatgeoryRequest;
use App\Http\Requests\Dashboard\Catgeory\DeleteCatgeoryRequest;
use App\Http\Requests\Dashboard\Catgeory\UpdateCatgeoryRequest;
use App\Http\Requests\Dashboard\Catgeory\GetAllCatgeoryRequest;
use App\Http\Requests\Dashboard\Catgeory\UpdateCategoryStatusRequest;
use App\Interfaces\CategoryInterface;

class CategoryController extends Controller
{

    public function __construct(private CategoryRepository $repository  ) {

    }
    public  function  getAll(GetAllCatgeoryRequest $request){

        $data = $this->repository->getAllCategoryForDashboard($request->per_page ?? 8 , $request->search );
        $response = ($data);

        return $this->sendResponse(ResponseEnum::GET ,$response );

    }
    public  function  create(CreateCatgeoryRequest $request){

        $data = $this->repository->create($request);


        return $this->sendResponse(ResponseEnum::ADD ,$data );

    }
    public  function  update(UpdateCatgeoryRequest $request){

        $data = $this->repository->edit($request->category_id , $request);


        return $this->sendResponse(ResponseEnum::UPDATE ,$data );

    }
    public  function  delete(DeleteCatgeoryRequest $request){

         $this->repository->delete($request->category_id);

        return $this->sendResponse(ResponseEnum::DELETE  , true );

    }
    public function updateCategoryStatus(UpdateCategoryStatusRequest $request){

            $success = $this->repository->updateCategoryStatus($request->category_id , $request->new_status);

            return $this->sendResponse(ResponseEnum::UPDATE, $success);

    }

}
