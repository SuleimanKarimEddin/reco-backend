<?php

namespace App\Http\Controllers\Dashboard;
use App\Http\Controllers\Controller;

use App\Enums\ResponseEnum;
use App\Repositories\SocialMediaRepository;
use Illuminate\Http\Request;
use App\Http\Requests\Dashboard\SocialMedia\CreateSocialMediaRequest;
use App\Http\Requests\Dashboard\SocialMedia\DeleteSocialMediaRequest;
use App\Http\Requests\Dashboard\SocialMedia\GetOneSocialMediaRequest;
use App\Http\Requests\Dashboard\SocialMedia\UpdateSocialMediaRequest;
use App\Http\Requests\Dashboard\SocialMedia\GetAllSocialMediaRequest;
use App\Http\Requests\Dashboard\SocialMedia\UpdateSocialMediaStatusRequest;
use App\Http\Resources\Dashboard\SocialMedia\DeleteSocialMediaResource;
use App\Http\Resources\SocialMedia\GetAllSocialMediaResource;
use App\Http\Resources\Dashboard\SocialMedia\GetOneSocialMediaResource;
use App\Http\Resources\Dashboard\SocialMedia\UpdateSocialMediaResource;
use App\Http\Resources\Dashboard\SocialMedia\CreateSocialMediaResource;
use App\Interfaces\SocialMediaInterface;
use App\Services\ImageService;

class SocialMediaController extends Controller
{

    public function __construct(private SocialMediaRepository $repository  ) {

    }

    public  function  getAll(GetAllSocialMediaRequest $request){

         $data = $this->repository->getAll($is_pagenate = true ,  $request->per_page ?? 8 , $request->search );
        $response =  GetAllSocialMediaResource::collection($data);

        return $this->sendResponse(ResponseEnum::GET ,$response );

    }
    public  function  create(CreateSocialMediaRequest $request){

         $image = ImageService::upload_image($request->image , 'social_media');

        $data = $this->repository->create(["image"=>$image ,"link"=>$request->link]);

        return $this->sendResponse(ResponseEnum::ADD ,$data );

    }
    public  function  update(UpdateSocialMediaRequest $request){

        $data = $this->repository->edit($request->social_media_id , $request);

        return $this->sendResponse(ResponseEnum::UPDATE ,$data );

    }
    public  function  delete(DeleteSocialMediaRequest $request){

        $data = $this->repository->delete($request->social_media_id);

        return $this->sendResponse(ResponseEnum::DELETE ,$data );

    }

    public  function  changeStatus(UpdateSocialMediaStatusRequest $request){

        $data = $this->repository->updateStatus($request->social_media_id , $request->new_status ??1, 'is_active');

        return $this->sendResponse(ResponseEnum::UPDATE ,$data );

    }


}
